<?php

namespace App\Controllers;

use App\Models\InternshipModel;


class Admin extends BaseController
{

    protected $db, $builder;

    public function __construct()
    {
        $this->db = \Config\Database::connect();
        $this->builder = $this->db->table('users');
    }

    public function index(): string
    {
        $data['title'] = 'User List';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll();

        $this->builder->select('users.id as userid, username, email, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $query = $this->builder->get();

        $data['users'] = $query->getResult();
        return view('admin/index', $data);
    }

    public function detail($id = 0)
    {
        $data['title'] = 'User Detail';
        // $users = new \Myth\Auth\Models\UserModel();
        // $data['users'] = $users->findAll()

        $this->builder->select('users.id as userid, username, email, user_image, name');
        $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
        $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
        $this->builder->where('users.id', $id);
        $query = $this->builder->get();

        $data['user'] = $query->getRow();

        if (empty($data['user'])) {
            return redirect()->to('/admin');
        }

        return view('admin/detail', $data);
    }





    public function daftar()
    {
        $model = new InternshipModel();

        // Ambil semua data dari tabel internships
        $data['getinternship'] = $model->findAll();

        // Kirim data ke view
        return view('admin/pendaftar', $data);
    }



    public function confirm($id, $action)
    {
        $model = new InternshipModel();

        // Cari data pendaftar berdasarkan ID
        $internship = $model->find($id);

        if ($internship) {
            // Tentukan status berdasarkan aksi
            if ($action == 'accept') {
                $status = 'diterima';
                $message = 'Pendaftar magang berhasil diterima!';
            } elseif ($action == 'reject') {
                $status = 'ditolak';
                $message = 'Pendaftar magang berhasil ditolak!';
            } else {
                return redirect()->to('admin/daftar')->with('error', 'Aksi tidak valid.');
            }

            // Update status di database
            $model->update($id, ['status_penerimaan' => $status]);

            // Redirect dengan pesan sukses
            return redirect()->to('admin/daftar')->with('message', $message);
        } else {
            // Jika data tidak ditemukan
            return redirect()->to('admin/daftar')->with('error', 'Data pendaftar tidak ditemukan.');
        }
    }

    public function dashboardData()
    {
        $internshipModel = new InternshipModel();

        // Get the required data for the dashboard
        $belumTerkonfirmasi = $internshipModel->where('status_penerimaan', 'belum diterima')->countAllResults();
        $pendaftarBulanIni = $internshipModel->where('MONTH(created_at)', date('m'))->countAllResults();
        $diterimaBulanIni = $internshipModel->where('status_penerimaan', 'diterima')
                                            ->where('MONTH(created_at)', date('m'))->countAllResults();
        $pesertaAktif = $internshipModel->where('status_penerimaan', 'diterima')->countAllResults();
        
        // Hitung alumni berdasarkan tanggal selesai dan tanggal sekarang
        $totalAlumni = $internshipModel->where('status_penerimaan', 'selesai')
                                       ->where('selesai <=', date('Y-m-d'))
                                       ->countAllResults();

        // Passing the data to the view
        return view('admin/dashboard', [
            'belumTerkonfirmasi' => $belumTerkonfirmasi,
            'pendaftarBulanIni' => $pendaftarBulanIni,
            'diterimaBulanIni' => $diterimaBulanIni,
            'pesertaAktif' => $pesertaAktif,
            'totalAlumni' => $totalAlumni
        ]);
    }
}

<?php

namespace App\Controllers;

use App\Models\InternshipModel;

class Internship extends BaseController
{


    public function index()
    {
        $model = new InternshipModel();
        $data['getinternship'] = $model->findAll();
        return view('admin/pendaftar', $data);
    }

    public function dex()
    {
        $model = new InternshipModel();
        $data['getinternship'] = $model->findAll();
        return view('first', $data);
    }

    public function submit()
    {
        $rules = [
            'nama' => 'required',
            'no_telepon' => 'required|numeric',
            'email' => 'required|valid_email',
            'instansi' => 'required',
            'mulai' => 'required',
            'selesai' => 'required',
            'surat' => 'uploaded[surat]|max_size[surat,1024]|ext_in[surat,pdf]',
            'rekomendasi' => 'uploaded[rekomendasi]|max_size[rekomendasi,1024]|ext_in[rekomendasi,pdf]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new InternshipModel();

        $kodePendaftaran = date('Ymd') . strtoupper(bin2hex(random_bytes(2)));

        $data = [
            'nama' => $this->request->getPost('nama'),
            'no_telepon' => $this->request->getPost('no_telepon'),
            'email' => $this->request->getPost('email'),
            'instansi' => $this->request->getPost('instansi'),
            'mulai' => $this->request->getPost('mulai'),
            'selesai' => $this->request->getPost('selesai'),
            'surat' => $this->uploadFile($this->request->getFile('surat'), 'surat'),
            'rekomendasi' => $this->uploadFile($this->request->getFile('rekomendasi'), 'rekomendasi'),
            'status_penerimaan' => 'belum diterima',
            'kode_pendaftaran' => $kodePendaftaran,
        ];

        $model->save($data);

        session()->setFlashdata('message', 'Pengajuan magang berhasil! Kode Pendaftaran: ' . $kodePendaftaran);
        return redirect()->to('/home');
    }

    public function check_status()
    {
        $model = new InternshipModel();
        $kodePendaftaran = $this->request->getPost('kode_pendaftaran');
        $internship = $model->where('kode_pendaftaran', $kodePendaftaran)->first();

        if ($internship) {
            session()->setFlashdata('message', 'Status Pengajuan: ' . $internship['status_penerimaan']);
        } else {
            session()->setFlashdata('message', 'Kode Pendaftaran tidak ditemukan.');
        }

        return redirect()->back();
    }

    private function uploadFile($file, $folder)
    {
        if ($file->isValid()) {
            $file->move('uploads/' . $folder);
            return $file->getName();
        }
        return null;
    }
}

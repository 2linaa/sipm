<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use CodeIgniter\Controller;

class LaporanController extends Controller
{
    protected $laporanModel; 
    public function __construct() { 
        $this->laporanModel = new LaporanModel();
    }

    public function index() { 
        $data = [ 'buku' => $this->laporanModel->findAll() ]; 
        return view('user/laporan', $data);
    }
    
    public function create()
    {
        return view('user/add');
    }
    
    public function store()
    {
        $laporanModel = new LaporanModel();

        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'laporan' => 'uploaded[laporan]|mime_in[laporan,application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document]|max_size[laporan,2048]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('status', 'error');
            session()->setFlashdata('message', 'Gagal mengunggah laporan. Pastikan semua data telah diisi dengan benar.');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $file = $this->request->getFile('laporan');
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $newName);

            $data = [
                'nama' => $this->request->getPost('nama'),
                'laporan_path' => $newName,
            ];
            $laporanModel->saveLaporan($data);

            session()->setFlashdata('status', 'success');
            session()->setFlashdata('message', 'Laporan berhasil diunggah.');

            return redirect()->to('/laporan');
        } else {
            session()->setFlashdata('status', 'error');
            session()->setFlashdata('message', 'Gagal mengunggah laporan.');
            return redirect()->back()->withInput();
        }
    }
}
?>

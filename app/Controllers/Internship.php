<?php

namespace App\Controllers;

use App\Models\InternshipModel;
use Twilio\Rest\Client;


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

        // Kirim Notifikasi WhatsApp
        $this->sendWhatsAppNotification($data);

        session()->setFlashdata('message', 'Pengajuan magang berhasil! Kode Pendaftaran: ' . $kodePendaftaran);
        return redirect()->to('/home');
    }

    private function sendWhatsAppNotification($data)
    {
        $sid = 'ACc491468cd7072a2e696aafc69045c2d6'; // Ganti dengan SID akun Twilio Anda
        $token = '57da8df6de70a1c7882b633fadc60b87'; // Ganti dengan token API Twilio Anda
        $whatsappFrom = 'whatsapp:+14155238886'; // Nomor WA yang diverifikasi Twilio
        $whatsappTo = 'whatsapp:+6287863898658'; // Nomor tujuan (admin)

        $message = "Pengajuan Magang Baru:\n"
            . "Nama: {$data['nama']}\n"
            . "No Telepon: {$data['no_telepon']}\n"
            . "Email: {$data['email']}\n"
            . "Instansi: {$data['instansi']}\n"
            . "Tanggal Mulai: {$data['mulai']}\n"
            . "Tanggal Selesai: {$data['selesai']}\n"
            . "Kode Pendaftaran: {$data['kode_pendaftaran']}";

        $client = new \Twilio\Rest\Client($sid, $token);

        try {
            $client->messages->create(
                $whatsappTo,
                [
                    'from' => $whatsappFrom,
                    'body' => $message,
                ]
            );
        } catch (\Exception $e) {
            log_message('error', 'Error sending WhatsApp: ' . $e->getMessage());
        }
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

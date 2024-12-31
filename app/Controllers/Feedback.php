<?php

namespace App\Controllers;

use App\Models\FeedbackModel;
use CodeIgniter\Controller;

class Feedback extends Controller
{
    protected $feedbackModel; 
    public function __construct() { 
        $this->feedbackModel = new FeedbackModel();
    }

    public function index() { 
        $data = [ 'feedback' => $this->feedbackModel->findAll() ]; 
        return view('user/see', $data);
    }
    
    public function create()
    {
        return view('user/feedback');
    }

    public function store()
    {
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama' => 'required',
            'kesan' => 'required',
            'pesan' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            session()->setFlashdata('status', 'error');
            session()->setFlashdata('message', 'Gagal mengirim feedback. Pastikan semua data telah diisi dengan benar.');
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        $data = [
            'nama' => $this->request->getPost('nama'),
            'kesan' => $this->request->getPost('kesan'),
            'pesan' => $this->request->getPost('pesan'),
        ];

        $this->feedbackModel->saveFeedback($data);

        session()->setFlashdata('status', 'success');
        session()->setFlashdata('message', 'Feedback berhasil dikirim.');

        return redirect()->to('/feedback/add');
    }
}
?>

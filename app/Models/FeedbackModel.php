<?php

namespace App\Models;

use CodeIgniter\Model;

class FeedbackModel extends Model
{
    protected $table = 'feedback';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'kesan', 'pesan'];

    // Menambahkan timestamp otomatis
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';



    // Method to save the uploaded report
    public function saveFeedback($data)
    {
        return $this->insert($data);
    }
}
?>


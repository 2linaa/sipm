<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'buku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'laporan'];

    // Menambahkan timestamp otomatis
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';



    // Method to save the uploaded report
    public function saveLaporan($data)
    {
        return $this->insert($data);
    }
}
?>


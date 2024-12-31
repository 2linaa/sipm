<?php

namespace App\Models;

use CodeIgniter\Model;

class InternshipModel extends Model
{
    protected $table = 'internships';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'no_telepon', 'email', 'instansi', 'mulai', 'selesai', 'surat', 'reomendasi', 'status_penerimaan', 'kode_pendaftaran'];
    protected $useTimestamps = true;

    public function createInternships($data)
    {
        // Generate a unique registration code
        $data['kode_pendaftaran'] = $this->generateRegistrationCode();

        // Insert the data into the database
        return $this->insert($data);
    }

    private function generateRegistrationCode()
    {
        return 'REG-' . strtoupper(uniqid());
    }
}

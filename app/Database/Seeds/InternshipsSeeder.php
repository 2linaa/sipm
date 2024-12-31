<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class InternshipsSeeder extends Seeder
{
    public function run()
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 5; $i++) {
            // Menghasilkan nama dan menghilangkan gelar jika ada
            $namaLengkap = $faker->name;
            $namaArray = explode(' ', $namaLengkap);

            // Memastikan nama hanya terdiri dari nama depan dan nama belakang tanpa gelar
            $nama = count($namaArray) > 1 
                ? $namaArray[0] . ' ' . $namaArray[1]
                : $namaArray[0];
            $data = [
                'nama' => $faker->name,
                'no_telepon' => $faker->phoneNumber,
                'email' => $faker->unique()->email,
                'instansi' => 'SMK ' . $faker->city, // Nama instansi sebagai sekolah (contoh: SMK Jakarta)
                'mulai' => $faker->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
                'selesai' => $faker->dateTimeBetween('now', '+6 months')->format('Y-m-d H:i:s'),
                'surat' => 'surat_' . $i . '.pdf',
                'rekomendasi' => 'rekomendasi_' . $i . '.pdf',
                'status_penerimaan' => $faker->randomElement(['belum diterima', 'diterima', 'ditolak']),
                'kode_pendaftaran' => strtoupper($faker->bothify('??###??')),
                'created_at' => $faker->date('Y-m-d'),
                'updated_at' => $faker->date('Y-m-d H:i:s'),
            ];

            $this->db->table('internships')->insert($data);
        }
    }
}

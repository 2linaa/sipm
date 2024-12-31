<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class BukuSeeder extends Seeder
{
    public function run()
    {
        // Membuat instance Faker dengan locale Indonesia
        $faker = Factory::create('id_ID');

        // Menghasilkan 100 data secara otomatis
        for ($i = 0; $i < 5; $i++) {
            // Menghasilkan nama dan menghilangkan gelar jika ada
            $namaLengkap = $faker->name;
            $namaArray = explode(' ', $namaLengkap);

            // Memastikan nama hanya terdiri dari nama depan dan nama belakang tanpa gelar
            $nama = count($namaArray) > 1 
                ? $namaArray[0] . ' ' . $namaArray[1]
                : $namaArray[0];

            $data = [
                'nama' => $nama, // Menggunakan nama tanpa gelar
                'laporan' => $faker->text(100), // Menghasilkan teks laporan
                'created_at' => $faker->date(),
                'updated_at' => $faker->date('Y-m-d H:i:s'),
            ];

            // Insert data ke tabel buku
            $this->db->table('buku')->insert($data);
        }
    }
}

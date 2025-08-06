<?php

namespace Database\Seeders;

use App\Models\PublishingPackage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PublishingPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PublishingPackage::insert([
            [
                'name' => 'Paket Siap Terbit',
                'description' => 'Termasuk editing, layout, desain cover, ISBN, cetak, dan kirim.',
                'price' => 3500000,
            ],
            [
                'name' => 'Paket Asistensi',
                'description' => 'Dapat bimbingan menulis, layout, cover, ISBN, cetak, dan kirim.',
                'price' => 4500000,
            ],
            [
                'name' => 'Paket Konversi',
                'description' => 'Konversi skripsi/tugas akhir jadi buku siap cetak & kirim.',
                'price' => 3000000,
            ],
        ]);
    }
}

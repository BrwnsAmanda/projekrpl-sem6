<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PemeriksaanHarga;

class PemeriksaanHargaSeeder extends Seeder
{
    public function run()
    {
        $pemeriksaanData = [
            // HEMATOLOGI
            ['jenis_pemeriksaan' => 'HEMATOLOGI', 'detail_pemeriksaan' => 'Darah Rutin', 'harga' => 100000],
            ['jenis_pemeriksaan' => 'HEMATOLOGI', 'detail_pemeriksaan' => 'Laju Endap Darah (LED)', 'harga' => 20000],
            ['jenis_pemeriksaan' => 'HEMATOLOGI', 'detail_pemeriksaan' => 'Waktu Perdarahan (BT)', 'harga' => 30000],
            ['jenis_pemeriksaan' => 'HEMATOLOGI', 'detail_pemeriksaan' => 'Waktu Pembekuan (CT)', 'harga' => 30000],
            ['jenis_pemeriksaan' => 'HEMATOLOGI', 'detail_pemeriksaan' => 'Golongan Darah', 'harga' => 25000],
            ['jenis_pemeriksaan' => 'HEMATOLOGI', 'detail_pemeriksaan' => 'Golongan Darah + Rhesus', 'harga' => 30000],

            // KIMIA KLINIK - Diabetes Melitus
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Glukosa Darah Sewaktu', 'harga' => 30000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Glukosa Darah Puasa', 'harga' => 30000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Glukosa Darah 2 Jam PP', 'harga' => 30000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'TTGO', 'harga' => 30000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'HbA1c', 'harga' => 350000],

            // KIMIA KLINIK - Profil Lemak
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Cholesterol Total', 'harga' => 40000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'HDL Cholesterol', 'harga' => 40000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'LDL Cholesterol', 'harga' => 50000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Trigliserida', 'harga' => 40000],

            // KIMIA KLINIK - Fungsi Hati
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'SGOT', 'harga' => 40000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'SGPT', 'harga' => 40000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Bilirubin Total', 'harga' => 50000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Bilirubin Direk', 'harga' => 50000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Bilirubin Indirek', 'harga' => 50000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Albumin', 'harga' => 50000],

            // KIMIA KLINIK - Fungsi Ginjal
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Ureum', 'harga' => 40000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Creatinin', 'harga' => 40000],
            ['jenis_pemeriksaan' => 'KIMIA KLINIK', 'detail_pemeriksaan' => 'Asam Urat', 'harga' => 40000],

            // URINALISA
            ['jenis_pemeriksaan' => 'URINALISA', 'detail_pemeriksaan' => 'Urine Rutin', 'harga' => 70000],
            ['jenis_pemeriksaan' => 'URINALISA', 'detail_pemeriksaan' => 'Urine Lengkap + Sedimen', 'harga' => 100000],

            // HEPATITIS
            ['jenis_pemeriksaan' => 'HEPATITIS', 'detail_pemeriksaan' => 'HBsAg Kualitatif', 'harga' => 80000],
            ['jenis_pemeriksaan' => 'HEPATITIS', 'detail_pemeriksaan' => 'Anti HBs Kuantitatif', 'harga' => 350000],
            ['jenis_pemeriksaan' => 'HEPATITIS', 'detail_pemeriksaan' => 'Anti HCV Kualitatif', 'harga' => 250000],

            // IMUNOLOGI
            ['jenis_pemeriksaan' => 'IMUNOLOGI', 'detail_pemeriksaan' => 'Widal', 'harga' => 40000],
            ['jenis_pemeriksaan' => 'IMUNOLOGI', 'detail_pemeriksaan' => 'Ns1', 'harga' => 150000],
            ['jenis_pemeriksaan' => 'IMUNOLOGI', 'detail_pemeriksaan' => 'IgG/IgM Dengue', 'harga' => 150000],

            // INFEKSI MENULAR SEKSUAL
            ['jenis_pemeriksaan' => 'INFEKSI MENULAR SEKSUAL', 'detail_pemeriksaan' => 'TPHA', 'harga' => 100000],
            ['jenis_pemeriksaan' => 'INFEKSI MENULAR SEKSUAL', 'detail_pemeriksaan' => 'VDRL', 'harga' => 100000],
            ['jenis_pemeriksaan' => 'INFEKSI MENULAR SEKSUAL', 'detail_pemeriksaan' => 'HIV', 'harga' => 100000],
            ['jenis_pemeriksaan' => 'INFEKSI MENULAR SEKSUAL', 'detail_pemeriksaan' => 'Gram GO', 'harga' => 100000],

            // LAINNYA
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'Feces Rutin', 'harga' => 30000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'Analisa Sperma', 'harga' => 150000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'DDR (Malaria Apusan)', 'harga' => 100000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'BTA (Mikroskop)', 'harga' => 100000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'BTA Cuka-Cuki', 'harga' => 100000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'FT4', 'harga' => 350000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'TSH/TSH-S', 'harga' => 350000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'Ca 125', 'harga' => 600000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'Elektrolit', 'harga' => 350000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'B-Hcg', 'harga' => 750000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'Narkoba 1 Parameter', 'harga' => 100000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'Narkoba 3 Parameter', 'harga' => 210000],
            ['jenis_pemeriksaan' => 'LAINNYA', 'detail_pemeriksaan' => 'Narkoba 6 Parameter', 'harga' => 300000],
        ];

        foreach ($pemeriksaanData as $data) {
            PemeriksaanHarga::create($data);
        }
    }
} 
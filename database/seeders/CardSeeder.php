<?php

namespace Database\Seeders;

use App\Models\Card;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $chances = [
            [
                'Bonus Material (HPP)',
                'Pemasok memberikan diskon 10% untuk bahan baku bulan ini.'
            ],
            [
                'Efficient Production (HPP)',
                'Teknologi baru memungkinkan pengurangan biaya tenaga kerja sebesar 5%.'
            ],
            [
                'Marketing Boost (HPP & TARGET COST/UNIT)',
                'Kampanye pemasaran berhasil meningkatkan target penjualan sebesar 15%.'
            ],
            [
                'Price Surge (Laba Kotor & Targeting Cost)',
                'Menaikkan harga jual sebesar 8% tanpa kehilangan pelanggan.'
            ],
            [
                'Energy Efficiency (HPP)',
                'Perusahaan meningkatkan efisiensi energi, mengurangi biaya overhead produksi variabel sebesar 10%.'
            ],
            [
                'Supplier Negotiation (HPP)',
                'menegosiasikan harga biaya bahan baku Chip turun sebesar 10%.'
            ],
            [
                'Tax Incentive (laba bersih)',
                'Pemerintah memberikan insentif pajak sebesar Rp 150.000.000 untuk investasi teknologi ramah lingkungan.'
            ],
            [
                'Government Subsidy (HPP)',
                'Pemerintah memberikan subsidi 20% untuk biaya overhead tetap.'
            ],
            [
                'Enhanced Productivity (Target Cost Keseluruhan)',
                'Peningkatan produktivitas karyawan mengurangi biaya produksi keseluruhan sebesar 12%.'
            ],
            [
                'Tax Rebate (laba kotor)',
                'Mendapatkan pengembalian pajak sebesar Rp 5.000.000 mengakibatkan penambahan laba kotor.'
            ],
            [
                'Peningkatan Penjualan sebesar 10%',
                'Jika penjualan naik menjadi 5,500 unit, biaya overhead tetap per unit akan menurun sebesar 9.1% (Rp 400,000,000 / 5,500 = Rp 72,727).'
            ],
            [
                'Penurunan Biaya Bahan Baku sebesar 5%',
                'Jika harga bahan baku turun 5%, HPP per unit akan menurun menjadi Rp 1,430,000 (Rp 1,480,000 * 0.95).'
            ],
            [
                'Penurunan Biaya Tenaga Kerja sebesar 10%',
                'Jika biaya tenaga kerja turun 10%, HPP per unit akan menurun menjadi Rp 1,450,000 (Rp 1,480,000 - Rp 30,000).'
            ],
            [
                'Penurunan Biaya Overhead Variabel sebesar 5%',
                'Jika biaya overhead variabel per unit turun 5%, HPP per unit akan menurun menjadi Rp 1,470,000 (Rp 1,480,000 - Rp 10,000).'
            ],
            [
                'Masalah Kualitas Supplier',
                'Meningkatkan biaya bahan baku sebesar 15% karena masalah kualitas dari pemasok.'
            ],
            [
                'Penurunan Biaya Pemasaran Tetap sebesar 10%',
                'Jika biaya pemasaran tetap per tahun turun 10%, total biaya pemasaran tetap akan menjadi Rp 180,000,000, meningkatkan laba bersih.'
            ],
            [
                'Biaya Hukum Tak Terduga',
                'Meningkatkan biaya overhead tetap sebesar 10% karena biaya hukum tak terduga.'
            ],
            [
                'Peningkatan Harga Jual sebesar 5%',
                'Jika harga jual per unit naik 5%, harga jual akan menjadi Rp 2,625,000, meningkatkan laba kotor per unit.'
            ],
            [
                'Keberhasilan Diskon untuk Paket',
                'Jika diskon 15% untuk paket menarik banyak pelanggan, perusahaan bisa mengalami peningkatan penjualan hingga 10%.'
            ],
            [
                'Inovasi Produk',
                'Jika inovasi produk meningkatkan nilai produk tanpa meningkatkan biaya secara signifikan, harga jual bisa dinaikkan sebesar 10%, menjadi Rp 2,750,000, meningkatkan laba kotor per unit.'
            ]
        ];

        $challenges = [
            [
                'Supplier Delay (HPP)',
                'Pengiriman bahan baku terlambat, menambah biaya produksi sebesar 10%.'
            ],
            [
                'Labor Strike (HPP)',
                'Pemogokan pekerja menyebabkan peningkatan biaya tenaga kerja sebesar 20%.'
            ],
            [
                'Equipment Failure (HPP)',
                'Kerusakan peralatan meningkatkan biaya overhead tetap sebesar 15%.'
            ],
            [
                'Price Competition (Laba Kotor & Target Costing)',
                'Pesaing menurunkan harga, menyebabkan penurunan harga jual sebesar 10% agar tetap kompetitif.'
            ],
            [
                'Regulation Change (HPP)',
                'Peraturan baru meningkatkan biaya overhead variabel sebesar 10%.'
            ],
            [
                'Increased Tariffs (HPP)',
                'Tarif impor baru meningkatkan biaya komponen impor (chip dan layar) sebesar 15%.'
            ],
            [
                'Economic Downturn (Target Costing)',
                'Penurunan ekonomi mengurangi penjualan sebesar 20%.'
            ],
            [
                'Raw Material Price Hike (Cost per unit)',
                'Kenaikan harga bahan baku meningkatkan total cost per unit sebesar 15%.'
            ],
            [
                'Market Downturn (Laba Bersih)',
                'Penurunan pasar mengurangi penjualan sebesar 15% dari total laba bersih.'
            ],
            [
                'Shipping Delays (Cost per unit)',
                'Keterlambatan pengiriman meningkatkan biaya distribusi sebesar 10%.'
            ],
            [
                'Penurunan Penjualan sebesar 10%',
                'Jika penjualan turun menjadi 4,500 unit, biaya overhead tetap per unit akan meningkat sebesar 11.1% (Rp 400,000,000 / 4,500 = Rp 88,889).'
            ],
            [
                'Kenaikan Biaya Bahan Baku sebesar 5%',
                'Jika harga bahan baku naik 5%, HPP per unit akan meningkat menjadi Rp 1,530,000 (Rp 1,480,000 * 1.05).'
            ],
            [
                'Kenaikan Biaya Tenaga Kerja sebesar 10%',
                'Jika biaya tenaga kerja naik 10%, HPP per unit akan meningkat menjadi Rp 1,580,000 (Rp 1,480,000 + Rp 30,000).'
            ],
            [
                'Kenaikan Biaya Overhead Variabel sebesar 5%',
                'Jika biaya overhead variabel per unit naik 5%, HPP per unit akan meningkat menjadi Rp 1,490,000 (Rp 1,480,000 + Rp 10,000).'
            ],
            [
                'Kenaikan Biaya Overhead Tetap sebesar 10%',
                'Jika biaya overhead tetap per tahun naik 10%, biaya overhead tetap per unit akan meningkat menjadi Rp 88,000 (Rp 440,000,000 / 5,000 unit).'
            ],
            [
                'Kenaikan Biaya Pemasaran Tetap sebesar 10%',
                'Jika biaya pemasaran tetap per tahun naik 10%, total biaya pemasaran tetap akan menjadi Rp 220,000,000, mengurangi laba bersih.'
            ],
            [
                'Kenaikan Biaya Pemasaran Variabel sebesar 5%',
                'Jika biaya pemasaran variabel per unit naik 5%, biaya pemasaran variabel akan menjadi Rp 105,000 per unit, mengurangi laba bersih.'
            ],
            [
                'Penurunan Harga Jual sebesar 5%',
                'Jika harga jual per unit turun 5%, harga jual akan menjadi Rp 2,375,000, mengurangi laba kotor per unit.'
            ],
            [
                'Kegagalan Diskon untuk Paket',
                'Jika diskon 15% untuk paket tidak menarik pelanggan, perusahaan bisa mengalami penurunan penjualan hingga 10%.'
            ],
            [
                'Persaingan yang Ketat',
                'Jika persaingan memaksa perusahaan untuk menurunkan harga jual sebesar 10%, harga jual akan menjadi Rp 2,250,000, mengurangi laba kotor per unit.'
            ]
        ];

        $this->create($chances, 'chance');
        $this->create($challenges, 'challenge');
    }

    public function create($lists, $type)
    {
        foreach ($lists as $list) {
            Card::create([
                'title' => $list[0],
                'desc' => $list[1],
                'type' => $type
            ]);
        }
    }
}

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
                'Price Surge',
                'Menaikkan harga jual sebesar 8% tanpa kehilangan pelanggan.'
            ],
            [
                'Energy Efficiency',
                'Perusahaan meningkatkan efisiensi energi, mengurangi biaya overhead produksi variabel sebesar 10%.'
            ],
            [
                'Supplier Negotiation',
                'menegosiasikan harga biaya bahan baku Chip turun sebesar 15%.'
            ],
            [
                'Government Subsidy',
                'Pemerintah memberikan subsidi 20% untuk biaya overhead tetap.'
            ],
            [
                'Enhanced Productivity',
                'Peningkatan produktivitas karyawan mengurangi biaya produksi keseluruhan sebesar 12%.'
            ],
            [
                'Operational Efficiency',
                'Anda berhasil melakukan efisiensi operasional. Biaya overhead tetap Anda berkurang sebesar 10%.'
            ],
            [
                'Bonus Material',
                'Pemasok memberikan diskon 5% untuk bahan baku.'
            ],
            [
                'Efficient Production',
                'Teknologi baru memungkinkan pengurangan biaya tenaga kerja sebesar 9%.'
            ],
            [
                'Marketing Strategy Optimization',
                'Strategi pemasaran yang optimal memberikan penurunan Biaya Pemasaran Variabel sebesar 7%.'
            ],
            [
                'Product Innovation',
                'Inovasi produk meningkatkan nilai produk tanpa meningkatkan biaya secara signifikan, harga jual bisa dinaikkan sebesar 15%.'
            ]
        ];

        $challenges = [
            [
                'Supplier Delay',
                'Pengiriman bahan baku terlambat, menambah biaya produksi sebesar 12%.'
            ],
            [
                'Equipment Failure',
                'Kerusakan peralatan meningkatkan biaya overhead tetap sebesar 15%.'
            ],
            [
                'Price Competition',
                'Pesaing menurunkan harga, menyebabkan penurunan harga jual sebesar 7% agar tetap kompetitif.'
            ],
            [
                'Regulation Change',
                'Peraturan baru meningkatkan biaya overhead variabel sebesar 10%.'
            ],
            [
                'Increased Tariffs',
                'Tarif impor baru meningkatkan biaya komponen impor (chip dan layar) sebesar 15%.'
            ],
            [
                'Raw Material Price Hike',
                'Kenaikan harga bahan baku meningkatkan total cost per unit sebesar 13%.'
            ],
            [
                'Shipping Delays',
                'Keterlambatan pengiriman meningkatkan biaya distribusi sebesar 10%.'
            ],
            [
                'New Marketing Strategy Investment',
                'Strategi pemasaran baru memerlukan investasi yang lebih besar. Biaya pemasaran tetap naik sebesar 12%.'
            ],
            [
                'Increase In Prices of Services',
                'Biaya overhead variabel Anda meningkat 8% akibat kenaikan harga layanan.'
            ],
            [
                'Labor Strike',
                'Pemogokan pekerja menyebabkan peningkatan biaya tenaga kerja sebesar 10%.'
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

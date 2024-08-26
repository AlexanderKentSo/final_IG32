<?php

namespace Database\Seeders;

use App\Models\Strategy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StrategySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $strategies = [
            "Segmentation" => [
                'Perusahaan menargetkan segmen premium sehingga menggunakan bahan berkualitas tinggi mengakibatkan kenaikan HPP 5%.',
                'Meningkatkan laba bersih sebesar 10% dari total penjualan tahunan akibat biaya penyiapan harian untuk kampanye pemasaran.'
            ],
            "Targeting" => [
                'Perusahaan memfokuskan upaya pemasaran pada generasi milenial yang melek teknologi dan keluarga yang memiliki anak sehingga meningkatkan HPP 4% karena adanya penelitian dan pengembangan tambahan untuk fitur-fitur yang mudah digunakan.',
                'Meningkatkan laba bersih sebesar 20% dari total penjualan karena kampanye iklan yang lebih luas menggunakan saluran pemasaran khusus dan pembuatan konten.'
            ],
            "Positioning" => [
                'Perusahaan menetapkan produk AR sebagai produk premium yang harus dimiliki oleh wisatawan mengakibatkan HPP mengalami penurunan 7% agar rantai pasokan untuk bahan premium tetap optimal.',
                'Laba bersih mengalami peningkatan sebesar 25% dari total penjualan tahunan  karena perusahaan menawarkan produk paling atas (the most upscale) dengan harga lebih tinggi.'
            ],
            "Diferensiasi" => [
                'Perusahaan membuat produk AR lebih menarik melalui fitur-fitur yang unik dan inovatif sehingga mengakibatkan kenaikan HPP 10% karena penggunaan teknologi canggih dan komponen yang mahal.',
                'Laba bersih mengalami penurunan sebesar 5% dari total penjualan tahunan  karena perusahaan menawarkan produk dengan harga rendah.'
            ],
            "Marketing Mix" => [
                'Perusahaan menyesuaikan bauran pemasaran untuk mengoptimalkan jangkauan pasar dengan menggunakan bahan yang hemat biaya tanpa mengorbankan kualitas sehingga dapat mengurangi HPP sebesar 8%.',
                'Laba bersih mengalami peningkatan sebesar 24% dari total penjualan tahunan akibat beragam aktivitas promosi produk yang mengedepankan keunggulan produk dengan harga terjangkau dan strategi distribusi yang meningkatkan penjualan.'
            ],
            "Selling" => [
                'Perusahaan ingin meningkatkan strategi penjualan sehingga para sales diikutsertakan dalam pelatihan sehingga meningkatkan HPP sebesar 7%.',
                'Laba bersih mengalami peningkatan sebesar 15% dari total penjualan tahunan akibat strategi penjualan yang semakin optimal.'
            ],
            "Brand" => [
                'Perusahaan membuat identitas dari produk AR yang diproduksi sehingga membedakannya dengan merek lain sehingga mengakibatkan kenaikan HPP sebesar 10% untuk pengembangan merek.',
                'Laba bersih mengalami peningkatan sebesar 32% dari total penjualan tahunan karena produk yang dijual lebih menarik dan memiliki nilai jual dan lebih meninggalkan kesan kepada konsumen.'
            ],
            "Service" => [
                'Perusahaan mengadakan pelatihan dan staf dukungan pelanggan tambahan sehingga mengakibatkan kenaikan HPP sebesar 17%.',
                'Laba bersih mengalami peningkatan sebesar 20% dari total penjualan tahunan karena pelanggan menunjukan kepuasan terhadap service yang diberikan.'
            ],
            "Process" => [
                'Perusahaan mengoptimalkan proses pengiriman dengan harga yang terjangkau dan mengurangi limbah sehingga dapat menekan HPP sebesar 24%.',
                'Laba bersih mengalami peningkatan sebesar 35% dari total penjualan tahunan karena perusahaan menerapkan proses pengiriman yang efisien dan optimal secara berkelanjutan.'
            ]
        ];

        $cnt = 1;

        foreach ($strategies as $strategy => $value) {
            Strategy::create([
                'number' => $cnt,
                'strategy' => $strategy,
                'term' => $value[0],
                'condition' => $value[1]
            ]);
            $cnt++;
        }
    }
}

<?php
// data/content.php

/**
 * Data Jadwal Pengangkutan Sampah di Kampung Baru
 */
$jadwal_sampah = [
    [
        'hari' => 'Senin & Kamis',
        'jenis' => 'Organik (Sisa Makanan, Daun)',
        'zona' => 'Area RT 01 - RT 05',
        'waktu' => '06:00 - 08:00 Pagi',
        'warna_box' => '#4CAF50' // Hijau
    ],
    [
        'hari' => 'Selasa & Jumat',
        'jenis' => 'Anorganik (Plastik, Kertas, Kaleng)',
        'zona' => 'Area RT 06 - RT 10',
        'waktu' => '08:00 - 10:00 Pagi',
        'warna_box' => '#1E88E5' // Biru
    ],
    [
        'hari' => 'Setiap Hari Sabtu',
        'jenis' => 'B3 & Residu (Baterai, Lampu, Pakaian Bekas)',
        'zona' => 'Pusat Pengumpulan Khusus RT 01',
        'waktu' => '09:00 - 11:00 Pagi',
        'warna_box' => '#FFC107' // Kuning
    ],
];

/**
 * Data 5 Poin Edukasi Utama
 * Menggunakan path absolute (/assets/img/...)
 */
$poin_edukasi = [
    [
        'judul' => '1. Organik: Dari Sampah Menjadi Pupuk',
        // Pastikan nama file Anda: edukasi_kompos.png
        'gambar_src' => './assets/img/edukasi_kompos.png', 
        'deskripsi' => 'Sampah organik seperti sisa sayuran, buah, dan ranting dapat diubah menjadi kompos yang bermanfaat untuk kebun warga. Pelajari cara membuat kompos di rumah dan mengurangi 50% volume sampah harian kita!',
        'detail' => 'Langkah Awal: Pisahkan sisa makanan dari wadah plastiknya.'
    ],
    [
        'judul' => '2. Anorganik: Re-Use, Reduce, Recycle',
        'gambar_src' => './assets/img/anorganik.png', 
        'deskripsi' => 'Pastikan plastik, botol, dan kertas dalam keadaan bersih dan kering saat dipilah. Barang-barang ini akan disalurkan ke bank sampah, di mana nilainya dapat diuangkan untuk kas lingkungan.',
        'detail' => 'Tips: Cuci dan gepengkan botol plastik untuk menghemat ruang.'
    ],
    [
        'judul' => '3. Sampah B3: Penanganan Khusus Berbahaya',
        'gambar_src' => './assets/img/sampahb3.png', 
        'deskripsi' => 'Sampah Bahan Berbahaya dan Beracun (B3) seperti baterai bekas, lampu neon, dan obat kadaluarsa tidak boleh dibuang ke tempat sampah umum. Ada titik kumpul khusus pada hari Sabtu.',
        'detail' => 'Hati-hati: Jangan buang oli bekas atau cairan kimia ke saluran air.'
    ],
    [
        'judul' => '4. Prinsip 3R (Reduce, Reuse, Recycle)',
        'gambar_src' => './assets/img/edukasi_3r.png', 
        'deskripsi' => 'Terapkan 3R dalam kehidupan sehari-hari. Reduce (kurangi) pemakaian plastik sekali pakai, Reuse (gunakan kembali) kantong belanja, dan Recycle (daur ulang) yang sudah tidak terpakai.',
        'detail' => 'Tantangan: Bawa wadah makanan sendiri saat jajan.'
    ],
    [
        'judul' => '5. Jangan Bakar Sampah!',
        'gambar_src' => './assets/img/dilarang.png', 
        'deskripsi' => 'Membakar sampah (terutama plastik) menghasilkan polusi udara berbahaya yang dapat menyebabkan penyakit pernapasan. Buanglah sampah sesuai jadwal dan biarkan tim yang menanganinya dengan benar.',
        'detail' => 'Sanksi: Pembakaran sampah dapat dikenakan denda oleh peraturan RT/RW.'
    ],
];
?>
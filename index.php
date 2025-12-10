<?php
// index.php
include 'data/content.php';
include 'includes/header.php';
?>

<section class="hero">
    <div class="hero-content">
        <h2>"Kampung Baru Bersih, Tanggung Jawab Kita Bersama!"</h2>
        <p>Pelajari cara memilah sampah, jadwal pengangkutan, dan bagaimana Anda bisa berpartisipasi dalam menjadikan Kampung Baru lebih hijau.</p>
        <a href="/webedukasi/edukasi.php" class="btn btn-primary">Mulai Belajar Memilah</a>
    </div>
</section>

<section class="info-blocks">
    <div class="card">
        <h3>Sampah Organik</h3>
        <p>Kompos dan pupuk: Ubah sisa makanan dan daun menjadi harta!</p>
    </div>
    <div class="card">
        <h3>Sampah Anorganik</h3>
        <p>Daur Ulang: Plastik, kertas, dan kaleng bisa memiliki kehidupan kedua.</p>
    </div>
    <div class="card">
        <h3>B3 (Bahan Berbahaya)</h3>
        <p>Penanganan Khusus: Baterai, lampu, dan obat-obatan. Jangan dibuang sembarangan!</p>
    </div>
</section>

<section class="quick-action-bar">
    <div class="container text-center">
        <a href="/webedukasi/kontak.php" class="btn btn-report-critical">LAPOR SAMPAH LIAR SEKARANG!</a>
    </div>
</section>


<?php
include 'includes/footer.php';
?>
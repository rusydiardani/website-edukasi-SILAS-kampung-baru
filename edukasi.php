<?php
include 'data/content.php';
include 'includes/header.php';
?>

<section class="page-intro clean-bg">
    <div class="container">
        <h2>5 Kunci Kebersihan di Kampung Baru Kita Tercinta</h2>
        <p class="subtitle">Kunci kebersihan Kampung Baru adalah pemahaman yang benar tentang jenis sampah dan penanganannya. Pelajari 5 poin penting di bawah ini!</p>
    </div>
</section>

<section class="search-bar container">
    <h3>Cari Jenis Sampah:</h3>
    <input type="text" id="search-sampah" placeholder="Contoh: Bungkus Kopi, Baterai, Daun Kering">
    <div id="search-results" class="search-results-box">
    </div>
</section>


<section class="edukasi-poin-list">
    <div class="container">

        <?php
        $count = 0;
        foreach ($poin_edukasi as $poin):
            $count++;
            $layout_class = ($count % 2 == 1) ? 'text-left' : 'text-right';
        ?>

            <div class="edukasi-item <?php echo $layout_class; ?>">
                <div class="edukasi-content">
                    <h3><?php echo $poin['judul']; ?></h3>
                    <p><?php echo $poin['deskripsi']; ?></p>
                    <div class="detail-box">
                        <p>
                            <i class="fa fa-lightbulb-o"></i>
                            <?php echo $poin['detail']; ?>
                        </p>
                    </div>
                </div>

                <div class="edukasi-visual">
                    <img src="<?php echo $poin['gambar_src']; ?>" alt="Ilustrasi <?php echo $poin['judul']; ?>">
                </div>
            </div>

        <?php endforeach; ?>

    </div>
</section>

<section class="action-call primary-bg text-white">
    <div class="container text-center">
        <h3>Siap Memilah?</h3>
        <p>Ayo segera terapkan di rumah Anda dan lihat jadwal pengangkutan hari ini.</p>
        <a href="/webedukasi/jadwal.php" class="btn btn-secondary">Cek Jadwal Pengangkutan</a>
    </div>
</section>

<?php
include 'includes/footer.php';
?>
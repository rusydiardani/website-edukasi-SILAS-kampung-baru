<?php
    $message = '';
    $status = '';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : 'Anonim';
        $lokasi = htmlspecialchars($_POST['lokasi']);
        $deskripsi = htmlspecialchars($_POST['deskripsi']);

        $file_uploaded = false;
        $file_info = "";
        
        if (isset($_FILES['bukti_foto']) && $_FILES['bukti_foto']['error'] === UPLOAD_ERR_OK) {
            $file_name = htmlspecialchars($_FILES['bukti_foto']['name']);
            $file_uploaded = true;
            $file_info = " (Disertai bukti foto: <strong>{$file_name}</strong>)";
        } 


        if (empty($lokasi) || empty($deskripsi)) {
            $status = 'error';
            $message = 'Lokasi dan Deskripsi masalah harus diisi.';
        } elseif ($status !== 'error') {
            $status = 'success';
            $message = "Terima kasih, <strong>$nama</strong>! Laporan Anda di lokasi <strong>$lokasi</strong> telah kami terima{$file_info}. Tim kebersihan akan segera menindaklanjuti.";
        }
    }

    include 'includes/header.php';
?>

<section class="page-intro">
    <div class="container">
        <h2>Laporkan & Kontak</h2>
        <p class="subtitle">Gunakan formulir ini untuk melaporkan tumpukan sampah liar, kerusakan fasilitas, atau menghubungi tim kebersihan.</p>
    </div>
</section>

<section class="contact-form-area">
    <div class="container">
        
        <?php if ($status == 'success'): ?>
            <div class="alert success">
                <?php echo $message; ?>
            </div>
        <?php elseif ($status == 'error'): ?>
            <div class="alert error">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="/webedukasi/kontak.php" method="POST" class="report-form" enctype="multipart/form-data">
            <h3 style="color: var(--color-primary); margin-bottom: 25px;">Formulir Laporan Cepat</h3>
            
            <div class="form-group">
                <label for="nama">Nama Pelapor (Opsional)</label>
                <input type="text" id="nama" name="nama">
            </div>
            
            <div class="form-group">
                <label for="lokasi">Lokasi Spesifik Sampah/Masalah*</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Depan rumah RT 05 No. 12" required>
            </div>

            <div class="form-group">
                <label for="bukti_foto">Unggah Foto Bukti (Opsional)</label>
                <input type="file" id="bukti_foto" name="bukti_foto" accept="image/jpeg, image/png">
            </div>

            <div class="form-group">
                <label for="deskripsi">Deskripsi Masalah*</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Laporan</button>
        </form>
    </div>
</section>

<section class="wa-button-bar text-center">
    <div class="container">
        <p class="atau-teks" style="margin-bottom: 15px;">--- Atau, hubungi langsung via WhatsApp ---</p>
        <a href="https://wa.me/6283188855002" target="_blank" class="btn btn-whatsapp">
            <i class="fa fa-whatsapp"></i> Hubungi Tim Kebersihan Sekarang
        </a>
    </div>
</section>

<?php
    include 'includes/footer.php';
?>
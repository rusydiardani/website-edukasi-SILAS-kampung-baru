<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$email_config = require 'config/email_config.php';

$message = '';
$status = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = isset($_POST['nama']) ? htmlspecialchars($_POST['nama']) : 'Anonim';
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $deskripsi = htmlspecialchars($_POST['deskripsi']);

    $file_uploaded = false;
    $file_path = "";
    $file_name = "";

    if (isset($_FILES['bukti_foto']) && $_FILES['bukti_foto']['error'] === UPLOAD_ERR_OK) {
        $file_name = htmlspecialchars($_FILES['bukti_foto']['name']);
        $file_path = $_FILES['bukti_foto']['tmp_name'];
        $file_uploaded = true;
    }

    if (empty($lokasi) || empty($deskripsi)) {
        $status = 'error';
        $message = 'Lokasi dan Deskripsi masalah harus diisi.';
    } else {
        // Konfigurasi PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Konfigurasi SMTP dari file config
            $mail->isSMTP();
            $mail->Host       = $email_config['smtp_host'];
            $mail->SMTPAuth   = true;
            $mail->Username   = $email_config['smtp_username'];
            $mail->Password   = $email_config['smtp_password'];
            $mail->SMTPSecure = $email_config['smtp_secure'];
            $mail->Port       = $email_config['smtp_port'];

            // Set charset untuk mendukung bahasa Indonesia
            $mail->CharSet = 'UTF-8';

            // Pengirim dan penerima
            $mail->setFrom($email_config['from_email'], $email_config['from_name']);
            $mail->addAddress($email_config['admin_email']);
            $mail->addReplyTo($email_config['from_email'], $nama);

            // Lampiran foto jika ada
            if ($file_uploaded) {
                $mail->addAttachment($file_path, $file_name);
            }

            // Konten email
            $mail->isHTML(true);
            $mail->Subject = 'Laporan Sampah Liar - ' . $lokasi;
            $mail->Body    = "
                    <h2>Laporan Baru dari Website Kampung Baru Bersih</h2>
                    <p><strong>Nama Pelapor:</strong> {$nama}</p>
                    <p><strong>Lokasi:</strong> {$lokasi}</p>
                    <p><strong>Deskripsi Masalah:</strong></p>
                    <p>{$deskripsi}</p>
                    " . ($file_uploaded ? "<p><em>Bukti foto terlampir: {$file_name}</em></p>" : "") . "
                    <hr>
                    <p><small>Email ini dikirim otomatis dari website Kampung Baru Bersih</small></p>
                ";
            $mail->AltBody = "Laporan dari: {$nama}\nLokasi: {$lokasi}\nDeskripsi: {$deskripsi}";

            $mail->send();
            $status = 'success';
            $message = "Terima kasih, <strong>$nama</strong>! Laporan Anda di lokasi <strong>$lokasi</strong> telah berhasil dikirim via email. Tim kebersihan akan segera menindaklanjuti.";
        } catch (Exception $e) {
            $status = 'error';
            $message = "Maaf, laporan gagal dikirim. Error: {$mail->ErrorInfo}";
        }
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
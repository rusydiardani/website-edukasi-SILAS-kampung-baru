<?php
// Contoh Konfigurasi Email untuk PHPMailer
// Copy file ini menjadi email_config.php dan isi dengan kredensial Anda

return [
    // Konfigurasi SMTP
    'smtp_host' => 'smtp.gmail.com', // Untuk Gmail
    'smtp_port' => 587,
    'smtp_secure' => 'tls', // atau 'ssl' untuk port 465
    
    // Kredensial Email
    'smtp_username' => 'your-email@gmail.com', // Email pengirim
    'smtp_password' => 'your-app-password', // App Password (bukan password biasa!)
    
    // Email Pengirim
    'from_email' => 'your-email@gmail.com',
    'from_name' => 'Kampung Baru Bersih',
    
    // Email Penerima Laporan
    'admin_email' => 'admin@kampungbaru.com', // Email yang menerima laporan
];

/*
CARA SETUP:
1. Copy file ini menjadi email_config.php
2. Isi kredensial email Anda di email_config.php
3. Jangan commit email_config.php ke GitHub!

CARA MENDAPATKAN APP PASSWORD GMAIL:
1. Buka https://myaccount.google.com/security
2. Aktifkan "2-Step Verification" jika belum
3. Cari "App passwords" atau "Sandi aplikasi"
4. Pilih "Mail" dan "Windows Computer" (atau Other)
5. Copy 16 karakter password yang dihasilkan
6. Paste ke 'smtp_password' (tanpa spasi)

ALTERNATIF SMTP LAIN:
- Outlook/Hotmail: smtp.office365.com (port 587)
- Yahoo: smtp.mail.yahoo.com (port 587)
- Mailtrap (testing): smtp.mailtrap.io (port 2525)
*/

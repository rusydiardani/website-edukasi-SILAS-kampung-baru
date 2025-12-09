# Website Edukasi SILAS Kampung Baru

Website edukasi pengelolaan sampah untuk Kampung Baru Bersih.

## Fitur
- 🏠 Halaman Beranda dengan informasi jenis sampah
- 📚 Halaman Edukasi dengan pencarian jenis sampah
- 📅 Jadwal Pengangkutan Sampah
- 📧 Form Laporan dengan pengiriman email otomatis
- 📱 Responsive design

## Teknologi
- PHP 8.1+
- PHPMailer untuk pengiriman email
- CSS3 dengan custom styling
- JavaScript untuk interaktivitas

## Instalasi

### 1. Clone Repository
```bash
git clone https://github.com/rusydiardani/website-edukasi-SILAS-kampung-baru.git
cd website-edukasi-SILAS-kampung-baru
```

### 2. Install Dependencies
```bash
composer install
```

### 3. Konfigurasi Email
```bash
# Copy file contoh konfigurasi
cp config/email_config.example.php config/email_config.php

# Edit config/email_config.php dan isi dengan kredensial email Anda
```

### 4. Setup Gmail App Password (Jika menggunakan Gmail)
1. Buka https://myaccount.google.com/security
2. Aktifkan "2-Step Verification"
3. Cari "App passwords" atau "Sandi aplikasi"
4. Pilih "Mail" dan "Windows Computer"
5. Copy password yang dihasilkan (16 karakter)
6. Paste ke `smtp_password` di `config/email_config.php`

### 5. Jalankan di Local Server
Pastikan WAMP/XAMPP sudah berjalan, lalu akses:
```
http://localhost/webedukasi/
```

## Struktur Folder
```
webedukasi/
├── assets/
│   ├── img/          # Gambar dan ilustrasi
│   └── js/           # JavaScript files
├── config/
│   ├── email_config.php         # Konfigurasi email (tidak di-commit)
│   └── email_config.example.php # Contoh konfigurasi
├── css/
│   └── style.css     # Styling utama
├── data/
│   └── content.php   # Data konten dinamis
├── includes/
│   ├── header.php    # Header dan navigasi
│   └── footer.php    # Footer
├── vendor/           # Composer dependencies
├── index.php         # Halaman utama
├── edukasi.php       # Halaman edukasi
├── jadwal.php        # Jadwal pengangkutan
├── kontak.php        # Form laporan dengan email
└── composer.json     # Composer configuration
```

## Troubleshooting

### Email tidak terkirim?
1. Pastikan `config/email_config.php` sudah dibuat dan diisi dengan benar
2. Cek App Password Gmail sudah benar (16 karakter tanpa spasi)
3. Pastikan 2-Step Verification Gmail sudah aktif
4. Cek error di halaman kontak setelah submit form

### CSS/JS tidak load?
1. Pastikan path di `includes/header.php` sesuai dengan struktur folder Anda
2. Sesuaikan `/webedukasi/` dengan nama folder project Anda

## Kontribusi
Pull requests are welcome! Untuk perubahan besar, silakan buka issue terlebih dahulu.

## Lisensi
[MIT](https://choosealicense.com/licenses/mit/)

## Kontak
Rusydi Ardani - [@rusydiardani](https://github.com/rusydiardani)

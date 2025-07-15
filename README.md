<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<p align="center">
    <a href="https://github.com/dewantara-gth/sewalapanganbadmin">
        <img src="https://img.shields.io/badge/Project%20Repo-GitHub-blue" alt="Project Repo">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
    </a>
    <a href="https://packagist.org/packages/laravel/framework">
        <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
    </a>
    <a href="https://opensource.org/licenses/MIT">
        <img src="https://img.shields.io/badge/License-MIT-green" alt="License">
    </a>
</p>

## Tentang Sewalapanganbadmin

Sewalapanganbadmin adalah aplikasi web yang dibangun menggunakan **Laravel**, yang dirancang untuk mengelola penyewaan lapangan olahraga. Aplikasi ini menyediakan antarmuka untuk admin dalam mengatur jadwal lapangan, transaksi pembayaran, serta melihat laporan penggunaan lapangan secara efisien dan efektif.

## Fitur Utama

- **Autentikasi Pengguna**: Sistem login untuk pengguna dan admin dengan fitur registrasi.
- **Manajemen Jadwal Lapangan**: Pengelolaan jadwal penyewaan lapangan secara real-time.
- **Transaksi Pembayaran**: Pencatatan dan verifikasi pembayaran sewa lapangan secara mudah.
- **Laporan Penggunaan Lapangan**: Menampilkan statistik penggunaan lapangan dan pendapatan sewa.
- **Notifikasi Pengguna**: Pengguna menerima pemberitahuan terkait pemesanan lapangan dan statusnya.

## Prasyarat

Pastikan Anda memiliki perangkat lunak berikut sebelum menjalankan aplikasi:

- PHP >= 8.0
- Composer
- MySQL atau MariaDB
- Node.js dan NPM

## Instalasi

Ikuti langkah-langkah berikut untuk menginstal aplikasi di lingkungan lokal Anda:

1. **Kloning repository**:

   ```bash
   git clone https://github.com/dewantara-gth/sewalapanganbadmin.git
   cd sewalapanganbadmin

2. **Instal dependensi PHP**:

   ```bash
   composer install

3. **Salin file .env.example menjadi .env**:

   ```bash
   cp .env.example .env

4. **Generate kunci aplikasi**:

   ```bash
   php artisan key:generate

5. **Konfigurasi basis data:**:

   Sesuaikan pengaturan database di file .env.

6. **Migrasi basis data**:

   ```bash
   php artisan migrate

7. **Instal dependensi frontend**:

   ```bash
   npm install

8. **Bangun aset frontend**:

   ```bash
   npm run dev

9. **Jalankan server pengembangan**:

   ```bash
   php artisan serve


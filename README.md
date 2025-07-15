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


## Cara Penggunaan Aplikasi

### 1. **Login atau Daftar Pengguna**
   - **Pengguna Baru**: 
     - Kunjungi halaman **Login** dan klik pada tombol **Daftar**.
     - Isi form pendaftaran dengan informasi berikut:
       - **Nama Lengkap**: Nama lengkap pengguna.
       - **Email**: Alamat email yang akan digunakan untuk login.
       - **Kata Sandi**: Buat kata sandi yang aman.
     - Setelah mendaftar, Anda akan diarahkan ke halaman login untuk masuk ke aplikasi.

   - **Pengguna Terdaftar**:
     - Kunjungi halaman **Login**.
     - Masukkan **Email** dan **Kata Sandi** yang sudah didaftarkan sebelumnya.
     - Klik tombol **Login** untuk masuk ke dalam aplikasi.

### 2. **Manajemen Lapangan**
   Setelah berhasil login sebagai admin, Anda dapat mengelola jadwal penyewaan lapangan melalui antarmuka admin:

   - **Melihat Jadwal**:
     - Di halaman utama dashboard, Anda dapat melihat daftar lapangan yang tersedia, beserta jadwal sewa yang sudah terdaftar.
   
   - **Menambah Jadwal**:
     - Klik tombol **Tambah Jadwal** pada halaman **Jadwal Lapangan**.
     - Isi form dengan data berikut:
       - **Nama Lapangan**: Nama lapangan yang akan disewakan.
       - **Tanggal & Jam**: Tanggal dan waktu yang tersedia.
       - **Harga Sewa**: Harga sewa untuk lapangan tersebut.
     - Klik **Simpan** untuk menambahkan jadwal lapangan ke dalam sistem.
   
   - **Mengedit Jadwal**:
     - Pada halaman **Jadwal Lapangan**, klik **Edit** pada jadwal yang ingin diubah.
     - Perbarui informasi yang diperlukan dan klik **Simpan** untuk memperbarui data.

   - **Menghapus Jadwal**:
     - Klik tombol **Hapus** pada jadwal yang ingin dihapus.

### 3. **Proses Pemesanan dan Pembayaran**
   - **Pemesanan Lapangan**:
     - Pengguna dapat memilih lapangan yang ingin disewa pada halaman **Pemesanan**.
     - Pilih lapangan yang tersedia pada tanggal dan jam yang diinginkan, lalu klik **Pesan**.
   
   - **Pembayaran**:
     - Setelah pemesanan berhasil, pengguna akan diarahkan ke halaman **Pembayaran**.
     - Pilih metode pembayaran yang tersedia (misalnya transfer bank, e-wallet, dll).
     - Setelah melakukan pembayaran, admin akan menerima notifikasi dan dapat memverifikasi transaksi tersebut.

   - **Verifikasi Pembayaran**:
     - Admin dapat melihat status pembayaran di halaman **Transaksi**.
     - Klik **Verifikasi Pembayaran** untuk menyetujui transaksi dan mengonfirmasi pemesanan lapangan.

### 4. **Laporan Penggunaan Lapangan**
   - **Melihat Laporan**:
     - Admin dapat mengakses laporan penggunaan lapangan di halaman **Laporan**.
     - Laporan ini mencakup statistik penggunaan lapangan dan pendapatan dari transaksi yang dilakukan.

   - **Ekspor Laporan**:
     - Klik tombol **Ekspor** pada halaman laporan untuk mengunduh laporan dalam format **CSV** atau **PDF**.

### 5. **Notifikasi**
   - **Notifikasi Pengguna**:
     - Pengguna akan menerima notifikasi melalui email dan aplikasi jika status pemesanannya berubah.
     - Notifikasi ini akan menginformasikan mengenai konfirmasi pemesanan, pembatalan, atau perubahan jadwal.

   - **Notifikasi Admin**:
     - Admin akan menerima pemberitahuan setiap kali ada transaksi baru atau pemesanan yang perlu diverifikasi.


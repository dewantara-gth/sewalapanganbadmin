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

### 1. **Untuk Pelanggan/Pengguna**

#### **A. Melihat Lapangan yang Tersedia**
- Kunjungi halaman **Home** untuk melihat daftar lapangan badminton yang tersedia
- Setiap lapangan ditampilkan dengan informasi:
  - Gambar lapangan
  - Nama lapangan (Court 1, Court 2, dst.)
  - Harga sewa per jam (contoh: Rp25.000,00)
  - Tombol **Book Now** untuk melakukan pemesanan

#### **B. Melakukan Pemesanan**
1. **Pilih Lapangan**:
   - Klik tombol **Book Now** pada lapangan yang diinginkan
   - Anda akan diarahkan ke halaman **Booking Court**

2. **Isi Form Pemesanan**:
   - **Nama Pelanggan**: Masukkan nama lengkap Anda
   - **Nomor Telepon**: Masukkan nomor telepon yang aktif
   - **Waktu Mulai**: Pilih jam mulai pemesanan
   - **Waktu Selesai**: Pilih jam selesai pemesanan
   - Nama lapangan dan harga akan otomatis terisi
   - Klik **Booking Sekarang** untuk melanjutkan

3. **Halaman Invoice**:
   - Setelah pemesanan berhasil, Anda akan melihat halaman invoice yang berisi:
     - Nomor invoice unik
     - Detail pemesanan (nama, tanggal, jam, lapangan)
     - Total harga yang harus dibayar
     - Status pembayaran
     - QR Code untuk pembayaran
     - Informasi rekening Bank Mandiri

#### **C. Proses Pembayaran**
1. **Melakukan Pembayaran**:
   - Transfer sesuai nominal yang tertera ke rekening Bank Mandiri
   - Atau gunakan QR Code untuk pembayaran digital

2. **Kirim Bukti Transfer**:
   - Klik tombol **Kirim Bukti Transfer ke WhatsApp**
   - Kirim screenshot/foto bukti transfer melalui WhatsApp
   - Tunggu konfirmasi dari admin

#### **D. Melihat Jadwal Pemesanan**
- Kunjungi halaman **Booking Schedule** untuk melihat:
  - Jadwal ketersediaan lapangan
  - Slot waktu yang sudah terisi atau masih kosong
  - Navigasi bulan untuk melihat jadwal bulan lain

#### **E. Menghubungi Admin**
- Gunakan halaman **Contact Us** untuk:
  - Mengisi form kontak dengan pertanyaan
  - Melihat peta lokasi Jaya Badminton Hall
  - Menghubungi langsung via telepon/email yang tercantum

### 2. **Untuk Admin**

#### **A. Login Admin**
1. **Pendaftaran Admin Baru**:
   - Kunjungi halaman **Sign Up**
   - Isi form dengan:
     - **Name**: Nama lengkap admin
     - **Email address**: Email aktif
     - **Password**: Kata sandi yang aman
   - Klik **Sign Up** untuk mendaftar

2. **Login Admin**:
   - Kunjungi halaman **Sign In**
   - Masukkan **Name** dan **Password**
   - Klik **Sign In** untuk masuk ke dashboard admin

#### **B. Mengelola Data Lapangan**
1. **Melihat Data Lapangan**:
   - Akses halaman **Court** untuk melihat daftar lapangan
   - Tabel menampilkan: nomor lapangan, harga per jam, gambar, dan aksi

2. **Menambah Lapangan Baru**:
   - Klik tombol **Add Court**
   - Isi form dengan:
     - **Court Number**: Nomor/nama lapangan
     - **Price/Hours**: Harga sewa per jam
     - **Upload Picture**: Gambar lapangan
   - Klik **Add Court** untuk menyimpan

3. **Mengedit/Menghapus Lapangan**:
   - Gunakan ikon edit untuk mengubah data lapangan
   - Gunakan ikon hapus untuk menghapus lapangan

#### **C. Mengelola Data Pemesanan**
1. **Melihat Daftar Pemesanan**:
   - Akses halaman **Booking Data**
   - Filter berdasarkan status: **Pending** atau **Accepted**
   - Lihat informasi: kode booking, nomor telepon, lapangan, waktu, status, total pembayaran

2. **Menambah Pemesanan Manual**:
   - Klik **Add Booking Data** untuk pemesanan langsung di tempat
   - Isi form dengan:
     - **Pemilihan Lapangan**: Pilih lapangan dari dropdown
     - **Nama Customer**: Nama pelanggan
     - **Nomor Telepon**: Kontak pelanggan
     - **Waktu Mulai dan Selesai**: Jadwal pemesanan
     - **Status**: Pending atau Accepted
   - Total pembayaran akan dihitung otomatis
   - Klik **Add Booking Data** untuk menyimpan

3. **Mengelola Status Pemesanan**:
   - **Konfirmasi Pemesanan**: Ubah status dari Pending ke Accepted
   - **Salin Link Invoice**: Untuk dikirim ke WhatsApp customer
   - **Ekspor Data**: Download data dalam format PDF atau Excel

#### **D. Melihat Jadwal dalam Kalender**
- Akses halaman **Schedule Data** untuk:
  - Melihat jadwal pemesanan dalam tampilan kalender bulanan
  - Navigasi antar bulan dengan tombol panah
  - Menambah sesi pemesanan baru dengan tombol **Add Session**

#### **E. Verifikasi Pembayaran**
1. **Menerima Bukti Transfer**:
   - Terima bukti transfer dari customer via WhatsApp
   - Verifikasi kesesuaian nominal dan data pemesanan

2. **Konfirmasi Pembayaran**:
   - Ubah status pemesanan menjadi **Accepted**
   - Sistem akan mengupdate jadwal secara otomatis
   - Customer akan mendapat konfirmasi pemesanan

### 3. **Fitur Komunikasi**
- **WhatsApp Integration**: Untuk pengiriman bukti transfer dan komunikasi langsung
- **Form Kontak**: Untuk pertanyaan umum dan feedback
- **Informasi Kontak**: Telepon, fax, dan email tersedia di halaman Contact Us

### 4. **Akses Sistem**
- **Pengguna**: Dapat mengakses tanpa login untuk pemesanan
- **Admin**: Memerlukan login untuk akses dashboard dan manajemen data
- **Responsive Design**: Dapat diakses melalui desktop dan mobile device
- **Ketersediaan**: Sistem beroperasi 24/7 untuk pemesanan kapan saja



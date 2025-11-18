# Sistem Pendaftaran Beasiswa Kampus

Project ini dibuat sebagai simulasi website pendaftaran beasiswa. User bisa mengisi formulir, upload berkas, memilih jenis beasiswa, dan melihat detail pengajuan. Project ini juga sudah memakai relasi database untuk menghubungkan Mahasiswa, Beasiswa, dan Pendaftaran.

## Fitur Utama
- Form pengajuan beasiswa
- Validasi data input
- IPK otomatis (simulasi)
- Upload berkas persyaratan
- Daftar semua pendaftaran
- Detail satu pendaftaran
- Relasi: Mahasiswa → Pendaftaran → Beasiswa

## Teknologi
- Laravel 11
- TailwindCSS
- MySQL
- Storage default Laravel

## Cara Menjalankan Project
1. Clone repository  
   ```bash
   git clone https://github.com/RasyaIskandar/laravel-beasiswa-bnsp.git
Masuk folder project

bash
Salin kode
cd laravel-beasiswa-bnsp
Install dependencies

bash
Salin kode
composer install
Copy file environment

bash
Salin kode
cp .env.example .env
Generate app key

bash
Salin kode
php artisan key:generate
Setup database di file .env

Jalankan migrasi

bash
Salin kode
php artisan migrate
Jalankan server

bash
Salin kode
php artisan serve
Struktur Relasi
Satu mahasiswa bisa membuat banyak pendaftaran

Setiap pendaftaran terhubung ke satu beasiswa

Satu beasiswa bisa dipilih banyak pendaftar

Lisensi

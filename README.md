## Deskripsi Singkat
Repository api sederhana api blog menggunakan laravel 7 untuk keperluan pengajaran Mahasiswa Angkatan 2019 D3 Sistem Informasi Universitas Brawijaya.

## Product Backlog
- CRUD artikel
- Artikel terdiri dari judul, kategori, foto cover headline artikel, dan konten artikel
- Bisa menambahkan lebih dari 1 kategori pada artikel
- Bisa mencari artikel berdasarkan judul
- Bisa filter artikel berdasarkan kategori
- Bisa mengurutkan artikel terbaru / terlama

## Requirement
- __[Laravel 7 Server Requirement](https://laravel.com/docs/7.x/installation)__

## Cara memulai

1. Jalanakan command `composer install` tunggu sampai selesai
2. Jalankan command `cp .env.example .env` atau salin file .env.example ke file .env jika menggunakan windows
3. Jalankan command `php artisan key:generate` untuk generate app key
4. Jalankan command `php artisan migrate` untuk generate database yang dibutuhkan
5. Jalankan command `php artisan db:seed` untuk seeding data dummy

## Challenge
Forking Repository ini lalu buatlah Endpoint untuk CRUD Kategori dengan syarat sebagai berikut : 

- [x] Tetap menggunakan Repository Pattern.
- [x] Menerapkan SOLID Principle semaksimal mungkin.
- [x] Kodenya clean.

setelah selesai silahkan pull request ke repository ini dengan format deskripsi : 
1. Nama : 
2. Nomor Hape :

Peserta terpilih (kodenya paling baik & cepat) dapat hadiah pulsa bnrn ga boonk.

**Deadline : Senin, 28 November 2020**
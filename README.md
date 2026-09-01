# App Perpustakaan

Aplikasi web sistem manajemen perpustakaan yang dibangun menggunakan framework **Laravel 12** untuk keperluan praktikum mata kuliah Web Programming Framework (WPF).

## Tujuan Aplikasi

Aplikasi ini bertujuan untuk memudahkan pengelolaan operasional perpustakaan secara digital, meliputi manajemen katalog buku, data anggota, serta pencatatan transaksi peminjaman dan pengembalian buku secara terstruktur, efisien, dan aman.

## Cara Menjalankan Project Secara Lokal

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal:

### 1. Clone Repository

git clone https://github.com/emangiyabang/app-perpustakaan.git
cd app-perpustakaan

### 2. Install Dependensi PHP (Composer)

composer install

### 3. Konfigurasi Environment (`.env`)

Salin file `.env.example` menjadi `.env`:
cp .env.example .env

Pastikan pengaturan database di file `.env` sudah sesuai:
env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_perpustakaan
DB_USERNAME=root
DB_PASSWORD=

### 4. Generate Application Key

php artisan key:generate

### 5. Buat & Migrasi Database

Pastikan MySQL di XAMPP sudah menyala, lalu jalankan:

php artisan migrate

### 6. Jalankan Local Server

php artisan serve

Akses aplikasi melalui browser di: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Pemahaman Konsep MVC (Model - View - Controller)

Arsitektur **MVC** memisahkan komponen aplikasi menjadi tiga peran utama:

1. **Model**: Bertanggung jawab mengelola struktur data, aturan logika bisnis, serta interaksi langsung dengan database (misal: query data buku, simpan transaksi).
2. **View**: Bertanggung jawab menyajikan tampilan antarmuka (UI) kepada pengguna (file template Blade/HTML, CSS, JS).
3. **Controller**: Bertindak sebagai penghubung/jembatan antara Model dan View. Controller menerima request dari pengguna, memanggil Model untuk memproses data yang dibutuhkan, lalu mengembalikan hasilnya ke View untuk ditampilkan.

# App Perpustakaan

Aplikasi manajemen perpustakaan berbasis **Laravel 12** untuk praktikum Web Programming Framework (WPF). Aplikasi ini bertujuan untuk mengelola data buku, anggota, dan transaksi peminjaman perpustakaan secara digital dan efisien.

---

## Cara Menjalankan Project

```bash
# 1. Clone repository & masuk folder
git clone https://github.com/emangiyabang/app-perpustakaan.git
cd app-perpustakaan

# 2. Install dependensi
composer install

# 3. Setup environment (.env) & App Key
cp .env.example .env
php artisan key:generate

# 4. Migrasi database (pastikan MySQL XAMPP sudah aktif)
php artisan migrate

# 5. Jalankan server lokal
php artisan serve
```
Akses aplikasi melalui browser di: `http://127.0.0.1:8000`

---

## Perbedaan Model, View, dan Controller (MVC)

- **Model**: Mengelola data, logika bisnis, dan interaksi langsung dengan database.
- **View**: Menampilkan antarmuka pengguna (UI) yang dilihat dan berinteraksi langsung dengan user.
- **Controller**: Menjadi jembatan yang menerima request dari user, memproses data melalui Model, dan mengirimkan hasilnya ke View.

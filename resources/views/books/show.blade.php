{{-- File: resources/views/books/show.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Buku</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 500px; }
        table { border-collapse: collapse; width: 100%; margin-top: 16px; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
        th { width: 160px; background: #f3f4f6; }
    </style>
</head>
<body>
    <h1>Detail Buku</h1>
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <table>
        <tr>
            <th>Judul</th>
            <td>{{ $book['judul'] }}</td>
        </tr>
        <tr>
            <th>Penulis</th>
            <td>{{ $book['penulis'] }}</td>
        </tr>
        <tr>
            <th>Penerbit</th>
            <td>{{ $book['penerbit'] }}</td>
        </tr>
        <tr>
            <th>Tahun Terbit</th>
            <td>{{ $book['tahun_terbit'] }}</td>
        </tr>
        <tr>
            <th>ISBN</th>
            <td>{{ $book['isbn'] ?? '-' }}</td>
        </tr>
        <tr>
            <th>Stok</th>
            <td>{{ $book['stok'] }}</td>
        </tr>
        <tr>
            <th>Kategori</th>
            <td>{{ $book['kategori'] }}</td>
        </tr>
    </table>
</body>
</html>
Langkah 4 - Mengisi CategoryController (index & store)
Sesuai target pertemuan ini, hanya index(), create(), dan store() yang diisi logika nyata. edit(), update(), destroy() tetap dibiarkan seperti kerangka Pertemuan 2 (return string dummy) - CRUD kategori yang lengkap baru selesai di Pertemuan 5. Sama seperti BookController, jangan lupa tambahkan baris use App\Http\Requests\StoreCategoryRequest; di bagian atas file.

Berikut isi lengkap CategoryController.php:

// File: app/Http/Controllers/CategoryController.php
<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private array $categories = [
        ['id' => 1, 'nama_kategori' => 'Fiksi', 'deskripsi' => 'Buku cerita rekaan seperti novel dan kumpulan cerpen.'],
        ['id' => 2, 'nama_kategori' => 'Teknologi', 'deskripsi' => 'Buku seputar teknologi, pemrograman, dan ilmu komputer.'],
        ['id' => 3, 'nama_kategori' => 'Sejarah', 'deskripsi' => 'Buku bertema sejarah dan biografi tokoh.'],
    ];

    public function index()
    {
        $categories = $this->categories;

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(StoreCategoryRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('categories.index')
            ->with('success', "Kategori \"{$validated['nama_kategori']}\" berhasil ditambahkan (data dummy, belum tersimpan ke database).");
    }

    public function edit(string $id)
    {
        return "CategoryController@edit, id: {$id}";
    }

    public function update(Request $request, string $id)
    {
        return "CategoryController@update, id: {$id}";
    }

    public function destroy(string $id)
    {
        return "CategoryController@destroy, id: {$id}";
    }
}
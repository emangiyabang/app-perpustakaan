<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Buku</title>
    <style>
        body { font-family: sans-serif; margin: 40px; max-width: 500px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select { width: 100%; padding: 6px; margin-top: 4px; box-sizing: border-box; }
        .error { color: #b91c1c; font-size: 14px; margin-top: 4px; }
        .btn { margin-top: 20px; padding: 8px 16px; background: #2563eb; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Edit Buku</h1>
    <p><a href="{{ route('books.index') }}">&larr; Kembali ke daftar buku</a></p>

    <form action="{{ route('books.update', $book['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="judul">Judul</label>
        <input type="text" name="judul" id="judul" value="{{ old('judul', $book['judul']) }}">
        @error('judul')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" id="penulis" value="{{ old('penulis', $book['penulis']) }}">
        @error('penulis')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" id="penerbit" value="{{ old('penerbit', $book['penerbit']) }}">
        @error('penerbit')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="tahun_terbit">Tahun Terbit</label>
        <input type="number" name="tahun_terbit" id="tahun_terbit" value="{{ old('tahun_terbit', $book['tahun_terbit']) }}">
        @error('tahun_terbit')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="isbn">ISBN (opsional)</label>
        <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book['isbn']) }}">
        @error('isbn')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="stok">Stok</label>
        <input type="number" name="stok" id="stok" value="{{ old('stok', $book['stok']) }}">
        @error('stok')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="category_id">Kategori</label>
        <select name="category_id" id="category_id">
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
                <option value="{{ $category['id'] }}" @selected(old('category_id', $book['category_id']) == $category['id'])>
                    {{ $category['nama_kategori'] }}
                </option>
            @endforeach
        </select>
        @error('category_id')
            <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn">Perbarui</button>
    </form>
</body>
</html>
⚠️ Perhatikan @selected(old('category_id', $book['category_id']) == $category['id']) - bagian $book['category_id'] di situ yang membuat dropdown otomatis ter-select ke kategori buku yang sedang diedit. Kalau ditulis old('category_id') saja tanpa fallback, dropdown akan selalu kembali ke "-- Pilih Kategori --" setiap form dibuka pertama kali, meskipun buku itu sebenarnya sudah punya kategori.

Terakhir books/show.blade.php - halaman detail satu buku, ditampilkan sebagai tabel key-value:

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
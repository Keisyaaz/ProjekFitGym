@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')

<style>
    form {
        background: #fff;
        padding: 30px 40px;
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        max-width: 400px;
        margin: 0 auto;
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 25px;
    }

    label {
        font-weight: 500;
        display: block;
        margin-bottom: 6px;
        color: #444;
    }

    input[type="text"], input[type="number"], textarea, input[type="file"] {
        width: 100%;
        padding: 10px 12px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 6px;
        font-size: 14px;
        background-color: #fafafa;
    }

    button {
        width: 100%;
        padding: 12px;
        background: #007bff;
        color: white;
        font-size: 16px;
        font-weight: bold;
        border: none;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    button:hover { background: #42F5F2; }

    .back {
        margin-bottom: 15px;
    }
</style>

<h2>Tambah Produk</h2>

<div class="back">
    <a href="{{ route('produk.index') }}">← Kembali</a>
</div>

<form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label for="Nama_produk">Nama Produk</label>
    <input type="text" name="Nama_produk" id="Nama_produk" required>

    <label for="Deskripsi_produk">Deskripsi</label>
    <textarea name="Deskripsi_produk" id="Deskripsi_produk"></textarea>

    <label for="Kategori_produk">Kategori</label>
    <input type="text" name="Kategori_produk" id="Kategori_produk">

    <label for="Varian_produk">Varian</label>
    <input type="text" name="Varian_produk" id="Varian_produk" required>

    <label for="Harga">Harga</label>
    <input type="number" name="Harga" id="Harga" required>

    <label for="gambar">Gambar (PNG/JPG)</label>
    <input type="file" name="gambar" id="gambar" accept=".png,.jpg,.jpeg">

    <button type="submit">Simpan</button>
</form>

@endsection

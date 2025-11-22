@extends('layouts.admin')

@section('title', 'Daftar Produk')

@section('content')

<style>
    .container-table {
        max-width: 1400px; /* Lebar lebih besar */
        margin: 20px auto;
        background: #fff;
        padding: 25px 40px; /* Sedikit lebih luas */
        border-radius: 10px;
        box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .btn {
        padding: 8px 15px;
        border-radius: 6px;
        text-decoration: none;
        font-weight: bold;
        margin-bottom: 15px;
        display: inline-block;
    }

    .btn-primary { background: #007bff; color: #fff; }
    .btn-warning { background: #ffc107; color: #fff; }
    .btn-danger { background: #dc3545; color: #fff; }

    .btn:hover { opacity: 0.8; }

    table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed; /* Kolom lebih rapi */
    }

    th, td {
        padding: 12px; /* Lebih lega */
        border: 1px solid #ddd;
        text-align: center;
        font-size: 14px;
        word-wrap: break-word;
    }

    th { background: #f2f2f2; }

    img {
        max-width: 100px; /* Lebih besar */
        border-radius: 6px;
    }

    form.d-inline { display: inline-block; }
</style>
<div class="container-table">
    <h2>Daftar Produk</h2>

    <a href="{{ route('produk.create') }}" class="btn btn-primary">Tambah Produk</a>

    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Kategori</th>
                <th>Varian</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produk as $item)
                <tr>
                    <td>{{ $item->Nama_produk }}</td>
                    <td>{{ $item->Deskripsi_produk }}</td>
                    <td>{{ $item->Kategori_produk }}</td>
                    <td>{{ $item->Varian_produk }}</td>
                    <td>{{ $item->Harga }}</td>
                    <td>
                        @if($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}" alt="Gambar Produk">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('produk.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('produk.destroy', $item->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

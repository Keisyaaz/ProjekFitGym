@extends('layouts.customer')

@section('title', 'Produk FitGym')

@section('content')
<div class="container my-5">

    <!-- Banner -->
    <div class="text-center mb-5">
        <h2 class="display-5 fw-bold">Temukan Produk FitGym Favoritmu!</h2>
        <p class="text-muted">Latihan lebih maksimal dengan perlengkapan terbaik dari FitGym</p>
    </div>

    <!-- Produk Grid -->
    <div class="row">
        @foreach($produk as $p)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card h-100 shadow-sm card-product">
                
                @if($p->gambar)
                <img src="{{ asset('storage/' . $p->gambar) }}" class="card-img-top" alt="{{ $p->Nama_produk }}" style="height:200px; object-fit:cover;">
                @endif

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $p->Nama_produk }}</h5>
                    <p class="card-text text-truncate" style="max-height:50px;">{{ $p->Deskripsi_produk }}</p>
                    <span class="badge bg-primary mb-2">{{ $p->Kategori_produk }}</span>
                    <p class="fw-bold mb-2">Rp {{ number_format($p->Harga,0,',','.') }}</p>

                    <div class="mt-auto">
                        <form action="{{ route('cart.store', $p->id) }}" method="POST">


    @csrf
    <button type="submit" class="btn btn-success w-100 btn-buy">Tambah ke Keranjang</button>
</form>

                    </div>

                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection

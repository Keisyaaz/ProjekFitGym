@extends('layouts.customer')

@section('title', 'Keranjang Belanja')

@section('content')

<div class="container my-5">

    <h2 class="fw-bold mb-4">Keranjang Belanja</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @php 
        $total = 0; 
    @endphp

    @if(empty($cart))
        <div class="text-center py-5">
            <h4 class="text-muted">Keranjang masih kosong</h4>
            <a href="{{ route('customer.produk') }}" class="btn btn-primary mt-3">Belanja Sekarang</a>
        </div>

    @else

        <div class="row">
            <div class="col-lg-8">

                @foreach($cart as $item)
                    @php 
                        $subtotal = $item['harga'] * $item['jumlah']; 
                        $total += $subtotal;
                    @endphp

                    <div class="card mb-3 shadow-sm">
                        <div class="row g-0">
                            <div class="col-md-3">
                                <img src="{{ asset('storage/' . $item['gambar']) }}" 
                                     class="img-fluid rounded-start" 
                                     style="height: 150px; object-fit: cover;">
                            </div>

                            <div class="col-md-6">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item['nama'] }}</h5>
                                    <p class="text-muted">Rp {{ number_format($item['harga'],0,',','.') }}</p>

                                    <form action="{{ route('cart.update', $item['id']) }}" method="POST" class="d-flex">
                                        @csrf
                                        @method('PATCH')

                                        <input type="number" name="jumlah" class="form-control w-25" value="{{ $item['jumlah'] }}" min="1">
                                        <button class="btn btn-primary btn-sm ms-2">Update</button>
                                    </form>
                                </div>
                            </div>

                            <div class="col-md-3 d-flex flex-column justify-content-center align-items-center">
                                <p class="fw-bold">Subtotal:</p>
                                <p>Rp {{ number_format($subtotal,0,',','.') }}</p>

                                <form action="{{ route('cart.destroy', $item['id']) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>

            <div class="col-lg-4">
                <div class="card shadow-sm p-3">
                    <h5 class="fw-bold">Ringkasan Belanja</h5>
                    <hr>
                    <p class="d-flex justify-content-between">
                        <span>Total</span>
                        <span class="fw-bold">Rp {{ number_format($total,0,',','.') }}</span>
                    </p>

                    <button class="btn btn-success w-100 mt-3">Checkout</button>
                </div>
            </div>

        </div>

    @endif

</div>

@endsection

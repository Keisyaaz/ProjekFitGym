<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;

class CartController extends Controller
{
    // ------------------------
    // INDEX: Tampilkan Keranjang
    // ------------------------
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('customer.produk.cart.index', compact('cart'));
    }

    // ------------------------
    // STORE: Tambah Produk ke Keranjang
    // ------------------------
    public function store($produkId)
    {
        $product = Produk::findOrFail($produkId);

        $cart = session()->get('cart', []);

        if (isset($cart[$produkId])) {
            // Jika sudah ada, tambahkan jumlahnya
            $cart[$produkId]['jumlah']++;
        } else {
            // Jika belum ada, tambahkan item baru
            $cart[$produkId] = [
                "id" => $product->id,
                "nama" => $product->Nama_produk,
                "harga" => $product->Harga,
                "gambar" => $product->gambar,
                "jumlah" => 1,
            ];
        }

        session()->put('cart', $cart);

        // Arahkan ke halaman keranjang
        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    // ------------------------
    // UPDATE: Ubah jumlah item
    // ------------------------
    public function update(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['jumlah'] = max(1, $request->jumlah);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Keranjang berhasil diperbarui!');
    }

    // ------------------------
    // DESTROY: Hapus item dari keranjang
    // ------------------------
    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index')
            ->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}

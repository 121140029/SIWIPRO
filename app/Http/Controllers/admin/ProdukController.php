<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::all();
        return view('admin.produk.index', compact('produks'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul'          => 'required|string|max:255',
            'jumlah_produk'  => 'required|integer|min:0',
            'harga'          => 'required|numeric|min:0',
            'keterangan'     => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);

            $data['gambar'] = 'assets/img/' . $imageName;
        }

        Produk::create($data);
        return back()->with('sukses', 'Produk berhasil ditambahkan');
    }

    public function update(Request $request, Produk $produk)
    {
        $data = $request->validate([
            'judul'          => 'required|string|max:255',
            'jumlah_produk'  => 'required|integer|min:0',
            'harga'          => 'required|numeric|min:0',
            'keterangan'     => 'nullable|string',
            'gambar'         => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);
            $data['gambar'] = 'assets/img/' . $imageName;
        } else {
            $data['gambar'] = $produk->gambar;
        }

        $produk->update($data);
        return back()->with('sukses', 'Produk berhasil diperbarui');
    }

    public function destroy(Produk $produk)
    {
        $produk->delete();
        return back()->with('sukses', 'Produk berhasil dihapus');
    }

    public function produkView()
    {
        $produks = Produk::all();
        return view('tamu.produk.produkview', compact('produks'));
    }
}

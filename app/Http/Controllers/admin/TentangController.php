<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tentang;

class TentangController extends Controller
{
    public function index()
    {
        $tentangs = Tentang::all();
        return view('admin.tentang.index', compact('tentangs'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'keterangan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);

            $data['gambar'] = 'assets/img/' . $imageName;
        }

        Tentang::create($data);
        return back()->with('sukses', 'Tentang berhasil ditambahkan');
    }

    public function update(Request $request, Tentang $tentang)
    {
        $data = $request->validate([
            'keterangan' => 'required',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if ($request->hasFile('gambar')) {
            $image = $request->file('gambar');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('assets/img'), $imageName);

            $data['gambar'] = 'assets/img/' . $imageName;
        } else {
            $data['gambar'] = $tentang->gambar;
        }

        $tentang->update($data);
        return back()->with('sukses', 'Tentang berhasil diperbarui');
    }

    public function destroy(Tentang $tentang)
    {

        $tentang->delete();
        return back()->with('sukses', 'Tentang berhasil dihapus');
    }

}

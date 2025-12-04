<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Misi;

class MisiController extends Controller
{
    public function index()
    {
        $misis = Misi::all();
        return view('admin.misi.index', compact('misis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'keterangan' => 'required'
        ]);

        Misi::create($data);
        return back()->with('sukses', 'Misi berhasil ditambahkan');
    }

    public function update(Request $request, Misi $misi)
    {
        $data = $request->validate([
            'keterangan' => 'required'
        ]);

        $misi->update($data);
        return back()->with('sukses', 'Misi berhasil diperbarui');
    }

    public function destroy(Misi $misi)
    {

        $misi->delete();
        return back()->with('sukses', 'Misi berhasil dihapus');
    }
}

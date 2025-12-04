<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visi;

class VisiController extends Controller
{
    public function index()
    {
        $visis = Visi::all();
        return view('admin.visi.index', compact('visis'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'keterangan' => 'required'
        ]);

        Visi::create($data);
        return back()->with('sukses', 'Visi berhasil ditambahkan');
    }

    public function update(Request $request, Visi $visi)
    {
        $data = $request->validate([
            'keterangan' => 'required'
        ]);

        $visi->update($data);
        return back()->with('sukses', 'Visi berhasil diperbarui');
    }

    public function destroy(Visi $visi)
    {

        $visi->delete();
        return back()->with('sukses', 'Visi berhasil dihapus');
    }

}

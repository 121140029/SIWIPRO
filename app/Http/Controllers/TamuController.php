<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tentang;
use App\Models\Misi;
use App\Models\Visi;
use App\Models\Galeri;

class TamuController extends Controller
{
    public function index()
    {
        $tentangs = Tentang::all(); 
        $misis = Misi::all();
        $visis = Visi::all();
        $galeris = Galeri::all();

        return view('tamu.dashboard', compact('tentangs', 'misis', 'visis', 'galeris'));
    }
}

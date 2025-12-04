<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PesananController extends Controller
{
    /**
     * HALAMAN ADMIN – list semua pesanan.
     */
    public function index()
    {
        $pesanans = Pesanan::latest()->get();
        return view('admin.pesanan.index', compact('pesanans'));
    }

    /**
     * FORM TAMU – tampilkan form pemesanan.
     */
    public function create()
    {
        $produk = Produk::all();
        return view('tamu.pesanan.create', compact('produk'));
    }

    /**
     * TAMU – simpan pesanan baru ke database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'         => 'required|string|max:255',
            'tanggal'      => 'required|date',
            'no_handphone' => 'required|string|max:20',
            'email'        => 'required|email|max:255',

            'produk_items'               => 'required|array|min:1',
            'produk_items.*.produk_id'   => 'required|exists:produk,id',
            'produk_items.*.qty'         => 'required|integer|min:1',

            'bukti_transfer' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $itemsInput = $validated['produk_items'];
        unset($validated['produk_items']);
        $produkIds = collect($itemsInput)->pluck('produk_id');
        if ($produkIds->count() !== $produkIds->unique()->count()) {
            return back()
                ->withErrors(['produk_items' => 'Produk yang sama tidak boleh dipilih lebih dari satu kali.'])
                ->withInput();
        }

        $produkMap = Produk::whereIn('id', $produkIds)->get()->keyBy('id');

        $itemsDetail = [];
        $totalHarga  = 0;
        $namaList    = [];

        foreach ($itemsInput as $item) {
            $produkId = $item['produk_id'];
            $qty      = (int) $item['qty'];

            if (!$produkMap->has($produkId)) {
                continue;
            }

            $produk = $produkMap[$produkId];
            $hargaSatuan = $produk->harga;
            $subtotal    = $hargaSatuan * $qty;

            $itemsDetail[] = [
                'produk_id'    => $produk->id,
                'nama_produk'  => $produk->judul,
                'qty'          => $qty,
                'harga_satuan' => $hargaSatuan,
                'subtotal'     => $subtotal,
            ];

            $totalHarga += $subtotal;
            $namaList[]  = $produk->judul . ' (x' . $qty . ')';
        }

        $validated['nama_produk'] = implode(', ', $namaList); 
        $validated['harga']       = $totalHarga;

        if ($request->hasFile('bukti_transfer')) {
            $file = $request->file('bukti_transfer');
            $namaFile = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/img/bukti_transfer'), $namaFile);
            $validated['bukti_transfer'] = 'assets/img/bukti_transfer/' . $namaFile;
        }

        $validated['kode_pesanan'] = 'ORD-' . strtoupper(Str::random(8));
        $validated['status'] = 'diproses';
        Pesanan::create($validated);

        return redirect()
            ->route('tamu.pesanan.create')
            ->with('sukses', 'Pesanan berhasil ditambahkan.');
    }

   
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diproses,diterima,selesai'
        ]);

        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()
            ->route('admin.pesanan.index')
            ->with('sukses', 'Status pesanan berhasil diperbarui.');
    }

    public function riwayat()
    {
        $email = Auth::user()->email;

        $pesanans = Pesanan::where('email', $email)
            ->latest()
            ->get();

        return view('tamu.pesanan.riwayat', compact('pesanans'));
    }

public function nota($id)
{
    $email = Auth::user()->email;

    $pesanan = Pesanan::where('id', $id)
        ->where('email', $email)
        ->firstOrFail();

    $pdf = Pdf::loadView('tamu.pesanan.nota', compact('pesanan'))
        ->setPaper('a4', 'portrait');

    $filename = 'Nota-' . $pesanan->kode_pesanan . '.pdf';
    return $pdf->download($filename);
}
}

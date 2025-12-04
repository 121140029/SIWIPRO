<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Nota Pesanan {{ $pesanan->kode_pesanan }}</title>
    <style>
        @page {
            margin: 25mm 20mm;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            font-size: 11pt;
            color: #333;
            background: #fff;
        }
        .header {
            text-align: center;
            border-bottom: 3px solid #126180;
            margin-bottom: 25px;
            padding-bottom: 10px;
        }
        .header h2 {
            margin: 0;
            color: #126180;
            font-size: 22px;
            font-weight: 700;
        }
        .header p {
            margin: 2px 0 0 0;
            font-size: 12px;
            color: #666;
        }
        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table td {
            padding: 6px 8px;
            vertical-align: top;
        }
        .info-table td.label {
            font-weight: bold;
            color: #126180;
            width: 30%;
        }
        .table-produk {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table-produk th {
            background-color: #126180;
            color: white;
            text-align: center;
            padding: 8px;
            font-size: 11pt;
        }
        .table-produk td {
            border: 1px solid #ccc;
            padding: 8px;
            vertical-align: middle;
            font-size: 10.5pt;
        }
        .total-section {
            margin-top: 20px;
            text-align: right;
        }
        .total-section table {
            float: right;
            border-collapse: collapse;
        }
        .total-section td {
            padding: 8px 10px;
            font-size: 12pt;
        }
        .total-label {
            font-weight: bold;
            color: #126180;
        }
        .footer {
            margin-top: 50px;
            text-align: right;
            font-size: 10pt;
        }
        .signature {
            margin-top: 60px;
            text-align: right;
        }
        .signature .line {
            border-top: 1px solid #000;
            width: 200px;
            margin-top: 50px;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2>NOTA PEMESANAN</h2>
        <p>PT TUNAS JAYA LAUTAN</p>
        <p><small>Kode Pesanan: {{ $pesanan->kode_pesanan }}</small></p>
    </div>

    {{-- Informasi Pelanggan --}}
    <table class="info-table">
        <tr>
            <td class="label">Nama Pemesan</td>
            <td>{{ $pesanan->nama }}</td>
        </tr>
        <tr>
            <td class="label">Email</td>
            <td>{{ $pesanan->email }}</td>
        </tr>
        <tr>
            <td class="label">Nomor Handphone</td>
            <td>{{ $pesanan->no_handphone }}</td>
        </tr>
        <tr>
            <td class="label">Tanggal Pemesanan</td>
            <td>
                @if($pesanan->tanggal)
                    {{ \Carbon\Carbon::parse($pesanan->tanggal)->translatedFormat('d F Y') }}
                @else
                    -
                @endif
            </td>
        </tr>
        <tr>
            <td class="label">Status</td>
            <td style="text-transform: capitalize;">
                {{ $pesanan->status }}
            </td>
        </tr>
    </table>

    {{-- Produk Dipesan --}}
    <table class="table-produk">
        <thead>
            <tr>
                <th style="width:5%">No</th>
                <th>Nama Produk</th>
                <th style="width:25%">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php
                $items = [];
                if (!empty($pesanan->detail_items)) {
                    $items = json_decode($pesanan->detail_items, true);
                }
            @endphp

            @if(!empty($items))
                @foreach($items as $i => $item)
                    <tr>
                        <td align="center">{{ $i+1 }}</td>
                        <td>{{ $item['nama_produk'] ?? '-' }}</td>
                        <td align="right">Rp{{ number_format($item['subtotal'] ?? 0, 0, ',', '.') }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td align="center">1</td>
                    <td>{{ $pesanan->nama_produk }}</td>
                    <td align="right">Rp{{ number_format($pesanan->harga ?? 0, 0, ',', '.') }}</td>
                </tr>
            @endif
        </tbody>
    </table>

    {{-- Total --}}
    <div class="total-section">
        <table>
            <tr>
                <td class="total-label">Total Harga:</td>
                <td class="fw-bold">Rp{{ number_format($pesanan->harga ?? 0, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    {{-- Tanda tangan --}}
    <div class="signature">
        <p>Hormat kami,</p>
        <div class="line"></div>
        <p><strong>PT Tunas Jaya Lautan</strong></p>
    </div>

    <div class="footer">
        <p><small>Dokumen ini dibuat secara otomatis melalui sistem pemesanan online PT Tunas Jaya Lautan.</small></p>
    </div>
</body>
</html>

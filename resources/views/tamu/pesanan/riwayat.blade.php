<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Riwayat Pemesanan - PT Tunas Jaya Lautan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .page-header {
            background: linear-gradient(135deg, #126180 0%, #0a3d52 100%);
            color: white;
            padding: 3rem 0;
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        .history-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
            overflow: hidden;
            background: white;
            margin-bottom: 2rem;
        }

        .table-header {
            background-color: #f8f9fa;
            color: #126180;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
        }

        .table-header th {
            padding: 1rem;
            border: none;
            white-space: nowrap;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(18, 97, 128, 0.05);
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f0f0f0;
        }

        .badge {
            font-weight: 500;
            padding: 0.5rem 1rem;
            border-radius: 30px;
        }

        .badge-waiting {
            background-color: #6c757d;
            color: #fff;
        }

        .badge-accepted {
            background-color: #126180;
            color: #fff;
        }

        .badge-completed {
            background-color: #28a745;
            color: #fff;
        }

        .empty-history {
            text-align: center;
            padding: 4rem 2rem;
            background-color: white;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }

        .empty-history i {
            font-size: 4rem;
            color: #6c757d;
            opacity: 0.5;
            margin-bottom: 1.5rem;
        }

        .empty-history h4 {
            color: #343a40;
            margin-bottom: 0.5rem;
        }

        .empty-history p {
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .page-title {
                font-size: 2rem;
            }

            .page-subtitle {
                font-size: 1rem;
            }

            .table-responsive {
                border-radius: 12px;
            }
        }
    </style>
</head>
<body>

    {{-- Navbar tamu --}}
    @include('layouts.users.navbar')

    <!-- Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">Riwayat Pemesanan</h1>
            <p class="page-subtitle">Lihat semua pesanan yang pernah Anda buat.</p>
        </div>
    </div>

    <main class="container pb-5">
        @if($pesanans->isEmpty())
            {{-- Jika belum ada pesanan --}}
            <div class="empty-history">
                <i class="bi bi-clock-history"></i>
                <h4>Belum Ada Riwayat Pemesanan</h4>
                <p>Anda belum melakukan pemesanan produk apapun.</p>
                <a href="{{ route('tamu.pesanan.create') }}" class="btn btn-primary mt-3">
                    <i class="bi bi-plus-circle me-2"></i>Buat Pesanan
                </a>
            </div>
        @else
            {{-- Tabel riwayat --}}
            <div class="history-card">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-header">
                            <tr>
                                <th>Kode</th>
                                <th>Tanggal</th>
                                <th>Nama Pemesan</th>
                                <th>No. Handphone</th>
                                <th>Email</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Bukti Transfer</th>
                                <th>Status</th>
                                <th>Aksi</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesanans as $pesanan)
                                <tr>
                                    <td class="fw-bold">
                                        {{ $pesanan->kode_pesanan ?? '-' }}
                                    </td>

                                    <td>
                                        @if($pesanan->tanggal)
                                            {{ \Carbon\Carbon::parse($pesanan->tanggal)->format('d M Y') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <td>{{ $pesanan->nama ?? '-' }}</td>

                                    <td>{{ $pesanan->no_handphone ?? '-' }}</td>

                                    <td>{{ $pesanan->email ?? '-' }}</td>

                                    <td>{{ $pesanan->nama_produk ?? '-' }}</td>

                                    <td class="fw-bold">
                                        @if(!is_null($pesanan->harga))
                                            Rp{{ number_format($pesanan->harga, 0, ',', '.') }}
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if(!empty($pesanan->bukti_transfer))
                                            {{-- Tombol buka modal --}}
                                            <button type="button"
                                                class="btn btn-sm btn-outline-primary"
                                                data-bs-toggle="modal"
                                                data-bs-target="#buktiTransferModal"
                                                data-image="{{ asset($pesanan->bukti_transfer) }}"
                                                data-kode="{{ $pesanan->kode_pesanan ?? '' }}">
                                                <i class="bi bi-eye me-1"></i> Lihat
                                            </button>
                                        @else
                                            <span class="text-muted">Belum upload</span>
                                        @endif
                                    </td>

                                    <td>
                                        @if($pesanan->status == 'diterima')
                                            <span class="badge badge-accepted">
                                                <i class="bi bi-check-circle me-1"></i> Diterima
                                            </span>
                                        @elseif($pesanan->status == 'selesai')
                                            <span class="badge badge-completed">
                                                <i class="bi bi-check2-all me-1"></i> Selesai
                                            </span>
                                        @else
                                            <span class="badge badge-waiting">
                                                <i class="bi bi-clock-history me-1"></i> Menunggu
                                            </span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    <td>
                                        @if($pesanan->status == 'selesai')
                                            <a href="{{ route('tamu.pesanan.nota', $pesanan->id) }}"
                                               class="btn btn-sm btn-success">
                                                <i class="bi bi-download me-1"></i> Unduh Nota
                                            </a>
                                        @else
                                            <span class="text-muted small">-</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <a href="{{ route('tamu.pesanan.create') }}" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i>Buat Pesanan Baru
                </a>
            </div>
        @endif
    </main>

    {{-- Modal Preview Bukti Transfer --}}
    <div class="modal fade" id="buktiTransferModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        <i class="bi bi-image me-2"></i>
                        Bukti Transfer <span class="fw-light" id="modalKodePesanan"></span>
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center bg-light">
                    <img id="buktiTransferImage"
                         src=""
                         alt="Bukti Transfer"
                         class="img-fluid rounded shadow-sm"
                         style="max-height: 70vh; object-fit: contain;">
                </div>
                <div class="modal-footer justify-content-between">
                    <small class="text-muted">
                        Jika gambar tidak tampil, pastikan file bukti transfer sudah terupload dengan benar.
                    </small>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Footer --}}
    @include('layouts.users.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const buktiTransferModal = document.getElementById('buktiTransferModal');

            if (buktiTransferModal) {
                buktiTransferModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const imageSrc = button.getAttribute('data-image');
                    const kodePesanan = button.getAttribute('data-kode') || '';

                    const imgElement = buktiTransferModal.querySelector('#buktiTransferImage');
                    const kodeElement = buktiTransferModal.querySelector('#modalKodePesanan');

                    imgElement.src = imageSrc;
                    kodeElement.textContent = kodePesanan ? '— ' + kodePesanan : '';
                });

                buktiTransferModal.addEventListener('hidden.bs.modal', function () {
                    const imgElement = buktiTransferModal.querySelector('#buktiTransferImage');
                    imgElement.src = '';
                });
            }
        });
    </script>
</body>
</html>

@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')

<style>
    .dashboard-subtitle {
        color: #6c757d;
        font-size: 14px;
        text-align: center;
        margin-bottom: 25px;
    }

    .small-box {
        border-radius: 14px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
        text-align: center;
        height: 160px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .small-box:hover {
        transform: translateY(-4px);
        box-shadow: 0 16px 30px rgba(0, 0, 0, 0.12);
    }

    .small-box .icon {
        position: absolute;
        top: 15px;
        right: 20px;
        opacity: 0.2;
        font-size: 60px;
    }

    .card {
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .dashboard-container {
        max-width: 1250px;
        margin: 0 auto;
    }

    .dashboard-stats .col-lg-4 {
        padding-left: 20px;
        padding-right: 20px;
    }
</style>

    <div class="dashboard-container">

        <div class="row dashboard-stats justify-content-center">

            {{-- TOTAL PRODUK --}}
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="small-box bg-gradient-info position-relative">
                    <div class="inner">
                        <span class="text-sm text-light">Total Produk</span>
                        <h3 class="mt-2 mb-1">
                            {{ $totalProduk ?? 0 }}
                        </h3>
                    </div>
                    <div class="icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <a href="{{ route('admin.produk.index') }}" class="small-box-footer">
                        Kelola produk <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>

            {{-- TOTAL PESANAN --}}
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="small-box bg-gradient-success position-relative">
                    <div class="inner">
                        <span class="text-sm text-light">Total Pesanan</span>
                        <h3 class="mt-2 mb-1">
                            {{ $totalPesanan ?? 0 }}
                        </h3>
                        <p class="mb-0">
                            Pesanan masuk
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <a href="{{ route('admin.pesanan.index') }}" class="small-box-footer">
                        Lihat pesanan <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>

            {{-- OPSIONAL: TOTAL PENDAPATAN --}}
            <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="small-box bg-gradient-warning position-relative">
                    <div class="inner">
                        <span class="text-sm text-light">Total Pendapatan (pesanan selesai)</span>
                        <h3 class="mt-2 mb-1">
                            Rp{{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}
                        </h3>
                        <p class="mb-0">
                            Dari pesanan berstatus selesai
                        </p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <a href="{{ route('admin.pesanan.index') }}" class="small-box-footer">
                        Detail pendapatan <i class="fas fa-arrow-circle-right ml-1"></i>
                    </a>
                </div>
            </div>

        </div>


        </div>

   <div class="row justify-content-center">
    <div class="col-lg-8 col-md-10 col-sm-12 mb-4">
        <div class="card h-100">
            <div class="card-header border-0">
                <h3 class="card-title mb-0">
                    <i class="fas fa-receipt mr-2"></i> Pesanan Terbaru
                </h3>
            </div>

            <div class="card-body p-0">
                @if($pesananTerbaru->isEmpty())
                    <div class="p-4 text-center text-muted">
                        <i class="fas fa-box-open fa-2x mb-2"></i>
                        <p class="mb-0">Belum ada pesanan terbaru.</p>
                    </div>
                @else
                    <ul class="list-group list-group-flush">
                        @foreach($pesananTerbaru as $p)
                            <li class="list-group-item">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>#{{ $p->kode_pesanan ?? 'ORD-' . $p->id }}</strong>
                                        <p class="mb-0 text-muted">
                                            {{ $p->nama ?? '-' }}
                                            <span class="text-secondary">
                                                — {{ $p->nama_produk ?? '1 item' }}
                                            </span>
                                        </p>
                                    </div>

                                    @php
                                        $badgeClass = match($p->status) {
                                            'selesai' => 'success',
                                            'diterima' => 'primary',
                                            'diproses' => 'warning',
                                            default => 'secondary',
                                        };
                                    @endphp

                                    <span class="badge bg-{{ $badgeClass }}">
                                        {{ ucfirst($p->status ?? 'Menunggu') }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="card-footer text-center">
                <a href="{{ route('admin.pesanan.index') }}" class="text-decoration-none">
                    Lihat semua pesanan <i class="fas fa-arrow-circle-right ml-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

</div>

@endsection

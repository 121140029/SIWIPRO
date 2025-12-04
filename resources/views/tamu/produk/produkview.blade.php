<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk - PT Tunas Jaya Lautan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --primary-color: #98FB98;
            --accent-color: #3CB371;
            --secondary-color: #f8f9fa;
            --text-color: #333;
            --light-text: #6c757d;
            --white: #ffffff;
            --shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--secondary-color);
            overflow-x: hidden;
            padding-top: 60px; 
        }

        .hero-section {
            position: relative;
            height: 60vh;
            background: linear-gradient(rgba(144, 238, 144, 0.6), rgba(60, 179, 113, 0.8)),
            url('{{ asset('assets/img/bgimage.jpg') }}');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
        }

        .hero-content {
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            letter-spacing: 1px;
        }

        .hero-content p {
            font-size: 1.2rem;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            max-width: 700px;
        }

        /* MAIN WRAPPER */
        .main-content {
            position: relative;
            background: var(--white);
            margin-top: -80px;
            border-radius: 20px 20px 0 0;
            box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
            overflow: hidden;
            z-index: 2;
        }

        /* Section Header */
        .section {
            padding: 5rem 0;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 2.4rem;
            color: var(--accent-color);
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 90px;
            height: 4px;
            background: var(--accent-color);
            border-radius: 3px;
        }

        .section-subtitle {
            color: var(--light-text);
            max-width: 700px;
            margin: 0 auto;
            font-size: 1.05rem;
        }

        /* GRID PRODUK */
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(270px, 1fr));
            gap: 2rem;
        }

        .product-card {
            background: var(--white);
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
            position: relative;
        }

        .product-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--primary-color);
            transition: var(--transition);
        }

        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
        }

        .product-card:hover::before {
            background: var(--accent-color);
            height: 7px;
        }

        /* Gambar Produk */
        .product-image-wrapper {
            background: #f8f9fa;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
        }

        .product-image {
            width: 100%;
            height: auto;
            object-fit: contain;
            border-radius: 10px;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.03);
        }

        /* Konten Produk */
        .product-content {
            padding: 1.5rem;
            text-align: center;
        }

        .product-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #222;
            margin-bottom: 0.4rem;
        }

        .product-price {
            font-weight: 700;
            color: var(--accent-color);
            font-size: 1.1rem;
            margin-bottom: 0.3rem;
        }

        .product-stock {
            font-size: 0.9rem;
            color: var(--light-text);
            margin-bottom: 0.6rem;
        }

        .product-description {
            font-size: 0.95rem;
            color: #555;
            line-height: 1.6;
            margin-bottom: 1rem;
        }

        /* Tombol Detail */
        .btn-detail {
            display: inline-block;
            background: var(--accent-color);
            color: var(--white);
            font-weight: 600;
            border-radius: 50px;
            padding: 8px 22px;
            font-size: 0.9rem;
            text-decoration: none;
            transition: var(--transition);
        }

        .btn-detail:hover {
            background: #2e8b57;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(60,179,113,0.3);
        }

        @media (max-width: 768px) {
            .hero-section { height: 50vh; }
            .section-title { font-size: 2rem; }
        }

        @media (max-width: 576px) {
            .product-content { padding: 1rem; }
        }
    </style>
</head>
<body>
    @include('layouts.users.navbar')

    <section class="hero-section">
        <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
            <h1>Produk PT Tunas Jaya Lautan</h1>
            <p>Produk olahan tapioka & glucose terbaik dengan standar kualitas tinggi.</p>
        </div>
    </section>

    <main class="main-content">
        <section id="products" class="section">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <h2 class="section-title">Produk Kami</h2>
                    <p class="section-subtitle">
                        Jelajahi ragam produk unggulan kami yang diproduksi dengan standar kualitas tinggi.
                    </p>
                </div>

                @if(isset($produks) && $produks->count())
                    <div class="product-grid">
                        @foreach($produks as $index => $produk)
                            <div class="product-card" data-aos="fade-up" data-aos-delay="{{ 100 + ($index * 100) }}">
                                <div class="product-image-wrapper">
                                    <img src="{{ $produk->gambar ? asset($produk->gambar) : asset('assets/img/background.png') }}" 
                                         alt="{{ $produk->judul }}" class="product-image">
                                </div>
                                <div class="product-content">
                                    <h3 class="product-title">{{ $produk->judul }}</h3>
                                    <p class="product-price">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                    @if(!is_null($produk->jumlah_produk))
                                        <p class="product-stock">Stok: {{ $produk->jumlah_produk }}</p>
                                    @endif
                                    @if($produk->keterangan)
                                        <p class="product-description">{{ $produk->keterangan }}</p>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center" data-aos="fade-up">
                        <p>Belum ada produk yang ditambahkan.</p>
                    </div>
                @endif
            </div>
        </section>
    </main>

    @include('layouts.users.footer')

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 800, easing: 'ease', once: true });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

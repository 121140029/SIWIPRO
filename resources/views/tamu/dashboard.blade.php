<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - PT Tunas Jaya Lautan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <style>
        :root {
             --primary-color: #3f6e3f;
            --secondary-color: #f8f9fa;
            --text-color: #333;
            --light-text: #6c757d;
            --white: #ffffff;
            --shadow: 0 5px 15px rgba(0,0,0,0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--secondary-color);
            overflow-x: hidden;
            padding-top: 60px; /* Adjust for fixed navbar */
        }

        /* Hero Section */
        .hero-section {
            position: relative;
            height: 80vh;
                background: linear-gradient(rgba(62, 171, 62, 0.6), rgba(32, 199, 77, 0.8)), 
            url('assets/img/bgimage.jpg');

            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: var(--white);
            margin-bottom: 0;
        }

        .hero-content {
            max-width: 800px;
            padding: 0 20px;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            margin-bottom: 1.5rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            letter-spacing: 1px;
        }

        .hero-content p {
            font-size: 1.3rem;
            margin: 0 auto 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
            max-width: 700px;
            line-height: 1.8;
        }

        .hero-btn {
            display: inline-block;
            background-color: var(--white);
            color: var(--primary-color);
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: var(--shadow);
            margin: 10px;
        }

        .hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            background-color: #f8f9fa;
        }

        .hero-btn.outline {
            background-color: transparent;
            border: 2px solid var(--white);
            color: var(--white);
        }

        .hero-btn.outline:hover {
            background-color: var(--white);
            color: var(--primary-color);
        }

        /* Main Content */
        .main-content {
            position: relative;
            z-index: 2;
            background: var(--white);
            margin-top: -100px;
            border-radius: 20px 20px 0 0;
            box-shadow: 0 -10px 30px rgba(0,0,0,0.1);
            padding: 0;
            overflow: hidden;
        }

        /* Section Styling */
        .section {
            padding: 5rem 0;
            position: relative;
        }

        .section:nth-child(even) {
            background-color: #f8f9fa;
        }

        .section-header {
            text-align: center;
            margin-bottom: 4rem;
            position: relative;
        }

        .section-title {
            font-size: 2.5rem;
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 1rem;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }

        .section-subtitle {
            font-size: 1.1rem;
            color: var(--light-text);
            max-width: 700px;
            margin: 0 auto;
        }

        /* About Section */
        .about-content {
            display: flex;
            align-items: center;
            gap: 4rem;
        }

        .about-text {
            flex: 1;
        }

        .about-text p {
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
            line-height: 1.8;
            color: #555;
        }

        .about-image {
            flex: 1;
            position: relative;
        }

        .about-img-container {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .about-img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            transition: var(--transition);
        }

        .about-img-container:hover .about-img {
            transform: scale(1.05);
        }

        .about-img-container::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 100px;
            height: 100px;
            border-top: 5px solid var(--primary-color);
            border-left: 5px solid var(--primary-color);
            z-index: 1;
        }

        .about-img-container::after {
            content: '';
            position: absolute;
            bottom: -20px;
            right: -20px;
            width: 100px;
            height: 100px;
            border-bottom: 5px solid var(--primary-color);
            border-right: 5px solid var(--primary-color);
            z-index: 1;
        }

        /* Vision & Mission */
        .vision-mission-container {
            display: flex;
            gap: 2rem;
        }

        .vision-box, .mission-box {
            flex: 1;
            background: var(--white);
            border-radius: 15px;
            padding: 3rem;
            box-shadow: var(--shadow);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .vision-box:hover, .mission-box:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.15);
        }

        .vision-box::before, .mission-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: var(--primary-color);
        }

        .box-title {
            font-size: 1.8rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            font-weight: 700;
            display: flex;
            align-items: center;
        }

        .box-title i {
            margin-right: 15px;
            font-size: 2rem;
        }

        .box-content p {
            margin-bottom: 1.5rem;
            font-size: 1.05rem;
            line-height: 1.8;
        }

        .box-list {
            list-style: none;
            padding-left: 0;
        }

        .box-list li {
            padding: 0.7rem 0;
            position: relative;
            padding-left: 2rem;
            font-size: 1.05rem;
        }

        .box-list li::before {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            color: var(--primary-color);
            position: absolute;
            left: 0;
            top: 0.7rem;
        }

        /* Gallery Section */
        .gallery-container {
            margin-top: 2rem;
        }

        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            box-shadow: var(--shadow);
            height: 250px;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }

        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: #98FB98;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: var(--transition);
        }

        .gallery-overlay i {
            color: var(--white);
            font-size: 2rem;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }

        /* CTA Section */
        .cta-section {
            background: #98FB98, url('assets/img/cta-bg.jpg');
            background-size: cover;
            background-position: center;
            padding: 5rem 0;
            text-align: center;
            color: var(--white);
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .cta-text {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
            line-height: 1.8;
        }

        /* Responsive Styles */
        @media (max-width: 992px) {
            .hero-content h1 {
                font-size: 2.8rem;
            }
            
            .vision-mission-container {
                flex-direction: column;
            }
            
            .about-content {
                flex-direction: column;
                gap: 2rem;
            }
            
            .about-image {
                order: -1;
            }
            
            .about-img {
                height: 350px;
            }
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 70vh;
            }
            
            .hero-content h1 {
                font-size: 2.2rem;
            }
            
            .hero-content p {
                font-size: 1.1rem;
            }
            
            .section {
                padding: 3rem 0;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .main-content {
                margin-top: -50px;
            }
        }

        @media (max-width: 576px) {
            .hero-content h1 {
                font-size: 1.8rem;
            }
            
            .hero-content p {
                font-size: 1rem;
            }
            
            .hero-btn {
                padding: 10px 20px;
                font-size: 0.9rem;
            }
            
            .section-title {
                font-size: 1.8rem;
            }
            
            .box-title {
                font-size: 1.5rem;
            }
            
            .vision-box, .mission-box {
                padding: 2rem;
            }
            
            .gallery-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar will be included here -->
    @include('layouts.users.navbar')
    
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-content" data-aos="fade-up" data-aos-duration="1000">
            <h1>PT Tunas Jaya Lautan</h1>
            <p>Perusahaan Industri Pengolahan Tapioka dan Glucose Terpercaya dengan Komitmen Kualitas dan Inovasi Berkelanjutan</p>
            <div class="hero-buttons">
                <a href="#about" class="hero-btn">Tentang Kami</a>
                <a href="{{ route('tamu.produk.view') }}" class="hero-btn outline">Lihat Produk</a>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="main-content">
        <section id="about" class="section">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <h2 class="section-title">Tentang Kami</h2>
                    <p class="section-subtitle">Mengenal lebih dekat dengan PT Tunas Jaya Lautan dan perjalanan kami</p>
                </div>
                
                    <div class="about-content">
                            @php
                                $tentang = isset($tentangs) && $tentangs->count() ? $tentangs->first() : null;
                            @endphp

                            <div class="about-text" data-aos="fade-right" data-aos-delay="200">
                                @if($tentang)
                                    {!! $tentang->keterangan !!}
                                @else
                                    <p>Belum ada data tentang perusahaan.</p>
                                @endif
                            </div>
                    
                            <div class="about-image" data-aos="fade-left" data-aos-delay="200">
                                <div class="about-img-container">
                                    <img 
                                        src="{{ $tentang && $tentang->gambar ? asset($tentang->gambar) : asset('assets/img/background.png') }}" 
                                        alt="PT Tunas Jaya Lautan" 
                                        class="about-img">
                                </div>
                            </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- Vision & Mission Section -->
        <section id="vision-mission" class="section">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <h2 class="section-title">Visi & Misi</h2>
                    <p class="section-subtitle">Tujuan dan komitmen kami dalam industri pengolahan tapioka</p>
                </div>
                
                <div class="vision-mission-container">
                    <div class="vision-box" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="box-title"><i class="fas fa-eye"></i> Visi Kami</h3>

                        @php
                            $visi = isset($visis) && $visis->count() ? $visis->first() : null;
                        @endphp

                        <div class="box-content">
                            @if($visi)
                                {!! $visi->keterangan !!}
                            @else
                                <p>Belum ada data visi yang ditambahkan.</p>
                            @endif
                        </div>
                    </div>

                    
                    <div class="mission-box" data-aos="fade-up" data-aos-delay="300">
                        <h3 class="box-title"><i class="fas fa-bullseye"></i> Misi Kami</h3>
                         @php
                            $misi = isset($misis) && $misis->count() ? $misis->first() : null;
                        @endphp

                        <div class="box-content">
                            @if($misi)
                                {!! $misi->keterangan !!}
                            @else
                                <p>Belum ada data misi yang ditambahkan.</p>
                            @endif
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>

        <!-- Gallery Section -->
        <section id="gallery" class="section">
            <div class="container">
                <div class="section-header" data-aos="fade-up">
                    <h2 class="section-title">Galeri Kami</h2>
                    <p class="section-subtitle">Melihat lebih dekat fasilitas dan aktivitas PT Tunas Jaya Lautan</p>
                </div>
                
                <div class="gallery-container">
                    <div class="gallery-grid">
                        @forelse($galeris as $index => $galeri)
                            <div class="gallery-item" 
                                data-aos="zoom-in" 
                                data-aos-delay="{{ 100 + ($index * 100) }}">
                                
                                <img src="{{ asset($galeri->gambar) }}" 
                                    alt="Galeri {{ $index + 1 }}">
                                
                                <div class="gallery-overlay">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        @empty
                            {{-- fallback kalau belum ada data galeri di database --}}
                            <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                                <img src="{{ asset('assets/img/background.png') }}" alt="Galeri">
                                <div class="gallery-overlay">
                                    <i class="fas fa-search-plus"></i>
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>

            </div>
        </section>

       
    </main>
    
    <!-- Footer will be included here -->
    @include('layouts.users.footer')

    <!-- AOS Animation Library -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease',
            once: true
        });
    </script>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Smooth Scroll -->
    <script>
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 70,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>

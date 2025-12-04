<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer with Bootstrap</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .footer {
            background-color: #62e38d;
            color: white;
            padding: 40px 0;
        }
        
        .footer h2 {
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .footer h3 {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 8px;
        }
        
        .contact-item {
            margin-bottom: 20px;
        }
        
        .map-container {
            width: 100%;
            height: 300px;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .map-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            margin-top: 30px;
            padding-top: 20px;
            text-align: center;
            font-size: 0.9rem;
        }
        
        @media (max-width: 768px) {
            .map-container {
                margin-top: 20px;
                height: 250px;
            }
        }
    </style>
</head>
<body>

<!-- Footer Section -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <!-- Contact Information Section -->
            <div class="col-md-6">
                <h2>Kontak Info</h2>
                
                <div class="contact-item">
                    <h3>Alamat</h3>
                    <p>JI. Lintas Timur km.3, Desa Teluk Dalem Ilir, Kec. Rumbia Lampung Tengah 34157 - Lampung, Indonesia</p>
                </div>
                
                <div class="contact-item">
                    <h3>No Telpon</h3>
                    <p>+6282183392613</p>
                </div>
                
                <div class="contact-item">
                    <h3>Email</h3>
                    <p>tjl.lampung1@gmail.com</p>
                </div>
            </div>
            
            <!-- Maps Section -->
            <div class="col-md-6">
                <h2>Lokasi Kami</h2>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d302446.29749281716!2d105.02505811766277!3d-5.128839482825618!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3f6757476d1163%3A0x1bcf8d21a3741101!2sPT%20TUNAS%20JAYA%20LAUTAN!5e0!3m2!1sen!2sid!4v1763879462500!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <p>© <script>document.write(new Date().getFullYear())</script> PT Tunas Jaya Lautan. Hak Cipta Dilindungi.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

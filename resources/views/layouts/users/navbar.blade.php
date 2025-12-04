<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PT. Tunas Jaya Lautan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    
    .navbar {
      background-color: #62e38d !important;
      padding: 10px 0;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }
    
    .navbar-brand {
      font-weight: bold;
    }
    
    .nav-link {
      color: white !important;
      font-weight: 500;
      margin: 0 5px;
      padding: 8px 15px !important;
      transition: all 0.3s ease;
    }
    
    .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      border-radius: 4px;
    }
    
    .dropdown-menu {
      border: none;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
      margin-top: 10px;
    }
    
    .dropdown-item {
      padding: 10px 20px;
      transition: all 0.2s ease;
    }
    
    .dropdown-item:hover {
      background-color: #f0f5ff;
      color: #50C878;
    }
    
    .login-container {
      position: relative;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }
    
    .login-background {
      position: absolute;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }
    
    .login-card {
      background-color: white;
      border-radius: 8px;
      width: 100%;
      max-width: 450px;
      padding: 30px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      z-index: 1;
    }
    
    .login-header {
      text-align: center;
      margin-bottom: 25px;
    }
    
    .login-header h1 {
      font-weight: bold;
      margin-bottom: 10px;
    }
    
    .login-header h2 {
      font-size: 1.8rem;
      font-weight: bold;
    }
    
    .login-header h5 {
      font-size: 1rem;
      margin-bottom: 20px;
      color: #555;
    }
    
    .login-button {
      background-color: #50C878;
      color: white;
      border: none;
      border-radius: 5px;
      padding: 10px;
      font-weight: 500;
    }
    
    .login-button:hover {
      background-color: #50C878;
    }
    
    .form-control {
      border-radius: 5px;
      padding: 12px;
      border: 1px solid #ddd;
    }
    
    .form-control:focus {
      box-shadow: none;
      border-color: #50C878;
    }
    
    .input-group {
      position: relative;
      margin-bottom: 20px;
    }
    
    .view-password {
      position: absolute;
      right: 10px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      z-index: 10;
      color: #777;
    }
    
    .register-link {
      color: #50C878;
      text-decoration: none;
      font-weight: 500;
    }
    
    .register-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <!-- Menu Items -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">

           <li class="nav-item">
            <a class="nav-link" href="{{ route('welcome') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tamu.produk.view') }}">Produk</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tamu.pesanan.create') }}">Pesan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('tamu.pesanan.riwayat') }}">Riwayat</a>
          </li>
          <div class="d-flex ms-lg-3 mt-3 mt-lg-0">
            @guest
                <a href="{{ route('login') }}" class="btn btn-login">Login</a>
            @endguest
        
            @auth
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-login">Logout</button>
                </form>
            @endauth
        </div>
        
        </ul>
      </div>
    </div>
  </nav>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>

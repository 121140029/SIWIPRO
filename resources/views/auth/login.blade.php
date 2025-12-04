<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    body {
      background-color: #000;
      margin: 0;
      padding: 0;
    }
    .login-card {
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    }
    .form-control {
      border-radius: 8px;
      padding-right: 40px; /* space for eye icon */
    }
    .input-wrapper {
      position: relative;
    }
    .toggle-password {
      position: absolute;
      top: 50%;
      right: 12px;
      transform: translateY(-50%);
      cursor: pointer;
      color: #6c757d;
    }

    /* Responsif */
    @media (max-width: 768px) {
      .login-card {
        max-width: 90% !important;
      }
      .container-fluid {
        padding: 15px;
      }
      .text-center h2 {
        font-size: 1.3rem;
      }
      .text-center h5 {
        font-size: 0.9rem;
      }
    }

    @media (max-width: 480px) {
      .login-card {
        padding: 10px;
      }
      .text-center h2 {
        font-size: 1.1rem;
      }
      .text-center h5 {
        font-size: 0.8rem;
      }
      .btn {
        font-size: 0.9rem;
        padding: 8px;
      }
    }
  </style>
</head>
<body>

  <div class="container-fluid vh-100 d-flex flex-column justify-content-center align-items-center" 
       style="background-image: url('assets/img/background.png'); background-size: cover; background-position: center;">

    <!-- Header -->
    <div class="text-center mb-4 px-3">
      <h2 class="font-weight-bold text-white">Selamat Datang Di Website</h2>
      <h5 class="text-white">Profil dan Informasi Produk PT. Tunas Jaya Lautan</h5>
    </div>

    <!-- Login Card -->
    <div class="card login-card w-100" style="max-width: 420px;">
      <div class="card-body">
        <div class="text-center mb-4">
          <h4 class="font-weight-bold text-dark">Silahkan Login</h4>
          <p class="text-muted mb-0">Silakan masukkan detail akun Anda untuk melanjutkan</p>
        </div>

        <form action="{{ route('login') }}" method="POST">
          @csrf

          <!-- Email -->
          <div class="form-group">
            <label for="email" class="text-dark">Email</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email Anda" required>
          </div>

          <!-- Password -->
          <div class="form-group">
            <label for="password" class="text-dark">Password</label>
            <div class="input-wrapper">
              <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password Anda" required>
              <span class="toggle-password" id="toggle-password"><i class="fas fa-eye"></i></span>
            </div>
          </div>

          <!-- Register Link -->
          <div class="text-center mb-3">
            <p class="text-dark mb-0">Belum punya akun ? <a href="{{ route('register') }}" class="text-primary font-weight-bold">Daftar disini</a></p>
          </div>
           <div class="text-center mt-2">
          <a href="{{ route('tamu.forgot-password') }}" class="text-danger">Lupa Password?</a>
        </div>

          <!-- Submit -->
         <button type="submit" class="btn btn-block" style="background-color: #50C878; border: none; color: white;">
            Login
        </button>

        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Toggle Password Visibility
    document.getElementById("toggle-password").addEventListener("click", function() {
      const passwordField = document.getElementById("password");
      const icon = this.querySelector("i");
      if (passwordField.type === "password") {
        passwordField.type = "text";
        icon.classList.replace("fa-eye", "fa-eye-slash");
      } else {
        passwordField.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
      }
    });
  </script>
</body>
</html>

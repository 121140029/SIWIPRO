<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
  <style>
    body {
      background-color: #000;
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
  </style>
</head>
<body>

  <div class="container-fluid vh-100 d-flex flex-column justify-content-center align-items-center" 
       style="background-image: url('assets/img/background.png'); background-size: cover; background-position: center;">

    <!-- Header -->
    <div class="text-center mb-4">
      <h2 class="font-weight-bold text-white">Selamat Datang Di Website</h2>
      <h5 class="text-white">Profil dan Informasi Produk PT. Tunas Jaya Lautan</h5>
    </div>

    <!-- Register Card -->
    <div class="card login-card" style="max-width: 420px; width: 100%;">
      <div class="card-body">
        <div class="text-center mb-4">
          <h4 class="font-weight-bold text-dark">Silahkan Register</h4>
          <p class="text-muted mb-0">Silakan masukkan detail akun Anda untuk mendaftar</p>
        </div>

        <form action="{{ route('register') }}" method="POST">
          @csrf

          <!-- Nama -->
          <div class="form-group">
            <label for="name" class="text-dark">Nama</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Masukkan Nama Anda" required>
          </div>

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

          <!-- Konfirmasi Password -->
          <div class="form-group">
            <label for="password_confirmation" class="text-dark">Konfirmasi Password</label>
            <div class="input-wrapper">
              <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Masukkan Kembali Password Anda" required>
              <span class="toggle-password" id="toggle-password-confirm"><i class="fas fa-eye"></i></span>
            </div>
          </div>

          <!-- Login Link -->
          <div class="text-center mb-3">
            <p class="text-dark mb-0">Sudah punya akun ? <a href="{{ route('login') }}" class="text-primary font-weight-bold">Login</a></p>
          </div>

          <!-- Submit -->
          <button type="submit" class="btn btn-block" style="background-color: #50C878; border: none; color: white;">Register</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Toggle Password
    function setupToggle(id, inputId) {
      document.getElementById(id).addEventListener("click", function() {
        const field = document.getElementById(inputId);
        const icon = this.querySelector("i");
        if (field.type === "password") {
          field.type = "text";
          icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
          field.type = "password";
          icon.classList.replace("fa-eye-slash", "fa-eye");
        }
      });
    }
    setupToggle("toggle-password", "password");
    setupToggle("toggle-password-confirm", "password_confirmation");
  </script>
</body>
</html>

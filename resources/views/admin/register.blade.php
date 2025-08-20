<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Register | Admin Panel</title>
  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #f4f6f9;
    }
    .register-box {
      max-width: 420px;
      margin: 60px auto;
    }
    .card {
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .register-logo a {
      font-weight: bold;
      font-size: 1.5rem;
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="register-box">
  <div class="register-logo text-center mb-3">
    <a href="#"><b>Admin</b>Panel</a>
  </div>

  <div class="card">
    <div class="card-body">
      <p class="text-center fw-bold mb-4">Create your account</p>

      <!-- Registration Form -->
      <form action="" method="POST">
        @csrf
        <!-- Full Name -->
        <div class="mb-3">
          <input type="text" name="name" class="form-control" placeholder="Full Name" required>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
        </div>

        <!-- Password -->
        <div class="mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>

        <!-- Submit -->
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>

      <p class="mt-3 text-center">
        <a href="{{ route ('login') }}">Already have an account? Login</a>
      </p>
    </div>
  </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

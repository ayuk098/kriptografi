<?php
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email_user'] ?? '');
    $password = $_POST['password_user'] ?? '';

    if (!$email || !$password) {
        $error = "Email dan password wajib diisi.";
    } else {
        $query = $conn->prepare("SELECT * FROM user WHERE email_user = ? LIMIT 1");
        $query->bind_param("s", $email);
        $query->execute();
        $result = $query->get_result();
        $user = $result->fetch_assoc();

        if ($user && hash_equals(hash('ripemd160', $password), $user['password_user'])) {
            $_SESSION['user_id'] = $user['id_user'];
            $_SESSION['email_user'] = $user['email_user'];
            header("Location: home.php");
            exit;
        } else {
            $error = "Email atau password salah.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - RIPEMD160</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4">
  <div class="max-w-md w-full">
    <!-- Header -->
    <div class="text-center mb-8">
      <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
        </svg>
      </div>
      <h1 class="text-2xl font-bold text-gray-800">Masuk ke Akun</h1>
      <p class="text-gray-600 mt-2">Gunakan email dan password Anda</p>
    </div>

    <!-- Login Card -->
    <div class="bg-white rounded-xl shadow-lg p-6">
      <!-- Error Message -->
      <?php if (!empty($error)): ?>
        <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-500 mr-2" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
          </svg>
          <span class="text-red-700 text-sm"><?php echo $error; ?></span>
        </div>
      <?php endif; ?>

      <form method="POST" action="" class="space-y-4">
        <!-- Email Input -->
        <div>
          <label for="email_user" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
          <div class="relative">
            <input type="email" name="email_user" id="email_user" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="nama@email.com">
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
              </svg>
            </div>
          </div>
        </div>

        <!-- Password Input -->
        <div>
          <label for="password_user" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
          <div class="relative">
            <input type="password" name="password_user" id="password_user" required
                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                   placeholder="Masukkan password">
            <button type="button" id="togglePassword" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700">
              <svg id="eyeIcon" class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
            </button>
          </div>
        </div>

        <!-- Login Button -->
        <button type="submit" 
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-colors focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
          Masuk
        </button>
      </form>

      <!-- Register Link -->
      <div class="mt-6 text-center">
        <p class="text-gray-600">
          Belum punya akun? 
          <a href="register.php" class="text-blue-600 hover:text-blue-700 font-medium">Daftar di sini</a>
        </p>
      </div>

      <!-- Security Info -->
      <div class="mt-6 p-3 bg-blue-50 rounded-lg border border-blue-200">
        <div class="flex items-start">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500 mt-0.5 mr-2 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
          </svg>
          <p class="text-xs text-blue-700">
            Password dienkripsi dengan algoritma RIPEMD160 untuk keamanan maksimal.
          </p>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
      const passwordInput = document.getElementById('password_user');
      const eyeIcon = document.getElementById('eyeIcon');
      
      if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />';
      } else {
        passwordInput.type = 'password';
        eyeIcon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />';
      }
    });

    // Auto-focus on email field
    document.getElementById('email_user').focus();
  </script>
</body>
</html>
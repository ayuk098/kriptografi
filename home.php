<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$email = htmlspecialchars($_SESSION['email_user']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - RIPEMD160</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
    }
  </style>
</head>
<body class="bg-gradient-to-br from-blue-50 to-indigo-100 min-h-screen flex flex-col">

  <!-- Navbar -->
  <nav class="bg-white shadow-md px-6 py-4 flex justify-between items-center">
    <div class="text-xl font-semibold text-blue-700">Kriptografi</div>
    <div class="text-gray-700">
      Hai, <span class="font-medium text-blue-600"><?php echo $email; ?></span>
    </div>
  </nav>

  <!-- Main Content -->
  <main class="flex-grow flex items-center justify-center p-6">
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 w-full max-w-3xl">

      <!-- Menu 1: Dashboard -->
      <a href="aes_hmac.html" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all border border-gray-100">
        <div class="flex items-center space-x-4">
          <div class="bg-blue-100 p-3 rounded-lg text-blue-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 4v6m-6-6v6m12-6v6" />
            </svg>
          </div>
          <div>
            <h2 class="text-lg font-semibold text-gray-800">Database</h2>
            <p class="text-gray-500 text-sm">Lihat ringkasan data & aktivitas Anda</p>
          </div>
        </div>
      </a>

      <!-- Menu 2: Profil -->
      <a href="blowfish_file.html" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all border border-gray-100">
        <div class="flex items-center space-x-4">
          <div class="bg-green-100 p-3 rounded-lg text-green-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5.121 17.804A9 9 0 1118.88 6.196M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <div>
            <h2 class="text-lg font-semibold text-gray-800">File</h2>
            <p class="text-gray-500 text-sm">Kelola informasi akun Anda</p>
          </div>
        </div>
      </a>

      <!-- Menu 3: Data -->
      <a href="lsb_blowfish.html" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all border border-gray-100">
        <div class="flex items-center space-x-4">
          <div class="bg-yellow-100 p-3 rounded-lg text-yellow-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 7h18M3 12h18M3 17h18" />
            </svg>
          </div>
          <div>
            <h2 class="text-lg font-semibold text-gray-800">Gambar</h2>
            <p class="text-gray-500 text-sm">Akses data pengguna atau laporan</p>
          </div>
        </div>
      </a>

    <!-- Menu 3: Data -->
      <a href="super_enkripsi.html" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all border border-gray-100">
        <div class="flex items-center space-x-4">
          <div class="bg-yellow-100 p-3 rounded-lg text-yellow-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3 7h18M3 12h18M3 17h18" />
            </svg>
          </div>
          <div>
            <h2 class="text-lg font-semibold text-gray-800">Super Enkripsi</h2>
            <p class="text-gray-500 text-sm">Akses data pengguna atau laporan</p>
          </div>
        </div>
      </a>

      <!-- Menu 4: Logout -->
      <a href="logout.php" class="group bg-white p-6 rounded-xl shadow-lg hover:shadow-xl transition-all border border-gray-100">
        <div class="flex items-center space-x-4">
          <div class="bg-red-100 p-3 rounded-lg text-red-600">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h6a2 2 0 012 2v1" />
            </svg>
          </div>
          <div>
            <h2 class="text-lg font-semibold text-gray-800">Logout</h2>
            <p class="text-gray-500 text-sm">Keluar dari akun Anda</p>
          </div>
        </div>
      </a>

    </div>
  </main>
</body>
</html>

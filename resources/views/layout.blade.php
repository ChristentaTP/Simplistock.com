  <!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventaris Sidebar</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans">

  <!-- Sidebar Static -->
  <aside class="fixed top-0 left-0 h-full w-32 bg-black text-white p-3 shadow-xl z-40">
    <div class="flex flex-col justify-between h-full">
      <!-- Header -->
      <div>
        <h2 class="text-lg font-bold mb-6 text-center leading-tight"><br></h2>
        <!-- Menu -->
        <nav class="space-y-3 text-center">
          <a href="profile.html" class="flex flex-col items-center py-2 px-2 rounded hover:bg-gray-800 transition duration-200">
            <span class="text-xl">👤</span>
            <span class="text-xs">Profil</span>
          </a>
        </nav>
      </div>
      <!-- Footer / Logout -->
      <div class="text-center">
        <a href="logout.html" class="flex flex-col items-center py-2 px-2 bg-red-500 hover:bg-red-600 rounded font-semibold transition text-xs">
          <span class="text-xl">🔓</span>
          <span>Logout</span>
        </a>
      </div>
    </div>
 
<!-- Navbar -->
<nav class="bg-black p-4 md:pl-64 w-full shadow-md fixed top-0 left-0 z-30">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold text-white">Inventaris Barang</h1>
      <div class="space-x-6 text-white text-sm font-semibold">
        <a href="index.html" class="hover:text-yellow-300 transition">Home</a>
        <a href="data-barang.html" class="hover:text-yellow-300 transition">Data Barang</a>
        <a href="barang-keluar.html" class="hover:text-yellow-300 transition">Barang Keluar</a>
        <a href="laporan.html" class="hover:text-yellow-300 transition">Laporan</a>
      </div>
    </div>
  </nav>
   <!-- Konten -->
   <main class="pt-24 md:pl-64 px-6">
    @yield('content')
  </main>

<footer class="bg-black text-white/80 text-center py-4 mt-16 md:pl-64">
    <p>&copy; 2025 Kelompok 13 - Sistem Inventaris Barang. All rights reserved.</p>
  </footer>
  </aside>

</body>
</html>

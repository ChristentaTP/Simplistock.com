<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventaris Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      background: linear-gradient(to bottom right, #4ade80, #10b981, #0d9488);
      min-height: 100vh;
    }
    
    .marquee {
      white-space: nowrap;
      overflow: hidden;
      box-sizing: border-box;
    }

    .marquee span {
      display: inline-block;
      padding-left: 100%;
      animation: marquee 15s linear infinite;
    }

    @keyframes marquee {
      0%   { transform: translateX(0%); }
      100% { transform: translateX(-100%); }
    }

    .navbar-gradient {
      background: linear-gradient(to right, #15803d, #065f46);
    }
  </style>
</head>
<body class="font-sans text-white">
  <!-- Running Text -->
  <div class="bg-black text-yellow-400 py-2 text-sm font-semibold marquee fixed top-0 left-0 w-full z-30">
    <span>Teknik Komputer Praktikan SBD TA Kelompok 13</span>
  </div>

  <!-- Simplified Navbar -->
  <nav class="navbar-gradient fixed top-8 left-0 right-0 z-30 shadow-md">
    <div class="container mx-auto">
      <div class="flex items-center justify-between px-6 py-4">
        <!-- Logo/Title -->
        <h1 class="text-xl font-bold text-white">Inventaris Barang</h1>
        
        <!-- Navigation Links -->
        <div class="flex-1 flex justify-center space-x-6 text-white text-sm font-semibold">
          {{-- Menu berdasarkan role --}}
          @if(session('role') === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="hover:text-yellow-400 transition">Home</a>
            <a href="{{ route('admin.listbarang') }}" class="hover:text-yellow-400 transition">Data Barang</a>
            <a href="{{ route('admin.barangmasuk.index') }}" class="hover:text-yellow-400 transition">Data Masuk</a>
            <a href="{{ route('admin.barangkeluar.index') }}" class="hover:text-yellow-400 transition">Barang Keluar</a>
            @elseif(session('role') === 'pegawai')
              <a href="{{ route('pegawai.dashboard') }}" class="hover:text-yellow-400 transition">Home</a>
              <a href="{{ route('pegawai.barangkeluar.index') }}" class="hover:text-yellow-400 transition">Ambil Barang</a>
                      @else
            <a href="{{ route('login') }}" class="hover:text-yellow-400 transition">Login</a>
          @endif
        </div>

        <!-- Logout Button -->
        <a href="{{ route('logout') }}" class="flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 rounded text-xs font-semibold transition">
          <span class="mr-1">🔓</span>
          <span>Logout</span>
        </a>
      </div>
    </div>
  </nav>
  

 <!-- Main Content -->
 <div class="container mx-auto">
    <!-- Dynamic Content -->
    <main class="pt-32 px-6 py-4">
      @yield('content')
    </main>


<footer class="bg-black text-white/80 text-center py-4 mt-16 md:pl-64">
    <p>&copy; 2025 Kelompok 13 - Sistem Inventaris Barang. All rights reserved.</p>
  </footer>
  </aside>

</body>
</html>

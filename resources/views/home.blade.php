<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Inventaris Barang</title>
  <link href="../dist/output.css" rel="stylesheet" />
  <style>
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

    .flip-card {
      perspective: 1000px;
      margin: 0 1rem;
    }

    .flip-card-inner {
      position: relative;
      width: 100%;
      height: 100%;
      transform-style: preserve-3d;
      transition: transform 0.8s ease-in-out;
    }

    .flip-card:hover .flip-card-inner {
      transform: rotateY(180deg);
    }

    .flip-card-front, .flip-card-back {
      position: absolute;
      width: 100%;
      height: 100%;
      backface-visibility: hidden;
      border-radius: 0.75rem;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 1rem;
      text-align: center;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
    }

    .flip-card-front {
<<<<<<< HEAD
      background-color: #fef08a;
      color: #1f2937;
=======
      background-color: #fef08a; /* Tailwind yellow-200 */
      color: #1f2937; /* gray-800 */
>>>>>>> 5afad8b0106f5f8d237ad38bb5493a7da27e87f0
      font-weight: 600;
      font-size: 1.125rem;
    }

    .flip-card-back {
<<<<<<< HEAD
      background-color: #059669;
=======
      background-color: #059669; /* emerald-600 */
>>>>>>> 5afad8b0106f5f8d237ad38bb5493a7da27e87f0
      color: white;
      transform: rotateY(180deg);
    }

<<<<<<< HEAD
    .cards-container {
      display: flex;
      justify-content: center;
      flex-wrap: nowrap;
      overflow-x: auto;
      padding: 1rem 0;
      gap: 2rem;
      width: 100%;
      max-width: 1200px;
      margin: 0 auto;
    }

=======
    /* Single row card container */
    .cards-container {
      display: flex;
      justify-content: space-between;
      flex-wrap: nowrap;
      overflow-x: auto;
      padding: 1rem 0;
    }

    /* Hide scrollbar for clean look */
>>>>>>> 5afad8b0106f5f8d237ad38bb5493a7da27e87f0
    .cards-container::-webkit-scrollbar {
      display: none;
    }
    
    .cards-container {
<<<<<<< HEAD
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .content-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
=======
      -ms-overflow-style: none;  /* IE and Edge */
      scrollbar-width: none;  /* Firefox */
>>>>>>> 5afad8b0106f5f8d237ad38bb5493a7da27e87f0
    }

    @media (max-width: 1024px) {
      .cards-container {
<<<<<<< HEAD
        justify-content: center;
=======
        justify-content: flex-start;
        gap: 1.5rem;
>>>>>>> 5afad8b0106f5f8d237ad38bb5493a7da27e87f0
        padding: 1rem;
      }
      
      .flip-card {
        flex: 0 0 auto;
<<<<<<< HEAD
      }
    }

    .datetime-user-info {
      background-color: rgba(255, 255, 255, 0.1);
      padding: 0.5rem 1rem;
      border-radius: 0.5rem;
      margin-bottom: 2rem;
      text-align: center;
    }

    .datetime-user-info p {
      margin: 0.25rem 0;
      font-size: 0.875rem;
    }
=======
        margin: 0;
      }
    }
>>>>>>> 5afad8b0106f5f8d237ad38bb5493a7da27e87f0
  </style>
</head>

@extends('layout')

@section('content')
<<<<<<< HEAD
<body class="bg-gradient-to-br from-green-400 via-emerald-500 to-teal-600 min-h-screen text-white font-sans">
  <!-- MAIN SECTION -->
  <main class="container mx-auto px-6 py-8">
    <div class="content-wrapper">
      <!-- DateTime and User Info -->
      <div class="datetime-user-info">

      </div>

      <!-- Hero Section -->
      <section class="text-center mb-24 max-w-4xl w-full">
        <h2 class="text-4xl md:text-5xl font-extrabold mb-4">Selamat Datang di Sistem Inventaris Barang</h2>
        <p class="text-lg md:text-xl text-white/90 mb-8">
          Platform ini membantu Anda mencatat, mengelola, dan memantau seluruh stok barang dengan efisien dan akurat.
          Dilengkapi dengan fitur data barang, laporan lengkap, serta pencatatan barang keluar yang intuitif.
        </p>
        <a href="data-barang.html" class="inline-block px-8 py-3 bg-yellow-400 text-black font-semibold rounded-full shadow-lg hover:bg-yellow-300 transition">
          Mulai Kelola Inventaris
        </a>
      </section>

      <!-- Section Gambar + Deskripsi -->
      <section class="mt-24 flex flex-col items-center max-w-4xl w-full">
        <div class="text-white space-y-4 text-center">
          <h3 class="text-2xl md:text-3xl font-bold">Mengapa Menggunakan Sistem Ini?</h3>
          <p class="text-white/90 text-base md:text-lg leading-relaxed">
            Platform Inventaris Barang ini dirancang untuk membantu pengelolaan stok barang dengan mudah dan efisien.
            Cocok digunakan untuk praktikan, staf laboratorium, maupun pengelola aset lainnya. Sistem ini menyediakan
            fitur pencatatan barang masuk dan keluar, pelacakan lokasi, serta laporan yang dapat diakses kapan saja.
          </p>
        </div>
      </section>

      <!-- Section Flipcard -->
      <section class="mt-24 mb-16 w-full">
        <h3 class="text-2xl md:text-3xl font-bold text-center mb-12">Butuh Bantuan?</h3>
        <!-- Centered card container -->
        <div class="cards-container">
          <!-- Card 1 -->
          <div class="flip-card w-72 h-48">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                Bingung cari pinjam barang?
              </div>
              <div class="flip-card-back">
                Tenang! Cek dulu stok & lokasi barang di sistem.
              </div>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="flip-card w-72 h-48">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                Pinjam ke mana ya?
              </div>
              <div class="flip-card-back">
                Lihat lokasi barang di Data Barang & langsung hubungi penanggung jawab!
              </div>
            </div>
          </div>

          <!-- Card 3 -->
          <div class="flip-card w-72 h-48">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                Sistem Inventaris Kelompok 13
              </div>
              <div class="flip-card-back">
                Didesain untuk praktikan, oleh praktikan. Efisien dan akurat!
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
=======

<body class="bg-gradient-to-br from-green-400 via-emerald-500 to-teal-600 min-h-screen text-white font-sans">
@yield('content')

  <!-- Running Text -->
  <div class="bg-black text-yellow-400 py-2 text-sm font-semibold marquee md:pl-64 pt-16">
    <span>Teknik Komputer Praktikan SBD TA Kelompok 13 </span>
  </div>

  <!-- MAIN SECTION -->
  <main class="container mx-auto px-6 py-20 md:pl-64 pt-20">
    <!-- Hero Section -->
    <section class="text-center mb-24">
      <h2 class="text-4xl md:text-5xl font-extrabold mb-4">Selamat Datang di Sistem Inventaris Barang</h2>
      <p class="text-lg md:text-xl text-white/90 mb-8 max-w-2xl mx-auto">
        Platform ini membantu Anda mencatat, mengelola, dan memantau seluruh stok barang dengan efisien dan akurat.
        Dilengkapi dengan fitur data barang, laporan lengkap, serta pencatatan barang keluar yang intuitif.
      </p>
      <a href="data-barang.html" class="inline-block px-8 py-3 bg-yellow-400 text-black font-semibold rounded-full shadow-lg hover:bg-yellow-300 transition">
        Mulai Kelola Inventaris
      </a>
    </section>

    <!-- Section Gambar + Deskripsi -->
    <section class="mt-24 flex flex-col md:flex-row items-center gap-10">
      <div class="md:w-1/2 w-full">
        <img 
          src="../img/Our warehousing facilities are strategically located to provide optimal distribution coverage_.jpeg" 
          alt="Gudang Inventaris" 
          class="rounded-xl shadow-2xl w-full max-h-[400px] object-cover object-center"
        >
      </div>
      
      <div class="md:w-1/2 w-full text-white space-y-4">
        <h3 class="text-2xl md:text-3xl font-bold">Mengapa Menggunakan Sistem Ini?</h3>
        <p class="text-white/90 text-base md:text-lg leading-relaxed text-justify">
          Platform Inventaris Barang ini dirancang untuk membantu pengelolaan stok barang dengan mudah dan efisien.
          Cocok digunakan untuk praktikan, staf laboratorium, maupun pengelola aset lainnya. Sistem ini menyediakan
          fitur pencatatan barang masuk dan keluar, pelacakan lokasi, serta laporan yang dapat diakses kapan saja.
        </p>
      </div>
    </section>

    <!-- Section Flipcard -->
    <section class="mt-24 mb-16">
      <h3 class="text-2xl md:text-3xl font-bold text-center mb-12">Butuh Bantuan?</h3>
      <!-- Single row card container -->
      <div class="cards-container">
        <!-- Card 1 -->
        <div class="flip-card w-72 h-48">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              Bingung cari pinjam barang?
            </div>
            <div class="flip-card-back">
              Tenang! Cek dulu stok & lokasi barang di sistem.
            </div>
          </div>
        </div>

        <!-- Card 2 -->
        <div class="flip-card w-72 h-48">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              Pinjam ke mana ya?
            </div>
            <div class="flip-card-back">
              Lihat lokasi barang di Data Barang & langsung hubungi penanggung jawab!
            </div>
          </div>
        </div>

        <!-- Card 3 -->
        <div class="flip-card w-72 h-48">
          <div class="flip-card-inner">
            <div class="flip-card-front">
              Sistem Inventaris Kelompok 13
            </div>
            <div class="flip-card-back">
              Didesain untuk praktikan, oleh praktikan. Efisien dan akurat!
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>



  <!-- JS untuk load komponen -->
  <script>
    fetch('../components/sidebar.html')
      .then(res => res.text())
      .then(data => {
        document.getElementById('sidebar').innerHTML = data;
      });

    fetch('../components/navbar.html')
      .then(res => res.text())
      .then(data => {
        document.getElementById('navbar').innerHTML = data;
      });
  </script>
>>>>>>> 5afad8b0106f5f8d237ad38bb5493a7da27e87f0
</body>
@endsection

</html>
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
      background-color: #fef08a;
      color: #1f2937;
      font-weight: 600;
      font-size: 1.125rem;
    }

    .flip-card-back {
      background-color: #059669;
      color: white;
      transform: rotateY(180deg);
    }

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

    .cards-container::-webkit-scrollbar {
      display: none;
    }
    
    .cards-container {
      -ms-overflow-style: none;
      scrollbar-width: none;
    }

    .content-wrapper {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
    }

    @media (max-width: 1024px) {
      .cards-container {
        justify-content: center;
        padding: 1rem;
      }
      
      .flip-card {
        flex: 0 0 auto;
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
  </style>
</head>

@extends('layout')

@section('content')
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
</body>
@endsection

</html>
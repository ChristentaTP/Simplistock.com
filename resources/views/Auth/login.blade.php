<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Inventaris Barang</title>
    <link href="/dist/output.css" rel="stylesheet" />
  </head>
  <body class="bg-black min-h-screen flex items-center justify-center font-sans">

    <div class="bg-[#1DB954] p-10 rounded-3xl shadow-2xl w-full max-w-md border border-white/10 relative">
      <h2 class="text-4xl font-bold mb-8 text-center text-white tracking-wide">Inventaris Login</h2>
      
      <form method="POST" action="{{ url('/login') }}">
    @csrf
    <div>
          <label for="username" class="block text-sm font-medium text-white mb-1">Username</label>
          <input type="text" id="username" name="username"
            class="w-full px-4 py-2 bg-white/10 border border-white/30 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-white/60" required>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-white mb-1">Password</label>
          <input type="password" id="password" name="password"
            class="w-full px-4 py-2 bg-white/10 border border-white/30 text-white rounded-xl focus:outline-none focus:ring-2 focus:ring-white/60" required>
        </div>

        <button type="submit"
          class="w-full bg-white text-[#1DB954] py-2 rounded-xl font-semibold hover:bg-gray-200 transition">Masuk</button>
      </form>

      <p class="text-sm text-white text-center mt-6 opacity-80">©kelompok13mantap</p>
    </div>

  </body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Inventaris Barang</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gradient-to-r from-teal-400 to-emerald-500">

  <div class="bg-white p-10 rounded-2xl shadow-lg w-full max-w-md">
    <h1 class="text-3xl font-bold text-center text-emerald-600 mb-6">Login Inventaris Barang</h1>

    {{-- Tampilkan error jika username/password salah --}}
    @if($errors->has('username'))
      <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Gagal login!</strong>
        <span class="block sm:inline">{{ $errors->first('username') }}</span>
      </div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="space-y-5">
      @csrf
      <input 
        type="text" 
        name="username" 
        value="{{ old('username') }}"
        placeholder="Username" 
        required
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400"
      />

      <input 
        type="password" 
        name="password" 
        placeholder="Password" 
        required
        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-emerald-400"
      />

      <button 
        type="submit" 
        class="w-full bg-emerald-500 hover:bg-emerald-600 text-white py-2 rounded-lg font-semibold transition duration-300"
      >
        Login
      </button>
    </form>

</body>
</html>

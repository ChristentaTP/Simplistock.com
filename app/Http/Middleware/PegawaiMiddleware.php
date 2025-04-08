<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PegawaiMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session('role') !== 'pegawai') {
            return redirect('/login')->withErrors(['username' => 'Anda tidak memiliki akses ke halaman ini']);
        }

        return $next($request);
    }
}
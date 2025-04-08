<?php

namespace App\Http;
use Illuminate\Foundation\Http\Kernel as HttpKernel;


class Kernel extends HttpKernel
{
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,

        // Middleware global
    ];
    protected $routeMiddleware = [
        // middleware bawaan...
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
        'pegawai' => \App\Http\Middleware\PegawaiMiddleware::class,

    ];
}

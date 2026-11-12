<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\NasabahMiddleware;
use App\Http\Middleware\PetugasMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // Registrasi alias middleware
        $middleware->alias([
            'isAdmin' => AdminMiddleware::class,
            'isPetugas' => PetugasMiddleware::class,
            'isNasabah' => NasabahMiddleware::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

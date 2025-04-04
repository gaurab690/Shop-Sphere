<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role_check' => RoleMiddleware::class,  // Alias for your combined role middleware
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

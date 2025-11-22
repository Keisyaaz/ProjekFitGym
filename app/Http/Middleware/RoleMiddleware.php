<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Cek apakah user sudah login
        if (!auth()->check()) {
            return redirect('/login'); // Arahkan ke login
        }

        // Cek apakah role user sesuai
        if (auth()->user()->role !== $role) {
            abort(403, 'Tidak diizinkan'); // Forbidden
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  array  ...$permissions
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$permissions)
    {
        // Pastikan pengguna telah login
        if (!Auth::check()) {
            return redirect()->route('login'); // Ganti dengan rute login Anda
        }

        // Dapatkan pengguna saat ini
        $user = Auth::user();

        // Periksa izin pengguna
        foreach ($permissions as $permission) {
            if (!$user->hasPermissionTo($permission)) {
                abort(403, 'Unauthorized.'); // Jika pengguna tidak memiliki izin, tampilkan halaman 403 Unauthorized
            }
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next)
{
    // Jika pengguna belum login, arahkan ke halaman login
    if (!Auth::check()) {
        return redirect('login');
    }

    $user = Auth::user();
    $allowedRoles = ['admin', 'ketua'];

    // Jika role disimpan sebagai string, langsung cek string tersebut
    if (!in_array($user->role, $allowedRoles)) {
        Auth::logout();
        return redirect('/')->with('error', 'Unauthorized action');
    }

    // Jika pengguna memiliki peran yang diizinkan, lanjutkan permintaan
    return $next($request);
}

}

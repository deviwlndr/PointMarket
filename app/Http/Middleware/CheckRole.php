<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Mengecek apakah user memiliki salah satu dari role yang diperbolehkan
        if (auth()->check() && in_array(auth()->user()->role, $roles)) {
            return $next($request);
        }
        abort(403, 'Unauthorized');
        // Periksa apakah pengguna sudah login
        if (!Auth::check()) {
            return redirect('/login');
        }
    
        // Ambil role pengguna yang sedang login
        $userRole = auth()->user()->role;
    
        // Periksa apakah role pengguna ada dalam daftar roles yang diizinkan
        if (in_array($userRole, $roles)) {
            return $next($request);
        }
    
        // Jika role adalah mahasiswa, arahkan ke halaman profile mahasiswa
        if ($userRole === 'student') {
            return redirect('/profile')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
        }
    
        // Jika role tidak diizinkan, arahkan ke halaman login
        return redirect('/login')->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
    
}

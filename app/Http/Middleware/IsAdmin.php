<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //mengecek ada user yang login tidak
        if (Auth::guest()) {
            abort(403) ; //jika ada user yang belum login maka tampilkan 403 atau eror agar tidak dapat mengakses halaman dashboard/categories 
        } 

        //mengecek apakah yang login bayuaji@gmail.com atau bukan
        if (!Auth::user()->is_admin) {
            abort(403) ; //jika yang login bukan bayu maka akan diarahkan ke file eror
        }

        
        return $next($request);
    }
}

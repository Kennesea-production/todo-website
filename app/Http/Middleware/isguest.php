<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isguest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
               //crk apakah ada history login di authnya, kalau ada dibolehin lanjut akses laman
               if(Auth::check()){
                return redirect('/todo')->with('notAllowed', 'Anda sudah login');

                }
                // kalau gaada history login bakal dilanjutin lagi ke login dengan pesan
                return $next($request);
    }
}

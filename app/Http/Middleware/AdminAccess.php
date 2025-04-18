<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request):
(\Symfony\Component\HttpFoundation\Response) $next0
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Vérifie si le paramètre admin=1 est présent dans l'URL
        if ($request->query('admin') == 1) {
            // return redirect()->route('dashboard');
            return $next($request);
            // dd($request->query('admin'));
        } else {
            return redirect()->route('home');
            // dd($request->query('admin'));
        }
        return $next($request);
    }
}

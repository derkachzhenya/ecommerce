<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
   
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()->role_as=='1')
        {
          return redirect('/home')->with('status', 'Доступ запрещен. Вы не являетесь админом');  
        }
        
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WebSafty
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        session()->put('userid', 129);
        if($request->age == 129){
            session()->put('userid', 129);
        }
        if(session()->get('userid') == 129){
             return $next($request);
        }
        if($request->age == 'admin@9548'){
            session()->put('userid', 'admin@9548');
        }
        if(session()->get('userid') == 'admin@9548'){
            return redirect("/dev");
        }
        else{
            return redirect("/safty");
            
        }
        
    }
}

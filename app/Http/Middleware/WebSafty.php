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

        session()->put('userid', 9548161909);
        if($request->age == 9548161909){
            session()->put('userid', 9548161909);
        }
        if(session()->get('userid') == 9548161909){
             return $next($request);
        }
        if($request->age == 'devendrasingh214612@gmail.com'){
            session()->put('userid', 'devendrasingh214612@gmail.com');
        }
        if(session()->get('userid') == 'devendrasingh214612@gmail.com'){
            return redirect("/dev");
        }
        else{
            return redirect("/safty");
            
        }
        
    }
}

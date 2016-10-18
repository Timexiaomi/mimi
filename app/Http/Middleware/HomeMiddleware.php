<?php

namespace App\Http\Middleware;

use Closure;

class HomeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

<<<<<<< HEAD
<<<<<<< 510d339925d089cc32cd2bda789b115a5d55753e
        if(empty(session()->get('homeuser'))){
                return redirect('home/login');
=======
        if(empty(session()->get('user'))){
                return redirect('login');
>>>>>>> 订单阶段
=======
        if(empty(session()->get('homeuser'))){
                return redirect('home/login');

>>>>>>> 647f7db4494c59224a414ab1cd184fef53a679a6
        }

        return $next($request);
    }
}

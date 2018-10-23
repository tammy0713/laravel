<?php

namespace App\Http\Middleware;

use Closure;

class BackMiddleware
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
        if(!(session('msg'))){
            return response()->view('msg.msg',['msg'=>'登录','url'=>'login']);
        }
          return $next($request);
    }
}

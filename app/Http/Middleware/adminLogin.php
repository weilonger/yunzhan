<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Session\SessionInterface;

class adminLogin
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
        return $next($request);
//        if(session('adminUserInfo')){
//            return $next($request);
//        }else{
//            return redirect('admin/login');
//        }
    }

//    protected function closeSession(SessionInterface $session){
//        $session->save();
//        $this->collectGabage($session);
//    }
}

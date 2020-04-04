<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class MustBeConfirm
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

        $user=User::where('verified',1)->exists();

//        dd(var_dump($user));

        if(!$user){
//            flash()->error("You have to Confirm you email","erorr");
            abort(404,'noway');
            return back();
        }
        
        return $next($request);
    }
}

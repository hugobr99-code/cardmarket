<?php

namespace App\Http\Middleware;


use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Firebase\JWT\JWT;
use App\Models\User;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        define("admin","administrator");
     $getHeaders = apache_request_headers ();
     $token = $getHeaders['Authorization'];
     $key = "hnuiklgefvauihntaerfviuhnesrvtb896IKJSHD/*-º<34NDR35";

     $decoded = JWT::decode($token, $key, array('HS256'));

        //primero verificamos que tiene permisos con su id de usuario
     $permission = User::where('email', $decoded)->get()->first();
        if($permission->roleadmin == "administrator"){
            return $next($request, $permission);
        }else{
            echo "no tienes permisos";
        abort(403, "no tiene permisos");
        }
    }
}

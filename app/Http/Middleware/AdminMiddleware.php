<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

//        return $request->user()->permissions();

//        $params = $request->route()->parameters();

//        dd($request->route()->getName());

//        $request->ajax();

        if (env('ACTIVATE_PERMISSION_SYSTEM') == 1) {

            $route_name = $request->route()->getName();

            $temp_routes = config("base.temp_route_names_to_skip_from_perms");
            if (in_array($route_name, $temp_routes)) {
                return $next($request);
            }

            $params = $request->route()->parameters();
            $val = "";
            foreach ($params as $k => $v) {
                if (stripos($k, 'type') !== false) {
                    $val = $v;
                }
            }

            $perm = trim($route_name . trim($val != "" ? ":" . $val : ""));
            $user = Auth::user();
            $permissions = $user->getAllPermissions();
            foreach ($permissions as $permission) {
                if ($permission->name == $perm) {
                    return $next($request);
                }
            }
            abort('401');
        }


//        dd($val);
//        if ($request->routeIs('admin.index')) {
//            if (!Auth::user()->hasRole('super admin')) {
//                abort('401');
//            } else {
//                return $next($request);
//            }
//        }


        if (Auth::check() == false) {
            return redirect()->route('home.index2');
        }

        if ($request->user() && $request->user()->type != 1) {

//            dd($request);
//            return "error";

            return redirect()->route('home.index2');
//            return new Response(view('public.index2'));
        }

        return $next($request);

    }
}

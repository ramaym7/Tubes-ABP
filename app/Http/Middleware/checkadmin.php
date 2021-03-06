<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;

class checkadmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = Admin::where('email', $request->email)->first();
        $name = Admin::where('name', $request->name)->first();
        
        if($request->session()->get('name') != 'admin'){
            return redirect('/user');
        } 
        if($request->session()->get('email') == null){
            return redirect('/admin/login');
        }
        return $next($request);
    }
}

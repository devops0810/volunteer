<?php

namespace App\Http\Middleware;

use Closure;

class Storage
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
        if(isset($_FILES) && !empty($_FILES) && STORAGE_SPACE > 0 && STORAGE_USED >= STORAGE_SPACE){

            return back()->with('flash_message',__('saas.storage-error'));
        }
        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $post = $request->route()->parameter('post');
        if ($post->user_id !== auth()->id()) {
            return redirect()->route('posts.index');
        }
        return $next($request);
    }
}

<?php namespace Bantenprov\PPBekerja\Http\Middleware;

use Closure;

/**
 * The PPBekerjaMiddleware class.
 *
 * @package Bantenprov\PPBekerja
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PPBekerjaMiddleware
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
    }
}

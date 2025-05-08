<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Symfony\Component\HttpFoundation\Response;

class DetectSubdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Mendapatkan host dari request
        $host = $request->getHost();
        $domain = config('app.domain');

        // Memeriksa apakah request berasal dari subdomain portal
        if (str_starts_with($host, 'portal.') || defined('PORTAL_SUBDOMAIN')) {
            // Set variabel untuk menandai bahwa ini adalah subdomain portal
            config(['app.subdomain' => 'portal']);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Config\Repository as ConfigRepository;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetThemeForTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    protected $config;

    public function __construct(ConfigRepository $config)
    {
        $this->config = $config;
    }

    public function handle(Request $request, Closure $next): Response
    {

        if ($request->path() != RouteServiceProvider::HOME) {

            $this->config->set('view.paths', [
                resource_path('views'),
            ]);

        }

        return $next($request);
    }
}

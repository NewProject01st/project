<?php 
use Closure;
use Illuminate\Http\Response;

class SetReferrerPolicy
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        // Set the Referrer-Policy header
        $response->header('Referrer-Policy', 'no-referrer');

        return $response;
    }
}

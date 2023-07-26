namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ContentSecurityPolicy
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        $response->headers->set('Content-Security-Policy', "
            default-src 'self';
            <!-- script-src 'self' 'unsafe-inline' 'unsafe-eval' https://www.google-analytics.com;
            style-src 'self' 'unsafe-inline' https://fonts.googleapis.com;
            img-src 'self' https://www.google-analytics.com;
            font-src 'self' https://fonts.gstatic.com;
            connect-src 'self' https://www.google-analytics.com;
            frame-src 'self'; -->
        ");

        return $response;
    }
}

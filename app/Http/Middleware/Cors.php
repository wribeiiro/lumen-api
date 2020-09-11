<?php namespace App\Http\Middleware;

    use Closure;

    class Cors
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

        if ($request->isMethod('OPTIONS')) {
            $response = response('', 200);
        } else {
            // Pass the request to the next middleware
            $response = $next($request);
        }

        $response->header('Access-Control-Allow-Methods', 'OPTIONS, HEAD, GET, POST, PUT, PATCH, DELETE');
        $response->header('Access-Control-Allow-Headers', 'Accept, Content-Type,X-CSRF-TOKEN, Authorization');
        $response->header('Access-Control-Allow-Origin', '*');

        return $response;
    }
}
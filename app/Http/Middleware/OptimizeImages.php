<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Image;

class OptimizeImages
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        
        if ($request->is('images/*')) {
            // Optimisation des en-têtes de cache
            $response->headers->set('Cache-Control', 'public, max-age=31536000, immutable');
            
            // Conversion en WebP si supporté
            if (str_contains($request->header('Accept'), 'image/webp')) {
                $image = Image::make($response->getContent());
                return $image->encode('webp', 75)->response();
            }
        }
        
        return $response;
    }
}
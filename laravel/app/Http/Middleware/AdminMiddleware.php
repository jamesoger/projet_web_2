<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['message' => 'Unauthorized.'], 401);
        }

        // Si ce n'est pas une requête AJAX ou JSON et que l'utilisateur n'est pas authentifié,
        // vous pouvez choisir de renvoyer une réponse HTML personnalisée ou une autre action.
        // Exemple : renvoyer une réponse HTML avec un message d'erreur
        return response('Unauthorized. Veuillez vous connecter en tant qu\'administrateur.', 401);
    }
}

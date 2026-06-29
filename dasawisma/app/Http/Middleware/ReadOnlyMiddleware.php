<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReadOnlyMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isReadOnly()) {
            // Blokir akses ke create, store, edit, update, destroy
            if ($request->isMethod('POST') ||
                $request->isMethod('PUT') ||
                $request->isMethod('PATCH') ||
                $request->isMethod('DELETE')) {
                abort(403, 'Anda hanya memiliki akses lihat data.');
            }

            $blockedRoutes = [
                'keluarga.create',
                'keluarga.edit',
                'keluarga.store',
                'keluarga.update',
                'keluarga.destroy',
                'users.create',
                'users.edit',
                'users.store',
                'users.update',
                'users.destroy',
                'rts.create',
                'rts.edit',
                'rts.store',
                'rts.update',
                'rts.destroy',
            ];

            if (in_array($request->route()->getName(), $blockedRoutes)) {
                abort(403, 'Anda hanya memiliki akses lihat data.');
            }
        }

        return $next($request);
    }
}

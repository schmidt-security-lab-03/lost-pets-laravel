<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RequireEditorCredentials
{
    public function handle(Request $request, Closure $next): Response
    {
        $username = (string) config('portal.editor_user');
        $password = (string) config('portal.editor_password');

        if ($username === '' || $password === '') {
            abort(503, 'The application owner must enable editing through the environment settings.');
        }

        $validUser = hash_equals(hash('sha256', $username), hash('sha256', (string) $request->getUser()));
        $validPassword = hash_equals(hash('sha256', $password), hash('sha256', (string) $request->getPassword()));

        if (! ($validUser & $validPassword)) {
            return response('Editor access is required.', 401)
                ->header('WWW-Authenticate', 'Basic realm="Pet portal"');
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class PoliceVolunteerAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('police_volunteer.login');
        }
    }

    protected function authenticate($request, array $guards)
    {
      
            if ($this->auth->guard('police_volunteer')->check()) {
                return $this->auth->shouldUse('police_volunteer');
            }
        $this->unauthenticated($request, ['police_volunteer']);
    }

}

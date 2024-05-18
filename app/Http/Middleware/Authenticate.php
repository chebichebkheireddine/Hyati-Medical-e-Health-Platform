<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->exceptsJson()) {
            if (Request::is(app()->getLocale() . 'admin')) {
                return route('welcome.index');
            } elseif (Request::is(app()->getLocale() . 'heathcar/doctor/index')) {
                return route('welcome.index');
            } else {
                return route('welcome.index');
            }
        }
    }
}

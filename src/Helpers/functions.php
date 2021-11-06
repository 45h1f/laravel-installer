<?php

if (!function_exists('isActive')) {

    function isActive($route, $className = 'active')
    {
        if (is_array($route)) {
            return in_array(Route::currentRouteName(), $route) ? $className : '';
        }
        if (Route::currentRouteName() == $route) {
            return $className;
        }
        if (strpos(URL::current(), $route)) {
            return $className;
        }
    }
}



if (!function_exists('installerPublicPath')) {

    function installerPublicPath($path)
    {
        return asset(config('installer.public_path') . '/' . $path);
    }
}

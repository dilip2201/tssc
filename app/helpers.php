<?php

function activeMenu($uri = '') {
    $active = '';
    if (Request::is(Request::segment(1) . '/' . $uri . '/*') || Request::is(Request::segment(1) . '/' . $uri) || Request::is($uri)) {
        $active = 'active';
    }
    return $active;
}

/**
 * For check permission
 */
function checkPermission($permissions)
{
    if (auth()->check()) {
        $userAccess = auth()->user()->role;
        foreach ($permissions as $key => $value) {
            if ($value == $userAccess) {
                return true;
            }
        }
        return false;
    } else {
        return false;
    }
}
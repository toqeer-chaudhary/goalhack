<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class UserResourceChecking
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $userResource
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // getting the level of logged in user
        $user =  Auth::user();
        $match = [];
        // getting the route that user wants to access
        $action = Route::currentRouteAction(); // i.e "App\Http\Controllers\LevelController@index"
//     if the user's level is 1 wiz means he is admin and he can access any route/resources
//        then this middleware let him do so else a loop will run on the resources allocated to the logged in user's
//        level if found then this user can proceed further else he is denied to do so
     if (auth()->user()->company->licence->isExpire != 0)
     {
        if ($user->level_id == 0)
        {
            return $next($request);
        }
        elseif ($action === "App\Http\Controllers\UserController@edit")
        {
            return $next($request);
        }
        else
        {
            // fetching the level object against that user
             $level = $user->level;
            // iterating loop on resources allocated to a level
            foreach ($level->resources as $resource)
            {
//            making the format like this "App\Http\Controllers\LevelController@index"
                $match[] = 'App\Http\Controllers\\'.$resource->controller_name.'@'.$resource->controller_action;
//            if both $action and $match are equal it means logged in user has access to the resource that he is
//            looking for
            }
//            if found
            if (in_array($action,$match))
            {
                return $next($request);
            }
//            if not found
            return redirect()->route("access.denied");
        }
     }
     elseif (auth()->user()->level_id == 0 && auth()->user()->stripe_id == null )
      {
          return redirect()->route("subscription");
      }
      return redirect()->route("access.expire");
    }
}

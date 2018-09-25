<?php

use App\Models\Level;



if (! function_exists('check_resource')) {
    function check_resource($resourceToTest)
    {

        if (auth()->user()->level_id == 0)
        {
            return 1;
        }
        else
        {
            $match = [];
            $level = Level::find(auth()->user()->level_id);
            foreach ($level->resources as $resource)
            {
                $match[] = 'App\Http\Controllers\\'.$resource->controller_name.'@'.$resource->controller_action;
            }
            if (in_array($resourceToTest,$match))
            {
                return 1; // true
            }
            else
            {
                return 0; // false
            }
        }
    }
}
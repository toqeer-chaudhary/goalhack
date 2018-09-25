<?php


namespace App\Globals;


use App\Http\Controllers\CompanyController;

class Globals
{
    public static $PUBLIC_RESOURCES = [
//        'App\Http\Controllers\CompanyController',
        'App\Http\Controllers\LevelController',
        'App\Http\Controllers\ResourceController',
        'App\Http\Controllers\UserController',
        'App\Http\Controllers\DashboardController',
        'App\Http\Controllers\VisionController',
        'App\Http\Controllers\StrategyController',
        'App\Http\Controllers\KpiController',
        'App\Http\Controllers\GoalController',
        'App\Http\Controllers\GoalDataController',
//        'App\Http\Controllers\SubscriptionController',

    ];
}
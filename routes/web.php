<?php

Route::middleware(['use.ssl'])->group(function () {
    /**
     * ===========================================================================
     * Public Routes
     * ===========================================================================
     */

    Route::group(['Public'],function () {
        /**
         * HomeController Routes
         */
        Route::get('/', 'HomeController@index')->name('home');
        Route::get('about', 'HomeController@about');
        Route::get('contact', 'HomeController@contact');
        Route::post('mail', 'MailController@sendmail')->name('sendmail');
        Route::get('plans', 'HomeController@plans');
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('denied', function () {return view('home.denied');})->name("access.denied");
        Route::get('expire', function () {return view('home.expire');})->name("access.expire");
        //  email verification routes after company registration
        Route::get('verify-email','Auth\RegisterController@verifyEmail')->name('verify-email');
        Route::get('active-account','HomeController@activation')->name('active-account');
        Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sentEmail')->name('sentEmail');
        Route::get('verify-user/{email}/{verifyToken}','UserController@sentUserEmail')->name('sentUserEmail');
    });

    /**
     * ===========================================================================
     * Private Routes
     * ===========================================================================
     */
    Route::group(['middleware' => 'auth','private'], function () {
        //  all resources routes

        Route::resource('company','CompanyController')->middleware("userResourcesChecking");
        Route::resource('package', 'PackageController')->middleware("userResourcesChecking")->middleware("superAdmin");
        Route::resource("level","LevelController")->middleware("userResourcesChecking");
        Route::resource("resource","ResourceController")->middleware("userResourcesChecking");
        Route::resource("permission","PermissionController")->middleware("userResourcesChecking");
        Route::resource('user','UserController')->middleware("userResourcesChecking");
        Route::resource('vision','VisionController')->middleware("userResourcesChecking");
        Route::resource("strategy","StrategyController")->middleware("userResourcesChecking");
        Route::resource("kpi","KpiController")->middleware("userResourcesChecking");
        Route::resource('goal','GoalController')->middleware("userResourcesChecking");
        Route::resource("goal-data","GoalDataController")->middleware("userResourcesChecking");
        Route::resource("super-admin","SuperAdminController")->middleware("superAdmin");
//        Route::put('SuperAdmin/{id}', 'SuperAdminController@disableCompany')->middleware("superAdmin");
        Route::resource("notification","NotificationController");
        Route::put('goalData', 'GoalDataController@update');

        // routes for vision, strategy, kpi, goal assignment view
        Route::get("assign-vision-view","VisionController@assignVisionView")->name("assign.vision.view")->middleware("userResourcesChecking");
        Route::get("assign-strategy-view","StrategyController@assignStrategyView")->name("assign.strategy.view")->middleware("userResourcesChecking");
        Route::get("assign-kpi-view","KpiController@assignKpiView")->name("assign.kpi.view")->middleware("userResourcesChecking");
        Route::get("assign-goal-view","GoalController@assignGoalView")->name("assign.goal.view")->middleware("userResourcesChecking");

        // routes for assigning users
        Route::post("assign-users","UserController@assignUsers")->name("user.assigned");
        // routes for update assign users
        Route::get("assignedUsers/{functionalityId}","UserController@fetchCreatorIdByFunctionalityId");
        Route::put("update-assigned-users","UserController@updateAssignUsers")->name("update.user.assigned");

        //this route will fetch all the assigned permissions against one level
        Route::get("level-permission/{levelId}","LevelController@fetchPermissions")->name("level.permission");
        // special route for assigning level to permission
        Route::post("assign-level-permission/{levelId}","LevelController@assign")->name("assign.level.permission");
        // this route will update the permission against a level update permission
        Route::put("update-permission/{levelId}","LevelController@updateAssignedPermission")->name("update.level.permission");

        //Route::get("show-goal-data/{goal_datas}", "GoalDataController@showGoalData");

        //routes for populating strategy, kpi, goal tables against an id
        Route::get("strategies/{visionId}","StrategyController@populateStrategyTable");
        Route::get("kpis/{strategiesId}","KpiController@populateKpiTable");
        Route::get("goals/{kpiId}","GoalController@populateGoalTable");

        // fetching dates to restrict the user from creating strategy, kpi, goal
        // outside of the vision start date and end date
        Route::get("vision/{visionId}/date","VisionController@fetchVisionDate")->name("vision.date");
        Route::get("strategy/{strategyId}/date","StrategyController@fetchStrategyDate")->name("strategy.date");
        Route::get("kpi/{kpiId}/date","KpiController@fetchKpiDate")->name("kpi.date");
        Route::get("isExist/{strategyName}/{visionId}","StrategyController@isExist");
        Route::get("visionExist/{visionName}/{companyId}","VisionController@isExist");
        Route::get("kpiExist/{kpiName}/{strategyId}","KpiController@isExist");
        Route::get("goalExist/{goalName}/{kpiId}","GoalController@isExist");

        //Package payment view for backend
        Route::get('subscription','SubscriptionController@subscription')->name('subscription');
        Route::post('subscription', 'SubscriptionController@postSubscription')->name('post-subscription');
        //Invoices Routes
        Route::get('/invoices', 'InvoiceController@invoices')->name("invoices")->middleware("userResourcesChecking");
        Route::get('/invoice/{invoice_id}', 'InvoiceController@invoice')->middleware("userResourcesChecking");
        Route::get('invoice-generate', 'InvoiceController@generateInvoice')->name('create.invoice')->middleware("userResourcesChecking");
        Route::get('cancel-subscription/{subscription}', 'SubscriptionController@cancelSubscription')->name('cancel.subscription')->middleware("userResourcesChecking");
        Route::get('fetch-package/{package}', 'SubscriptionController@show')->middleware("userResourcesChecking");
        Route::get('company/subscription/verify/{company}',"SubscriptionController@verifyEmail")->middleware("userResourcesChecking");


        // this route is for fetching all goals and users against that goals
        Route::get("goal-details","GoalController@details")->name("goal.details")->middleware("userResourcesChecking");
        // this route will fetch goal data against a goal and user from goal data table
        Route::get("goal-user-details/{userId}/{goalId}","GoalDataController@goalDetailsByUserAndGoalId")->name("details.user.goal");
//        This route will search by date
        Route::get("goal-data-details/{date}","GoalDataController@fetchActivitiesByDate")->name("search.date");
//        this route is for approve or disapprove
        Route::post("data-approve","GoalDataController@approveOrDisapprove");
//        route for populate map
        Route::get("user-location/{userId}/{goalDataId}","GoalDataController@populateTheMap");
//        Blocking and unblocking users
        Route::get('block-user/{userId}/{goalDataId}', 'GoalDataController@blockUser');
        Route::get('block-user-list', 'GoalController@blockUserList')->name('block.user')->middleware("userResourcesChecking");
        Route::get('unblock/{userId}', 'GoalDataController@unblockUser')->name('unblock');

        // dashboard routes
        Route::get("vision-dashboard","DashboardController@visionDashboard")->name("vision.dashboard");
        Route::get("show-vision-dashboard","DashboardController@showVisionToDash")->name("getsinglekpi.dashboard");
        Route::get("strategy-dashboard","DashboardController@strategyDashboard")->name("strategy.dashboard");
        Route::get("show-strategy-dashboard","DashboardController@showStrategyToDash")->name("getsinglekpi.dashboard");
        Route::get("kpi-dashboard","DashboardController@kpiDashboard")->name("kpi.dashboard");
        Route::get("show-kpi-dashboard","DashboardController@showKpiToDash")->name("getsinglekpi.dashboard");
        Route::get("goal-dashboard","DashboardController@goalDashboard")->name("goal.dashboard");
        //Route::get("show-goals-kpi-dashboard","DashboardController@showgoals")->name("show.goal.dashboard");
        Route::get("show-goal-dashboard","DashboardController@showGoalToDash")->name("getsinglegoal.dashboard");
        Route::get("goal-data-dashboard","DashboardController@goalDataDashboard")->name("goals.data.dashboard");
        Route::get("show-goalData-dashboard","DashboardController@showGoalDataToDash")->name("goal.data.dashboard");
        Route::get("gd-data-performance","DashboardController@showGoalDataPerfromanceByDate")->name("goal.data.date.performance");
    });
});

Auth::routes();
$this->get('logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset.token');
























//company profile update and view
//Route::get('company/{id}/show',"CompanyController@show");
//Route::get('company/{company}/edit',"CompanyController@edit");
//Route::post('company/{company}/edit',"CompanyController@update")->name('update-company');

// Company Email Verification on Payment Time


//Route::get('change-password',"CompanyController@ChangePassword");
//Route::post('change-password',"CompanyController@store")->name('change-password');

// admin
//Route::get('admin', function () {
//    return view('admin.index');
//});

// admin
//Route::get('super-admin', function () {
//    return view('superAdmin.index');
//});

// Routes for package

// package view
//Route::get('package', function () {
//    return view('superAdmin.create');
//});

// payment view for frontend
//Route::get('payment', function () {
//    return view('vision.payment');
//})->name("payment");

////payment view for backend
//Route::get('payment-admin', 'InvoiceController@getInvoices')->name("payment.admin");

 //Authentication Routes...
//$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
//$this->post('login', 'Auth\LoginController@login');
//$this->get('logout', 'Auth\LoginController@logout')->name('logout');

//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register')->name('register');
//
//Route::post('RegisterCompany', 'Auth\RegisterController@RegisterCompany')->name('RegisterCompany');

// Email verification
//Route::get('verify-email','Auth\RegisterController@verifyEmail')->name('verify-email');
//Route::get('active-account','HomeController@activation')->name('active-account');
//Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sentEmail')->name('sentEmail');


//// route for assign users
//Route::post("assign-users","UserController@assignUsers")->name("user.assigned");
//// route for update assign users
//Route::get("assignedUsers/{functionalityId}","UserController@fetchCreatorIdByFunctionalityId")->name("assign.users");
//Route::put("update-assigned-users","UserController@updateAssignUsers")->name("update.user.assigned");
// Routes for Strategy
//Route::resource("strategy","StrategyController");
// Route for fetching all strategies against a vision id
//Route::get("strategies/{visionId}","StrategyController@populateStrategyTable");
//Route::get("strategy-dashboard","StrategyController@dashboard")->name("strategy.dashboard");
// route for assign strategy view
//Route::get("assign-strategy-view","StrategyController@assignStrategyView")->name("assign.strategy.view");
//// fetching vision date to restrict the user from creating strategy outside of the vision startdate and enddate
//Route::get("vision/{visionId}/date","VisionController@fetchVisionDate")->name("vision.date");
// Routes for level
//Route::resource("level","LevelController");
////this route will fetch all the assigned permissions against one level
//Route::get("level-permission/{levelId}","LevelController@fetchPermissions")->name("level.permission");
//// special route for assigning level to permission
//Route::post("assign-level-permission/{levelId}","LevelController@assign")->name("assign.level.permission");
//// update permission
//Route::put("update-permission/{levelId}","LevelController@updateAssignedPermission")->name("update.level.permission");
//// Route for Permissions
//Route::resource("permission","PermissionController");
//// Route for Resource
//Route::resource("resource","ResourceController");
//Route::get('index', 'HomeController@index');
//Route::get('about', 'HomeController@about');
//Route::get('profile', 'HomeController@profile');
//Route::get('contact', 'HomeController@contact');
/*Route::get('contact', 'MailController@store')->name('sendMessage');*/
//Route::get('plans', 'HomeController@plans');
//Route::get('login', 'Auth\LoginController@showLoginForm');
//Route::get('register', 'HomeController@register');
// vision
//Route::resource('vision','VisionController');
// KPI
//Route::get('kpi', function () {
//    return view('kpi.index');
//});
//Route::get("kpi-dashboard","KpiController@dashboard")->name("kpi.dashboard");
// Goal
//Route::get('goal', function () {
//    return view('goal.index');
//});

//// Goal
//Route::get('goal-data', function () {
//    return view('goalData.index');
//});

//Route::resource('package', 'PackageController');
//Route::resource('company', 'CompanyController');
//Route::resource("kpi","KpiController");
// KPI Resourse (ALl Routes)
//Route::resource("kpi","KpiController");
//Route::get("kpis/{strategiesId}","KpiController@populateKpiTable");
//Route::get("strategy/{strategyId}/date","StrategyController@fetchStrategyDate")->name("strategy.date");
//User Routes
//Route::resource('user','UserController',["middleware"=>"auth"]);
//
//Route::resource('company','CompanyController');
//
////Goal Routes
//Route::resource('goal','GoalController');
// route for assign vision view
//Route::get("assign-vision-view","VisionController@assignVisionView")->name("assign.vision.view");
//// route for assign kpi view
//Route::get("assign-kpi-view","KpiController@assignKpiView")->name("assign.kpi.view");
//// route for assign goal view
//Route::get("assign-goal-view","GoalController@assignGoalView")->name("assign.goal.view");

//Routes for goal-data
//Route::resource("goal-data","GoalDataController");
Route::get('laracharts', 'DashboardController@getLaraChart');
Route::put('userUpdate/{id}', 'UserController@userUpdate')->name('profile.update');
Route::put('company-disable/{id}', 'SuperAdminController@disableCompany');
Route::put('company-enable/{id}', 'SuperAdminController@enableCompany');
Route::get('vision-detail/{id}','VisionController@detailShow');
Route::get('kpi-detail/{id}','KpiController@detailShow');
Route::get('user-detail/{id}' , 'UserController@userDetail')->name('user.detail');


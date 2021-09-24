<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return 'API_V2 CONFIRM8 🧟‍♂️ | 🧑‍💻';
});
    $router -> group(['prefix' => 'v2'], function () use ($router) {

    //ROUTE LOGIN
    $router ->group(['prefix' => 'auth'], function () use ($router){
        $router -> post('/', 'AuthController@login');
        //$router -> post('/register', 'AuthController@store');
    });

    //ROUTE USERS
    $router ->group(['prefix' => 'users'], function () use ($router){

        $router -> get('/', 'UserController@index');
        $router -> get('/{users_id}', 'UserController@show');
        $router -> post('/', 'UserController@store');
        $router -> put('/{users_id}', 'UserController@update');
        $router -> delete('/{users_id}', 'UserController@destroy');
    });

    //ROUTE CLIENTS
    $router ->group(['prefix' => 'clients'], function () use ($router){

        $router -> get('/', 'ClientController@index');
        $router -> get('/{client_id}', 'ClientController@show');
        $router -> post('/', 'ClientController@store');
        $router -> put('/{client_id}', 'ClientController@update');
        $router -> delete('/{client_id}', 'ClientController@destroy');
    });

    //ROUTE EMPLOYEES
    $router ->group(['prefix' => 'employees'], function () use ($router){

        $router -> get('/', 'EmployeeController@index');
        $router -> get('/{employee_id}', 'EmployeeController@show');
        $router -> post('/', 'EmployeeController@store');
        $router -> put('/{employee_id}', 'EmployeeController@update');
        $router -> delete('/{employee_id}', 'EmployeeController@destroy');
    });

    //ROUTE TASKS
    $router ->group(['prefix' => 'tasks'], function () use ($router){

        $router -> get('/', 'TaskController@index');
        $router -> get('/{task_id}', 'TaskController@show');
        $router -> post('/', 'TaskController@store');
        $router -> put('/{task_id}', 'TaskController@update');
        $router -> delete('/{task_id}', 'TaskController@destroy');
    });

        //ROUTE ACTIVITIES
        $router ->group(['prefix' => 'activities'], function () use ($router){

            $router -> get('/', 'ActivityController@index');
            $router -> get('/{activity_id}', 'ActivityController@show');
            $router -> post('/', 'ActivityController@store');
            $router -> put('/{activity_id}', 'ActivityController@update');
            $router -> delete('/{activity_id}', 'ActivityController@destroy');
        });
    });




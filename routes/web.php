<?php

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

$router->get('/reports', 'ReportController@index');
$router->post('/reports', 'ReportController@store');
$router->get('/reports/{report}', 'ReportController@show');
$router->put('/reports/{report}', 'ReportController@update');
$router->patch('/reports/{report}', 'ReportController@update');
$router->delete('/reports/{report}', 'ReportController@destroy');


$router->get('/fields', 'ReportFieldController@index');
$router->post('/fields', 'ReportFieldController@store');
$router->get('/reportfields/{reportType}', 'ReportFieldController@fieldsReport');
$router->get('/fields/{reportField}', 'ReportFieldController@show');
$router->put('/fields/{reportField}', 'ReportFieldController@update');
$router->patch('/fields/{reportField}', 'ReportFieldController@update');
$router->delete('/fields/{reportField}', 'ReportFieldController@destroy');

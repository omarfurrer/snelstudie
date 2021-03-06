<?php

/*
  |--------------------------------------------------------------------------
  | Ajax Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register ajax routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | contains the "ajax" middleware group. Now create something great!
  |
 */

Route::prefix('admin')->namespace('Api\Admin')->middleware('auth', 'role:admin')->group(function () {
    Route::apiResource('cities_variables.cities_variable_rules', 'CitiesVariableRulesController');
    Route::get('cities', 'CitiesController@index');
});


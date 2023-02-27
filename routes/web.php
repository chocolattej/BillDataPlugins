<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['prefix' => 'billdataPlugins' , 'namespace' => 'App\Plugins\BillDataPlugins\Controllers'],function() {
    Route::get('/', 'BillDataPluginsController@Index');
    Route::get('/search','BillDataPluginsController@search');
    Route::post('/autocompleteSearch','BillDataPluginsController@autocompleteSearch');
    Route::post('/showdata','BillDataPluginsController@showdata');
    Route::post('/exports','BillDataPluginsController@exports');

    Route::group(['prefix' => 'js'],function() {
        Route::get('datetimelinked.js',function() {
            $contents = file_get_contents(__DIR__.'/../resources/js/datetimelinked.js');
            return response($contents)->header('Content-Type', 'application/javascript');
        })->name('datetimelinked.js');
        Route::get('scrollbar.js',function() {
            $contents = file_get_contents(__DIR__.'/../resources/js/scrollbar.js');
            return response($contents)->header('Content-Type', 'application/javascript');
        })->name('scrollbar.js');
        Route::get('search.js',function() {
            $contents = file_get_contents(__DIR__.'/../resources/js/search.js');
            return response($contents)->header('Content-Type', 'application/javascript');
        })->name('search.js');
        Route::get('showdata.js',function() {
            $contents = file_get_contents(__DIR__.'/../resources/js/showdata.js');
            return response($contents)->header('Content-Type', 'application/javascript');
        })->name('showdata.js');
        Route::get('exports.js',function() {
            $contents = file_get_contents(__DIR__.'/../resources/js/exports.js');
            return response($contents)->header('Content-Type', 'application/javascript');
        })->name('exports.js');
    });

    Route::group(['prefix' => 'css'],function() {
        Route::get('style.css',function () {
            $contents = file_get_contents(__DIR__.'/../resources/css/style.css');
            return response($contents)->header('Content-Type', 'text/css');
        })->name('style.css');
    });
});
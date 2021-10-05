<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'index')->middleware('auth');

Route::get('/dashboard','DashboardController@index')
    ->name('dashboard.index')
    ->middleware('auth');

Route::get('/login', 'LoginController@show')->name('login');
Route::post('/login', 'LoginController@login')->name('login.login');

Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.', 'middleware' => 'auth'], function(){
    // all admins routes
    Route::group(['prefix' => 'admins', 'as' => 'admins.'], function(){
        Route::get('/','AdminsController@index')->name('index');
        Route::get('/datatable','AdminsController@datatable')->name('datatable');
        Route::get('/create','AdminsController@create')->name('create');
        Route::post('/','AdminsController@store')->name('store');
        Route::get('/{admin}/edit','AdminsController@edit')->name('edit');
        Route::put('/{admin}/update','AdminsController@update')->name('update');
        Route::get('/{admin}/delete','AdminsController@delete')->name('delete');
    });

    // all users routes
    Route::group(['prefix' => 'users', 'as' => 'users.'], function(){
        Route::get('/', 'UsersController@index')->name('index');
        Route::get('/datatable', 'UsersController@datatable')->name('datatable');
        Route::get('/create','UsersController@create')->name('create');
        Route::post('/','UsersController@store')->name('store');
        Route::get('/{user}/edit','UsersController@edit')->name('edit');
        Route::put('/{user}/update','UsersController@update')->name('update');
        Route::get('/{user}/delete','UsersController@delete')->name('delete');
    });
    // all brands routes
    Route::group(['prefix'=> 'brands' , 'as' => 'brands.'], function (){
        Route::get('/', 'BrandsController@index')->name('index');
        Route::get('/datatable', 'BrandsController@datatable')->name('datatable');
        Route::get('/create', 'BrandsController@create')->name('create');
        Route::post('/','BrandsController@store')->name('store');
        Route::get('/{brand}/edit','BrandsController@edit')->name('edit');
        Route::put('/{brand}/update','BrandsController@update')->name('update');
        Route::get('/{brand}/delete','BrandsController@delete')->name('delete');
    });
    //all categories routes
    Route::group(['prefix' => 'categories','as' =>'categories.'],function (){
        Route::get('/','CategoriesController@index')->name('index');
        Route::get('/datatable','CategoriesController@datatable')->name('datatable');
        Route::get('/create','CategoriesController@create')->name('create');
        Route::post('/','CategoriesController@store')->name('store');
        Route::get('/{category}/edit','CategoriesController@edit')->name('edit');
        Route::put('/{category}/update','CategoriesController@update')->name('update');
        Route::get('/{category}/delete','CategoriesController@delete')->name('delete');

    });
    //all products routes
    Route::group(['prefix'=>'products','as'=>'products.'],function (){
        Route::get('/', 'ProductsController@index')->name('index');
        Route::get('/datatable', 'ProductsController@datatable')->name('datatable');
        Route::get('/create', 'ProductsController@create')->name('create');
        Route::post('/','ProductsController@store')->name('store');
        Route::get('/{product}/edit','ProductsController@edit')->name('edit');
        Route::put('/{product}/update','ProductsController@update')->name('update');
        Route::get('/{product}/delete','ProductsController@delete')->name('delete');
    });

    //all provinces routes
    Route::group(['prefix'=>'provinces','as'=>'provinces.'],function (){
        Route::get('/', 'ProvincesController@index')->name('index');
        Route::get('/datatable', 'ProvincesController@datatable')->name('datatable');
        Route::get('/create', 'ProvincesController@create')->name('create');
        Route::post('/','ProvincesController@store')->name('store');
        Route::get('/{province}/edit','ProvincesController@edit')->name('edit');
        Route::put('/{province}/update','ProvincesController@update')->name('update');
        Route::get('/{province}/delete','ProvincesController@delete')->name('delete');
    });

    //all cities routes
    Route::group(['prefix'=>'cities','as'=>'cities.'],function (){
        Route::get('/', 'CitiesController@index')->name('index');
        Route::get('/datatable', 'CitiesController@datatable')->name('datatable');
        Route::get('/create', 'CitiesController@create')->name('create');
        Route::post('/','CitiesController@store')->name('store');
        Route::get('/{city}/edit','CitiesController@edit')->name('edit');
        Route::put('/{city}/update','CitiesController@update')->name('update');
        Route::get('/{city}/delete','CitiesController@delete')->name('delete');
    });
});

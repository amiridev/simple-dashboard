<?php

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->as('api.')->namespace('Api')->group(function(){
    Route::prefix('auth')->as('auth.')->group(function (){
        Route::post('/login', 'ApiAuthController@login')->name('login');
        Route::post('/register', 'ApiAuthController@register')->name('register');
        Route::post('/user', 'ApiAuthController@userInfo')->name('user')->middleware(['auth:api']);
    });

    Route::prefix('brands')->as('brands.')->group(function (){
        // url => localhost:8000/api/v1/brands
        // name => api.brands.index
        Route::get('/', 'ApiBrandsController@index')->name('index');
        Route::get('/{brand}/show', 'ApiBrandsController@show')->name('show');
    });

//    Route::prefix('categories')->as('categories.')->group(function (){
//        // url => localhost:8000/api/v1/categories
//        // name => api.categories.index
//        Route::get('/', 'ApiCategoriesController@index')->name('index');
//    });
    Route::prefix('categories')->as('categories.')->group(function (){
        Route::get('/','ApiCategoriesController@index')->name('index');
        Route::get('/{category}/show','ApiCategoriesController@show')->name('show');
    });

    Route::prefix('products')->as('products.')->group(function (){
        Route::get('/','ApiProductsController@index')->name('index');
        Route::get('/{product}/show','ApiProductsController@show')->name('show');
    });
});

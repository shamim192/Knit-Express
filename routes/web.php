<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes(['verify' => true, 'register' => false]);

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('profile', 'ProfileController@index')->name('profile');
    Route::post('profile', 'ProfileController@update');
    Route::get('profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/password', 'ProfileController@passwordUpdate');

    Route::resource('users', 'UserController');
    Route::resource('teams', 'TeamController');
    Route::resource('slides', 'SlideController');
    Route::resource('clients', 'ClientController');
    Route::resource('partners', 'PartnerController');
    Route::resource('galleries', 'GalleryController');
    Route::resource('news', 'NewsController');
    Route::resource('categories', 'CategoryController');

    Route::post('products/image-destroy', 'ProductController@destroyImage')->name('products.image-destroy');
    Route::resource('products', 'ProductController');
    Route::resource('swatch-card', 'SwatchCardController');
    Route::resource('contacts', 'ContactController');
    Route::resource('admin-home', 'HomeSEOController');
});

Route::group(['namespace' => 'App\Http\Controllers\Frontend'], function () {
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/about-us', 'HomeController@aboutUs')->name('about-us');
    Route::get('/gallery', 'GalleryController@index')->name('gallery');
    Route::get('/news-front', 'NewsController@index')->name('news-front');
    Route::get('/news-front-details/{id}', 'NewsController@newsDetails')->name('news-front-details');

    Route::get('/category', 'ProductController@index')->name('category');

    Route::get('/product/{slug}', 'ProductController@products')->name('product');
    Route::get('/product-details/{slug}', 'ProductController@productDetails')->name('product-details');
    Route::get('/contact', 'ContactController@index')->name('contact');
    Route::post('/contact-store', 'ContactController@store')->name('contact-store');

    Route::get('/blog','BlogController@index')->name('blog');
    Route::get('/blog-details/{id}','BlogController@blogDetails')->name('blog-details');

    Route::get('/download-client-list', 'ProjectController@downloadClientList')->name('download-client-list');
    Route::get('/download-product/{name}', 'ProductController@download')->name('download-product');
    Route::get('/pdf/{slug}', 'ProductController@pdf')->name('pdf');

});

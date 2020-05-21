<?php

Route::group(['namespace'=>'Frontend'], function () {
    Route::get('/', ['uses' => 'HomeController@index'])->name('home');
    Route::get('{slug}-ns{id}.html', 'NewController@newCategory')->where(['slug'=>'[a-zA-Z0-9-_]+','id'=>'[0-9]+'])->name('new.category');
    Route::get('{slug}-de{id}.html', 'NewController@detailNews')->where(['slug'=>'[a-zA-Z0-9-_]+','id'=>'[0-9]+'])->name('detail.news');
    Route::get('search', 'NewController@search')->name('search');
    Route::get('login', 'LoginController@login')->name('login');
    Route::post('login', 'LoginController@postLogin')->name('postLogin');
    Route::get('register', 'RegisterController@register')->name('register');
    Route::post('register', 'RegisterController@postRegister')->name('postRegister');
    Route::get('user_logout', 'LoginController@logoutUser')->name('user.logout');
});
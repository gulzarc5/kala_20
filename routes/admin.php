<?php

Route::group(['namespace' => 'Admin', 'prefix'=>'admin'],function(){
    Route::get('login','LoginController@showAdminLoginForm')->name('admin.login_form');    
    Route::post('login', 'LoginController@adminLogin')->name('admin.login');    
    Route::post('logout', 'LoginController@logout')->name('admin.logout');

    Route::group(['middleware'=>'auth:admin'],function(){
        Route::get('/dashboard', 'DashboardController@index')->name('admin.deshboard');
        Route::post('add/user', 'UserController@addUser')->name('admin.add_user');
        
        Route::get('user/status/{user_id}/{status}', 'UserController@updateStatus')->name('admin.update_status');
        Route::get('category/list/', 'CategoryController@categoryList')->name('admin.category_list');
    });
});
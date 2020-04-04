<?php

Route::auth();

Route::get('register/confirm/{token}','Auth\AuthController@confirmEmail');

Route::resource('banners','BannersController');

Route::get('{zip}/{street}','BannersController@show');

Route::post('{zip}/{street}/photos','BannersController@addPhotos')->name('store_photo');

Route::delete('/photos/{id}','PhotoController@destroy')->name('photo_delete');

Route::get('/','PagesController@home');

Route::any('email','EmailController@sendMail');







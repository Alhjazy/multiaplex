<?php

Route::group(['namespace' => 'Employee'], function() {
    Route::get('/', 'HomeController@index')->name('employee.dashboard');

    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('employee.login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('employee.logout');

    // Register
    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('employee.register');
    Route::post('register', 'Auth\RegisterController@register');

    // Passwords
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('employee.password.email');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset');
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('employee.password.request');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('employee.password.reset');

    // Must verify email
    Route::get('email/resend','Auth\VerificationController@resend')->name('employee.verification.resend');
    Route::get('email/verify','Auth\VerificationController@show')->name('employee.verification.notice');
    Route::get('email/verify/{id}','Auth\VerificationController@verify')->name('employee.verification.verify');

});
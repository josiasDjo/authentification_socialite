<?php

use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login{provider}', function($provider) {
    return Socialite::driver($provider)->redirect();
}) -> name('social.login');

Route::get('/login{provider}/callback', function($provider) {
    $user = Socialite::driver($provider)->user();
    return $user;
});

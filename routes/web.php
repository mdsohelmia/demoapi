<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('home',function (){
    return inertia('Welcome',[
        'title'=>'Welcome'
    ]);
});

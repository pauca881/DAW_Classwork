<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
    });
    
Route::get('/holamundo', function () {
    return view('app');
    });
    
Route::get('/holatodos', function () {
    return 'hola a toos';
    });

Route::get('/index', function () {
    return view('index');
    });
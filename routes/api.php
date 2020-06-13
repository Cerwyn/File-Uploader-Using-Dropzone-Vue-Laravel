<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/files', 'FileController@store');
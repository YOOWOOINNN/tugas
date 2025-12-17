<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DictionaryController;

Route::get('/', [DictionaryController::class, 'index']);

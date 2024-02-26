<?php

use Codecrewinfotech\FormBuilder\Http\Controllers\formBuilderController;
use Illuminate\Support\Facades\Route;

Route::get('form-builder',[formBuilderController::class,'index']);
Route::post('save-form',[formBuilderController::class,'saveForm'])->name('save-form');
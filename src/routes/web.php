<?php

use Codecrewinfotech\FormBuilder\Http\Controllers\formBuilderController;
use Illuminate\Support\Facades\Route;

Route::get('form-builder', [formBuilderController::class, 'index']);
Route::get('form-listing', [formBuilderController::class, 'formListing'])->name('formlisting');
Route::post('save-form', [formBuilderController::class, 'saveForm'])->name('save-form');
Route::post('/form-design', [formBuilderController::class, 'formDesign'])->name('form-design');


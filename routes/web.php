<?php

use App\Http\Controllers\TransactionController;

Route::get('/', [TransactionController::class, 'index']);
Route::post('/transactions', [TransactionController::class, 'store']);

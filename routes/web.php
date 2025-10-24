<?php

use Illuminate\Support\Facades\Route;

Route::get('verified-document/{id}', [\App\Http\Controllers\VerifiedDocumentController::class, 'show'])->name('verified.document.show');

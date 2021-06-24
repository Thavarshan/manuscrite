<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Contracts\Documents\Documentator;
use App\Http\Controllers\DocumentationController;

// Landing Page...
Route::get('/', function (Documentator $document) {
    return Inertia::render('Welcome/Show', [
        'content' => $document->make('index'),
    ]);
})->name('welcome');

// Documentation Pages...
Route::get('/docs/{category}/{page?}', [DocumentationController::class, '__invoke'])->name('docs.show');

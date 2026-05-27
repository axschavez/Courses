<?php

use App\Models\Course;
use App\Livewire\Courses\Index;
use App\Livewire\Courses\Create;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('courses', Index::class)->name('courses.index');
    Route::get('courses/create', Create::class)->name('courses.create');
});

require __DIR__.'/settings.php';

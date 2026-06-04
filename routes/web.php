<?php

use App\Livewire\Courses\Update;
use App\Models\Course;
use App\Livewire\Courses\Index;
use App\Livewire\Courses\Create;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::get('courses', Index::class)->name('courses.index');
    Route::get('courses/create', Create::class)->name('courses.create');
    Route::get('courses/{{course}}/edit', Update::class)->name('courses.edit');
});

require __DIR__.'/settings.php';

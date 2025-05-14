<?php

use App\Livewire\{UserForm, UserList};
use Illuminate\Support\Facades\Route;

Route::get('/', UserList::class)->name('user.index');

Route::get('/user/create', UserForm::class)->name('user.create');

Route::get('/user/{userId}/edit', UserForm::class)->name('user.edit');

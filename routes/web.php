<?php

use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PageController as WelcomePageController;
use App\Http\Controllers\User\ChecklistController as UserChecklistController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('welcome', [WelcomePageController::class, 'welcome'])->name('welcome');
    Route::get('consultation', [WelcomePageController::class, 'consultation'])->name('consultation');
    Route::get('checklists/{checklist}', [UserChecklistController::class, 'show'])->name('user.checklists.show');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function () {

        Route::resource('pages', PageController::class);

        Route::resource('checklist_groups', ChecklistGroupController::class);

        Route::resource('checklist_groups.checklists', ChecklistController::class);

        Route::resource('checklists.tasks', TaskController::class);

        Route::resource('pages', PageController::class)->only(['edit', 'update']);

        Route::resource('users', UserController::class);
    });
});

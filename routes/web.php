<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\UserCrudController;
use App\Http\Controllers\Manager\ManagerController;
use App\Http\Controllers\Manager\ManagerProjectController;
use App\Http\Controllers\Manager\TaskListController;
use App\Http\Controllers\Member\MemberController;
use App\Http\Controllers\Owner\OwnerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/users',[UserCrudController::class, 'index'])->name('admin.users');
    Route::get('/admin/add-user',[UserCrudController::class, 'create'])->name('admin.create');
    Route::post('/admin/store-user',[UserCrudController::class, 'store'])->name('admin.store');
    Route::get('/admin/users/view-data/{id}',[UserCrudController::class, 'info'])->name('admin.view');
    Route::get('/admin/users/edit-data/{id}',[UserCrudController::class, 'edit'])->name('admin.edit');

    //project route

    Route::get('/admin/projects/create-project',[ProjectController::class,'create'])->name('admin.create-project');
    Route::post('/admin/projects/store-project',[ProjectController::class,'store'])->name('admin.store-project');
    Route::get('/admin/projects/view-projects',[ProjectController::class,'index'])->name('admin.view-projects');
    Route::get('/admin/projects/view-details/{id}',[ProjectController::class,'view']);
});

//owner routes
Route::middleware(['auth', 'isOwner'])->group(function () {
    Route::get('/owner/dashboard', [OwnerController::class, 'dashboard'])->name('owner.dashboard');
});

//member routes
Route::middleware(['auth', 'isMember'])->group(function () {
    Route::get('/member/dashboard', [MemberController::class, 'dashboard'])->name('member.dashboard');
});

//manager routes
Route::middleware(['auth', 'isManager'])->group(function () {
    Route::get('/manager/dashboard', [ManagerController::class, 'dashboard'])->name('manager.dashboard');
    Route::get('/manager/projects/project-list',[ManagerProjectController::class, 'projects'])->name('manager.project-list');
    Route::get('/manager/projects/view-project-details/{id}',[ManagerProjectController::class,'view'])->name('manager.project-details');
    Route::get('/manager/task/task-list',[TaskListController::class, 'tasks'])->name('manager.task-list');
    Route::post('/manager/projects/add-task',[TaskListController::class, 'create'])->name('manager.add-task');
    Route::get('/manager/projects/retrieve-task/{id}', [TaskListController::class, 'retrieve'])->name('manager.retrieve-task');
    Route::post('/manager/projects/update-task', [TaskListController::class, 'update'])->name('manager.update-task');
});

<?php

use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Account\AccountEditController;
use App\Http\Controllers\Account\AccountProjectController;
use App\Http\Controllers\Account\AccountProjectCreateController;
use App\Http\Controllers\Account\AccountProjectEditController;
use App\Http\Controllers\Account\AccountProjectRequirementController;
use App\Http\Controllers\Account\AccountProjectRequirementCreateController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Controllers\Admin\AdminProjectEditController;
use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\UserCreateController;
use App\Http\Controllers\Admin\UserEditController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\Technical\TechnicalProjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Technical\TechnicalRequirementController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    Route::get('/admin/organization', [OrganizationController::class, 'index'])
        ->name('organization');
    Route::put('/admin/organization/{organization}/accepted', [OrganizationController::class, 'accepted'])
        ->name('admin.organization.accepted');
    Route::put('/admin/organization/{organization}/rejected', [OrganizationController::class, 'rejected'])
        ->name('admin.organization.rejected');
    Route::put('/admin/organization/{organization}/cancelled', [OrganizationController::class, 'cancelled'])
        ->name('admin.organization.cancelled');
    Route::put('/admin/organization/{organization}/active', [OrganizationController::class, 'active'])
        ->name('admin.organization.active');
    Route::get('/admin/project', [AdminProjectController::class, 'index'])
        ->name('admin.project');
    Route::get('/admin/project/{project}', [AdminProjectEditController::class, 'index'])
        ->name('admin.project-edit');
    Route::post('/admin/project/{project}', [AdminProjectEditController::class, 'update'])
        ->name('admin.project.update');
    Route::post('/admin/project/{project}/addOrganization', [AdminProjectEditController::class, 'addOrganization'])
        ->name('admin.project.addOrganization');
    Route::post('/admin/project/{project}/{id}/removeOrganization',
        [AdminProjectEditController::class, 'removeOrganization'])
        ->name('admin.project.removeOrganization');
#user
    Route::get('/admin/user', [UserController::class, 'index'])
        ->name('admin.user');
    Route::get('/admin/user/create', [UserCreateController::class, 'index'])
        ->name('admin.user.create');
    Route::post('/admin/user', [UserCreateController::class, 'store'])
        ->name('admin.user.store');
    Route::get('/admin/user/{user}', [UserEditController::class, 'index'])
        ->name('admin.user.edit');
    Route::post('/admin/user/{user}', [UserEditController::class, 'update'])
        ->name('admin.user.update');
    Route::post('/admin/user/{user}/password', [UserEditController::class, 'changePassword'])
        ->name('admin.user.password');
#account
    Route::get('/account/{user}', [AccountController::class, 'index'])
        ->name('account');
    Route::get('/account/{user}/edit', [AccountEditController::class, 'index'])
        ->name('account.edit');
    Route::post('/account/{user}/personal', [AccountEditController::class, 'updatePersonalSettings'])
        ->name('account.personal.edit');
    Route::post('/account/{user}/organization', [AccountEditController::class, 'updateOrganization'])
        ->name('account.organization.edit');
    Route::get('/account/{user}/projects', [AccountProjectController::class, 'index'])
        ->name('account.projects');
    Route::get('/account/projects/create', [AccountProjectCreateController::class, 'index'])
        ->name('account.projects.create');
    Route::post('/account/projects/create', [AccountProjectCreateController::class, 'store'])
        ->name('account.projects.create');
    Route::get('/account/projects/{project}/edit', [AccountProjectEditController::class, 'index'])
        ->name('account.projects.edit');
    Route::post('/account/projects/{project}/edit', [AccountProjectEditController::class, 'update'])
        ->name('account.projects.update');

    Route::get('/account/projects/{project}/requirement',
        [AccountProjectRequirementController::class, 'index'])
        ->name('account-project-requirement');
    Route::get('/account/projects/{project}/requirement/create',
        [AccountProjectRequirementCreateController::class, 'index'])
        ->name('account-project-requirement-create');
    Route::post('/account/projects/{project}/requirement',
        [AccountProjectRequirementCreateController::class, 'store'])
        ->name('account-project-requirement-create.store');

    #technical
    Route::get('/technical/projects', [TechnicalProjectController::class, 'index'])
        ->name('technical.project.index');
    Route::get('/technical/project/{project}', [TechnicalProjectController::class, 'ViewRequirements'])
        ->name('technical.project.requirement');

    Route::get('/technical/project/{requirement}/requirement/', [TechnicalProjectController::class, 'ViewRequirement'])
        ->name('technical.project.requirement.edit');

    Route::post('/technical/project/{requirement}/requirement/', [TechnicalRequirementController::class, 'update'])
        ->name('technical.project.requirement.update');

    Route::post('/technical/project/upload', [TechnicalRequirementController::class, 'upload'])
        ->name('technical.project.requirement.upload');
    Route::get('/technical/project/{requirement}/requirement/download',
        [TechnicalRequirementController::class, 'download'])
        ->name('technical.project.requirement.download');
});

Route::get('/', [IndexController::class, 'index'])->name('index');

#register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

#login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LogoutController::class, 'store'])->name('logout.store');

#admin

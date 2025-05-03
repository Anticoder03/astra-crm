<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvestmentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PoliciesController;
use App\Http\Controllers\FollowupsController;
use App\Http\Controllers\AnalyticsController;
// Removed duplicate import of FormController
use App\Http\Controllers\CustomerEmailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group
| which contains the "web" middleware group.
|
*/

Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
// Customers Resource Routes
Route::resource('customers', CustomerController::class);

// Investments Resource Routes
Route::resource('investments', InvestmentsController::class);

Route::resource('policies', PoliciesController::class);

Route::resource('followups', FollowupsController::class);

Route::get('/analytics', [AnalyticsController::class, 'index'])->name('analytics.index');


Route::get('/send-email-to-customers', [CustomerEmailController::class, 'sendEmailToAllCustomers']);



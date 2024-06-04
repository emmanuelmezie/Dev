<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Livewire\HomePageComponent;
use App\Livewire\SingleNewsComponent;
use App\Livewire\Auth\LoginComponent;
use App\Livewire\Auth\RegisterComponent;
use App\Livewire\AnnouncementsComponent;

use App\Http\Middleware\AdminAuth;

use App\Livewire\Admin\AdminDashboardComponent;
use App\Livewire\Admin\AdminNewsComponent;
use App\Livewire\Admin\AdminSingleBlogNewsComponent;
use App\Livewire\Admin\AdminExperiencesComponent;
use App\Livewire\Admin\AdminPortfolioComponent;


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

Route::get('/', HomePageComponent::class)->name('index');;
Route::get('/login', LoginComponent::class)->name('login');
Route::get('/0~/en/get-started', RegisterComponent::class)->name('get-started');
Route::get('/en-news/{category_name}/{blog_id}', SingleNewsComponent::class)->name('singlenews');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Admin Routes
Route::middleware([AdminAuth::class])->group(function () {
    Route::get('/0/admin/dashboard', AdminDashboardComponent::class)->name('admindashboard');
    Route::get('/0/admin/news-module', AdminNewsComponent::class)->name('adminnews');
    Route::get('/0/admin/blog-news/{blog_id}', AdminSingleBlogNewsComponent::class)->name('adminsingleblognews');
    Route::get('/0/admin/experience', AdminExperiencesComponent::class)->name('adminexperience');
    Route::get('/0/admin/portfolios', AdminPortfolioComponent::class)->name('adminportfolios');
});
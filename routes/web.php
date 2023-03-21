<?php

use Illuminate\Support\Facades\Route;

// Middlewares
use App\Http\Middleware\BackendAuth;
use App\Http\Middleware\GuestOnly;
use App\Http\Middleware\AdministratorOnly;
use App\Http\Middleware\CandidateOnly;
use App\Http\Middleware\RequireGlobalCompanyId;
use App\Http\Middleware\RequireLogin;

// Frontend Controllers
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\AuthController as FrontendAuthController;
use App\Http\Controllers\Frontend\OfferController as FrontendOfferController;
use App\Http\Controllers\Frontend\QuickOfferController as FrontendQuickOfferController;
use App\Http\Controllers\Frontend\CandidateController as FrontendCandidateController;
use App\Http\Controllers\Frontend\ProfileController as FrontendProfileController;

// Backend Controllers
use App\Http\Controllers\Backend\AuthController as BackendAuthController;
use App\Http\Controllers\Backend\DashboardController as BackendDashboardController;
use App\Http\Controllers\Backend\CandidateController as BackendCandidateController;
use App\Http\Controllers\Backend\OfferController as BackendOfferController;
use App\Http\Controllers\Backend\QuickOfferController as BackendQuickOfferController;
use App\Http\Controllers\Backend\ApplicationController as BackendApplicationController;
use App\Http\Controllers\Backend\CompanyController as BackendCompanyController;
use App\Http\Controllers\Backend\UserController as BackendUserController;

// Frontend
Route::name('frontend.')->group(function () {

	Route::middleware([CandidateOnly::class])->group(function () {

		// Home
		Route::get('/', [FrontendHomeController::class, 'index'])->name('home.index');

		// Offers
		Route::get('/offers', [FrontendOfferController::class, 'index'])->name('offers.index');
		Route::get('/offers/{offer}', [FrontendOfferController::class, 'show'])->name('offers.show');
		Route::post('/offers/{offer}/store-application', [FrontendOfferController::class, 'storeApplication'])->name('offers.store_application');

		// Quick Offers
		Route::get('/quick-offers', [FrontendQuickOfferController::class, 'index'])->name('quick_offers.index');

		// Candidates
		Route::get('/candidates', [FrontendCandidateController::class, 'index'])->name('candidates.index');
		Route::get('/candidates/{candidate}', [FrontendCandidateController::class, 'show'])->name('candidates.show');

		// Auth
		Route::group(['middleware' => [GuestOnly::class]], function () {
			Route::get('/login', [FrontendAuthController::class, 'login'])->name('login');
			Route::post('/authenticate', [FrontendAuthController::class, 'authenticate'])->name('authenticate');
			Route::get('/register', [FrontendAuthController::class, 'register'])->name('register');
			Route::post('/create-account', [FrontendAuthController::class, 'createAccount'])->name('create_account');
		});

		Route::middleware([RequireLogin::class])->group(function () {
			Route::get('/profile', [FrontendProfileController::class, 'index'])->name('profile.index');
			Route::patch('/profile/update', [FrontendProfileController::class, 'update'])->name('profile.update');
			Route::patch('/profile/update-password', [FrontendProfileController::class, 'updatePassword'])->name('profile.update_password');
			Route::patch('/profile/update-resume', [FrontendProfileController::class, 'updateResume'])->name('profile.update_resume');
		});

		Route::post('/logout', [FrontendAuthController::class, 'logout'])->name('logout');

	});
});

// Backend
Route::group(['prefix' => 'backend'], function () {

	Route::name('backend.')->group(function () {

		Route::get('/login', [BackendAuthController::class, 'login'])->name('login');
		Route::post('/authenticate', [BackendAuthController::class, 'authenticate'])->name('authenticate');

		Route::middleware([BackendAuth::class])->group(function () {

			Route::get('/start-impersonation', [BackendAuthController::class, 'startImpersonation'])->name('start_impersonation');
			Route::get('/stop-impersonation', [BackendAuthController::class, 'stopImpersonation'])->name('stop_impersonation');
			Route::post('/logout', [BackendAuthController::class, 'logout'])->name('logout');

			// Dashboard
			Route::get('/', [BackendDashboardController::class, 'index'])->name('dashboard.index');

			// Candidates
			Route::group(['prefix' => 'candidates'], function () {
				Route::get('/', [BackendCandidateController::class, 'index'])->name('candidates.index');
				Route::get('/create', [BackendCandidateController::class, 'create'])->name('candidates.create');
				Route::post('/store', [BackendCandidateController::class, 'store'])->name('candidates.store');
				Route::get('/{candidate}', [BackendCandidateController::class, 'show'])->name('candidates.show');
				Route::get('/{candidate}/edit', [BackendCandidateController::class, 'edit'])->name('candidates.edit');
				Route::patch('/{candidate}/update', [BackendCandidateController::class, 'update'])->name('candidates.update');
				Route::delete('/{candidate}/delete', [BackendCandidateController::class, 'delete'])->name('candidates.delete');
			});

			// Offers
			Route::group(['prefix' => 'offers', 'middleware' => [RequireGlobalCompanyId::class]], function () {
				Route::get('/', [BackendOfferController::class, 'index'])->name('offers.index');
				Route::get('/create', [BackendOfferController::class, 'create'])->name('offers.create');
				Route::post('/store', [BackendOfferController::class, 'store'])->name('offers.store');
				Route::get('/{offer}', [BackendOfferController::class, 'show'])->name('offers.show');
				Route::get('/{offer}/edit', [BackendOfferController::class, 'edit'])->name('offers.edit');
				Route::patch('/{offer}/update', [BackendOfferController::class, 'update'])->name('offers.update');
				Route::delete('/{offer}/delete', [BackendOfferController::class, 'delete'])->name('offers.delete');
			});

			// Quick Offers
			Route::group(['prefix' => 'quick-offers', 'middleware' => [AdministratorOnly::class]], function () {
				Route::get('/', [BackendQuickOfferController::class, 'index'])->name('quick_offers.index');
				Route::get('/create', [BackendQuickOfferController::class, 'create'])->name('quick_offers.create');
				Route::post('/store', [BackendQuickOfferController::class, 'store'])->name('quick_offers.store');
				Route::get('/{quick_offer}', [BackendQuickOfferController::class, 'show'])->name('quick_offers.show');
				Route::get('/{quick_offer}/edit', [BackendQuickOfferController::class, 'edit'])->name('quick_offers.edit');
				Route::patch('/{quick_offer}/update', [BackendQuickOfferController::class, 'update'])->name('quick_offers.update');
				Route::delete('/{quick_offer}/delete', [BackendQuickOfferController::class, 'delete'])->name('quick_offers.delete');
			});

			// Applications
			Route::group(['prefix' => 'applications', 'middleware' => [RequireGlobalCompanyId::class]], function () {
				Route::get('/', [BackendApplicationController::class, 'index'])->name('applications.index');
				Route::get('/{application}', [BackendApplicationController::class, 'show'])->name('applications.show');
				Route::get('/create', [BackendApplicationController::class, 'create'])->name('applications.create');
				Route::post('/store', [BackendApplicationController::class, 'store'])->name('applications.store');
				Route::get('/{application}', [BackendApplicationController::class, 'show'])->name('applications.show');
				Route::get('/{application}/edit', [BackendApplicationController::class, 'edit'])->name('applications.edit');
				Route::patch('/{application}/update', [BackendApplicationController::class, 'update'])->name('applications.update');
				Route::delete('/{application}/delete', [BackendApplicationController::class, 'delete'])->name('applications.delete');
				Route::post('/{application}/store-status-history', [BackendApplicationController::class, 'storeStatusHistory'])->name('applications.store_status_history');
				Route::post('/{application}/store-observation', [BackendApplicationController::class, 'storeObservation'])->name('applications.store_observation');
			});

			// Empresas
			Route::group(['prefix' => 'companies', 'middleware' => [AdministratorOnly::class]], function () {
				Route::get('/', [BackendCompanyController::class, 'index'])->name('companies.index');
				Route::get('/create', [BackendCompanyController::class, 'create'])->name('companies.create');
				Route::post('/store', [BackendCompanyController::class, 'store'])->name('companies.store');
				Route::get('/{company}', [BackendCompanyController::class, 'show'])->name('companies.show');
				Route::get('/{company}/edit', [BackendCompanyController::class, 'edit'])->name('companies.edit');
				Route::patch('/{company}/update', [BackendCompanyController::class, 'update'])->name('companies.update');
				Route::delete('/{company}/delete', [BackendCompanyController::class, 'delete'])->name('companies.delete');
			});

			// Users
			Route::group(['prefix' => 'users'], function () {
				Route::get('/', [BackendUserController::class, 'index'])->name('users.index');
				Route::get('/create', [BackendUserController::class, 'create'])->name('users.create');
				Route::post('/store', [BackendUserController::class, 'store'])->name('users.store');
				Route::get('/{user}', [BackendUserController::class, 'show'])->name('users.show');
				Route::get('/{user}/edit', [BackendUserController::class, 'edit'])->name('users.edit');
				Route::patch('/{user}/update', [BackendUserController::class, 'update'])->name('users.update');
				Route::delete('/{user}/delete', [BackendUserController::class, 'delete'])->name('users.delete');
			});
		});
	});
});




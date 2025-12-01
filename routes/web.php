<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\pengguna\admin\AdminPenggunaAdminController;
use App\Http\Controllers\admin\pengguna\member\AdminPenggunaMemberController;
use App\Http\Controllers\admin\pengguna\user\AdminPenggunaUserController;
use App\Http\Controllers\admin\resep\AdminResepController;
use App\Http\Controllers\admin\resep\kategori\AdminKategoriController;
use App\Http\Controllers\admin\ulasan\AdminUlasanController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\user\favorite\UserFavoriteController;
use App\Http\Controllers\user\recipes\UserRecipesController;
use App\Http\Controllers\user\UserAuthController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('user.dashboard');
Route::get('/index', function () {
    return view('user.pages.index');
})->name('user.index');

Route::get('/receipe-post', function () {
    return view('user.pages.receipe-post');
})->name('user.receipe-post');

Route::get('/blog-post', function () {
    return view('user.pages.blog-post');
})->name('user.blog-post');

Route::get('/about', function () {
    return view('user.pages.about');
})->name('user.about');

Route::get('/contact', function () {
    return view('user.pages.contact');
})->name('user.contact');

Route::get('/elements', function () {
    return view('user.pages.elements');
})->name('user.elements');






Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::get('/pengguna/user', [AdminPenggunaUserController::class, 'index'])->name('admin.pengguna.user');
Route::post('/pengguna/user', [AdminPenggunaUserController::class, 'store'])->name('admin.pengguna.user.store');
Route::get('/pengguna/user/data', [AdminPenggunaUserController::class, 'data'])->name('admin.pengguna.user.data');
Route::get('/pengguna/user/{id}', [AdminPenggunaUserController::class, 'show'])->name('admin.pengguna.user.show');
Route::put('/pengguna/user/{id}', [AdminPenggunaUserController::class, 'update'])->name('admin.pengguna.user.update');
Route::delete('/pengguna/user/{id}', [AdminPenggunaUserController::class, 'delete'])->name('admin.pengguna.user.delete');

Route::get('/pengguna/member', [AdminPenggunaMemberController::class, 'index'])->name('admin.pengguna.member');
Route::get('/pengguna/member/data', [AdminPenggunaMemberController::class, 'data'])->name('admin.pengguna.member.data');
Route::post('/pengguna/member/', [AdminPenggunaMemberController::class, 'store'])->name('admin.pengguna.member.store');
Route::delete('/pengguna/member/{id}', [AdminPenggunaMemberController::class, 'destroy'])->name('admin.pengguna.member.delete');

Route::get('/pengguna/admin', [AdminPenggunaAdminController::class, 'index'])->name('admin.pengguna.admin');
Route::get('/pengguna/admin/data', [AdminPenggunaAdminController::class, 'data'])->name('admin.pengguna.admin.data');
Route::post('/pengguna/admin/', [AdminPenggunaAdminController::class, 'store'])->name('admin.pengguna.admin.store');
Route::get('/pengguna/admin/{id}', [AdminPenggunaAdminController::class, 'show'])->name('admin.pengguna.admin.show');
Route::put('/pengguna/admin/{id}', [AdminPenggunaAdminController::class, 'update'])->name('admin.pengguna.admin.update');
Route::delete('/pengguna/admin/{id}', [AdminPenggunaAdminController::class, 'destroy'])->name('admin.pengguna.admin.destroy');

Route::get('/resep', [AdminResepController::class, 'index'])->name('admin.resep');
Route::get('/resep/data', [AdminResepController::class, 'data'])->name('admin.resep.data');
Route::post('/resep', [AdminResepController::class, 'store'])->name('admin.resep.store');
Route::get('/resep/{id}', [AdminResepController::class, 'show'])->name('admin.resep.show');
Route::put('/resep/{id}', [AdminResepController::class, 'update'])->name('admin.resep.update');
Route::delete('/resep/{id}', [AdminResepController::class, 'delete'])->name('admin.resep.delete');

Route::get('/resep/kategori', [AdminKategoriController::class, 'index'])->name('admin.resep.kategori');
Route::get('/resep/kategori/data', [AdminKategoriController::class, 'data'])->name('admin.resep.kategori.data');
Route::post('/resep/kategori', [AdminKategoriController::class, 'store'])->name('admin.resep.kategori.store');
Route::get('/resep/kategori/{id}', [AdminKategoriController::class, 'show'])->name('admin.resep.kategori.show');
Route::put('/resep/kategori/{id}', [AdminKategoriController::class, 'update'])->name('admin.resep.kategori.update');
Route::delete('/resep/kategori/{id}', [AdminKategoriController::class, 'delete'])->name('admin.resep.kategori.destroy');


Route::get('/ulasan', [AdminUlasanController::class, 'index'])->name('admin.ulasan');

Route::get('/profile/admin', [AdminProfileController::class, 'index'])->name('admin.profile');

Route::get('/recipes', [UserRecipesController::class, 'index'])->name('user.recipes');
Route::get('/favorite', [UserFavoriteController::class, 'index'])->name('user.favorite');
Route::get('/auth/login', [UserAuthController::class, 'index'])->name('user.auth.login');
Route::get('/profile', [UserProfileController::class, 'index'])->name('user.profile');


// Dashboard
Route::get('/dashboard-general-dashboard', function () {
    return view('pages.dashboard-general-dashboard', ['type_menu' => 'dashboard']);
});
Route::get('/dashboard-ecommerce-dashboard', function () {
    return view('pages.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
});

// Layout
Route::get('/layout-default-layout', function () {
    return view('pages.layout-default-layout', ['type_menu' => 'layout']);
});

// Blank Page
Route::get('/blank-page', function () {
    return view('pages.blank-page', ['type_menu' => '']);
});

// Bootstrap
Route::get('/bootstrap-alert', function () {
    return view('pages.bootstrap-alert', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-badge', function () {
    return view('pages.bootstrap-badge', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-breadcrumb', function () {
    return view('pages.bootstrap-breadcrumb', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-buttons', function () {
    return view('pages.bootstrap-buttons', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-card', function () {
    return view('pages.bootstrap-card', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-carousel', function () {
    return view('pages.bootstrap-carousel', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-collapse', function () {
    return view('pages.bootstrap-collapse', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-dropdown', function () {
    return view('pages.bootstrap-dropdown', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-form', function () {
    return view('pages.bootstrap-form', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-list-group', function () {
    return view('pages.bootstrap-list-group', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-media-object', function () {
    return view('pages.bootstrap-media-object', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-modal', function () {
    return view('pages.bootstrap-modal', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-nav', function () {
    return view('pages.bootstrap-nav', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-navbar', function () {
    return view('pages.bootstrap-navbar', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-pagination', function () {
    return view('pages.bootstrap-pagination', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-popover', function () {
    return view('pages.bootstrap-popover', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-progress', function () {
    return view('pages.bootstrap-progress', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-table', function () {
    return view('pages.bootstrap-table', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-tooltip', function () {
    return view('pages.bootstrap-tooltip', ['type_menu' => 'bootstrap']);
});
Route::get('/bootstrap-typography', function () {
    return view('pages.bootstrap-typography', ['type_menu' => 'bootstrap']);
});


// components
Route::get('/components-article', function () {
    return view('pages.components-article', ['type_menu' => 'components']);
});
Route::get('/components-avatar', function () {
    return view('pages.components-avatar', ['type_menu' => 'components']);
});
Route::get('/components-chat-box', function () {
    return view('pages.components-chat-box', ['type_menu' => 'components']);
});
Route::get('/components-empty-state', function () {
    return view('pages.components-empty-state', ['type_menu' => 'components']);
});
Route::get('/components-gallery', function () {
    return view('pages.components-gallery', ['type_menu' => 'components']);
});
Route::get('/components-hero', function () {
    return view('pages.components-hero', ['type_menu' => 'components']);
});
Route::get('/components-multiple-upload', function () {
    return view('pages.components-multiple-upload', ['type_menu' => 'components']);
});
Route::get('/components-pricing', function () {
    return view('pages.components-pricing', ['type_menu' => 'components']);
});
Route::get('/components-statistic', function () {
    return view('pages.components-statistic', ['type_menu' => 'components']);
});
Route::get('/components-tab', function () {
    return view('pages.components-tab', ['type_menu' => 'components']);
});
Route::get('/components-table', function () {
    return view('pages.components-table', ['type_menu' => 'components']);
});
Route::get('/components-user', function () {
    return view('pages.components-user', ['type_menu' => 'components']);
});
Route::get('/components-wizard', function () {
    return view('pages.components-wizard', ['type_menu' => 'components']);
});

// forms
Route::get('/forms-advanced-form', function () {
    return view('pages.forms-advanced-form', ['type_menu' => 'forms']);
});
Route::get('/forms-editor', function () {
    return view('pages.forms-editor', ['type_menu' => 'forms']);
});
Route::get('/forms-validation', function () {
    return view('pages.forms-validation', ['type_menu' => 'forms']);
});

// modules
Route::get('/modules-calendar', function () {
    return view('pages.modules-calendar', ['type_menu' => 'modules']);
});
Route::get('/modules-chartjs', function () {
    return view('pages.modules-chartjs', ['type_menu' => 'modules']);
});
Route::get('/modules-datatables', function () {
    return view('pages.modules-datatables', ['type_menu' => 'modules']);
});
Route::get('/modules-flag', function () {
    return view('pages.modules-flag', ['type_menu' => 'modules']);
});
Route::get('/modules-font-awesome', function () {
    return view('pages.modules-font-awesome', ['type_menu' => 'modules']);
});
Route::get('/modules-ion-icons', function () {
    return view('pages.modules-ion-icons', ['type_menu' => 'modules']);
});
Route::get('/modules-owl-carousel', function () {
    return view('pages.modules-owl-carousel', ['type_menu' => 'modules']);
});
Route::get('/modules-sparkline', function () {
    return view('pages.modules-sparkline', ['type_menu' => 'modules']);
});
Route::get('/modules-sweet-alert', function () {
    return view('pages.modules-sweet-alert', ['type_menu' => 'modules']);
});
Route::get('/modules-toastr', function () {
    return view('pages.modules-toastr', ['type_menu' => 'modules']);
});
Route::get('/modules-vector-map', function () {
    return view('pages.modules-vector-map', ['type_menu' => 'modules']);
});
Route::get('/modules-weather-icon', function () {
    return view('pages.modules-weather-icon', ['type_menu' => 'modules']);
});

// auth
Route::get('/auth-forgot-password', function () {
    return view('pages.auth-forgot-password', ['type_menu' => 'auth']);
});
Route::get('/auth-login', function () {
    return view('pages.auth-login', ['type_menu' => 'auth']);
});
Route::get('/auth-login2', function () {
    return view('pages.auth-login2', ['type_menu' => 'auth']);
});
Route::get('/auth-register', function () {
    return view('pages.auth-register', ['type_menu' => 'auth']);
});
Route::get('/auth-reset-password', function () {
    return view('pages.auth-reset-password', ['type_menu' => 'auth']);
});

// error
Route::get('/error-403', function () {
    return view('pages.error-403', ['type_menu' => 'error']);
});
Route::get('/error-404', function () {
    return view('pages.error-404', ['type_menu' => 'error']);
});
Route::get('/error-500', function () {
    return view('pages.error-500', ['type_menu' => 'error']);
});
Route::get('/error-503', function () {
    return view('pages.error-503', ['type_menu' => 'error']);
});

// features
Route::get('/features-activities', function () {
    return view('pages.features-activities', ['type_menu' => 'features']);
});
Route::get('/features-post-create', function () {
    return view('pages.features-post-create', ['type_menu' => 'features']);
});
Route::get('/features-post', function () {
    return view('pages.features-post', ['type_menu' => 'features']);
});
Route::get('/features-profile', function () {
    return view('pages.features-profile', ['type_menu' => 'features']);
});
Route::get('/features-settings', function () {
    return view('pages.features-settings', ['type_menu' => 'features']);
});
Route::get('/features-setting-detail', function () {
    return view('pages.features-setting-detail', ['type_menu' => 'features']);
});
Route::get('/features-tickets', function () {
    return view('pages.features-tickets', ['type_menu' => 'features']);
});

// utilities
Route::get('/utilities-contact', function () {
    return view('pages.utilities-contact', ['type_menu' => 'utilities']);
});
Route::get('/utilities-invoice', function () {
    return view('pages.utilities-invoice', ['type_menu' => 'utilities']);
});
Route::get('/utilities-subscribe', function () {
    return view('pages.utilities-subscribe', ['type_menu' => 'utilities']);
});

// credits
Route::get('/credits', function () {
    return view('pages.credits', ['type_menu' => '']);
});
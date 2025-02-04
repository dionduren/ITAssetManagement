<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ThemeController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PageRouteController;
use App\Http\Controllers\Transaction\LaptopController;
use App\Http\Controllers\Transaction\UserLaptopController;

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

Route::get('theme-switcher/{activeTheme}', [ThemeController::class, 'switch'])->name('theme-switcher');
Route::get('layout-switcher/{activeLayout}', [LayoutController::class, 'switch'])->name('layout-switcher');

Route::get('login', [AuthController::class, 'loginPage'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/check-session', [SessionController::class, 'checkSession']);
Route::get('/check-profile', [SessionController::class, 'profile']);

Route::middleware(['auth'])->group(function () {
    Route::controller(PageRouteController::class)->group(function () {
        Route::get('/', 'main_dashboard')->name('main-dashboard');
        Route::get('/dashboard-overview', 'dashboardOverview')->name('dashboard-overview');
    });


    // TO DO LIST
    Route::middleware(['role:admin'])->group(function () {
        // Route::get('/admin', function () {
        //     return view('admin.index'); // Admin-only view
        // })->name('admin.dashboard');

        Route::resource('roles', RoleController::class)->except(['create', 'show']);
        Route::post('roles/{id}/restore', [RoleController::class, 'restore'])->name('roles.restore');
        Route::delete('roles/{id}/force-delete', [RoleController::class, 'forceDelete'])->name('roles.forceDelete');

        Route::get('/tr/laptop', [LaptopController::class, 'index'])->name('transaction-laptop-index');
        Route::get('/tr/laptop/create', [LaptopController::class, 'create'])->name('transaction-laptop-create');

        Route::get('/tr/user', [UserLaptopController::class, 'index'])->name('transaction-user-index');
        Route::get('/tr/user/create', [UserLaptopController::class, 'create'])->name('transaction-user-create');

        Route::get('/tr/join', [PageRouteController::class, 'join_index'])->name('transaction-join-index');
    });

    // TO DO LIST
    Route::middleware(['role:manager'])->group(function () {
        // Route::get('/manager', function () {
        //     return view('manager.index'); // Manager-only view
        // })->name('manager.dashboard');

        Route::get('/tr/join', [PageRouteController::class, 'join_index'])->name('transaction-join-index');
    });

    // TO DO LIST
    Route::middleware(['role:user'])->group(function () {
        // Route::get('/user', function () {
        //     return view('user.index'); // User-only view
        // })->name('user.dashboard');
    });
});



Route::prefix('example')->controller(PageController::class)->group(function () {
    Route::get('/', 'dashboardOverview1')->name('dashboard-overview-1');
    Route::get('dashboard-overview-2-page', 'dashboardOverview2')->name('dashboard-overview-2');
    Route::get('dashboard-overview-3-page', 'dashboardOverview3')->name('dashboard-overview-3');
    Route::get('dashboard-overview-4-page', 'dashboardOverview4')->name('dashboard-overview-4');
    Route::get('categories-page', 'categories')->name('categories');
    Route::get('add-product-page', 'addProduct')->name('add-product');
    Route::get('product-list-page', 'productList')->name('product-list');
    Route::get('product-grid-page', 'productGrid')->name('product-grid');
    Route::get('transaction-list-page', 'transactionList')->name('transaction-list');
    Route::get('transaction-detail-page', 'transactionDetail')->name('transaction-detail');
    Route::get('seller-list-page', 'sellerList')->name('seller-list');
    Route::get('seller-detail-page', 'sellerDetail')->name('seller-detail');
    Route::get('reviews-page', 'reviews')->name('reviews');
    Route::get('inbox-page', 'inbox')->name('inbox');
    Route::get('file-manager-page', 'fileManager')->name('file-manager');
    Route::get('point-of-sale-page', 'pointOfSale')->name('point-of-sale');
    Route::get('chat-page', 'chat')->name('chat');
    Route::get('post-page', 'post')->name('post');
    Route::get('calendar-page', 'calendar')->name('calendar');
    Route::get('crud-data-list-page', 'crudDataList')->name('crud-data-list');
    Route::get('crud-form-page', 'crudForm')->name('crud-form');
    Route::get('users-layout-1-page', 'usersLayout1')->name('users-layout-1');
    Route::get('users-layout-2-page', 'usersLayout2')->name('users-layout-2');
    Route::get('users-layout-3-page', 'usersLayout3')->name('users-layout-3');
    Route::get('profile-overview-1-page', 'profileOverview1')->name('profile-overview-1');
    Route::get('profile-overview-2-page', 'profileOverview2')->name('profile-overview-2');
    Route::get('profile-overview-3-page', 'profileOverview3')->name('profile-overview-3');
    Route::get('wizard-layout-1-page', 'wizardLayout1')->name('wizard-layout-1');
    Route::get('wizard-layout-2-page', 'wizardLayout2')->name('wizard-layout-2');
    Route::get('wizard-layout-3-page', 'wizardLayout3')->name('wizard-layout-3');
    Route::get('blog-layout-1-page', 'blogLayout1')->name('blog-layout-1');
    Route::get('blog-layout-2-page', 'blogLayout2')->name('blog-layout-2');
    Route::get('blog-layout-3-page', 'blogLayout3')->name('blog-layout-3');
    Route::get('pricing-layout-1-page', 'pricingLayout1')->name('pricing-layout-1');
    Route::get('pricing-layout-2-page', 'pricingLayout2')->name('pricing-layout-2');
    Route::get('invoice-layout-1-page', 'invoiceLayout1')->name('invoice-layout-1');
    Route::get('invoice-layout-2-page', 'invoiceLayout2')->name('invoice-layout-2');
    Route::get('faq-layout-1-page', 'faqLayout1')->name('faq-layout-1');
    Route::get('faq-layout-2-page', 'faqLayout2')->name('faq-layout-2');
    Route::get('faq-layout-3-page', 'faqLayout3')->name('faq-layout-3');
    Route::get('login-page', 'login')->name('login-page');
    Route::get('register-page', 'register')->name('register');
    Route::get('error-page-page', 'errorPage')->name('error-page');
    Route::get('update-profile-page', 'updateProfile')->name('update-profile');
    Route::get('change-password-page', 'changePassword')->name('change-password');
    Route::get('regular-table-page', 'regularTable')->name('regular-table');
    Route::get('tabulator-page', 'tabulator')->name('tabulator');
    Route::get('modal-page', 'modal')->name('modal');
    Route::get('slide-over-page', 'slideOver')->name('slide-over');
    Route::get('notification-page', 'notification')->name('notification');
    Route::get('tab-page', 'tab')->name('tab');
    Route::get('accordion-page', 'accordion')->name('accordion');
    Route::get('button-page', 'button')->name('button');
    Route::get('alert-page', 'alert')->name('alert');
    Route::get('progress-bar-page', 'progressBar')->name('progress-bar');
    Route::get('tooltip-page', 'tooltip')->name('tooltip');
    Route::get('dropdown-page', 'dropdown')->name('dropdown');
    Route::get('typography-page', 'typography')->name('typography');
    Route::get('icon-page', 'icon')->name('icon');
    Route::get('loading-icon-page', 'loadingIcon')->name('loading-icon');
    Route::get('regular-form-page', 'regularForm')->name('regular-form');
    Route::get('datepicker-page', 'datepicker')->name('datepicker');
    Route::get('tom-select-page', 'tomSelect')->name('tom-select');
    Route::get('file-upload-page', 'fileUpload')->name('file-upload');
    Route::get('wysiwyg-editor-classic-page', 'wysiwygEditorClassic')->name('wysiwyg-editor-classic');
    Route::get('wysiwyg-editor-inline-page', 'wysiwygEditorInline')->name('wysiwyg-editor-inline');
    Route::get('wysiwyg-editor-balloon-page', 'wysiwygEditorBalloon')->name('wysiwyg-editor-balloon');
    Route::get('wysiwyg-editor-balloon-block-page', 'wysiwygEditorBalloonBlock')->name('wysiwyg-editor-balloon-block');
    Route::get('wysiwyg-editor-document-page', 'wysiwygEditorDocument')->name('wysiwyg-editor-document');
    Route::get('validation-page', 'validation')->name('validation');
    Route::get('chart-page', 'chart')->name('chart');
    Route::get('slider-page', 'slider')->name('slider');
    Route::get('image-zoom-page', 'imageZoom')->name('image-zoom');
});

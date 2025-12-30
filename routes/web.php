<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\EventController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\EventItemController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;

use App\Http\Controllers\KasController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\RundownController;

/*
|--------------------------------------------------------------------------
| INTERNAL SYSTEM (WAJIB LOGIN)
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| AUTH - PUBLIC
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Default
    |--------------------------------------------------------------------------
    | Lempar ke dashboard karena ini rute utama internal
    */
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | EVENT
    |--------------------------------------------------------------------------
    */
    Route::resource('events', EventController::class);

    /*
    |--------------------------------------------------------------------------
    | ITEM / BARANG
    |--------------------------------------------------------------------------
    */
    Route::resource('items', ItemController::class)->except(['show']);

    /*
    |--------------------------------------------------------------------------
    | EVENT ⇄ ITEM
    | Pengambilan & Pengembalian Barang
    |--------------------------------------------------------------------------
    */
    Route::post('/events/{event}/items', [EventItemController::class, 'store'])
        ->name('event-items.store');

    Route::patch('/event-items/{eventItem}', [EventItemController::class, 'update'])
        ->name('event-items.update');

    /*
    |--------------------------------------------------------------------------
    | MEMBER / ANGGOTA
    |--------------------------------------------------------------------------
    */
    Route::resource('members', MemberController::class)->except(['show']);

    /*
    |--------------------------------------------------------------------------
    | TEAM
    |--------------------------------------------------------------------------
    */
    Route::resource('teams', TeamController::class)->only([
        'index', 'create', 'store', 'show', 'destroy',
    ]);

    /*
    |--------------------------------------------------------------------------
    | TEAM MEMBER
    | Assign, Remove, Reorder (Drag & Drop)
    |--------------------------------------------------------------------------
    */
    Route::post('/teams/{team}/members', [TeamMemberController::class, 'store'])
        ->name('team-members.store');

    Route::delete('/team-members/{teamMember}', [TeamMemberController::class, 'destroy'])
        ->name('team-members.destroy');

    Route::patch('/team-members/reorder', [TeamMemberController::class, 'reorder'])
        ->name('team-members.reorder');

    /*
    |--------------------------------------------------------------------------
    | UANG KAS
    |--------------------------------------------------------------------------
    */
    Route::get('/kas', [KasController::class, 'index'])->name('kas.index');
    Route::post('/kas', [KasController::class, 'store'])->name('kas.store');
    Route::delete('/kas/{id}', [KasController::class, 'destroy'])->name('kas.destroy');
    Route::get('/kas/export/csv', [KasController::class, 'exportCsv'])->name('kas.export.csv');

    /*
    |--------------------------------------------------------------------------
    | INVOICE
    |--------------------------------------------------------------------------
    */
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('invoice.index');
    Route::get('/invoice/create', [InvoiceController::class, 'create'])->name('invoice.create');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('invoice.store');
    Route::get('/invoice/{id}/print', [InvoiceController::class, 'print'])->name('invoice.print');

    /*
    |--------------------------------------------------------------------------
    | RUNDOWN
    |--------------------------------------------------------------------------
    */
    Route::get('/rundown', [RundownController::class, 'index'])->name('rundown.index');
    Route::post('/rundown', [RundownController::class, 'store'])->name('rundown.store');
    Route::delete('/rundown/{id}', [RundownController::class, 'destroy'])->name('rundown.destroy');
    Route::get('/rundown/print', [RundownController::class, 'print'])->name('rundown.print');

});

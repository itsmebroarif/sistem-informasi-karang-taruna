<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\EventItemController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TeamMemberController;

/*
|--------------------------------------------------------------------------
| Default
|--------------------------------------------------------------------------
| Lempar ke dashboard karena ini rute utama internal
*/
Route::get('/', function () {
    return view ('dashboard');
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

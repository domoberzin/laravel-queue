<?php

use App\Jobs\ReconcileAccount;
use Illuminate\Support\Facades\Route;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $users = User::factory()->count(3)->create();
    $user = User::all()->first();
    ReconcileAccount::dispatch($user)->onQueue('high');
//    dispatch(new ReconcileAccount($user));

    return 'Finished';
});

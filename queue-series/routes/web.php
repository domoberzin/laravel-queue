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
    $pipeline = app('Illuminate\Pipeline\Pipeline');
    $pipeline->send('Hello')
        ->through([
            // "Middleware" closures, modify input and pass to next
            function ($passable, $next) {
                return $next($passable . ' World');
            },
            function ($passable, $next) {
                return $next($passable . '!');
            },
            ReconcileAccount::class
        ])
        ->then(function ($passable) {
            dump($passable);
        });
    return 'Done';
});

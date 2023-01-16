<?php

use App\Jobs\ReconcileAccount;
use Illuminate\Bus\Dispatcher;
use Illuminate\Routing\Pipeline;
use Illuminate\Support\Facades\Bus;
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
    $user = User::first();


    ReconcileAccount::dispatch($user);
//    $job = new ReconcileAccount($user);


//    Bus::dispatch($job);

//    resolve(Dispatcher::class)->dispatch($job);

//    $pipeline = new Pipeline(app());
//
//    $pipeline->send($job)->through([])->then(function () use ($job) {
//        $job->handle();
//    });

    return 'Done';
});

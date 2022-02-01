<?php

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\TaskNote;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes

 */
//    Below Route Group Contains all route related task CRUD function , protected by
//         Auth Middleware
Route::get('/', function () {
    return view('auth.login');
});
Route::prefix('user/')->middleware('auth')->group(function () {

    Route::resource('task', TaskNote::class);
});

Route::post('logout', [LogoutController::class, 'logout'])->name('logout');

// Route::get('/toastr', function () {
//     // Toastr::success('toastr message in here', 'toastr title', [
//     //     "positionClass" => "toast-top-right",
//     //     "closeButton" => 'true',
//     //     "progressBar" => 'true',

//     // ]);

//     return view('pages.toastr');
//     // dd(Toastr::message());
// });

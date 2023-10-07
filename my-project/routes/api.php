<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HealthCheckController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\Auth\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['api'])->get('/health', [HealthCheckController::class, 'check']);

Route::middleware(['api'])->group(function() {

    Route::post('/login', [AuthController::class, 'login']);

    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/getaccount', [AuthController::class, 'getaccount']);


    // candidates API's

    Route::prefix('/candidates')->middleware(['OnlyUser','api'])->group(function () {

        // show all candidates
         Route::get('/', [CandidateController::class, 'index']);
         
         // create new candidate
         Route::post('/store', [CandidateController::class, 'store']);
         
         // update candidate
         Route::put('/update/{id}', [CandidateController::class, 'update']);
        // view candidate
         Route::get('/{id}', [CandidateController::class, 'show']);

         // delete candidate
         Route::delete('/{id}', [CandidateController::class, 'destroy']);

         // generate reports
         Route::get('/generate-report', [CandidateController::class, 'generateReport']);


    });
    
});
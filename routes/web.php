<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StatistikController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\LoginController;

Route::middleware('guest')->group(function () {

    Route::get('/', function(){
        return redirect('/login');
    });

    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

    Route::post('/login', [LoginController::class, 'authenticate'])->name('process_login');
});

Route::middleware('auth')->group(function () {

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/survey/success', [SurveyController::class, 'success'])->name('survey.success');

    Route::get('/survey/done', [SurveyController::class, 'done'])->name('survey.done');

    Route::get('/survey/close', [SurveyController::class, 'closed'])->name('survey.close');

    Route::resource('/survey', SurveyController::class)->middleware(['done', 'is_open']);

    Route::prefix('admin')->group(function () {

        Route::get('home', [HomeController::class, 'index'])
        ->name('admin.home.index');

        Route::get('ipnbk/show/{responden}/{tahun?}', [HomeController::class, 'show'])
        ->name('admin.home.show');

        Route::get('ipnbk/statistik/{id?}', [StatistikController::class, 'index'])
        ->name('admin.statistik.index');

        Route::get('ipnbk/grafik/{id?}', [GrafikController::class, 'index'])
        ->name('admin.grafik.index');

        Route::get('ipnbk/statistik/cetak/{id}', [StatistikController::class, 'cetakRekap'])
        ->name('admin.statistik.cetak');

            Route::middleware('admin')->group(function () {

                Route::resource('jadwal',  JadwalController::class, [
                    'names' => 'admin.setting'     
                ])->except(['show']);

                Route::post('show/{jadwal}', [JadwalController::class, 'show'])->name('admin.setting.show');

                Route::resource('question', QuestionsController::class, [
                        'names' => 'admin.question'     
                ]);

                Route::resource('answer', AnswerController::class, [
                        'names' => 'admin.answer'     
                ])->except(['show']);
        });

    });


});





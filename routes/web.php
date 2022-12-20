<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\NotifyController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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
Route::get('/schedule-run',function(){
    Artisan::call('schedule:run');
});
Route::get('/schedule-work',function(){
    Artisan::call('schedule:work');
});

Route::prefix('/')->middleware(['auth'])->group(function(){

    Route::get('/',[SiteController::class,'index'])->name('index');

    Route::prefix('settings')->middleware(['auth'])->group(function(){
        Route::get('/edit',[SiteController::class,'edit'])->name('setting.edit');
        Route::put('/update',[SiteController::class,'update'])->name('setting.update');
    });



    Route::get('/admin-report',[SiteController::class,'adminReport'])->name('admin.report')->middleware(['auth']);

    Route::prefix('documents')->middleware(['auth'])->group(function(){

        Route::get('/',[DocumentController::class,'index'])->name('documents.index');
        Route::get('/create',[DocumentController::class,'create'])->name('documents.create')->middleware('can:create,App\Model\Document');
        Route::post('/store',[DocumentController::class,'store'])->name('documents.store')->middleware('can:create,App\Model\Document');
        // Route::get('/show/{document}',[DocumentController::class,'show'])->name('documents.show');
        Route::get('/edit/{document}',[DocumentController::class,'edit'])->name('documents.edit')->middleware('can:update,document');
        Route::put('/update/{document}',[DocumentController::class,'update'])->name('documents.update')->middleware('can:update,document');
        Route::delete('/delete/{document}',[DocumentController::class,'destroy'])->name('documents.delete')->middleware('can:delete,document');

        Route::prefix('types')->group(function(){
            Route::get('/',[DocumentTypeController::class,'index'])->name('documents.types.index');
            Route::get('/create',[DocumentTypeController::class,'create'])->name('documents.types.create');
            Route::post('/store',[DocumentTypeController::class,'store'])->name('documents.types.store');
            Route::get('/edit/{id}',[DocumentTypeController::class,'edit'])->name('documents.types.edit');
            Route::put('/update/{id}',[DocumentTypeController::class,'update'])->name('documents.types.update');
            Route::delete('/delete/{id}',[DocumentTypeController::class,'destroy'])->name('documents.types.delete');
        });

    });


    Route::prefix('tasks')->middleware(['auth'])->group(function(){
        Route::get('/',[TaskController::class,'index'])->name('tasks.index');
        Route::get('/create',[TaskController::class,'create'])->name('tasks.create');
        Route::post('/store',[TaskController::class,'store'])->name('tasks.store');
        Route::get('/show/{task}',[TaskController::class,'show'])->name('tasks.show');
        Route::get('/edit/{task}',[TaskController::class,'edit'])->name('tasks.edit');
        Route::put('/update/{task}',[TaskController::class,'update'])->name('tasks.update');
        Route::delete('/delete/{task}',[TaskController::class,'destroy'])->name('tasks.delete');

        Route::prefix('types')->middleware(['auth'])->group(function(){
            Route::get('/',[TaskTypeController::class,'index'])->name('tasks.types.index');
            Route::get('/create',[TaskTypeController::class,'create'])->name('tasks.types.create');
            Route::post('/store',[TaskTypeController::class,'store'])->name('tasks.types.store');
            Route::get('/edit/{taskType}',[TaskTypeController::class,'edit'])->name('tasks.types.edit');
            Route::put('/update/{taskType}',[TaskTypeController::class,'update'])->name('tasks.types.update');
            Route::delete('/delete/{taskType}',[TaskTypeController::class,'destroy'])->name('tasks.types.delete');
        });
    });






    Route::prefix('activities')->middleware(['auth'])->group(function(){

        Route::get('/',[ActivityController::class,'index'])->name('activities.index');
        Route::get('/create',[ActivityController::class,'create'])->name('activities.create');
        Route::post('/store',[ActivityController::class,'store'])->name('activities.store');
        Route::get('/show/{activity}',[ActivityController::class,'show'])->name('activities.show');
        Route::get('/edit/{activity}',[ActivityController::class,'edit'])->name('activities.edit');
        Route::put('/update/{activity}',[ActivityController::class,'update'])->name('activities.update');
        Route::delete('/delete/{activity}',[ActivityController::class,'destroy'])->name('activities.delete');

        Route::get('/reply/{activity}',[ActivityController::class,'reply'])->name('activities.reply');
        Route::post('/replystore',[ActivityController::class,'replyStore'])->name('activities.replystore');
    });

    Route::get('/logs',[LogController::class,'index'])->name('logs.index')->middleware(['auth']);

    Route::prefix('reminder')->middleware(['auth'])->group(function(){
        Route::get('/',[ReminderController::class,'index'])->name('reminder.index');
        Route::post('/store',[ReminderController::class,'store'])->name('reminder.store');
        Route::delete('/delete/{reminder}',[ReminderController::class,'destroy'])->name('reminder.delete');


    });


    Route::prefix('users')->middleware(['auth'])->group(function(){
        Route::get('/',[UserController::class,'index'])->name('users.index');
        Route::get('/add-user',[UserController::class,'addUser'])->name('users.add');
        Route::post('/store-user',[UserController::class,'storeUser'])->name('users.store');
        Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
        Route::post('/profile/change-password',[UserController::class,'changePassword'])->name('user.profile.changepassword');
    });


    Route::get('/message',[MessageController::class,'index'])->name('message.index');


});







Route::get('/notify/{id}',[NotifyController::class,'manualnotify'])->name('manualnotify');

Route::get('/notifications',[NotifyController::class,'index'])->name('notifications.index');

Route::get('/email/edit',[EmailController::class,'edit'])->name('email.edit');

Route::put('/email/update',[EmailController::class,'update'])->name('email.update');

Route::get('/search',[DocumentController::class,'search'])->name('search');










// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

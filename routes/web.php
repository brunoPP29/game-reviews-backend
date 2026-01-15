<?php

use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SingleGameController;
use App\Http\Controllers\ReviewGameController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/', function () {return view('dashboard');});

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //search

    Route::post('/search', [SearchController::class, 'search'])->name('searchByName');
    Route::get('/search', [SearchController::class, 'index'])->name('indexSearch');
    
    //GAME CONTROLLER
    Route::get('/game/{id}', [SingleGameController::class, 'index'])->name('indexSingleGame');

    //reviews
    Route::get('/avaliar/{id}', [ReviewGameController::class, 'index'])->name('reviewGame');
    Route::post('/avaliar/{id}', [ReviewGameController::class, 'create'])->name('createReviewGame');
    Route::get('/reviews/{user?}', [ReviewGameController::class, 'show'])->name('showReviews');

    //CRUD REVIEWS
    Route::delete('/reviews/delete/{id}', [ReviewGameController::class, 'delete'])->name('deleteReview');

    //FAVORITES

    Route::get('/favorites/{user?}', [FavoritesController::class, 'index'])->name('showFavorites');
    Route::get('/favorite/{id_game}', [FavoritesController::class, 'create'])->name('createFavorite');
    Route::get('/unfavorite/{id_game}', [FavoritesController::class, 'destroy'])->name('destroyFavorite');

});

require __DIR__.'/auth.php';

//
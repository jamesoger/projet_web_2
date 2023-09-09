<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\BilleterieController;
use App\Http\Controllers\ConnexionUserController;
use App\Http\Controllers\InfoController;
use App\Http\Controllers\ProgrammationController;
use App\Http\Controllers\UserController;
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

/*****************
 * ACCUEIL
 */
Route::get('/', [AccueilController::class, 'index'])
    ->name('accueil');


/*****************
 * ACTUALITÉS
 */
Route::get('/actualites', [ActualiteController::class, 'index'])
    ->name('actualites.index');


/*****************
 * PROGRAMMATION
 */

Route::get('/programmation', [ProgrammationController::class, 'index'])
    ->name('programmation.index');

    /*****************
 * PAGE À PROPOS
 */

 Route::get('/a-propos', [InfoController::class, 'index'])
    ->name('info.index');

/*****************
 * BILLETERIE
 */
Route::get('/billeterie', [BilleterieController::class, 'index'])
    ->name('billeterie.index');


/*****************
 * PAGE USER
 */

Route::get('/user', [UserController::class, 'index'])
    ->name('user.index');

/*****************
 * CONNEXION USER
 */
Route::get("/connexion_user", [ConnexionUserController::class, 'create'])
    ->name('user_connexion.create')
    ->middleware('guest');

Route::post("/connexion_user", [ConnexionUserController::class, 'authentifier'])
    ->name('user_connexion.authentifier');

    Route::post("/deconnexion_user", [ConnexionUserController::class, 'deconnecter'])
    ->name('deconnexion_user');

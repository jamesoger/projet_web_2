<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ProgrammationController;
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
    ->name('acceuil');


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

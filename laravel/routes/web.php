<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\BilleterieController;
use App\Http\Controllers\ConnexionAdminController;
use App\Http\Controllers\ConnexionUserController;
use App\Http\Controllers\EnregistrementAdminController;
use App\Http\Controllers\EnregistrementUserController;
use App\Http\Controllers\ForfaitController;
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

Route::get('/a-propos', [AproposController::class, 'index'])
    ->name('info.index');

/*****************
 * BILLETERIE
 */
Route::get('/billeterie', [BilleterieController::class, 'index'])
    ->name('billeterie.index');




/*****************
 * CONNEXION ET ENREGISTREMENT USER
 */


Route::get("/connexion/user/{forfait_id?}", [ConnexionUserController::class, 'create'])
    ->name('user_connexion.create')
    ->middleware('guest');

Route::post("/connexion/user", [ConnexionUserController::class, 'authentifier'])
    ->name('user_connexion.authentifier')
    ->middleware('guest');

Route::post("/deconnexion/user", [ConnexionUserController::class, 'deconnecter'])
    ->name('deconnexion_user');

Route::get("/enregistrement/user", [EnregistrementUserController::class, 'create'])
    ->name('enregistrement_user.create');

Route::post('/enregistrement/user', [EnregistrementUserController::class, 'store'])
    ->name('enregistrement_user.store');



/*****************
 * PAGE USER
 */

Route::get('/user/panier/{forfait_id?}', [ForfaitController::class, 'buy'])
    ->name('user.panier')
    ->middleware('auth');

Route::post('/user/panier', [ForfaitController::class, 'store'])
    ->name('forfait_user.store')
    ->middleware('auth');

Route::post('/user/destroy/{id}', [ForfaitController::class, 'destroy'])
    ->name('forfait.destroy');


Route::get('/user', [UserController::class, 'index'])
    ->name('user.index')
    ->middleware('auth');


/*****************
 * CONNEXION ADMIN
 */

// Définir la route de connexion en dehors du groupe 'admin'
Route::get("/connexion/admin", [ConnexionAdminController::class, 'login'])
    ->name('admin_connexion.login');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::post("/connexion/admin", [ConnexionAdminController::class, 'authentifier'])
        ->name('admin_connexion.authentifier');

    Route::post("/deconnexion/admin", [ConnexionAdminController::class, 'deconnecter'])
        ->name('deconnexion_admin');

    Route::get("/admin/create", [EnregistrementAdminController::class, 'create'])
        ->name('enregistrement_admin.create');

    Route::post("/admin/create", [EnregistrementAdminController::class, 'store'])
        ->name('enregistrement_admin.store');

    Route::get('/programmation/edit/{id}', [ProgrammationController::class, 'edit'])
        ->name('programmation.edit');

    Route::post('/programmation/update/{id}', [ProgrammationController::class, 'update'])
        ->name('programmation.update');



});


/*****************
 * PAGE ADMIN
 */
Route::middleware(['admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::post("/admin/destroy", [AdminController::class, 'destroy'])
        ->name('admin.destroy');

    Route::post("/admin/user/destroy", [UserController::class, 'destroy'])
        ->name('user.destroy');

    Route::post("/admin/forfait/{id}/destroy", [ForfaitController::class, 'destroyForfaitAdmin'])
        ->name('forfait_admin.destroy');
});

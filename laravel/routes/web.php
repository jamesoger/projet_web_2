<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AproposController;
use App\Http\Controllers\ArtisteController;
use App\Http\Controllers\BilletterieController;
use App\Http\Controllers\ConnexionAdminController;
use App\Http\Controllers\ConnexionUserController;
use App\Http\Controllers\EnregistrementAdminController;
use App\Http\Controllers\EnregistrementUserController;
use App\Http\Controllers\ForfaitController;
use App\Http\Controllers\ProgrammationController;
use App\Http\Controllers\SpectacleController;
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
 * NAV
 */
Route::get('/nav', function () {
    return view('components.nav.nav_hidden');
})->name('nav');



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
Route::get('/billetterie', [BilletterieController::class, 'index'])
    ->name('billetterie.index');


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

Route::post('/user/panier/update/{forfait_id}', [ForfaitController::class, 'update'])
    ->name('forfait_user_update');

Route::post('/user/destroy/{id}', [ForfaitController::class, 'destroy'])
    ->name('forfait.destroy');


Route::get('/user', [UserController::class, 'index'])
    ->name('user.index')
    ->middleware('auth');


/*****************
 * CONNEXION ADMIN
 */

Route::get("/connexion/admin", [ConnexionAdminController::class, 'login'])
    ->name('admin_connexion.login');

/*****************
 *  ADMIN
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {



    Route::post("/connexion/admin", [ConnexionAdminController::class, 'authentifier'])
        ->name('admin_connexion.authentifier');

    Route::post("/deconnexion/admin", [ConnexionAdminController::class, 'deconnecter'])
        ->name('deconnexion_admin');

    Route::get("/admin/create", [EnregistrementAdminController::class, 'create'])
        ->name('enregistrement_admin.create');

    Route::get("/admin/edit/{id}", [AdminController::class, 'edit'])
        ->name('enregistrement_admin.edit');

    Route::post("/admin/update", [AdminController::class, 'update'])
        ->name('enregistrement_admin.update');

    Route::post("/admin/create", [EnregistrementAdminController::class, 'store'])
        ->name('enregistrement_admin.store');

    Route::get('/programmation/edit/{id}', [ProgrammationController::class, 'edit'])
        ->name('programmation.edit');

    Route::post('/programmation/update/{id}', [ProgrammationController::class, 'update'])
        ->name('programmation.update');


    Route::get('/actualites/create', [ActualiteController::class, 'create'])
        ->name('actualites.create');


    Route::post('/actualites/store', [ActualiteController::class, 'store'])
        ->name('actualites.store');


    Route::get('/actualites/edit/{id}', [ActualiteController::class, 'edit'])
        ->name('actualites.edit');


    Route::post('/actualites/update', [ActualiteController::class, 'update'])
        ->name('actualites.update');

    Route::post('/actualites/destroy', [ActualiteController::class, 'destroy'])
        ->name('actualites.destroy');

    Route::get('/admin/artiste/edit/{id}', [ArtisteController::class, 'edit'])
        ->name('programmation.artiste.edit');

    Route::post('/admin/artiste/update', [ArtisteController::class, 'update'])
        ->name('programmation.artiste.update');

    Route::post('admin/artiste/destroy', [ArtisteController::class, 'destroy'])
        ->name('artiste.destroy');

    Route::get('/admin/spectacle/edit/{id}', [SpectacleController::class, 'edit'])
        ->name('programmation.spectacle.edit');

    Route::post('/admin/spectacle/update', [SpectacleController::class, 'update'])
        ->name('programmation.spectacle.update');

        Route::post('admin/spectacle/destroy', [SpectacleController::class, 'destroy'])
        ->name('spectacle.destroy');
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

    Route::get("/admin/user/edit/{id}", [UserController::class, 'edit'])
        ->name('user.edit');

        Route::post('/admin/user/update', [UserController::class, 'update'])
        ->name('user.update');

    Route::post("/admin/forfait/{id}/destroy", [ForfaitController::class, 'destroyForfaitAdmin'])
        ->name('forfait_admin.destroy');
});

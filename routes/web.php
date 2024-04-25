<?php

use App\Mail\envoyeemail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NotificationsController;
use App\Http\Controllers\SecteurController;
use App\Http\Controllers\StartupController;
use App\Http\Controllers\ReclamationController;

Route::middleware('auth')->group(function(){
    // Routes pour la gestion des fondateurs
Route::get('/ListFondateur', [AdminController::class, 'getAllfondateurs'])->name('ListFondateur');
Route::get('/deletefondateur/{id}', [AdminController::class, 'deletefondateur'])->name('deletefondateur');
Route::get('/showfondateur/{id}', [AdminController::class, 'show'])->name('showfondateur');


// Routes pour la gestion des secteurs
Route::get('/ListSecteur', [SecteurController::class, 'index'])->name('ListSecteur');
Route::get('/AjouteSecteur', [SecteurController::class, 'create'])->name('AjouteSecteur');
Route::post('/store', [SecteurController::class, 'store'])->name('store');

Route::get('/ModifierSecteur/{id}', [SecteurController::class, 'edit'])->name('ModifierSecteur');
Route::put('/{id}', [SecteurController::class, 'update'])->name('update');

Route::delete('/delete/{id}', [SecteurController::class, 'destroy'])->name('supprimerSecteur');

// Routes pour la gestion des startups
Route::get('/ListStartup', [StartupController::class, 'getAllStartups'])->name('ListStartup');
Route::get('/deleteStartup/{id}', [StartupController::class, 'deleteStartup'])->name('deleteStartup');

// Routes pour la gestion des administrateurs
Route::get('/listAdmin', [AdminController::class, 'getAllAdmin'])->name('listAdmin');
Route::get('/AjouteAdministrateur', [AdminController::class, 'createAdmin'])->name('AjouteAdministrateur');
Route::post('/storeAdmin', [AdminController::class, 'storeAdmin'])->name('storeAdmin');
Route::get('/deleteAdmin/{id}', [AdminController::class, 'deleteAdmin'])->name('deleteAdmin');

Route::get('/ModifierAdmin/{id}', [AdminController::class, 'editMidifier'])->name('ModifierAdmin');
Route::put('/updateSousAdmin/{id}', [AdminController::class, 'updateSousAdmin'])->name('updateSousAdmin');

// Routes pour la gestion des investisseur

Route::get('/ListInvestisseur', [AdminController::class, 'getAllinvestisseur'])->name('ListInvestisseur');
Route::get('/showinvestisseur/{id}', [AdminController::class, 'showinvest'])->name('showinvestisseur');
Route::get('/deleteinvestisseur/{id}', [AdminController::class, 'deleteinvestisseur'])->name('deleteinvestisseur');

// Routes pour la gestion des reclamation
Route::get('/listreclamation', [ReclamationController::class, 'getAllReclamations'])->name('listreclamation');
Route::delete('/listreclamation/{id}', [ReclamationController::class, 'refuser'])->name('refuser');
Route::get('/showReclamation/{id}', [ReclamationController::class, 'showReclamation'])->name('showReclamation');
//Routes pour profil admin
Route::get('/profile', function () {
    return view('Layouts.profil.profil');
})->name('profile');
Route::get('/Modifierprofile', [AdminController::class,'edit'])->name('Modifierprofil');
Route::put('/updateProfile/{id}', [AdminController::class, 'updateProfileAdmin'])->name('updateProfile');
//Page accueil
Route::get('/accueil', [HomeController::class,'index'])->name('accueil');
// Route::get('/home', [HomeController::class,'index'])->name('accueil');

Route::get('/MarkAsRead_all',[NotificationsController::class,'MarkAsRead_all'])->name('MarkAsRead_all');
Route::get('/markAsRead/{id}', [NotificationsController::class, 'MarkAsRead'])->name('markAsReadId');
});


// Authentification
Route::get('/', function () {
    return view('auth.login');
})->name('login')->middleware('guest');

Route::get('/register', function () {
    return view('auth.register');
})->name('register')->middleware('guest');


Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



use App\Http\Controllers\FacebookSocialiteController;

Route::get('auth/facebook', [FacebookSocialiteController::class, 'redirectToFB']);
Route::get('callback/facebook', [FacebookSocialiteController::class, 'handleCallback']);
Route::get('/accepter/{id}',  [ReclamationController::class,'accepter'])->name('accepter');
Route::get('/refuser/{id}', [ReclamationController::class,'refuser'])->name('refuser');
Route::get('/resoudre/{id}', [ReclamationController::class,'resoudre'])->name('resoudre');
Route::delete('/supprimerReclamation/{id}', [ReclamationController::class, 'supprimer'])->name('supprimer');

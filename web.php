<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UtilisateurController;
/**
 *  Pages
 */
Route::get('/', function(){ 
        return view('pages.acceuil'); 
    })->name('acceuil');
Route::get('/qui-sommes-nous', function(){ 
        return view('pages.apropos'); 
    })->name('apropos');
Route::get('/metiers-du-numerique', function(){ 
        return view('pages.metiers'); 
    })->name('metiers');
Route::get('/entrepreneurs-du-numerique', function(){ 
        return view('pages.entrepreneurs'); 
    })->name('entrepreneurs');
Route::get('/ecoles-du-numerique', function(){ 
        return view('pages.ecoles'); 
    })->name('ecoles');
    
    
/**
 *  Utilisateur
 */

Route::middleware('guest')->group(function () {

    // Connexion
    Route::get('/se-connecter', function(){
        return view('utilisateur.se-connecter');
    })->name('se-connecter');
    Route::post('/se-connecter',[UtilisateurController::class, 'se_connecter'])
        ->name('nouvelle-connexion');

    /* Inscription */
    Route::get('/s-inscrire', function(){
        return view('utilisateur.s-inscrire');
    })->name('s-inscrire');
    Route::post('/s-inscrire',[UtilisateurController::class, 's_inscrire'])
        ->name('nouveau-utilisateur');
});


Route::middleware('auth')->group(function () {
    Route::post('/sortir', [UtilisateurController::class, 'sortir'])
                ->name('sortir');
});


// recuperer-md oublier-md confirmer-md
// verifier-email

    
    

/****************************************************************
 *  Blog
 */
    Route::get('/blog/{post}', [BlogController::class, 'recuperer'])->name('blog');
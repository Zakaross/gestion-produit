<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProduitController;
use App\Models\Produit;
use App\Http\Controllers\ChartController;


Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/creer', [ProduitController::class, 'creer'])->name('produits.creer');
Route::post('/produits', [ProduitController::class, 'enregistrer'])->name('produits.enregistrer');
Route::get('/produits/{produit}/modifier', [ProduitController::class, 'modifier'])->name('produits.modifier');
Route::put('/produits/{produit}', [ProduitController::class, 'mettreAJour'])->name('produits.mettreAJour');
Route::delete('/produits/{produit}', [ProduitController::class, 'supprimer'])->name('produits.supprimer');

Route::get('/charts', [ChartController::class, 'index'])->name('charts');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $produits = Produit::paginate(10);
    return view('dashboard', compact('produits'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

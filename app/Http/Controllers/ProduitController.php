<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    // Afficher la liste des produits
    public function index(Request $request)
    {
        // Récupérer les valeurs de recherche et de catégorie
        $search = $request->get('search');
        $categorie = $request->get('categorie');

        // Commencer la requête de produits
        $produits = Produit::query();

        // Filtrer par nom si un terme de recherche est fourni
        if ($search) {
            $produits->where('libelle', 'like', '%' . $search . '%');
        }

        // Filtrer par catégorie si une catégorie est sélectionnée
        if ($categorie) {
            $produits->where('categorie', $categorie);
        }

        // Paginer les résultats
        $produits = $produits->paginate(10);

        // Retourner la vue avec les produits filtrés
        return view('dashboard', compact('produits'));
    }


    // Afficher le formulaire d'ajout
    public function creer()
    {
        return view('produits.creer');
    }

    // Enregistrer un nouveau produit
    public function enregistrer(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
            'poids' => 'nullable|numeric',
            'categorie' => 'nullable|string|max:100',
        ]);

        Produit::create($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès');
    }

    // Afficher le formulaire d'édition
    public function modifier(Produit $produit)
    {
        return view('produits.modifier', compact('produit'));
    }

    // Mettre à jour un produit
    public function mettreAJour(Request $request, Produit $produit)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'prix' => 'required|numeric',
            'description' => 'nullable|string',
            'poids' => 'nullable|numeric',
            'categorie' => 'nullable|string|max:100',
        ]);

        $produit->update($request->all());

        return redirect()->route('produits.index')->with('success', 'Produit mis à jour avec succès');
    }

    // Supprimer un produit
    public function supprimer(Produit $produit)
    {
        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès');
    }
}


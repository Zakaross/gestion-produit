<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ChartController extends Controller
{
    public function index()
    {
        $produits = Produit::all();

        $categories = $produits->groupBy('catégorie');
        $labels = $categories->keys();

        $quantites = $categories->map->count();
        $poids = $categories->map(fn($items) => $items->sum('poids'));
        $prixMoyen = $categories->map(fn($items) => round($items->avg('prix'), 2));

        return view('charts.index', [
            'labels' => $labels,
            'quantites' => $quantites,
            'poids' => $poids,
            'prixMoyen' => $prixMoyen,
        ]);
    }
}

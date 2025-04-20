@extends('layouts.app')

@section('title', 'Produits')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold">Tous les produits</h3>
                    <a href="{{ route('produits.creer') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                        Ajouter un produit
                    </a>
                </div>

                <!-- Barre de recherche -->
                <div class="mb-4">
                    <form method="GET" action="{{ route('produits.index') }}" class="flex space-x-4">
                        <!-- Champ de recherche par nom -->
                        <input 
                            type="text" 
                            name="search" 
                            placeholder="Rechercher un produit par nom..." 
                            class="border border-gray-300 px-4 py-2 rounded-l-lg w-full focus:outline-none focus:ring-2 focus:ring-blue-500"
                            value="{{ request()->get('search') }}"
                        />

                        <!-- Sélecteur de catégorie -->
                        <select name="categorie" class="border border-gray-300 px-4 py-2 focus:ring-2 focus:ring-blue-500">
                            <option value="">Toutes les catégories</option>
                            <option value="instrument" {{ request()->get('categorie') == 'instrument' ? 'selected' : '' }}>Instrument</option>
                            <option value="electronique" {{ request()->get('categorie') == 'electronique' ? 'selected' : '' }}>Électronique</option>
                            <option value="vetements" {{ request()->get('categorie') == 'vetements' ? 'selected' : '' }}>Vêtements</option>
                            <option value="accessoires" {{ request()->get('categorie') == 'accessoires' ? 'selected' : '' }}>Accessoires</option>
                        </select>

                        <!-- Bouton de recherche -->
                        <button type="submit" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-r-lg hover:bg-gray-400">
                            Rechercher
                        </button>
                    </form>
                </div>

                <!-- Tableau des produits -->
                <table class="min-w-full table-auto">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nom du produit</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Prix</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Description</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Poids</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Catégorie</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                            <tr class="bg-white border-b">
                                <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $produit->libelle }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $produit->prix }} FCFA</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $produit->description }}</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $produit->poids }} kg</td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $produit->categorie }}</td>
                                <td class="px-6 py-4 text-sm font-medium flex items-center space-x-4">
                                    <a href="{{ route('produits.modifier', $produit) }}" class="text-blue-600 hover:text-blue-800" title="Modifier">
                                        <i class="fas fa-edit text-xl"></i>
                                    </a>
                                    <form action="{{ route('produits.supprimer', $produit) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800" title="Supprimer">
                                            <i class="fas fa-trash-alt text-xl"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-4">
                    {{ $produits->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

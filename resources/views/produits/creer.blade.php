@extends('layouts.app')

@section('title', 'Ajouter un produit')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <form action="{{ route('produits.enregistrer') }}" method="POST">
                    @csrf

                    <!-- Champ Libellé -->
                    <div class="mb-4">
                        <label for="libelle" class="block text-sm font-medium text-gray-700">Nom du produit</label>
                        <input type="text" id="libelle" name="libelle" class="mt-1 block w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Champ Prix -->
                    <div class="mb-4">
                        <label for="prix" class="block text-sm font-medium text-gray-700">Prix</label>
                        <input type="number" id="prix" name="prix" class="mt-1 block w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Champ Description -->
                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea id="description" name="description" class="mt-1 block w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-blue-500"></textarea>
                    </div>

                    <!-- Champ Poids -->
                    <div class="mb-4">
                        <label for="poids" class="block text-sm font-medium text-gray-700">Poids</label>
                        <input type="number" id="poids" name="poids" step="0.01" class="mt-1 block w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Champ Catégorie -->
                    <div class="mb-4">
                        <label for="categorie" class="block text-sm font-medium text-gray-700">Catégorie</label>
                        <select id="categorie" name="categorie" class="mt-1 block w-full border border-gray-300 px-4 py-2 rounded-md focus:ring-2 focus:ring-blue-500" required>
                            <option value="">Sélectionner une catégorie</option>
                            <option value="instrument">Instrument</option>
                            <option value="electronique">Électronique</option>
                            <option value="vetements">Vêtements</option>
                            <option value="accessoires">Accessoires</option>
                        </select>
                    </div>

                    <!-- Bouton Ajouter -->
                    <div class="flex justify-end">
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion des Produits') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Tous les produits</h3>
                        <!-- Bouton Ajouter un produit -->
                        <a href="{{ route('produits.creer') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                            Ajouter un produit
                        </a>
                    </div>

                    <!-- Tableau des produits -->
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom du produit</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prix</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($produits as $produit)
                                <tr class="bg-white border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $produit->libelle }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $produit->prix }} FCFA</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium flex items-center space-x-3">
                                        <!-- Icône Modifier -->
                                        <a href="{{ route('produits.modifier', $produit) }}" 
                                           class="text-blue-600 hover:text-blue-800" 
                                           title="Modifier">
                                            <i class="fas fa-edit text-lg"></i>
                                        </a>

                                        <!-- Icône Supprimer -->
                                        <form action="{{ route('produits.supprimer', $produit) }}" 
                                              method="POST" class="inline" 
                                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="text-red-600 hover:text-red-800" 
                                                    title="Supprimer">
                                                <i class="fas fa-trash-alt text-lg"></i>
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
</x-app-layout>

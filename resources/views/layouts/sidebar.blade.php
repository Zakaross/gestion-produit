<!-- resources/views/layouts/sidebar.blade.php -->
<div class="h-screen w-64 bg-gray-800 shadow-md fixed top-0 left-0 z-10">
    <div class="p-6 border-b text-center">
        <h1 class="text-2xl font-bold text-white">Gestion Produits</h1>
    </div>

    <nav class="p-4">
        <ul class="space-y-3">
            <li class="bg-white/80">
                <a href="{{ route('dashboard') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                    <i class="fas fa-home w-5 mr-3"></i> Tableau de bord
                </a>
            </li>
            <li class="bg-white/80">
                <a href="{{ route('produits.index') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                    <i class="fas fa-box w-5 mr-3"></i> Produits
                </a>
            </li>
            <li class="bg-white/80">
                <a href="{{ route('profile.edit') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                    <i class="fas fa-user w-5 mr-3"></i> Profil
                </a>
            </li>
            <li class="bg-white/80">
                <a href="{{ route('charts') }}" class="flex items-center p-2 text-gray-700 hover:bg-gray-100 rounded">
                    <i class="fas fa-chart-bar w-5 mr-3"></i> Graphiques
                </a>
            </li>
        </ul>
    </nav>
</div>

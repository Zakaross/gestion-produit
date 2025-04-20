<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Accueil</title>
    @vite('resources/css/app.css') <!-- Inclut tes fichiers CSS -->
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <!-- Navbar -->
    <nav class="bg-gray-700 shadow-lg py-4">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <a href="/" class="text-white text-2xl font-semibold">Gestion de Produits</a>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <!-- Afficher le nom de l'utilisateur et lien de déconnexion -->
                        <span class="text-white font-semibold">Bienvenue, {{ Auth::user()->name }}!</span>
                        <a href="{{ route('logout') }}" class="text-white bg-red-500 px-4 py-2 rounded-lg">Déconnexion</a>
                    @else
                        <!-- Liens de connexion et d'inscription -->
                        <a href="{{ route('login') }}" class="text-white px-4 py-2 rounded-lg bg-green-500 hover:bg-green-600">Connexion</a>
                        <a href="{{ route('register') }}" class="text-white px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600">Inscription</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            @auth
                <p class="mt-4 text-lg">Vous êtes connecté et prêt à gérer vos produits.</p>
            @else
                <h1 class="text-3xl font-bold text-blue-600">Bienvenue sur notre site de gestion de produits !</h1>
                <p class="mt-2 text-lg">Veuillez vous connecter ou vous inscrire pour accéder à l'interface.</p>
            @endauth
        </div>
    </div>

</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Gestion de Produits</title>
    @vite('resources/css/app.css') <!-- Inclut tes fichiers CSS -->
</head>
<body class="bg-gray-100">
    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <!-- Message de session -->
            @if (session('status'))
                <div class="mb-4 text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Formulaire d'inscription -->
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Créer un nouveau compte</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nom -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-gray-600">{{ __('Nom') }}</label>
                    <input 
                        id="name" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                        type="text" 
                        name="name" 
                        :value="old('name')" 
                        required 
                        autofocus 
                    />
                    @error('name')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-600">{{ __('Email') }}</label>
                    <input 
                        id="email" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                        type="email" 
                        name="email" 
                        :value="old('email')" 
                        required 
                        autocomplete="username" 
                    />
                    @error('email')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Mot de passe -->
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-600">{{ __('Mot de passe') }}</label>
                    <input 
                        id="password" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password" 
                    />
                    @error('password')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirmation du mot de passe -->
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-600">{{ __('Confirmer le mot de passe') }}</label>
                    <input 
                        id="password_confirmation" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 shadow-sm"
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password" 
                    />
                    @error('password_confirmation')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Bouton d'inscription -->
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg">
                        {{ __('S\'inscrire') }}
                    </button>
                </div>

                <!-- Lien vers la page de connexion -->
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600">Déjà un compte ? <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800">{{ __('Connectez-vous ici') }}</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>

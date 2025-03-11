<x-app-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-3xl">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Lancez votre projet</h1>
            
            <form action="{{ route('projects.store') }}" method="POST" class="bg-white shadow-xl rounded-lg overflow-hidden">
    @csrf
    <!-- Affiche les erreurs de validation -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Champs du formulaire -->
    <div class="p-6 sm:p-10 space-y-6">
        <!-- Titre -->
        <div>
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre du projet</label>
            <input type="text" name="title" id="title" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required placeholder="Entrez le titre de votre projet">
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required placeholder="Décrivez votre projet en détail"></textarea>
        </div>

        <!-- Objectif financier et Catégorie -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Objectif financier -->
            <div>
                <label for="goal_amount" class="block text-sm font-medium text-gray-700 mb-1">Objectif financier (€)</label>
                <div class="mt-1 relative rounded-md shadow-sm">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <span class="text-gray-500 sm:text-sm">€</span>
                    </div>
                    <input type="number" name="goal_amount" id="goal_amount" class="w-full pl-7 pr-12 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required placeholder="0">
                </div>
            </div>

            <!-- Catégorie -->
            <div>
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                <select name="category_id" id="category_id" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
                    <option value="">Sélectionnez une catégorie</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Dates de début et de fin -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <!-- Date de début -->
            <div>
                <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                <input type="date" name="start_date" id="start_date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
            </div>

            <!-- Date de fin -->
            <div>
                <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                <input type="date" name="end_date" id="end_date" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition" required>
            </div>
        </div>
    </div>

    
    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200 flex items-center justify-between">
        <button type="button" onclick="history.back()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            Annuler
        </button>
        <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md text-sm font-semibold hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
            Lancer le projet
        </button>
    </div>
</form>
        </div>
    </div>
</x-app-layout>


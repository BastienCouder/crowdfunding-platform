<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Mes projets</h2>

                    <!-- Bouton pour créer un projet -->
                    <a href="{{ route('projects.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg mb-6 inline-block hover:bg-blue-600 transition duration-300">
                        Créer un projet
                    </a>

                    <!-- Si aucun projet n'existe -->
                    @if ($projects->isEmpty())
                        <p class="text-gray-600">Vous n'avez pas encore créé de projet.</p>
                    @else
                        <!-- Liste des projets -->
                        <div class="space-y-4">
                            @foreach ($projects as $project)
                                <div class="p-4 bg-gray-50 rounded-lg shadow-sm">
                                    <div class="flex justify-between items-center">
                                        <!-- Informations du projet -->
                                        <div>
                                            <h3 class="text-xl font-semibold text-gray-800">{{ $project->title }}</h3>
                                            <p class="text-gray-600 line-clamp-2">{{ $project->description }}</p>
                                            <p class="text-sm text-gray-500 mt-1">
                                                Catégorie : {{ $project->category->name }}
                                            </p>
                                        </div>

                                        <!-- Actions (Éditer et Supprimer) -->
                                        <div class="flex items-center space-x-2">
                                            <!-- Bouton Éditer -->
                                            <a href="{{ route('projects.edit', $project) }}" class="bg-green-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-green-600 transition duration-300">
                                                Éditer
                                            </a>

                                            <!-- Formulaire de suppression -->
                                            <form method="POST" action="{{ route('projects.destroy', $project) }}" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-lg text-sm hover:bg-red-600 transition duration-300" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce projet ?')">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $projects->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
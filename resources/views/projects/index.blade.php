<x-app-layout>
    <div class="bg-gray-100 min-h-screen py-12">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Découvrez nos projets</h1>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                    <div class="bg-white rounded-xl shadow-md overflow-hidden transition duration-300 ease-in-out transform hover:scale-105">
                    @if ($project->images && count($project->images) > 0)
                 <img src="{{ $project->images[0]->image_url }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                @else
                <img src="https://via.placeholder.com/640x360.png?text=Pas+d'image" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                @endif
                        <div class="p-6">
                            <h2 class="text-xl font-semibold text-gray-800 mb-2 line-clamp-1">{{ $project->title }}</h2>
                            <p class="text-gray-600 mb-4 text-sm line-clamp-3">{{ $project->description }}</p>
                            <div class="mb-4">
                                <div class="flex justify-between text-sm font-medium text-gray-700 mb-1">
                                    <span>Progression</span>
                                    <span>{{ round(($project->current_amount / $project->goal_amount) * 100) }}%</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2.5">
                                    <div class="bg-green-600 h-2.5 rounded-full" style="width: {{ min(($project->current_amount / $project->goal_amount) * 100, 100) }}%"></div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mb-4 text-sm">
                                <span class="text-gray-700">Objectif : <span class="font-semibold">{{ number_format($project->goal_amount, 0, ',', ' ') }} €</span></span>
                                <span class="text-green-600 font-semibold">{{ number_format($project->current_amount, 0, ',', ' ') }} € collectés</span>
                            </div>
                            <a href="{{ route('projects.show', $project) }}" class="block w-full bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition duration-300 font-medium">
                                Voir le projet
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-12">
                {{ $projects->links() }}
            </div>
        </div>
    </div>
</x-app-layout>


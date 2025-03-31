@foreach ($projects as $project)
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-md">
        <div class="relative">
            @if ($project->images && count($project->images) > 0)
                <img src="{{ asset('storage/'. $project->images[0]->image_url) }}" alt="{{ $project->title }}" class="w-full h-52 object-cover">
            @else
                <div class="w-full h-52 bg-gray-100 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-300">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                    </svg>
                </div>
            @endif
            <div class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 text-xs font-medium shadow-sm">
                {{ round(($project->current_amount / $project->goal_amount) * 100) }}% financé
            </div>
        </div>
        
        <div class="p-6">
            <h2 class="text-xl font-bold text-gray-800 mb-2 line-clamp-1">{{ $project->title }}</h2>
            <p class="text-gray-600 mb-6 text-sm line-clamp-3">{{ $project->description }}</p>
            
            <div class="mb-4">
                <div class="w-full bg-gray-100 rounded-full h-2">
                    <div class="bg-lime-500 h-2 rounded-full" style="width: {{ min(($project->current_amount / $project->goal_amount) * 100, 100) }}%"></div>
                </div>
            </div>
            
            <div class="flex justify-between items-center mb-6 text-sm">
                <div>
                    <span class="text-gray-500 block">Objectif</span>
                    <span class="font-bold text-gray-800">{{ number_format($project->goal_amount, 0, ',', ' ') }} €</span>
                </div>
                <div class="text-right">
                    <span class="text-gray-500 block">Collectés</span>
                    <span class="font-bold text-lime-600">{{ number_format($project->current_amount, 0, ',', ' ') }} €</span>
                </div>
            </div>
            
            <a href="{{ route('projects.show', $project) }}" class="block w-full bg-lime-500 hover:bg-lime-600 text-fg text-center py-3 rounded-lg transition duration-300 font-medium">
                Voir le projet
            </a>
        </div>
    </div>
@endforeach
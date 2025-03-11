<x-app-layout>
    <div class="bg-gradient-to-b from-blue-50 to-white min-h-screen py-8">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-8xl">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <div class="relative">
             
                @if ($project->images && count($project->images) > 0)
                    <img src="{{ $project->images[0]->image_url }}" alt="{{ $project->title }}" class="w-full h-80 object-cover">
                @else
                    <img src="https://via.placeholder.com/1280x720.png?text=Pas+d'image" alt="{{ $project->title }}" class="w-full h-80 object-cover">
                @endif
                    <div class="absolute top-4 right-4">
                        <span class="bg-blue-600 text-white px-4 py-2 rounded-full text-sm font-medium shadow-md">
                            {{ $project->category->name }}
                        </span>
                    </div>
                </div>

                <div class="p-8">
                    <div class="flex flex-col md:flex-row md:justify-between md:items-start gap-6">
                        <div class="flex-1">
                            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">{{ $project->title }}</h1>
                            
                            <div class="flex items-center mb-6">
                                <img src="{{ $project->user->avatar }}" alt="{{ $project->user->name }}" class="w-12 h-12 rounded-full border-2 border-blue-500">
                                <div class="ml-4">
                                    <p class="text-sm text-gray-500">Porteur de projet</p>
                                    <p class="text-lg font-medium text-gray-900">{{ $project->user->name }}</p>
                                </div>
                            </div>
                            
                            <div class="prose prose-blue max-w-none mb-8">
                                <p class="text-gray-700 text-lg leading-relaxed">{{ $project->description }}</p>
                            </div>
                     
                            <div class="mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-4">Galerie du projet</h2>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                                @foreach($project->images as $image)
                                <img src="{{ $image->image_url }}" alt="Image du projet {{ $project->title }}" class="img-fluid">
                                @endforeach
                                </div>
                            </div>
                        </div>
                        
                        <div class="w-full md:w-80 lg:w-96 bg-gray-50 rounded-xl p-6 shadow-inner">
                            <div class="mb-6">
                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-2xl font-bold text-blue-600">{{ $project->current_amount }} €</span>
                                    <span class="text-gray-500 font-medium">sur {{ $project->goal_amount }} €</span>
                                </div>
                                
                                @php
                                    $percentage = min(100, round(($project->current_amount / $project->goal_amount) * 100));
                                @endphp
                                
                                <div class="w-full bg-gray-200 rounded-full h-4 mb-2">
                                    <div class="bg-blue-600 h-4 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                                
                                <div class="flex justify-between text-sm">
                                    <span class="font-medium">{{ $percentage }}% financé</span>
                                    <div class="text-gray-500">
                                        @if ($project->end_date->isPast())
                                            Le projet est terminé.
                                        @else
                                           {{ $project->end_date }} jours
                                        @endif
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mb-6">
                                <div class="flex items-center justify-between mb-4">
                                    <span class="text-gray-700 font-medium">{{ $project->contributions->count() }} contributeurs</span>
                                    <span class="text-gray-500">{{ $project->created_at->format('d/m/Y') }}</span>
                                </div>
                                
                                <form action="{{ route('contributions.store', $project) }}" method="POST" class="space-y-4">
                                    @csrf
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500">€</span>
                                        </div>
                                        <input type="number" name="amount" class="block w-full pl-8 pr-12 py-3 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500" placeholder="Montant" required>
                                        <div class="absolute inset-y-0 right-0 flex items-center">
                                            <label for="currency" class="sr-only">Devise</label>
                                            <select id="currency" name="currency" class="h-full py-0 pl-2 pr-7 border-transparent bg-transparent text-gray-500 sm:text-sm rounded-r-lg">
                                                <option>EUR</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-3 px-4 rounded-lg transition-colors shadow-md flex items-center justify-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                                        </svg>
                                        Contribuer maintenant
                                    </button>
                                </form>
                            </div>
                            
                            <div class="border-t border-gray-200 pt-4">
                                <h3 class="font-medium text-gray-900 mb-3">Partager ce projet</h3>
                                <div class="flex space-x-3">
                                    <a href="#" class="bg-blue-600 text-white p-2 rounded-full hover:bg-blue-700 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                                    </a>
                                    <a href="#" class="bg-blue-400 text-white p-2 rounded-full hover:bg-blue-500 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg>
                                    </a>
                                    <a href="#" class="bg-green-500 text-white p-2 rounded-full hover:bg-green-600 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path></svg>
                                    </a>
                                    <a href="#" class="bg-red-500 text-white p-2 rounded-full hover:bg-red-600 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Recent Contributions -->
                    <div class="mt-12 border-t border-gray-200 pt-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Contributions récentes</h2>
                        
                        @if(count($project->contributions) > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($project->contributions as $index => $contribution)
                     <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm hover:shadow-md transition-shadow @if($index >= 6) hidden extra-contribution @endif">
                               <div class="flex items-center">
                                 <img src="{{ $contribution->user->avatar }}" alt="{{ $contribution->user->name }}" class="w-10 h-10 rounded-full mr-3">
                         <div>
                               <p class="font-medium text-gray-900">{{ $contribution->user->name }}</p>
                              <p class="text-sm text-gray-500">{{ $contribution->created_at->diffForHumans() }}</p>
                             </div>
                         </div>
                      <div class="mt-3">
                           <span class="text-blue-600 font-bold text-lg">{{ $contribution->amount }} €</span>
                             @if($contribution->message)
                          <p class="text-gray-600 mt-1 text-sm">{{ $contribution->message }}</p>
                          @endif
                        </div>
                        </div>
                         @endforeach
                        </div>    
                            @if(count($project->contributions) > 6)
                           <div class="mt-6 text-center">
                             <button id="showAllContributions" data-project-id="{{ $project->id }}" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                                  Voir toutes les contributions
                               <svg class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                               </svg>
                              </button>
                            </div>
                        @endif
                        @else
                            <div class="bg-gray-50 rounded-lg p-6 text-center">
                                <p class="text-gray-500">Aucune contribution pour le moment. Soyez le premier à soutenir ce projet !</p>
                            </div>
                        @endif
                    </div>
                    
                    <!-- Comments Section -->
                    <div class="mt-12 border-t border-gray-200 pt-8">
                        <h2 class="text-2xl font-bold text-gray-900 mb-6">Commentaires ({{ count($project->comments) }})</h2>
                        
                        <!-- Comment Form -->
                        <div class="bg-gray-50 rounded-lg p-6 mb-8">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">Laisser un commentaire</h3>
                            <form action="{{ route('comments.store', $project) }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <textarea name="content" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500" placeholder="Partagez vos pensées sur ce projet..." required></textarea>
                                </div>
                                <div class="flex justify-end">
                                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                        </svg>
                                        Publier le commentaire
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Comments List -->
                        @if(count($project->comments) > 0)
                            <div class="space-y-6">
                                @foreach ($project->comments as $comment)
                                    <div class="bg-white border border-gray-200 rounded-lg p-6 shadow-sm">
                                        <div class="flex items-center mb-4">
                                            <img src="{{ $comment->user->avatar }}" alt="{{ $comment->user->name }}" class="w-10 h-10 rounded-full mr-3">
                                            <div>
                                                <p class="font-medium text-gray-900">{{ $comment->user->name }}</p>
                                                <p class="text-sm text-gray-500">{{ $comment->created_at->format('d M Y, H:i') }}</p>
                                            </div>
                                        </div>
                                        <div class="prose prose-sm max-w-none">
                                            <p class="text-gray-700">{{ $comment->content }}</p>
                                        </div>
                                        <div class="mt-4 flex items-center space-x-4">
                                            <button class="text-gray-500 hover:text-blue-600 flex items-center text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                                                </svg>
                                                J'aime
                                            </button>
                                            <button class="text-gray-500 hover:text-blue-600 flex items-center text-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" viewBox="0 0 20 20" fill="currentColor">
                                                    <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd" />
                                                </svg>
                                                Répondre
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="bg-gray-50 rounded-lg p-6 text-center">
                                <p class="text-gray-500">Aucun commentaire pour le moment. Soyez le premier à commenter !</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('showAllContributions').addEventListener('click', function() {
        const extraContributions = document.querySelectorAll('.extra-contribution');

        extraContributions.forEach(contribution => {
            contribution.classList.toggle('hidden');
        });

        const button = this;
        if (button.textContent.includes('Voir toutes')) {
            button.textContent = 'Masquer les contributions';
        } else {
            button.textContent = 'Voir toutes les contributions';
        }
    });
</script>
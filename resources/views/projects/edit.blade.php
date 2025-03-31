<x-dashboard>
    <x-dashboard-sidebar>
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div>
                <h1 class="text-2xl font-bold text-gray-900">Modifier votre projet</h1>
                <p class="mt-1 text-sm text-gray-500">Mettez à jour les informations de votre projet</p>
       
        </div>
        </div>
        
        <!-- Formulaire -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <!-- Affiche les erreurs de validation -->
                @if ($errors->any())
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 mx-6 mt-6">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Veuillez corriger les erreurs suivantes :</h3>
                                <ul class="mt-1 text-xs text-red-700 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Navigation par onglets -->
                <div class="border-b border-gray-100">
                    <nav class="flex -mb-px">
                        <button type="button" class="tab-button active py-4 px-6 border-b-2 border-lime-500 font-medium text-lime-600" data-tab="basic-info">
                            Informations de base
                        </button>
                        <button type="button" class="tab-button py-4 px-6 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="media">
                            Médias
                        </button>
                        <button type="button" class="tab-button py-4 px-6 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="details">
                            Détails supplémentaires
                        </button>
                        <button type="button" class="tab-button py-4 px-6 border-b-2 border-transparent font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300" data-tab="funding-faq">
                            Paliers & FAQ
                        </button>
                    </nav>
                </div>

                <!-- Onglet 1: Informations de base -->
                <div id="basic-info" class="tab-content p-6 sm:p-8 space-y-6">
                    <!-- Titre -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre du projet</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </div>
                            <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required>
                        </div>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <div class="relative">
                            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required>{{ old('description', $project->description) }}</textarea>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Expliquez clairement votre projet, ses objectifs et comment les fonds seront utilisés.</p>
                    </div>

                    <!-- Résumé -->
                    <div>
                        <label for="summary" class="block text-sm font-medium text-gray-700 mb-1">Résumé du projet</label>
                        <div class="relative">
                            <textarea name="summary" id="summary" rows="3" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required>{{ old('summary', $project->summary ?? '') }}</textarea>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Ce résumé sera affiché sur la page de liste des projets.</p>
                    </div>

                    <!-- Objectif financier et Catégorie -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Objectif financier -->
                        <div>
                            <label for="goal_amount" class="block text-sm font-medium text-gray-700 mb-1">Objectif financier (€)</label>
                            <div class="relative rounded-lg">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <span class="text-gray-500 sm:text-sm">€</span>
                                </div>
                                <input type="number" name="goal_amount" id="goal_amount" value="{{ old('goal_amount', $project->goal_amount) }}" class="w-full pl-7 pr-12 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required>
                            </div>
                        </div>

                        <!-- Catégorie -->
                        <div>
                            <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Catégorie</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                    </svg>
                                </div>
                                <select name="category_id" id="category_id" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $project->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Dates de début et de fin -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Date de début -->
                        <div>
                            <label for="start_date" class="block text-sm font-medium text-gray-700 mb-1">Date de début</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                </div>
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date', $project->start_date->format('Y-m-d')) }}" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required>
                            </div>
                        </div>

                        <!-- Date de fin -->
                        <div>
                            <label for="end_date" class="block text-sm font-medium text-gray-700 mb-1">Date de fin</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
                                    </svg>
                                </div>
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date', $project->end_date->format('Y-m-d')) }}" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Onglet 2: Médias -->
                <div id="media" class="tab-content p-6 sm:p-8 space-y-6 hidden">
                    <!-- Images existantes -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-3">Images existantes</label>
                        @if($project->images && count($project->images) > 0)
                            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 mb-4">
                                @foreach($project->images as $image)
                                    <div class="relative group">
                                    <img src="{{ asset('storage/'.$image->image_url) }}" alt="Image projet">
                                        <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity rounded-lg flex items-center justify-center">
                                            <div class="flex space-x-2">
                                                <button type="button" class="text-fg bg-red-600 hover:bg-red-700 p-1 rounded-full" onclick="document.getElementById('delete-image-{{ $image->id }}').checked = true; this.closest('.relative').classList.add('opacity-50');">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <input type="checkbox" name="delete_images[]" id="delete-image-{{ $image->id }}" value="{{ $image->id }}" class="hidden">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <p class="text-xs text-gray-500 mb-6">Survolez une image et cliquez sur l'icône de suppression pour la retirer.</p>
                        @else
                            <p class="text-sm text-gray-500 mb-6">Aucune image n'a été ajoutée à ce projet.</p>
                        @endif
                    </div>

                    <!-- Ajouter de nouvelles images -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Ajouter de nouvelles images</label>
                        <div id="image-gallery" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                            <!-- Zone de dépôt pour l'image 1 -->
                            <div class="image-upload-container">
                                <div class="border-2 border-gray-200 border-dashed rounded-lg p-4 h-40 flex flex-col items-center justify-center relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-400 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <span class="text-sm text-gray-500">Nouvelle image</span>
                                    <input type="file" name="new_images[]" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                                </div>
                                <div class="preview-container hidden mt-2"></div>
                            </div>
                            
                            <!-- Zone de dépôt pour l'image 2 -->
                            <div class="image-upload-container">
                                <div class="border-2 border-gray-200 border-dashed rounded-lg p-4 h-40 flex flex-col items-center justify-center relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-400 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <span class="text-sm text-gray-500">Nouvelle image</span>
                                    <input type="file" name="new_images[]" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                                </div>
                                <div class="preview-container hidden mt-2"></div>
                            </div>
                            
                            <!-- Zone de dépôt pour l'image 3 -->
                            <div class="image-upload-container">
                                <div class="border-2 border-gray-200 border-dashed rounded-lg p-4 h-40 flex flex-col items-center justify-center relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-400 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <span class="text-sm text-gray-500">Nouvelle image</span>
                                    <input type="file" name="new_images[]" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                                </div>
                                <div class="preview-container hidden mt-2"></div>
                            </div>
                        </div>
                        <p class="text-xs text-gray-500">Formats acceptés : JPG, PNG, GIF. Taille maximale : 5 MB par image.</p>
                    </div>
                    
                    <!-- Vidéo de présentation -->
                    <div>
                        <label for="video_url" class="block text-sm font-medium text-gray-700 mb-1">Vidéo de présentation (optionnel)</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                                </svg>
                            </div>
                            <input type="text" name="video_url" id="video_url" value="{{ old('video_url', $project->video_url ?? '') }}" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="URL YouTube ou Vimeo (ex: https://www.youtube.com/watch?v=...)">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Ajoutez une vidéo pour présenter votre projet de manière plus dynamique.</p>
                    </div>
                </div>

                <!-- Onglet 3: Détails supplémentaires -->
                <div id="details" class="tab-content p-6 sm:p-8 space-y-6 hidden">
                    <!-- Risques et défis -->
                    <div>
                        <label for="risks" class="block text-sm font-medium text-gray-700 mb-1">Risques et défis</label>
                        <div class="relative">
                            <textarea name="risks" id="risks" rows="4" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition">{{ old('risks', $project->risks ?? '') }}</textarea>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Soyez transparent sur les défis que vous pourriez rencontrer.</p>
                    </div>

                    <!-- Option pour enregistrer comme brouillon -->
                    <div class="flex items-start">
                        <div class="flex items-center h-5">
                        <input type="hidden" name="is_draft" value="0">
<input id="is_draft" name="is_draft" type="checkbox" value="1" 
       class="h-4 w-4 text-lime-600 border-gray-300 rounded focus:ring-lime-500" 
       {{ old('is_draft', $project->is_draft) ? 'checked' : '' }}>
                        </div>
                        <div class="ml-3 text-sm">
                            <label for="is_draft" class="font-medium text-gray-700">Enregistrer comme brouillon</label>
                            <p class="text-gray-500">Votre projet ne sera pas visible publiquement tant que vous ne le publierez pas.</p>
                        </div>
                    </div>
                </div>

                <!-- Onglet 4: Paliers de financement et FAQ -->
                <div id="funding-faq" class="tab-content p-6 sm:p-8 space-y-6 hidden">
                    <!-- Paliers de financement -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Paliers de financement</label>
                        <p class="text-sm text-gray-500 mb-4">Définissez des objectifs intermédiaires pour votre projet.</p>
                        
                        <div id="funding-tiers" class="space-y-4">
                        @if(isset($project->funding_tiers) && count($project->funding_tiers) > 0)
    @foreach($project->funding_tiers as $index => $tier)
        <div class="funding-tier p-4 border border-gray-200 rounded-lg">
            <div class="flex justify-between items-center mb-2">
                <h4 class="text-sm font-medium text-gray-900">Palier {{ $index + 1 }}</h4>
                @if($index > 0)
                    <button type="button" class="remove-tier text-xs text-red-600 hover:text-red-800">Supprimer</button>
                @endif
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2">
                <div>
                    <label for="tier_amount_{{ $index }}" class="block text-xs font-medium text-gray-700 mb-1">Montant (€)</label>
                    <div class="relative rounded-lg">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <span class="text-gray-500 sm:text-xs">€</span>
                        </div>
                        <input type="number" name="tier_amount[]" id="tier_amount_{{ $index }}" 
       value="{{ is_array($tier) ? $tier['amount'] : $tier->amount }}" 
       class="w-full pl-7 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition">
                    </div>
                </div>
                <div>
                    <label for="tier_reward_{{ $index }}" class="block text-xs font-medium text-gray-700 mb-1">Récompense</label>
                    <input type="text" name="tier_reward[]" id="tier_reward_{{ $index }}" 
       value="{{ data_get($tier, 'reward', '') }}" 
       class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition">
                </div>
            </div>
            <div>
                <label for="tier_description_{{ $index }}" class="block text-xs font-medium text-gray-700 mb-1">Description (optionnel)</label>
                <textarea name="tier_description[]" id="tier_description_{{ $index }}" rows="2" 
          class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition">
    {{ data_get($tier, 'description', '') }}
</textarea>
            </div>
        </div>
    @endforeach
@else
                                <!-- Palier par défaut si aucun n'existe -->
                                <div class="funding-tier p-4 border border-gray-200 rounded-lg">
                                    <div class="flex justify-between items-center mb-2">
                                        <h4 class="text-sm font-medium text-gray-900">Palier 1</h4>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2">
                                        <div>
                                            <label for="tier_amount_1" class="block text-xs font-medium text-gray-700 mb-1">Montant (€)</label>
                                            <div class="relative rounded-lg">
                                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                    <span class="text-gray-500 sm:text-xs">€</span>
                                                </div>
                                                <input type="number" name="tier_amount[]" id="tier_amount_1" class="w-full pl-7 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="0">
                                            </div>
                                        </div>
                                        <div>
                                            <label for="tier_title_1" class="block text-xs font-medium text-gray-700 mb-1">Titre</label>
                                            <input type="text" name="tier_title[]" id="tier_title_1" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ex: Premier objectif">
                                        </div>
                                    </div>
                                    <div>
                                        <label for="tier_description_1" class="block text-xs font-medium text-gray-700 mb-1">Description</label>
                                        <textarea name="tier_description[]" id="tier_description_1" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ce que vous ferez si vous atteignez ce palier"></textarea>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <button type="button" id="add-tier" class="mt-2 inline-flex items-center px-3 py-1.5 text-xs font-medium text-lime-600 bg-lime-50 rounded-lg hover:bg-lime-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Ajouter un palier
                        </button>
                    </div>

                    <!-- FAQ -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">FAQ</label>
                        <p class="text-sm text-gray-500 mb-4">Ajoutez des questions fréquemment posées pour aider les contributeurs potentiels.</p>
                        
                        <div id="faq-items" class="space-y-4">
                            @if(isset($project->faqs) && count($project->faqs) > 0)
                                @foreach($project->faqs as $index => $faq)
                                    <div class="faq-item p-4 border border-gray-200 rounded-lg">
                                        <div class="flex justify-between items-center mb-2">
                                            <h4 class="text-sm font-medium text-gray-900">Question {{ $index + 1 }}</h4>
                                            @if($index > 0)
                                                <button type="button" class="remove-faq text-xs text-red-600 hover:text-red-800">Supprimer</button>
                                            @endif
                                        </div>
                                        <div class="mb-2">
    <label for="faq_question_{{ $index }}" class="block text-xs font-medium text-gray-700 mb-1">Question</label>
    <input type="text" name="faq_question[]" id="faq_question_{{ $index }}" 
           value="{{ is_array($faq) ? ($faq['question'] ?? '') : ($faq->question ?? '') }}" 
           class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition">
</div>
                                        <div>
                                            <label for="faq_answer_{{ $index }}" class="block text-xs font-medium text-gray-700 mb-1">Réponse</label>
                                            <textarea name="faq_answer[]" id="faq_answer_{{ $index }}" rows="2"
          class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition">
    {{ is_array($faq) ? ($faq['answer'] ?? '') : ($faq->answer ?? '') }}
</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <!-- Question par défaut si aucune n'existe -->
                                <div class="faq-item p-4 border border-gray-200 rounded-lg">
                                    <div class="flex justify-between items-center mb-2">
                                        <h4 class="text-sm font-medium text-gray-900">Question 1</h4>
                                    </div>
                                    <div class="mb-2">
                                        <label for="faq_question_1" class="block text-xs font-medium text-gray-700 mb-1">Question</label>
                                        <input type="text" name="faq_question[]" id="faq_question_1" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Ex: Comment les fonds seront-ils utilisés ?">
                                    </div>
                                    <div>
                                        <label for="faq_answer_1" class="block text-xs font-medium text-gray-700 mb-1">Réponse</label>
                                        <textarea name="faq_answer[]" id="faq_answer_1" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Votre réponse à cette question"></textarea>
                                    </div>
                                </div>
                            @endif
                        </div>
                        
                        <button type="button" id="add-faq" class="mt-2 inline-flex items-center px-3 py-1.5 text-xs font-medium text-lime-600 bg-lime-50 rounded-lg hover:bg-lime-100 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Ajouter une question
                        </button>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('projects.my-projects', $project) }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                        Annuler
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-lime-300 text-fg rounded-full text-sm font-semibold hover:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Navigation par onglets
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Désactiver tous les onglets
                tabButtons.forEach(btn => {
                    btn.classList.remove('active', 'border-lime-500', 'text-lime-600');
                    btn.classList.add('border-transparent', 'text-gray-500');
                });
                
                // Masquer tous les contenus
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Activer l'onglet cliqué
                this.classList.add('active', 'border-lime-500', 'text-lime-600');
                this.classList.remove('border-transparent', 'text-gray-500');
                
                // Afficher le contenu correspondant
                const tabId = this.getAttribute('data-tab');
                document.getElementById(tabId).classList.remove('hidden');
            });
        });
        
        // Prévisualisation des nouvelles images
        const imageInputs = document.querySelectorAll('input[type="file"]');
        
        imageInputs.forEach(input => {
            input.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const container = this.closest('.image-upload-container');
                    const previewContainer = container.querySelector('.preview-container');
                    const dropZone = container.querySelector('.border-dashed');
                    const reader = new FileReader();
                    
                    reader.onload = function(e) {
                        // Cacher la zone de dépôt
                        dropZone.classList.add('hidden');
                        
                        // Afficher la prévisualisation
                        previewContainer.classList.remove('hidden');
                        previewContainer.innerHTML = '';
                        
                        // Créer l'élément d'image
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('h-40', 'w-full', 'object-cover', 'rounded-lg');
                        
                        // Créer le bouton de suppression
                        const removeBtn = document.createElement('button');
                        removeBtn.type = 'button';
                        removeBtn.classList.add('mt-1', 'text-xs', 'text-red-600', 'hover:text-red-800');
                        removeBtn.textContent = 'Supprimer';
                        removeBtn.addEventListener('click', function() {
                            input.value = '';
                            dropZone.classList.remove('hidden');
                            previewContainer.classList.add('hidden');
                        });
                        
                        // Ajouter les éléments à la prévisualisation
                        previewContainer.appendChild(img);
                        previewContainer.appendChild(removeBtn);
                    };
                    
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        
        // Ajouter un palier de financement
        const addTierButton = document.getElementById('add-tier');
        const fundingTiersContainer = document.getElementById('funding-tiers');
        let tierCount = document.querySelectorAll('.funding-tier').length;
        
        addTierButton.addEventListener('click', function() {
            tierCount++;
            
            const newTier = document.createElement('div');
newTier.className = 'funding-tier p-4 border border-gray-200 rounded-lg';
newTier.innerHTML = `
    <div class="flex justify-between items-center mb-2">
        <h4 class="text-sm font-medium text-gray-900">Palier ${tierCount}</h4>
        <button type="button" class="remove-tier text-xs text-red-600 hover:text-red-800">Supprimer</button>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-2">
        <div>
            <label for="tier_amount_${tierCount}" class="block text-xs font-medium text-gray-700 mb-1">Montant (€)</label>
            <div class="relative rounded-lg">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-xs">€</span>
                </div>
                <input type="number" name="tier_amount[]" id="tier_amount_${tierCount}" 
                       class="w-full pl-7 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition">
            </div>
        </div>
        <div>
            <label for="tier_reward_${tierCount}" class="block text-xs font-medium text-gray-700 mb-1">Récompense</label>
            <input type="text" name="tier_reward[]" id="tier_reward_${tierCount}" 
                   class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition">
        </div>
    </div>
    <div>
        <label for="tier_description_${tierCount}" class="block text-xs font-medium text-gray-700 mb-1">Description (optionnel)</label>
        <textarea name="tier_description[]" id="tier_description_${tierCount}" rows="2" 
                  class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition"></textarea>
    </div>
`; 
            
            fundingTiersContainer.appendChild(newTier);
            
            // Ajouter l'événement de suppression
            const removeButton = newTier.querySelector('.remove-tier');
            removeButton.addEventListener('click', function() {
                newTier.remove();
            });
        });
        
        // Supprimer un palier existant
        document.querySelectorAll('.remove-tier').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.funding-tier').remove();
            });
        });
        
        // Ajouter une question FAQ
        const addFaqButton = document.getElementById('add-faq');
        const faqItemsContainer = document.getElementById('faq-items');
        let faqCount = document.querySelectorAll('.faq-item').length;
        
        addFaqButton.addEventListener('click', function() {
            faqCount++;
            
            const newFaq = document.createElement('div');
            newFaq.className = 'faq-item p-4 border border-gray-200 rounded-lg';
            newFaq.innerHTML = `
                <div class="flex justify-between items-center mb-2">
                    <h4 class="text-sm font-medium text-gray-900">Question ${faqCount}</h4>
                    <button type="button" class="remove-faq text-xs text-red-600 hover:text-red-800">Supprimer</button>
                </div>
                <div class="mb-2">
                    <label for="faq_question_${faqCount}" class="block text-xs font-medium text-gray-700 mb-1">Question</label>
                    <input type="text" name="faq_question[]" id="faq_question_${faqCount}" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Votre question">
                </div>
                <div>
                    <label for="faq_answer_${faqCount}" class="block text-xs font-medium text-gray-700 mb-1">Réponse</label>
                    <textarea name="faq_answer[]" id="faq_answer_${faqCount}" rows="2" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="Votre réponse à cette question"></textarea>
                </div>
            `;
            
            faqItemsContainer.appendChild(newFaq);
            
            // Ajouter l'événement de suppression
            const removeButton = newFaq.querySelector('.remove-faq');
            removeButton.addEventListener('click', function() {
                newFaq.remove();
            });
        });
        
        // Supprimer une question FAQ existante
        document.querySelectorAll('.remove-faq').forEach(button => {
            button.addEventListener('click', function() {
                this.closest('.faq-item').remove();
            });
        });
    });
</script>
</x-dashboard-sidebar>
</x-dashboard>

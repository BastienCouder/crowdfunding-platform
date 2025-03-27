<x-app-layout>
    <x-dashboard-sidebar>
<div class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="mb-8 text-center">
            <h1 class="text-3xl font-bold text-gray-900">Ajoutez des médias</h1>
            <p class="mt-2 text-gray-600">Téléchargez des images pour illustrer votre projet</p>
        </div>
        
        <!-- Formulaire -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('projects.store-step2') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
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

                <!-- Étapes du formulaire -->
                <div class="border-b border-gray-100">
                    <div class="flex justify-between px-6 py-4">
                        <div class="flex items-center text-gray-400">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-500 font-medium">1</div>
                            <span class="ml-2 text-sm font-medium">Informations de base</span>
                        </div>
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-lime-500 text-white font-medium">2</div>
                            <span class="ml-2 text-sm font-medium text-gray-900">Médias</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-500 font-medium">3</div>
                            <span class="ml-2 text-sm font-medium">Finalisation</span>
                        </div>
                    </div>
                </div>

                <!-- Champs cachés avec les données de l'étape 1 -->
                @foreach($step1_data as $name => $value)
                    <input type="hidden" name="{{ $name }}" value="{{ $value }}">
                @endforeach

                <!-- Champs pour les médias -->
                <div class="p-6 sm:p-8 space-y-6">
                    <!-- Galerie d'images -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Galerie d'images</label>
                        <p class="text-sm text-gray-500 mb-4">Ajoutez jusqu'à 5 images pour illustrer votre projet. La première image sera utilisée comme image principale.</p>
                        
                        <div id="image-gallery" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-4">
                            <!-- Zone de dépôt pour l'image 1 -->
                            <div class="image-upload-container">
                                <div class="border-2 border-gray-200 border-dashed rounded-lg p-4 h-40 flex flex-col items-center justify-center relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-400 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <span class="text-sm text-gray-500">Image 1</span>
                                    <input type="file" name="project_images[]" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                                </div>
                                <div class="preview-container hidden mt-2"></div>
                            </div>
                            
                            <!-- Zone de dépôt pour l'image 2 -->
                            <div class="image-upload-container">
                                <div class="border-2 border-gray-200 border-dashed rounded-lg p-4 h-40 flex flex-col items-center justify-center relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-400 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <span class="text-sm text-gray-500">Image 2</span>
                                    <input type="file" name="project_images[]" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                                </div>
                                <div class="preview-container hidden mt-2"></div>
                            </div>
                            
                            <!-- Zone de dépôt pour l'image 3 -->
                            <div class="image-upload-container">
                                <div class="border-2 border-gray-200 border-dashed rounded-lg p-4 h-40 flex flex-col items-center justify-center relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-400 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <span class="text-sm text-gray-500">Image 3</span>
                                    <input type="file" name="project_images[]" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                                </div>
                                <div class="preview-container hidden mt-2"></div>
                            </div>
                            
                            <!-- Zone de dépôt pour l'image 4 -->
                            <div class="image-upload-container">
                                <div class="border-2 border-gray-200 border-dashed rounded-lg p-4 h-40 flex flex-col items-center justify-center relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-400 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <span class="text-sm text-gray-500">Image 4</span>
                                    <input type="file" name="project_images[]" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
                                </div>
                                <div class="preview-container hidden mt-2"></div>
                            </div>
                            
                            <!-- Zone de dépôt pour l'image 5 -->
                            <div class="image-upload-container">
                                <div class="border-2 border-gray-200 border-dashed rounded-lg p-4 h-40 flex flex-col items-center justify-center relative">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 text-gray-400 mb-2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5" />
                                    </svg>
                                    <span class="text-sm text-gray-500">Image 5</span>
                                    <input type="file" name="project_images[]" class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*">
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
                            <input type="text" name="video_url" id="video_url" value="{{ old('video_url') }}" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" placeholder="URL YouTube ou Vimeo (ex: https://www.youtube.com/watch?v=...)">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Ajoutez une vidéo pour présenter votre projet de manière plus dynamique.</p>
                    </div>
                </div>

                <!-- Boutons de navigation -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                    <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                        </svg>
                        Précédent
                    </a>
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-lime-500 text-white rounded-full text-sm font-semibold hover:bg-lime-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                        </svg>
                        Suivant
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Prévisualisation des images
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
    });
</script>
</x-dashboard-sidebar>
</x-app-layout>

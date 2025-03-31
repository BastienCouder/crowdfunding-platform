<x-dashboard>
    <x-dashboard-sidebar>       
        <div class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- En-tête -->
                <div class="mb-8">
                    <h1 class="text-2xl font-bold text-gray-900">Lancez votre projet</h1>
            <p class="mt-1 text-sm text-gray-500">Partagez votre idée et commencez à collecter des fonds</p>
        </div>
        
        <!-- Formulaire -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <form action="{{ route('projects.store-step1') }}" method="POST" enctype="multipart/form-data">
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
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-lime-300 text-fg font-medium">1</div>
                            <span class="ml-2 text-sm font-medium text-gray-900">Informations de base</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-500 font-medium">2</div>
                            <span class="ml-2 text-sm font-medium">Médias</span>
                        </div>
                        <div class="flex items-center text-gray-400">
                            <div class="flex items-center justify-center w-8 h-8 rounded-full bg-gray-100 text-gray-500 font-medium">3</div>
                            <span class="ml-2 text-sm font-medium">Finalisation</span>
                        </div>
                    </div>
                </div>

                <!-- Champs du formulaire -->
                <div class="p-6 sm:p-8 space-y-6">
                    <!-- Titre -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Titre du projet</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </div>
                            <input type="text" name="title" id="title" value="{{ old('title') }}" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required placeholder="Entrez le titre de votre projet">
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Choisissez un titre accrocheur qui décrit clairement votre projet.</p>
                    </div>

                    <!-- Description -->
                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                        <div class="relative">
                            <textarea name="description" id="description" rows="5" class="w-full px-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required placeholder="Décrivez votre projet en détail">{{ old('description') }}</textarea>
                        </div>
                        <p class="mt-1 text-xs text-gray-500">Expliquez clairement votre projet, ses objectifs et comment les fonds seront utilisés.</p>
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
                                <input type="number" name="goal_amount" id="goal_amount" value="{{ old('goal_amount') }}" class="w-full pl-7 pr-12 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required placeholder="0">
                            </div>
                            <p class="mt-1 text-xs text-gray-500">Définissez un montant réaliste pour votre projet.</p>
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
                                    <option value="">Sélectionnez une catégorie</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
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
                                <input type="date" name="start_date" id="start_date" value="{{ old('start_date') }}" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required>
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
                                <input type="date" name="end_date" id="end_date" value="{{ old('end_date') }}" class="w-full pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 transition" required>
                            </div>
                            <p class="mt-1 text-xs text-gray-500">La durée recommandée est de 30 à 60 jours.</p>
                        </div>
                    </div>
                </div>

                <!-- Boutons d'action -->
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center justify-between">
                    <button type="button" onclick="history.back()" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                        </svg>
                        Annuler
                    </button>
                    <button type="submit" class="inline-flex items-center px-6 py-3 bg-lime-300 text-fg rounded-full text-sm font-semibold hover:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Lancer le projet
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Prévisualisation de l'image
        const mainImageInput = document.getElementById('main_image');
        const dropZone = mainImageInput.closest('.border-dashed');
        
        mainImageInput.addEventListener('change', function(e) {
            if (this.files && this.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    // Supprimer le contenu actuel
                    dropZone.innerHTML = '';
                    
                    // Créer l'élément d'image
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('h-40', 'mx-auto', 'object-cover', 'rounded-lg');
                    
                    // Ajouter un bouton pour supprimer l'image
                    const removeBtn = document.createElement('button');
                    removeBtn.type = 'button';
                    removeBtn.classList.add('mt-2', 'text-sm', 'text-red-600', 'hover:text-red-800');
                    removeBtn.textContent = 'Supprimer l\'image';
                    removeBtn.addEventListener('click', function() {
                        mainImageInput.value = '';
                        location.reload(); // Recharger pour réinitialiser la zone de dépôt
                    });
                    
                    // Ajouter les éléments à la zone de dépôt
                    dropZone.appendChild(img);
                    dropZone.appendChild(removeBtn);
                };
                
                reader.readAsDataURL(this.files[0]);
            }
        });
        
        // Validation des dates
        const startDateInput = document.getElementById('start_date');
        const endDateInput = document.getElementById('end_date');
        
        // Définir la date minimale pour la date de début (aujourd'hui)
        const today = new Date().toISOString().split('T')[0];
        startDateInput.setAttribute('min', today);
        
        // Mettre à jour la date minimale de fin quand la date de début change
        startDateInput.addEventListener('change', function() {
            endDateInput.setAttribute('min', this.value);
            
            // Si la date de fin est antérieure à la nouvelle date de début, la réinitialiser
            if (endDateInput.value && new Date(endDateInput.value) < new Date(this.value)) {
                endDateInput.value = '';
            }
        });
        
        // Valider la date de fin quand elle change
        endDateInput.addEventListener('change', function() {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(this.value);
            
            if (endDate < startDate) {
                alert('La date de fin doit être postérieure à la date de début.');
                this.value = '';
            }
            
            // Calculer la durée en jours
            if (startDateInput.value && this.value) {
                const diffTime = Math.abs(endDate - startDate);
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24)); 
                
                if (diffDays < 7) {
                    alert('La durée minimale recommandée est de 7 jours.');
                } else if (diffDays > 90) {
                    alert('La durée maximale recommandée est de 90 jours.');
                }
            }
        });
        
        // Validation côté client avant soumission
        const form = document.querySelector('form');
        form.addEventListener('submit', function(e) {
            const startDate = new Date(startDateInput.value);
            const endDate = new Date(endDateInput.value);
            
            if (endDate < startDate) {
                e.preventDefault();
                alert('Veuillez corriger les dates : la date de fin doit être postérieure à la date de début.');
                endDateInput.focus();
            }
        });
    });
</script>


</x-dashboard-sidebar>
</x-dashboard>


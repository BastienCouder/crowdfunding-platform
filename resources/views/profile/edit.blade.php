<x-app-layout>
    <x-dashboard-sidebar>
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-900">Mon profil</h1>
            <p class="mt-1 text-sm text-gray-500">Gérez vos informations personnelles et vos préférences</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Colonne de gauche: Photo de profil et informations -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 text-center">
                        <div class="relative mx-auto w-32 h-32 mb-4">
                            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->name).'&color=7F9CF5&background=EBF4FF' }}" alt="{{ auth()->user()->name }}" class="rounded-full w-full h-full object-cover border-4 border-white shadow">
                            <label for="avatar-upload" class="absolute bottom-0 right-0 bg-lime-500 text-white p-2 rounded-full cursor-pointer shadow-md hover:bg-lime-600 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 015.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 00-1.134-.175 2.31 2.31 0 01-1.64-1.055l-.822-1.316a2.192 2.192 0 00-1.736-1.039 48.774 48.774 0 00-5.232 0 2.192 2.192 0 00-1.736 1.039l-.821 1.316z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zM18.75 10.5h.008v.008h-.008V10.5z" />
                                </svg>
                            </label>
                            <input id="avatar-upload" type="file" class="hidden" accept="image/*">
                        </div>
                        <h2 class="text-xl font-bold text-gray-900">{{ auth()->user()->name }}</h2>
                        <p class="text-gray-500 text-sm">{{ auth()->user()->email }}</p>
                        
                        <div class="mt-4 flex justify-center space-x-2">
                            <a href="#" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path>
                                </svg>
                            </a>
                            <a href="#" class="text-gray-400 hover:text-gray-600">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <div class="border-t border-gray-100 px-6 py-4">
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-sm font-medium text-gray-500">Membre depuis</div>
                            <div class="text-sm font-medium text-gray-900">{{ auth()->user()->created_at->format('d/m/Y') }}</div>
                        </div>
                        <div class="flex items-center justify-between mb-4">
                            <div class="text-sm font-medium text-gray-500">Projets créés</div>
                            <div class="text-sm font-medium text-gray-900">{{ $projectsCount ?? 0 }}</div>
                        </div>
                        <div class="flex items-center justify-between">
                            <div class="text-sm font-medium text-gray-500">Contributions</div>
                            <div class="text-sm font-medium text-gray-900">{{ $contributionsCount ?? 0 }}</div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Colonne de droite: Formulaires -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Informations personnelles -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900">{{ __('Informations du profil') }}</h3>
                    </div>
                    <div class="p-6">
                        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                            @csrf
                        </form>

                        <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                            @csrf
                            @method('patch')
                            
                            <div>
                                <x-input-label for="name" :value="__('Nom')" class="block text-sm font-medium text-gray-700 mb-1" />
                                <x-text-input id="name" name="name" type="text" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                                <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('name')" />
                            </div>

                            <div>
                                <x-input-label for="email" :value="__('Adresse e-mail')" class="block text-sm font-medium text-gray-700 mb-1" />
                                <x-text-input id="email" name="email" type="email" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500" :value="old('email', $user->email)" required autocomplete="username" />
                                <x-input-error class="mt-2 text-sm text-red-600" :messages="$errors->get('email')" />

                                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                                    <div>
                                        <p class="text-sm mt-2 text-gray-800">
                                            {{ __('Votre adresse e-mail n\'est pas vérifiée.') }}

                                            <button form="send-verification" class="underline text-sm text-lime-600 hover:text-lime-700 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                                                {{ __('Cliquez ici pour renvoyer l\'e-mail de vérification.') }}
                                            </button>
                                        </p>

                                        @if (session('status') === 'verification-link-sent')
                                            <p class="mt-2 font-medium text-sm text-green-600">
                                                {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                                            </p>
                                        @endif
                                    </div>
                                @endif
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <x-input-label for="phone" :value="__('Téléphone')" class="block text-sm font-medium text-gray-700 mb-1" />
                                    <x-text-input id="phone" name="phone" type="tel" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500" :value="old('phone', $user->phone ?? '')" />
                                </div>
                                
                                <div>
                                    <x-input-label for="location" :value="__('Localisation')" class="block text-sm font-medium text-gray-700 mb-1" />
                                    <x-text-input id="location" name="location" type="text" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500" :value="old('location', $user->location ?? '')" />
                                </div>
                            </div>

                            <div>
                                <x-input-label for="bio" :value="__('Biographie')" class="block text-sm font-medium text-gray-700 mb-1" />
                                <textarea id="bio" name="bio" rows="4" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500">{{ old('bio', $user->bio ?? '') }}</textarea>
                                <p class="mt-1 text-xs text-gray-500">Brève description qui apparaîtra sur votre profil public.</p>
                            </div>

                            <div class="flex items-center gap-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-lime-500 hover:bg-lime-600 text-white font-medium rounded-lg transition-colors shadow-sm">
                                    {{ __('Enregistrer') }}
                                </button>

                                @if (session('status') === 'profile-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Enregistré.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
                
                <!-- Changer le mot de passe -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900">{{ __('Mettre à jour le mot de passe') }}</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-gray-600 mb-6">
                            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester sécurisé.') }}
                        </p>

                        <form method="post" action="{{ route('password.update') }}" class="space-y-6">
                            @csrf
                            @method('put')
                            
                            <div>
                                <x-input-label for="update_password_current_password" :value="__('Mot de passe actuel')" class="block text-sm font-medium text-gray-700 mb-1" />
                                <x-text-input id="update_password_current_password" name="current_password" type="password" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500" autocomplete="current-password" />
                                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-sm text-red-600" />
                            </div>
                            
                            <div>
                                <x-input-label for="update_password_password" :value="__('Nouveau mot de passe')" class="block text-sm font-medium text-gray-700 mb-1" />
                                <x-text-input id="update_password_password" name="password" type="password" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-sm text-red-600" />
                            </div>
                            
                            <div>
                                <x-input-label for="update_password_password_confirmation" :value="__('Confirmer le mot de passe')" class="block text-sm font-medium text-gray-700 mb-1" />
                                <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="block w-full rounded-lg border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500" autocomplete="new-password" />
                                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                            </div>
                            
                            <div class="flex items-center gap-4">
                                <button type="submit" class="inline-flex items-center px-4 py-2 bg-lime-500 hover:bg-lime-600 text-white font-medium rounded-lg transition-colors shadow-sm">
                                    {{ __('Mettre à jour') }}
                                </button>

                                @if (session('status') === 'password-updated')
                                    <p
                                        x-data="{ show: true }"
                                        x-show="show"
                                        x-transition
                                        x-init="setTimeout(() => show = false, 2000)"
                                        class="text-sm text-gray-600"
                                    >{{ __('Enregistré.') }}</p>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
              
                <!-- Supprimer le compte -->
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900">{{ __('Supprimer le compte') }}</h3>
                    </div>
                    <div class="p-6">
                        <p class="text-sm text-gray-600 mb-4">
                            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.') }}
                        </p>
                        
                        <button type="button" 
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            {{ __('Supprimer mon compte') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
    <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
        @csrf
        @method('delete')

        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Êtes-vous sûr de vouloir supprimer votre compte ?') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement effacées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
        </p>

        <div class="mt-6">
            <x-input-label for="password" value="{{ __('Mot de passe') }}" class="sr-only" />

            <x-text-input
                id="password"
                name="password"
                type="password"
                class="mt-1 block w-3/4 rounded-lg border-gray-300 shadow-sm focus:border-lime-500 focus:ring-lime-500"
                placeholder="{{ __('Mot de passe') }}"
            />

            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
        </div>

        <div class="mt-6 flex justify-end">
            <button type="button" x-on:click="$dispatch('close')" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500 transition-colors shadow-sm">
                {{ __('Annuler') }}
            </button>

            <button type="submit" class="ml-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-lg font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-colors shadow-sm">
                {{ __('Supprimer le compte') }}
            </button>
        </div>
    </form>
</x-modal>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const avatarUpload = document.getElementById('avatar-upload');
        
        avatarUpload.addEventListener('change', function(event) {
            const file = event.target.files[0];
            
            if (file) {
                // Ici, vous pourriez implémenter un aperçu de l'image avant l'envoi
                // et/ou envoyer l'image au serveur via AJAX
                
                // Exemple d'aperçu (à adapter selon vos besoins)
                const reader = new FileReader();
                reader.onload = function(e) {
                    const avatarImg = document.querySelector('.relative.mx-auto.w-32.h-32.mb-4 img');
                    avatarImg.src = e.target.result;
                };
                reader.readAsDataURL(file);
                
                // Exemple d'envoi au serveur (à adapter selon votre backend)
                const formData = new FormData();
                formData.append('avatar', file);
                formData.append('_token', '{{ csrf_token() }}');
                
               
                .then(response => response.json())
                .then(data => {
                    console.log('Avatar mis à jour avec succès', data);
                })
                .catch(error => {
                    console.error('Erreur lors de la mise à jour de l\'avatar', error);
                });
            }
        });
    });
</script>
</x-dashboard-sidebar>
</x-app-layout>


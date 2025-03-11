<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-bold mb-6">Éditer le projet</h2>

                    <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="space-y-4">
                            <!-- Titre -->
                            <div>
                                <x-input-label for="title" :value="__('Titre')" />
                                <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $project->title) }}" required />
                                <x-input-error :messages="$errors->get('title')" class="mt-2" />
                            </div>

                            <!-- Description -->
                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <textarea id="description" name="description" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>{{ old('description', $project->description) }}</textarea>
                                <x-input-error :messages="$errors->get('description')" class="mt-2" />
                            </div>

                            <!-- Montant objectif -->
                            <div>
                                <x-input-label for="goal_amount" :value="__('Montant objectif')" />
                                <x-text-input id="goal_amount" name="goal_amount" type="number" class="mt-1 block w-full" value="{{ old('goal_amount', $project->goal_amount) }}" required />
                                <x-input-error :messages="$errors->get('goal_amount')" class="mt-2" />
                            </div>

                            <!-- Dates de début et de fin -->
                            <div>
                                <x-input-label for="start_date" :value="__('Date de début')" />
                                <x-text-input id="start_date" name="start_date" type="date" class="mt-1 block w-full" value="{{ old('start_date', $project->start_date) }}" required />
                                <x-input-error :messages="$errors->get('start_date')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="end_date" :value="__('Date de fin')" />
                                <x-text-input id="end_date" name="end_date" type="date" class="mt-1 block w-full" value="{{ old('end_date', $project->end_date) }}" required />
                                <x-input-error :messages="$errors->get('end_date')" class="mt-2" />
                            </div>

                            <!-- Catégorie -->
                            <div>
                                <x-input-label for="category_id" :value="__('Catégorie')" />
                                <select id="category_id" name="category_id" class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ $project->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                            </div>

                            <!-- Images (optionnel) -->
                            <div>
                                <x-input-label for="images" :value="__('Images')" />
                                <input id="images" name="images[]" type="file" class="mt-1 block w-full" multiple>
                                <x-input-error :messages="$errors->get('images')" class="mt-2" />
                            </div>

                            <div>
                                <x-primary-button>
                                    Enregistrer les modifications
                                </x-primary-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@props(['id', 'name', 'placeholder' => 'Sélectionner une option...', 'searchPlaceholder' => 'Rechercher...'])

<div 
    x-data="{ 
        open: false, 
        search: '', 
        selectedValue: '', 
        selectedText: '', 
        init() {
            // Initialiser avec la valeur sélectionnée
            const select = this.$refs.select;
            if (select.options.length > 0 && select.selectedIndex >= 0) {
                this.selectedValue = select.options[select.selectedIndex].value;
                this.selectedText = select.options[select.selectedIndex].text;
            }
        },
        toggle() {
            this.open = !this.open;
            if (this.open) {
                this.$nextTick(() => {
                    this.$refs.searchInput.focus();
                });
            }
        },
        close() {
            this.open = false;
        },
        select(value, text) {
            this.selectedValue = value;
            this.selectedText = text;
            this.$refs.select.value = value;
            this.open = false;
            
            // Déclencher l'événement change sur le select
            const event = new Event('change', { bubbles: true });
            this.$refs.select.dispatchEvent(event);
        }
    }" 
    class="relative"
    @click.away="close()"
    @keydown.escape="close()"
>
    <!-- Select original (caché) -->
    <select x-ref="select" id="{{ $id }}" name="{{ $name }}" {{ $attributes->merge(['class' => 'hidden']) }}>
        {{ $slot }}
    </select>
    
    <!-- Bouton de sélection -->
    <button 
        type="button" 
        @click="toggle()" 
        class="relative w-full bg-white border border-gray-200 rounded-lg pl-3 pr-10 py-2 text-left cursor-pointer focus:outline-none focus:ring-lime-500 focus:border-lime-500"
    >
        <span x-text="selectedText || '{{ $placeholder }}'" class="block truncate"></span>
        <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
            </svg>
        </span>
    </button>
    
    <!-- Dropdown -->
    <div 
        x-show="open" 
        x-transition:enter="transition ease-out duration-100" 
        x-transition:enter-start="transform opacity-0 scale-95" 
        x-transition:enter-end="transform opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-75" 
        x-transition:leave-start="transform opacity-100 scale-100" 
        x-transition:leave-end="transform opacity-0 scale-95" 
        class="absolute z-10 mt-1 w-full bg-white shadow-lg rounded-lg border border-gray-200 overflow-hidden"
        style="display: none;"
    >
        <!-- Champ de recherche -->
        <div class="p-2 border-b border-gray-100">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input 
                    x-ref="searchInput"
                    type="text" 
                    x-model="search" 
                    placeholder="{{ $searchPlaceholder }}" 
                    class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 text-sm"
                    @keydown.enter.prevent=""
                >
            </div>
        </div>
        
        <!-- Liste des options -->
        <div class="max-h-60 overflow-y-auto py-1">
            <template x-for="option in Array.from($refs.select.options).filter(opt => opt.text.toLowerCase().includes(search.toLowerCase()))" :key="option.value">
                <div 
                    @click="select(option.value, option.text)" 
                    :class="{ 'bg-lime-50 text-lime-700': selectedValue === option.value, 'hover:bg-gray-50': selectedValue !== option.value }"
                    class="px-4 py-2 cursor-pointer text-sm"
                    x-text="option.text"
                ></div>
            </template>
            
            <!-- Message si aucun résultat -->
            <div 
                x-show="Array.from($refs.select.options).filter(opt => opt.text.toLowerCase().includes(search.toLowerCase())).length === 0"
                class="px-4 py-2 text-sm text-gray-500 text-center"
            >
                Aucun résultat trouvé
            </div>
        </div>
    </div>
</div>

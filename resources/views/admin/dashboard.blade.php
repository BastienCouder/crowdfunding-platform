<x-dashboard>
    <x-dashboard-sidebar >

<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête avec navigation vers les autres pages d'admin -->
        <div class="mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <h1 class="text-2xl font-bold text-gray-900">Vue d'ensemble</h1>
                <div class="flex space-x-3">
                    <a href="{{ route('admin.projects') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-fg bg-lime-300 hover:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                        </svg>
                        Gestion des projets
                    </a>
                    <a href="{{ route('admin.users') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-fg bg-lime-300 hover:bg-lime-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-lime-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="-ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        Gestion des utilisateurs
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistiques générales -->
        <div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4">
            <!-- Total des projets -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-lime-200 rounded-md p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total des projets</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">{{ $stats['total_projects'] }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total des utilisateurs -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-lime-200 rounded-md p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total des utilisateurs</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">{{ $stats['total_users'] }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total des contributions -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-lime-200 rounded-md p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Total des contributions</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">{{ $stats['total_contributions'] }}</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Montant total collecté -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0 bg-lime-200 rounded-md p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-lime-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                            </svg>
                        </div>
                        <div class="ml-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 truncate">Montant total collecté</dt>
                                <dd class="flex items-baseline">
                                    <div class="text-2xl font-semibold text-gray-900">{{ number_format($stats['total_amount'], 0, ',', ' ') }} €</div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Graphique des projets par statut -->
        <div class="mb-8 grid grid-cols-1 gap-5 lg:grid-cols-2">
            <!-- Projets par statut -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-5 py-4 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Projets par statut</h3>
                </div>
                <div class="p-5">
                    <div class="flex items-center justify-center h-54">                      <div class="w-full max-w-md">
                            <div class="flex justify-between mb-2">
                                <span class="text-sm font-medium text-gray-600">En attente</span>
                                <span class="text-sm font-medium text-gray-900">{{ $stats['pending_projects'] }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-yellow-400 h-2.5 rounded-full" style="width: {{ ($stats['pending_projects'] / max($stats['total_projects'], 1)) * 100 }}%"></div>
                            </div>
                            
                            <div class="flex justify-between mb-2 mt-4">
                                <span class="text-sm font-medium text-gray-600">Approuvés</span>
                                <span class="text-sm font-medium text-gray-900">{{ $stats['approved_projects'] }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-green-500 h-2.5 rounded-full" style="width: {{ ($stats['approved_projects'] / max($stats['total_projects'], 1)) * 100 }}%"></div>
                            </div>
                            
                            <div class="flex justify-between mb-2 mt-4">
                                <span class="text-sm font-medium text-gray-600">Rejetés</span>
                                <span class="text-sm font-medium text-gray-900">{{ $stats['rejected_projects'] }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-red-500 h-2.5 rounded-full" style="width: {{ ($stats['rejected_projects'] / max($stats['total_projects'], 1)) * 100 }}%"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Projets par catégorie -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-5 py-4 border-b border-gray-200">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Projets par catégorie</h3>
                </div>
                <div class="p-5">
                    <div class="h-54 o5erflow-y-auto">
                        @foreach($stats['projects_by_category'] as $category)
                        <div class="mb-4">
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium text-gray-600">{{ $category['name'] }}</span>
                                <span class="text-sm font-medium text-gray-900">{{ $category['count'] }}</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2.5">
                                <div class="bg-lime-500 h-2.5 rounded-full" style="width: {{ ($category['count'] / max($stats['total_projects'], 1)) * 100 }}%"></div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <!-- Projets récents et utilisateurs récents -->
        <div class="grid grid-cols-1 gap-5 lg:grid-cols-2">
            <!-- Projets récents -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Projets récents</h3>
                    <a href="{{ route('admin.projects') }}" class="text-sm font-medium text-lime-600 hover:text-lime-500">Voir tous</a>
                </div>
                <div class="p-5">
                    <div class="flow-root">
                        <ul role="list" class="-my-5 divide-y divide-gray-200">
                            @foreach($recent_projects as $project)
                            <li class="py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        @if(count($project->images) > 0)
                                            <img class="h-10 w-10 rounded-md object-cover" src="{{ asset('storage/' . $project->images[0]->image_url) }}" alt="{{ $project->title }}">
                                        @else
                                            <div class="h-10 w-10 rounded-md bg-gray-200 flex items-center justify-center">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $project->title }}</p>
                                        <p class="text-sm text-gray-500 truncate">{{ $project->user->name }}</p>
                                    </div>
                                    <div>
                                        @if($project->status === 'pending')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                En attente
                                            </span>
                                        @elseif($project->status === 'approved')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Approuvé
                                            </span>
                                        @elseif($project->status === 'rejected')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Rejeté
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Utilisateurs récents -->
            <div class="bg-white overflow-hidden shadow rounded-lg">
                <div class="px-5 py-4 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Utilisateurs récents</h3>
                    <a href="{{ route('admin.users') }}" class="text-sm font-medium text-lime-600 hover:text-lime-500">Voir tous</a>
                </div>
                <div class="p-5">
                    <div class="flow-root">
                        <ul role="list" class="-my-5 divide-y divide-gray-200">
                            @foreach($recent_users as $user)
                            <li class="py-4">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <img class="h-10 w-10 rounded-full" src="{{ $user->avatar }}" alt="{{ $user->name }}">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-medium text-gray-900 truncate">{{ $user->name }}</p>
                                        <p class="text-sm text-gray-500 truncate">{{ $user->email }}</p>
                                    </div>
                                    <div>
                                        @if($user->is_admin)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                                Admin
                                            </span>
                                        @else
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Utilisateur
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-dashboard>
</x-dashboard-layout>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab switching
        const tabButtons = document.querySelectorAll('.tab-button');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remove active class from all buttons and contents
                tabButtons.forEach(btn => {
                    btn.classList.remove('border-lime-500', 'text-lime-600');
                    btn.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                });
                
                tabContents.forEach(content => {
                    content.classList.add('hidden');
                });
                
                // Add active class to clicked button
                button.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                button.classList.add('border-lime-500', 'text-lime-600');
                
                // Show corresponding content
                const contentId = 'content-' + button.id.split('-')[1];
                document.getElementById(contentId).classList.remove('hidden');
            });
        });
        
        // Project status modal
        const projectStatusButtons = document.querySelectorAll('.project-status-btn');
        const projectStatusModal = document.getElementById('project-status-modal');
        const projectStatusForm = document.getElementById('project-status-form');
        
        projectStatusButtons.forEach(button => {
            button.addEventListener('click', () => {
                const projectId = button.getAttribute('data-project-id');
                projectStatusForm.action = `/admin/projects/${projectId}/status`;
                projectStatusModal.classList.remove('hidden');
            });
        });
        
        // User form modal
        const addUserButton = document.getElementById('add-user-btn');
        const editUserButtons = document.querySelectorAll('.edit-user-btn');
        const userFormModal = document.getElementById('user-form-modal');
        const userForm = document.getElementById('user-form');
        const userFormTitle = document.getElementById('user-form-title');
        const userFormMethod = document.getElementById('user-form-method');
        
        addUserButton.addEventListener('click', () => {
            userFormTitle.textContent = 'Ajouter un utilisateur';
            userForm.reset();
            userForm.action = '/admin/users';
            userFormMethod.innerHTML = '';
            document.getElementById('user-password').required = true;
            document.getElementById('user-password-confirmation').required = true;
            userFormModal.classList.remove('hidden');
        });
        
        editUserButtons.forEach(button => {
            button.addEventListener('click', () => {
                const userId = button.getAttribute('data-user-id');
                userFormTitle.textContent = 'Modifier l\'utilisateur';
                userForm.action = `/admin/users/${userId}`;
                userFormMethod.innerHTML = '<input type="hidden" name="_method" value="PATCH">';
                document.getElementById('user-password').required = false;
                document.getElementById('user-password-confirmation').required = false;
                
                // Fetch user data and populate form
                fetch(`/admin/users/${userId}/edit`)
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById('user-name').value = data.name;
                        document.getElementById('user-email').value = data.email;
                        document.getElementById('user-is-admin').checked = data.is_admin;
                    });
                
                userFormModal.classList.remove('hidden');
            });
        });
        
        // Delete user modal
        const deleteUserButtons = document.querySelectorAll('.delete-user-btn');
        const deleteUserModal = document.getElementById('delete-user-modal');
        const deleteUserForm = document.getElementById('delete-user-form');
        
        deleteUserButtons.forEach(button => {
            button.addEventListener('click', () => {
                const userId = button.getAttribute('data-user-id');
                deleteUserForm.action = `/admin/users/${userId}`;
                deleteUserModal.classList.remove('hidden');
            });
        });
        
        // Close modals
        const closeModalButtons = document.querySelectorAll('.close-modal');
        
        closeModalButtons.forEach(button => {
            button.addEventListener('click', () => {
                projectStatusModal.classList.add('hidden');
                userFormModal.classList.add('hidden');
                deleteUserModal.classList.add('hidden');
            });
        });
        
        // Search functionality
        const searchProjects = document.getElementById('search-projects');
        const searchUsers = document.getElementById('search-users');
        
        searchProjects.addEventListener('input', debounce(function() {
            const searchTerm = this.value.toLowerCase();
            const projectRows = document.querySelectorAll('#content-projects tbody tr');
            
            projectRows.forEach(row => {
                const projectTitle = row.querySelector('td:first-child .text-gray-900').textContent.toLowerCase();
                const projectCreator = row.querySelector('td:nth-child(2) .text-gray-900').textContent.toLowerCase();
                
                if (projectTitle.includes(searchTerm) || projectCreator.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }, 300));
        
        searchUsers.addEventListener('input', debounce(function() {
            const searchTerm = this.value.toLowerCase();
            const userRows = document.querySelectorAll('#content-users tbody tr');
            
            userRows.forEach(row => {
                const userName = row.querySelector('td:first-child .text-gray-900').textContent.toLowerCase();
                const userEmail = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                
                if (userName.includes(searchTerm) || userEmail.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }, 300));
        
        // Filter functionality
        const filterStatus = document.getElementById('filter-status');
        const filterCategory = document.getElementById('filter-category');
        
        function applyFilters() {
            const statusFilter = filterStatus.value;
            const categoryFilter = filterCategory.value;
            const projectRows = document.querySelectorAll('#content-projects tbody tr');
            
            projectRows.forEach(row => {
                let showRow = true;
                
                if (statusFilter) {
                    const statusText = row.querySelector('td:nth-child(5) span').textContent.trim().toLowerCase();
                    if (statusFilter === 'pending' && !statusText.includes('attente')) showRow = false;
                    if (statusFilter === 'approved' && !statusText.includes('approuvé')) showRow = false;
                    if (statusFilter === 'rejected' && !statusText.includes('rejeté')) showRow = false;
                }
                
                if (categoryFilter && showRow) {
                    const categoryText = row.querySelector('td:nth-child(3) span').textContent.trim();
                    const categories = document.querySelectorAll('#filter-category option');
                    let categoryName = '';
                    
                    categories.forEach(option => {
                        if (option.value === categoryFilter) {
                            categoryName = option.textContent;
                        }
                    });
                    
                    if (categoryText !== categoryName) showRow = false;
                }
                
                row.style.display = showRow ? '' : 'none';
            });
        }
        
        filterStatus.addEventListener('change', applyFilters);
        filterCategory.addEventListener('change', applyFilters);
        
        // Utility function for debouncing
        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func.apply(this, args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }
    });
</script>



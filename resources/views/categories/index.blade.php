<x-app-layout>
    <x-slot name="header">
        Categorías
    </x-slot>

    <!-- Breadcrumb -->
    <nav class="mb-6">
        <ol class="flex items-center space-x-2 text-sm text-muted-foreground">
            <li><a href="{{ route('dashboard') }}" class="hover:text-foreground transition-colors">Dashboard</a></li>
            <li><span class="mx-2">/</span></li>
            <li class="text-foreground font-medium">Categorías</li>
        </ol>
    </nav>

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-2xl font-bold text-foreground">Gestión de Categorías</h2>
            <p class="text-muted-foreground mt-1">Administra las categorías de productos de tu tienda</p>
        </div>
        <button id="btnNewCategory" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-[#1e3a5f] text-white font-medium rounded-full hover:bg-[#2d4a6f] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
            Nueva Categoría
        </button>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
        <div class="bg-card rounded-xl border border-border p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-blue-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-muted-foreground">Total Categorías</p>
                    <p class="text-2xl font-bold text-foreground" id="statTotal">{{ $totalCategories }}</p>
                </div>
            </div>
        </div>
        <div class="bg-card rounded-xl border border-border p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-green-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-muted-foreground">Activas</p>
                    <p class="text-2xl font-bold text-foreground" id="statActive">{{ $activeCategories }}</p>
                </div>
            </div>
        </div>
        {{-- <div class="bg-card rounded-xl border border-border p-6">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-lg bg-yellow-100 flex items-center justify-center">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-muted-foreground">Subcategorías</p>
                    <p class="text-2xl font-bold text-foreground" id="statSubcategories">{{ $categories->sum('children_count') }}</p>
                </div>
            </div>
        </div> --}}
    </div>

    <!-- Table Card -->
    <div class="bg-card rounded-xl border border-border overflow-hidden">
        <!-- Table Header -->
        <div class="px-6 py-4 border-b border-border flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <h3 class="text-lg font-semibold text-foreground">Listado de Categorías</h3>
            <div class="flex items-center gap-3">
                <div class="relative">
                        <input type="text" id="searchInput" aria-label="Buscar categoría" placeholder="Buscar categoría..." 
                            class="w-64 pl-12 pr-4 py-2.5 bg-background border border-border rounded-full text-sm text-foreground placeholder-muted-foreground focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] focus:border-transparent">
                        <svg class="w-5 h-5 text-muted-foreground absolute left-3 top-1/2 -translate-y-1/2 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table id="categoriesTable" class="w-full">
                <thead>
                    <tr class="bg-muted/50">
                        {{-- <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">ID</th> --}}
                        <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Categoría</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Descripción</th>
                        {{-- <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Padre</th> --}}
                        <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Estado</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-muted-foreground uppercase tracking-wider">Fecha</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-muted-foreground uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-border" id="categoriesTableBody">
                    @forelse($categories as $category)
                    <tr class="hover:bg-muted/30 transition-colors" data-id="{{ $category->id }}">
                        {{-- <td class="px-6 py-4 text-sm text-muted-foreground">{{ $category->id }}</td> --}}
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-gradient-to-br from-[#1e3a5f] to-[#2d4a6f] flex items-center justify-center">
                                    @if($category->image)
                                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name_es }}" class="w-10 h-10 rounded-lg object-cover">
                                    @else
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
                                        </svg>
                                    @endif
                                </div>
                                <span class="font-medium text-foreground">{{ $category->name_es }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-sm text-muted-foreground max-w-xs truncate">{{ $category->description_es ?? '-' }}</td>
                        {{-- <td class="px-6 py-4 text-sm text-muted-foreground">{{ $category->parent ? $category->parent->name_es : '-' }}</td> --}}
                        <td class="px-6 py-4">
                            <button 
                                class="btn-toggle-active inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium cursor-pointer transition-colors {{ $category->is_active ? 'bg-green-100 text-green-800 hover:bg-green-200' : 'bg-yellow-100 text-yellow-800 hover:bg-yellow-200' }}"
                                data-id="{{ $category->id }}"
                                data-active="{{ $category->is_active ? '1' : '0' }}"
                            >
                                {{ $category->is_active ? 'Activa' : 'Inactiva' }}
                            </button>
                        </td>
                        <td class="px-6 py-4 text-sm text-muted-foreground">{{ $category->created_at->format('d M Y') }}</td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                
                                <button class="p-2 text-muted-foreground hover:text-yellow-600 hover:bg-yellow-50 rounded-lg transition-colors btn-edit" data-id="{{ $category->id }}" title="Editar">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button class="p-2 text-muted-foreground hover:text-red-600 hover:bg-red-50 rounded-lg transition-colors btn-delete" data-id="{{ $category->id }}" title="Eliminar">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr id="emptyRow">
                        <td colspan="7" class="px-6 py-12 text-center text-muted-foreground">
                            <svg class="w-12 h-12 mx-auto mb-4 text-muted-foreground/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <p class="text-lg font-medium">No hay categorías</p>
                            <p class="text-sm">Crea tu primera categoría para comenzar</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($categories->hasPages())
        <div class="px-6 py-4 border-t border-border">
            {{ $categories->links() }}
        </div>
        @endif
    </div>

    @push('scripts')
        <script>
            const csrfToken = document.querySelector('meta[name="csrf-token"]').content;

            // Helper para fetch con CSRF
            async function fetchApi(url, options = {}) {
                const isForm = options.body instanceof FormData;
                const headers = {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                };
                if (!isForm) {
                    headers['Content-Type'] = 'application/json';
                }

                const response = await fetch(url, { ...options, headers: { ...headers, ...(options.headers || {}) } });
                return response.json();
            }

            // Formulario HTML para crear/editar categoría
            function getCategoryFormHtml(category = null) {
                return `
                    <div class="text-left space-y-4">
                        <!-- Tabs para idiomas -->
                        <div class="border-b border-gray-200">
                            <nav class="flex space-x-4" id="langTabs">
                                <button type="button" class="lang-tab active px-3 py-2 text-sm font-medium text-[#1e3a5f] border-b-2 border-[#1e3a5f]" data-lang="es">Castellano *</button>
                                <button type="button" class="lang-tab px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700" data-lang="ca">Catalán</button>
                                <button type="button" class="lang-tab px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700" data-lang="en">Inglés</button>
                                <button type="button" class="lang-tab px-3 py-2 text-sm font-medium text-gray-500 hover:text-gray-700" data-lang="de">Alemán</button>
                            </nav>
                        </div>
                        
                        <!-- Campos ES -->
                        <div class="lang-content" data-lang="es">
                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre (Castellano) *</label>
                                <input type="text" id="swal-name_es" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] focus:border-transparent" value="${category?.name_es || ''}" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción (Castellano)</label>
                                <textarea id="swal-description_es" rows="2" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] focus:border-transparent">${category?.description_es || ''}</textarea>
                            </div>
                        </div>
                        
                        <!-- Campos CA -->
                        <div class="lang-content hidden" data-lang="ca">
                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre (Catalán)</label>
                                <input type="text" id="swal-name_ca" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] focus:border-transparent" value="${category?.name_ca || ''}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción (Catalán)</label>
                                <textarea id="swal-description_ca" rows="2" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] focus:border-transparent">${category?.description_ca || ''}</textarea>
                            </div>
                        </div>
                        
                        <!-- Campos EN -->
                        <div class="lang-content hidden" data-lang="en">
                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre (Inglés)</label>
                                <input type="text" id="swal-name_en" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] focus:border-transparent" value="${category?.name_en || ''}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción (Inglés)</label>
                                <textarea id="swal-description_en" rows="2" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] focus:border-transparent">${category?.description_en || ''}</textarea>
                            </div>
                        </div>
                        
                        <!-- Campos DE -->
                        <div class="lang-content hidden" data-lang="de">
                            <div class="mb-3">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre (Alemán)</label>
                                <input type="text" id="swal-name_de" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] focus:border-transparent" value="${category?.name_de || ''}">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Descripción (Alemán)</label>
                                <textarea id="swal-description_de" rows="2" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f] focus:border-transparent">${category?.description_de || ''}</textarea>
                            </div>
                        </div>
                        
                        <!-- Campos comunes -->
                        <div class="pt-4 border-t border-gray-200">
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Orden</label>
                                    <input type="number" id="swal-order" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1e3a5f]" value="${category?.order || 0}">
                                </div>
                                <div class="relative">
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Categoría padre</label>
                                    <select id="swal-parent_id" class="block w-full bg-white text-sm text-gray-700 border border-gray-200 rounded-md px-3 py-2 pr-8 appearance-none focus:outline-none focus:ring-2 focus:ring-[#1e3a5f]">
                                        <option value="">Sin padre</option>
                                    </select>
                                    <svg class="pointer-events-none absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            <div class="mt-4">
                                <label class="block text-sm font-medium text-gray-700 mb-1">Imagen</label>
                                <input type="file" id="swal-image" accept="image/*" class="block w-full text-sm text-gray-700 bg-white border border-gray-200 rounded-md px-3 py-2 shadow-sm" />
                                <p class="text-xs text-muted-foreground mt-2">Formato recomendado: JPEG/PNG/WebP. Máx 2MB.</p>
                                <div id="swal-image-preview" class="mt-2 text-sm text-muted-foreground"></div>
                            </div>
                        </div>
                    </div>
                `;
            }

            // Inicializar tabs del formulario
            function initFormTabs() {
                document.querySelectorAll('.lang-tab').forEach(tab => {
                    tab.addEventListener('click', function() {
                        const lang = this.dataset.lang;
                        
                        // Actualizar tabs
                        document.querySelectorAll('.lang-tab').forEach(t => {
                            t.classList.remove('active', 'text-[#1e3a5f]', 'border-b-2', 'border-[#1e3a5f]');
                            t.classList.add('text-gray-500');
                        });
                        this.classList.add('active', 'text-[#1e3a5f]', 'border-b-2', 'border-[#1e3a5f]');
                        this.classList.remove('text-gray-500');
                        
                        // Mostrar contenido
                        document.querySelectorAll('.lang-content').forEach(content => {
                            content.classList.add('hidden');
                        });
                        document.querySelector(`.lang-content[data-lang="${lang}"]`).classList.remove('hidden');
                    });
                });
            }

            // Cargar categorías padre en el select
            async function loadParentCategories(excludeId = null) {
                const response = await fetchApi('/categories/all');
                if (response.success) {
                    const select = document.getElementById('swal-parent_id');
                    if (!select) return; // El select puede estar comentado o no renderizado

                    // Limpiar opciones previas (mantener la primera 'Sin padre' si existe)
                    while (select.options.length > 1) {
                        select.remove(1);
                    }

                    response.categories.forEach(cat => {
                        if (cat.id !== excludeId) {
                            const option = document.createElement('option');
                            option.value = cat.id;
                            option.textContent = cat.name_es;
                            select.appendChild(option);
                        }
                    });
                }
            }

            // Obtener datos del formulario
            function getFormData() {
                return {
                    name_es: document.getElementById('swal-name_es').value,
                    name_ca: document.getElementById('swal-name_ca').value,
                    name_en: document.getElementById('swal-name_en').value,
                    name_de: document.getElementById('swal-name_de').value,
                    description_es: document.getElementById('swal-description_es').value,
                    description_ca: document.getElementById('swal-description_ca').value,
                    description_en: document.getElementById('swal-description_en').value,
                    description_de: document.getElementById('swal-description_de').value,
                    order: parseInt(document.getElementById('swal-order').value) || 0,
                    parent_id: (function(){ const el = document.getElementById('swal-parent_id'); return el ? (el.value || null) : null; })()
                };
            }

            $(document).ready(function() {
                // Búsqueda
                $('#searchInput').on('keyup', function() {
                    const searchTerm = $(this).val().toLowerCase();
                    $('#categoriesTableBody tr').each(function() {
                        if ($(this).attr('id') === 'emptyRow') return;
                        const text = $(this).text().toLowerCase();
                        $(this).toggle(text.indexOf(searchTerm) > -1);
                    });
                });

                // Nueva Categoría
                $('#btnNewCategory').on('click', async function() {
                    const result = await Swal.fire({
                        title: 'Nueva Categoría',
                        html: getCategoryFormHtml(),
                        width: '600px',
                        showCancelButton: true,
                        confirmButtonText: 'Crear Categoría',
                        cancelButtonText: 'Cancelar',
                        confirmButtonColor: '#1e3a5f',
                        cancelButtonColor: '#6b7280',
                        customClass: {
                            popup: 'rounded-xl',
                            confirmButton: 'rounded-full px-6',
                            cancelButton: 'rounded-full px-6'
                        },
                        didOpen: () => {
                            initFormTabs();
                            loadParentCategories();
                        },
                        preConfirm: () => {
                            const name_es = document.getElementById('swal-name_es').value;
                            if (!name_es) {
                                Swal.showValidationMessage('El nombre en castellano es obligatorio');
                                return false;
                            }
                            return getFormData();
                        }
                    });

                    if (result.isConfirmed) {
                        // Construir FormData para subir imágenes
                        const formObj = result.value;
                        const formData = new FormData();
                        Object.keys(formObj).forEach(key => {
                            if (formObj[key] !== null && formObj[key] !== undefined) {
                                formData.append(key, formObj[key]);
                            }
                        });
                        const fileInput = document.getElementById('swal-image');
                        if (fileInput && fileInput.files && fileInput.files.length) {
                            formData.append('image', fileInput.files[0]);
                        }

                        const response = await fetchApi('/categories', {
                            method: 'POST',
                            body: formData
                        });

                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Categoría creada!',
                                text: response.message,
                                confirmButtonColor: '#1e3a5f',
                                customClass: { popup: 'rounded-xl', confirmButton: 'rounded-full px-6' }
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Error al crear la categoría',
                                confirmButtonColor: '#1e3a5f'
                            });
                        }
                    }
                });

                // Editar Categoría
                $(document).on('click', '.btn-edit', async function() {
                    const categoryId = $(this).data('id');
                    
                    // Obtener datos de la categoría
                    const categoryResponse = await fetchApi(`/categories/${categoryId}`);
                    if (!categoryResponse.success) {
                        Swal.fire({ icon: 'error', title: 'Error', text: 'No se pudo cargar la categoría' });
                        return;
                    }
                    
                    const category = categoryResponse.category;

                    const result = await Swal.fire({
                        title: 'Editar Categoría',
                        html: getCategoryFormHtml(category),
                        width: '600px',
                        showCancelButton: true,
                        confirmButtonText: 'Guardar Cambios',
                        cancelButtonText: 'Cancelar',
                        confirmButtonColor: '#1e3a5f',
                        cancelButtonColor: '#6b7280',
                        customClass: {
                            popup: 'rounded-xl',
                            confirmButton: 'rounded-full px-6',
                            cancelButton: 'rounded-full px-6'
                        },
                        didOpen: async () => {
                            initFormTabs();
                            await loadParentCategories(category.id);
                            if (category.parent_id) {
                                const el = document.getElementById('swal-parent_id'); if (el) el.value = category.parent_id;
                            }
                            // Mostrar nombre/miniatura de la imagen existente (si aplica)
                            try {
                                const previewEl = document.getElementById('swal-image-preview');
                                if (previewEl) {
                                    if (category && category.image) {
                                        const filename = category.image.split('/').pop();
                                        const imageUrl = category.image.startsWith('http') ? category.image : ('/storage/' + category.image);
                                        previewEl.innerHTML = `\n                                            <div class="flex items-center gap-3">\n                                                <img src="${imageUrl}" alt="${filename}" class="h-12 w-12 object-cover rounded" onerror="this.style.display='none'" />\n                                                <div>\n                                                    <div class="font-medium">${filename}</div>\n                                                    <a href="${imageUrl}" target="_blank" class="text-sm text-[#1e3a5f]">Ver imagen</a>\n                                                </div>\n                                            </div>\n                                        `;
                                    } else {
                                        previewEl.innerHTML = '<span class="text-sm text-muted-foreground">No hay imagen subida</span>';
                                    }
                                }
                            } catch (e) {
                                console.warn('Error mostrando preview de imagen:', e);
                            }
                        },
                        preConfirm: () => {
                            const name_es = document.getElementById('swal-name_es').value;
                            if (!name_es) {
                                Swal.showValidationMessage('El nombre en castellano es obligatorio');
                                return false;
                            }
                            return getFormData();
                        }
                    });

                    if (result.isConfirmed) {
                        // Construir FormData y usar _method=PUT para que PHP reciba archivos
                        const formObj = result.value;
                        const formData = new FormData();
                        Object.keys(formObj).forEach(key => {
                            if (formObj[key] !== null && formObj[key] !== undefined) {
                                formData.append(key, formObj[key]);
                            }
                        });
                        formData.append('_method', 'PUT');
                        const fileInput = document.getElementById('swal-image');
                        if (fileInput && fileInput.files && fileInput.files.length) {
                            formData.append('image', fileInput.files[0]);
                        }

                        const response = await fetchApi(`/categories/${categoryId}`, {
                            method: 'POST',
                            body: formData
                        });

                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Actualizada!',
                                text: response.message,
                                confirmButtonColor: '#1e3a5f',
                                customClass: { popup: 'rounded-xl', confirmButton: 'rounded-full px-6' }
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Error al actualizar la categoría',
                                confirmButtonColor: '#1e3a5f'
                            });
                        }
                    }
                });

                // Ver Categoría
                $(document).on('click', '.btn-view', async function() {
                    const categoryId = $(this).data('id');
                    const response = await fetchApi(`/categories/${categoryId}`);
                    
                    if (response.success) {
                        const cat = response.category;
                        Swal.fire({
                            title: cat.name_es,
                            html: `
                                <div class="text-left space-y-3">
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-sm text-gray-500">Castellano</p>
                                            <p class="font-medium">${cat.name_es}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Catalán</p>
                                            <p class="font-medium">${cat.name_ca || '-'}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Inglés</p>
                                            <p class="font-medium">${cat.name_en || '-'}</p>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Alemán</p>
                                            <p class="font-medium">${cat.name_de || '-'}</p>
                                        </div>
                                    </div>
                                    <div class="pt-3 border-t">
                                        <p class="text-sm text-gray-500">Descripción</p>
                                        <p>${cat.description_es || 'Sin descripción'}</p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4 pt-3 border-t">
                                        <div>
                                            <p class="text-sm text-gray-500">Estado</p>
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${cat.is_active ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800'}">
                                                ${cat.is_active ? 'Activa' : 'Inactiva'}
                                            </span>
                                        </div>
                                        <div>
                                            <p class="text-sm text-gray-500">Orden</p>
                                            <p class="font-medium">${cat.order}</p>
                                        </div>
                                    </div>
                                </div>
                            `,
                            confirmButtonText: 'Cerrar',
                            confirmButtonColor: '#1e3a5f',
                            customClass: { popup: 'rounded-xl', confirmButton: 'rounded-full px-6' }
                        });
                    }
                });

                // Eliminar Categoría
                $(document).on('click', '.btn-delete', async function() {
                    const categoryId = $(this).data('id');
                    
                    const result = await Swal.fire({
                        title: '¿Eliminar categoría?',
                        text: 'Esta acción no se puede deshacer.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar',
                        confirmButtonColor: '#dc2626',
                        cancelButtonColor: '#6b7280',
                        customClass: {
                            popup: 'rounded-xl',
                            confirmButton: 'rounded-full px-6',
                            cancelButton: 'rounded-full px-6'
                        }
                    });

                    if (result.isConfirmed) {
                        const response = await fetchApi(`/categories/${categoryId}`, {
                            method: 'DELETE'
                        });

                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '¡Eliminada!',
                                text: response.message,
                                confirmButtonColor: '#1e3a5f',
                                customClass: { popup: 'rounded-xl', confirmButton: 'rounded-full px-6' }
                            }).then(() => {
                                window.location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Error al eliminar la categoría',
                                confirmButtonColor: '#1e3a5f'
                            });
                        }
                    }
                });

                // Toggle Active
                $(document).on('click', '.btn-toggle-active', async function() {
                    const categoryId = $(this).data('id');
                    const button = $(this);
                    
                    const response = await fetchApi(`/categories/${categoryId}/toggle-active`, {
                        method: 'PATCH'
                    });

                    if (response.success) {
                        // Actualizar el botón visualmente
                        if (response.is_active) {
                            button.removeClass('bg-yellow-100 text-yellow-800 hover:bg-yellow-200')
                                .addClass('bg-green-100 text-green-800 hover:bg-green-200')
                                .text('Activa')
                                .data('active', '1');
                        } else {
                            button.removeClass('bg-green-100 text-green-800 hover:bg-green-200')
                                .addClass('bg-yellow-100 text-yellow-800 hover:bg-yellow-200')
                                .text('Inactiva')
                                .data('active', '0');
                        }

                        // Actualizar contador
                        const activeCount = $('.btn-toggle-active[data-active="1"]').length;
                        $('#statActive').text(activeCount);

                        // Mostrar notificación
                        const Toast = Swal.mixin({
                            toast: true,
                            position: 'top-end',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true
                        });
                        Toast.fire({
                            icon: 'success',
                            title: response.message
                        });
                    }
                });
            });
        </script>
    @endpush
</x-app-layout>

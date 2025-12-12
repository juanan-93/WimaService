@props(['expanded' => true])

<aside 
    :class="sidebarExpanded ? 'w-64' : 'w-20'" 
    class="fixed left-0 top-0 h-screen bg-[#1e3a5f] border-r border-[#1e3a5f]/80 transition-all duration-300 z-50 flex flex-col"
>
    <!-- Logo & Toggle -->
    <div class="h-16 flex items-center justify-between px-4 border-b border-white/10">
        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 overflow-hidden">
            <img src="/images/wima-logo.png" alt="WIMA SERVICE" class="h-10 w-auto" :class="sidebarExpanded ? '' : 'hidden'" />
            <img src="/images/icon-light-32x32.png" alt="WIMA" class="h-8 w-8" :class="sidebarExpanded ? 'hidden' : ''" />
        </a>
        <button 
            @click="sidebarExpanded = !sidebarExpanded" 
            class="p-2 rounded-lg text-white/70 hover:text-white hover:bg-white/10 transition-colors"
        >
            <svg :class="sidebarExpanded ? '' : 'rotate-180'" class="w-5 h-5 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
        <!-- Dashboard -->
        <a 
            href="{{ route('dashboard') }}" 
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('dashboard') ? 'bg-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }}"
        >
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            <span :class="sidebarExpanded ? 'opacity-100' : 'opacity-0 w-0'" class="transition-all duration-200 whitespace-nowrap overflow-hidden">Dashboard</span>
        </a>

        <!-- Productos -->
        <a 
            href="{{ route('products.index') }}" 
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('products.*') ? 'bg-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }}"
        >
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
            </svg>
            <span :class="sidebarExpanded ? 'opacity-100' : 'opacity-0 w-0'" class="transition-all duration-200 whitespace-nowrap overflow-hidden">Productos</span>
        </a>

        <!-- Categorías -->
        <a 
            href="{{ route('categories.index') }}" 
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors {{ request()->routeIs('categories.*') ? 'bg-white/20 text-white' : 'text-white/70 hover:text-white hover:bg-white/10' }}"
        >
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" />
            </svg>
            <span :class="sidebarExpanded ? 'opacity-100' : 'opacity-0 w-0'" class="transition-all duration-200 whitespace-nowrap overflow-hidden">Categorías</span>
        </a>

        <!-- Clientes -->
        <a 
            href="#" 
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-white/70 hover:text-white hover:bg-white/10"
        >
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
            <span :class="sidebarExpanded ? 'opacity-100' : 'opacity-0 w-0'" class="transition-all duration-200 whitespace-nowrap overflow-hidden">Clientes</span>
        </a>

        <!-- Pedidos -->
        <a 
            href="#" 
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-white/70 hover:text-white hover:bg-white/10"
        >
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
            </svg>
            <span :class="sidebarExpanded ? 'opacity-100' : 'opacity-0 w-0'" class="transition-all duration-200 whitespace-nowrap overflow-hidden">Pedidos</span>
        </a>

        <!-- Separador -->
        <div class="my-4 border-t border-white/10"></div>

        <!-- Configuración -->
        <a 
            href="#" 
            class="flex items-center gap-3 px-3 py-2.5 rounded-xl transition-colors text-white/70 hover:text-white hover:bg-white/10"
        >
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
            <span :class="sidebarExpanded ? 'opacity-100' : 'opacity-0 w-0'" class="transition-all duration-200 whitespace-nowrap overflow-hidden">Configuración</span>
        </a>
    </nav>

    <!-- User Section -->
    <div class="border-t border-white/10 p-3">
        <div class="flex items-center gap-3 px-3 py-2.5 rounded-xl bg-white/5">
            <div class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center flex-shrink-0">
                <span class="text-white text-sm font-medium">{{ substr(Auth::user()->name, 0, 1) }}</span>
            </div>
            <div :class="sidebarExpanded ? 'opacity-100' : 'opacity-0 w-0'" class="transition-all duration-200 overflow-hidden">
                <p class="text-sm font-medium text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-xs text-white/60 truncate">{{ Auth::user()->email }}</p>
            </div>
        </div>
        
        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="mt-2">
            @csrf
            <button 
                type="submit"
                class="w-full flex items-center gap-3 px-3 py-2.5 rounded-xl text-white/70 hover:text-white hover:bg-white/10 transition-colors"
            >
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                <span :class="sidebarExpanded ? 'opacity-100' : 'opacity-0 w-0'" class="transition-all duration-200 whitespace-nowrap overflow-hidden">Cerrar sesión</span>
            </button>
        </form>
    </div>
</aside>

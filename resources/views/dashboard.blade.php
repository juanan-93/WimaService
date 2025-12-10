<x-app-layout>
    <x-slot name="header">
        Dashboard
    </x-slot>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
        <!-- Card 1 -->
        <div class="bg-card border border-border rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-[#1e3a5f]/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#1e3a5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+12%</span>
            </div>
            <p class="text-2xl font-semibold text-foreground">24</p>
            <p class="text-sm text-muted-foreground">Productos activos</p>
        </div>

        <!-- Card 2 -->
        <div class="bg-card border border-border rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-[#1e3a5f]/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#1e3a5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+8%</span>
            </div>
            <p class="text-2xl font-semibold text-foreground">156</p>
            <p class="text-sm text-muted-foreground">Clientes registrados</p>
        </div>

        <!-- Card 3 -->
        <div class="bg-card border border-border rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-[#1e3a5f]/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#1e3a5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-amber-600 bg-amber-100 px-2 py-1 rounded-full">5 nuevos</span>
            </div>
            <p class="text-2xl font-semibold text-foreground">12</p>
            <p class="text-sm text-muted-foreground">Pedidos pendientes</p>
        </div>

        <!-- Card 4 -->
        <div class="bg-card border border-border rounded-2xl p-6">
            <div class="flex items-center justify-between mb-4">
                <div class="w-12 h-12 bg-[#1e3a5f]/10 rounded-xl flex items-center justify-center">
                    <svg class="w-6 h-6 text-[#1e3a5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <span class="text-xs font-medium text-green-600 bg-green-100 px-2 py-1 rounded-full">+23%</span>
            </div>
            <p class="text-2xl font-semibold text-foreground">€4,521</p>
            <p class="text-sm text-muted-foreground">Ingresos este mes</p>
        </div>
    </div>

    <!-- Welcome Card -->
    <div class="bg-card border border-border overflow-hidden shadow-sm rounded-2xl">
        <div class="p-6 text-foreground">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 bg-[#1e3a5f]/10 rounded-full flex items-center justify-center">
                    <svg class="w-5 h-5 text-[#1e3a5f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
                <div>
                    <p class="font-medium">¡Bienvenido al panel de administración, {{ Auth::user()->name }}!</p>
                    <p class="text-sm text-muted-foreground">Aquí podrás gestionar productos, clientes y pedidos.</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

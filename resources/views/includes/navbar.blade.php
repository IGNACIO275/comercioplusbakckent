<nav x-data="{ menuOpen: false }" class="bg-white shadow-md fixed top-0 left-0 right-0 z-20 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="flex items-center gap-2">
                <svg class="w-8 h-8 text-blue-600 animate-pulse" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6" />
                </svg>
                <h1 class="text-2xl font-black text-blue-600">Commerce Plus</h1>
            </div>

            <!-- Buscador -->
            <div class="hidden md:block flex-1 mx-6">
                <input type="text" placeholder="Buscar..."
                    class="w-full border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Menú -->
            <div class="flex items-center gap-6">
                <!-- Menú principal -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open"
                        class="flex items-center gap-2 px-4 py-2 rounded-md border border-gray-300 shadow-sm text-sm font-semibold text-gray-700 bg-white hover:bg-blue-50 hover:text-blue-600 transition duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <span>Menú</span>
                        <svg class="w-4 h-4 transform transition-transform duration-200" :class="{ 'rotate-180': open }"
                            fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>


                    <!-- Submenú -->
                    <div x-show="open" @click.away="open = false"
                        class="absolute right-0 mt-2 w-56 bg-white border rounded shadow-md z-40 py-1">

                        <!-- Usuario -->
                        <div x-data="{ submenu: false }" class="relative">
                            <button @click="submenu = !submenu"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                                Usuario
                                <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': submenu }"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="submenu" @click.away="submenu = false"
                                class="absolute left-full top-0 w-40 bg-white border rounded shadow-md z-50 ml-1">
                                <a href="{{ route('profile.show', auth()->user()->profile->id) }}"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Perfil</a>
                                <a href="{{ route('users.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Perfiles</a>
                            </div>
                        </div>


                        <!-- Producto -->
                        <div x-data="{ submenu: false }" class="relative">
                            <button @click="submenu = !submenu"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                                Producto
                                <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': submenu }"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="submenu" @click.away="submenu = false"
                                class="absolute left-full top-0 w-40 bg-white border rounded shadow-md z-50 ml-1">
                                <!-- Categorías con submenú -->
                                <div x-data="{ catSubmenu: false }" class="relative">
                                    <button @click="catSubmenu = !catSubmenu"
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                                        Categorías
                                        <svg class="w-4 h-4 transform transition-transform"
                                            :class="{ 'rotate-180': catSubmenu }" fill="none" stroke="currentColor"
                                            stroke-width="2" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                    <div x-show="catSubmenu" @click.away="catSubmenu = false"
                                        class="absolute left-full top-0 w-40 bg-white border rounded shadow-md z-50 ml-1">

                                        <a href="{{ route('categories.index') }}"
                                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Todas las
                                            categorias</a>

                                        <a href="#motor"
                                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Motor</a>

                                        <a href="#frenos"
                                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Frenos</a>

                                        <a href="#suspension"
                                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Suspensión</a>

                                        <a href="#electricos"
                                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Componentes
                                            Eléctricos</a>

                                        <a href="#accesorios"
                                            class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Accesorios</a>
                                    </div>

                                </div>

                                <a href="{{ route('products.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Productos</a>
                            </div>
                        </div>


                        <!-- Ventas -->
                        <div x-data="{ submenu: false }" class="relative">
                            <button @click="submenu = !submenu"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                                Ventas
                                <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': submenu }"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="submenu" @click.away="submenu = false"
                                class="absolute left-full top-0 w-40 bg-white border rounded shadow-md z-50 ml-1">
                                <a href="{{ route('orders.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">ventas</a>
                                <a href="{{ route('sales.index') }}"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Ordenes</a>

                            </div>
                        </div>

                        <!-- Soporte -->
                        <div x-data="{ submenu: false }" class="relative">
                            <button @click="submenu = !submenu"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 flex justify-between items-center">
                                Soporte
                                <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-180': submenu }"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>
                            <div x-show="submenu" @click.away="submenu = false"
                                class="absolute left-full top-0 w-40 bg-white border rounded shadow-md z-50 ml-1">
                                <a href="{{route('claims.index')}}"
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Reclamos</a>
                                <a href=""
                                    class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-100">Mensajes</a>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Nombre del usuario -->
                <span class="text-gray-700 font-medium hidden sm:inline">
                    👋 Hola, <strong>{{ Auth::user()->name }}</strong>
                </span>

                <!-- Botón cerrar sesión -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-semibold">
                        Cerrar sesión
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="block md:hidden px-4 pb-4 pt-2">
        <label for="mobile-search" class="sr-only">Buscar</label>
        <div class="relative text-pink-500 focus-within:text-pink-600">
            <input id="mobile-search" type="search" placeholder="Buscar productos, categorías..."
                class="block w-full pl-12 pr-4 py-3 rounded-3xl border border-pink-300 bg-pink-50 placeholder-pink-400 text-pink-700
         shadow-md focus:outline-none focus:ring-2 focus:ring-pink-400 focus:border-pink-400 transition duration-300 font-semibold"
                autocomplete="off" />
            <span class="absolute inset-y-0 left-4 flex items-center pointer-events-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="11" cy="11" r="7" />
                    <line x1="21" y1="21" x2="16.65" y2="16.65" />
                </svg>
            </span>
        </div>
    </div>



    <script>
        const searchInput = document.getElementById('mobile-search');

        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                const query = encodeURIComponent(this.value.trim());
                if (query) {
                    window.location.href = `/buscar?q=${query}`;
                }
            }
        });
    </script>

</nav>

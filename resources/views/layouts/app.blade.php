<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <title>@yield('title', 'Commerce Plus')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 min-h-screen">

    {{-- Navbar --}}
    @include('includes.navbar')

    {{-- Sidebar --}}
    @include('includes.sidebar')

    {{-- Main content --}}
    <main class="min-h-screen flex items-center justify-center px-0 relative overflow-hidden pt-16 pb-16">
        {{-- Fondo animado SVG --}}
        <div class="absolute inset-0 z-0">
            <svg class="w-full h-full" preserveAspectRatio="xMidYMid slice" viewBox="0 0 1440 800"
                xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="grad" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#9CA3AF" /> <!-- Gris claro -->
                        <stop offset="100%" stop-color="#FF884D" /> <!-- Zapote claro -->
                    </linearGradient>
                </defs>
                <path fill="url(#grad)">
                    <animate attributeName="d" dur="15s" repeatCount="indefinite"
                        values="
                    M0,0 C360,200 1080,200 1440,0 L1440,800 L0,800 Z;
                    M0,0 C360,400 1080,0 1440,300 L1440,800 L0,800 Z;
                    M0,0 C360,200 1080,400 1440,0 L1440,800 L0,800 Z;
                    M0,0 C360,200 1080,200 1440,0 L1440,800 L0,800 Z
                " />
                </path>
            </svg>
        </div>


        {{-- Contenedor principal --}}
        <div
            class="relative z-10 bg-black/10 shadow-xl rounded-none p-8 w-full h-full backdrop-blur-md text-white max-w-7xl mx-auto">

            {{-- Alpine.js toggle demo --}}
            {{--  <div x-data="{ abierto: false }" class="p-4">
                <div x-show="abierto" x-transition class="mt-4 p-4 border border-blue-400 rounded">
                    ¡Hola! Esto se muestra y oculta con Alpine.js.
                </div>
            </div>  --}}

            {{-- Aquí va el contenido dinámico de cada vista --}}
            @yield('content')

            {{-- Botón scroll arriba --}}
            <button id="btnScrollTop"
                class="fixed bottom-20 right-8 bg-blue-600 text-white px-4 py-2 rounded shadow-lg hover:bg-blue-700 transition-opacity opacity-0 pointer-events-none"
                onclick="window.scrollTo({ top: 0, behavior: 'smooth' })" title="Ir al inicio">↑</button>

        </div>
    </main>

    {{-- Footer --}}
    @include('includes.footer')

    {{-- Script para mostrar botón scroll arriba --}}
    <script>
        const btnScrollTop = document.getElementById("btnScrollTop");

        window.addEventListener("scroll", () => {
            if (window.scrollY > 300) {
                btnScrollTop.classList.remove("opacity-0", "pointer-events-none");
                btnScrollTop.classList.add("opacity-100");
            } else {
                btnScrollTop.classList.add("opacity-0", "pointer-events-none");
                btnScrollTop.classList.remove("opacity-100");
            }
        });
    </script>


</body>

</html>

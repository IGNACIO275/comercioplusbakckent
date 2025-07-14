@extends('layouts.app')

@section('content')
<div class="container max-w-7xl mx-auto py-12 px-8">
    <div class="flex justify-between items-center mb-12">
        <h1 class="text-5xl font-bold text-gray-800">Categorías</h1>
        <a href="{{ route('categories.create') }}" class="bg-orange-500 hover:bg-orange-600 text-white text-sm px-3 py-2 rounded shadow-md">
            + Nueva Categoría
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-800 text-xl p-6 rounded mb-8 shadow">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 gap-12">
        @foreach ($categories as $index => $category)
            <div class="bg-white rounded-3xl shadow-xl p-10 border border-gray-300 hover:shadow-2xl transition duration-300">
                <h2 class="text-3xl font-semibold text-gray-800 mb-4">{{ $category->name }}</h2>

                {{-- Productos relacionados --}}
                @if ($category->products->count())
                    <div class="mb-8 relative">
                        <h3 class="text-2xl font-medium text-gray-700 mb-4">Productos:</h3>

                        {{-- Botones de scroll manual --}}
                        <button onclick="scrollLeft({{ $index }})" class="absolute left-0 top-1/2 -translate-y-1/2 bg-gray-200 hover:bg-gray-300 text-gray-600 rounded-full w-10 h-10 shadow z-10">
                            ‹
                        </button>
                        <button onclick="scrollRight({{ $index }})" class="absolute right-0 top-1/2 -translate-y-1/2 bg-gray-200 hover:bg-gray-300 text-gray-600 rounded-full w-10 h-10 shadow z-10">
                            ›
                        </button>

                        {{-- Contenedor deslizable --}}
                        <div id="scrollContainer{{ $index }}" class="overflow-x-auto whitespace-nowrap px-4 scroll-smooth no-scrollbar">
                            @foreach ($category->products->sortBy('name') as $product)
                                <div class="inline-block w-56 mx-6">
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-52 h-52 object-cover rounded-xl shadow-lg border border-gray-300 mb-4 mx-auto">
                                    @endif
                                    <div class="text-lg font-semibold text-gray-700 text-center">
                                        {{ $product->name }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="text-lg text-gray-400 italic mb-8">Sin productos</p>
                @endif

                {{-- Submenú desplegable --}}
                <div class="relative mt-4" x-data="{ open: false }">
                    <button @click="open = !open" class="text-gray-700 bg-gray-100 hover:bg-gray-200 text-sm px-4 py-2 rounded shadow inline-flex items-center">
                        ⚙ Opciones
                        <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <div x-show="open" @click.away="open = false" class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 rounded shadow-md z-20">
                        <a href="{{ route('categories.edit', $category) }}" class="block px-4 py-2 text-sm text-blue-700 hover:bg-blue-50">
                            ✏️ Editar
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar esta categoría?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-red-50">
                                🗑 Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

{{-- Script para scroll manual --}}
<script>
    function scrollLeft(index) {
        const container = document.getElementById('scrollContainer' + index);
        container.scrollBy({ left: -300, behavior: 'smooth' });
    }

    function scrollRight(index) {
        const container = document.getElementById('scrollContainer' + index);
        container.scrollBy({ left: 300, behavior: 'smooth' });
    }
</script>

{{-- Estilos para ocultar la barra de scroll --}}
<style>
    .no-scrollbar::-webkit-scrollbar {
        display: none;
    }
    .no-scrollbar {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
</style>
@endsection














@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Lista de Productos</h1>
            <a href="{{ route('products.create') }}"
                class="bg-orange-600 hover:bg-orange-700 text-white px-4 py-2 rounded shadow transition">
                + Nuevo Producto
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 px-4 py-2 bg-green-100 text-green-800 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-x-1 gap-y-20">
            @forelse($products as $product)
                <div
                    class="bg-white rounded-xl shadow-md transform hover:scale-105 hover:shadow-2xl transition duration-300 ease-in-out cursor-pointer overflow-hidden flex flex-col">
                    <div class="w-full h-48 bg-gray-100">
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full flex items-center justify-center text-gray-400">Sin imagen</div>
                        @endif
                    </div>

                    <div class="p-4 flex flex-col justify-between flex-grow">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-800 mb-1">{{ $product->name }}</h2>
                            <p class="text-sm text-gray-500 mb-1">Categoría: {{ $product->category->name }}</p>
                            {{--  <p class="text-sm text-gray-600 mb-1">Stock: {{ $product->stock }}</p>  --}}
                            <p class="text-green-600 font-bold mb-1">${{ number_format($product->price, 2) }}</p>
                            {{--  <p class="text-sm text-gray-400">Publicado por: {{ $product->user->name }}</p>  --}}
                            <a href="{{ route('products.show', $product) }}" class="text-blue-600 hover:underline">
                                ver más
                            </a>
                        </div>

                        <div class="flex justify-between mt-4 border-t pt-3 gap-2">
                            <a href="{{ route('products.edit', $product) }}"
                                class="inline-flex items-center justify-center px-3 py-1.5 bg-gray-400 hover:bg-gray-700 text-white text-sm font-semibold rounded shadow transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-white" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15.232 5.232l3.536 3.536M9 11l6.536-6.536a2 2 0 112.828 2.828L11.828 13.828a2 2 0 01-1.414.586H7v-3.414a2 2 0 01.586-1.414z" />
                                </svg>
                                Editar
                            </a>


                            <form action="{{ route('products.destroy', $product) }}" method="POST"
                                onsubmit="return confirm('¿Estás seguro de eliminar este producto?')">
                                @csrf
                                @method('DELETE')
                                <button class="flex items-center bg-red-600 hover:bg-red-700 text-white px-1 py-2 rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-white" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5-4h4m-4 0a1 1 0 00-1 1v1h6V4a1 1 0 00-1-1m-4 0h4" />
                                    </svg>
                                    Eliminar
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @empty
                <div class="col-span-4 text-center text-gray-500 text-lg">
                    No hay productos registrados.
                </div>
            @endforelse
        </div>
    </div>
@endsection

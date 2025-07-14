@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="bg-white shadow-xl rounded-xl p-6">
            <h1 class="text-4xl font-bold text-gray-800 mb-6">{{ $product->name }}</h1>

            <div class="flex flex-col md:flex-row md:space-x-10">
                {{-- Imagen del producto --}}
                <div class="w-full md:w-1/2 mb-6 md:mb-0">
                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                            class="rounded-lg shadow-md w-full object-cover max-h-[400px]">
                    @else
                        <div class="w-full h-64 bg-gray-200 rounded-lg flex items-center justify-center text-gray-500">
                            Sin imagen
                        </div>
                    @endif
                </div>

                {{-- Información del producto --}}
                <div class="w-full md:w-1/2 space-y-4 text-gray-700">
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div><span class="font-semibold">ID:</span> {{ $product->id }}</div>
                        <div><span class="font-semibold">Stock:</span> {{ $product->stock }}</div>
                        <div><span class="font-semibold">Precio:</span> <span class="text-green-600 font-bold">${{ number_format($product->price, 2) }}</span></div>
                        <div><span class="font-semibold">Oferta:</span> 
                            <span class="{{ $product->offer ? 'text-red-500' : 'text-gray-500' }}">
                                {{ $product->offer ? 'Sí' : 'No' }}
                            </span>
                        </div>
                        <div><span class="font-semibold">Categoría ID:</span> {{ $product->category_id }}</div>
                        <div><span class="font-semibold">Usuario ID:</span> {{ $product->user_id }}</div>
                        <div><span class="font-semibold">Rating Promedio:</span> ⭐ {{ number_format($product->average_rating, 1) }}</div>
                        <div><span class="font-semibold">Creado:</span> {{ $product->created_at?->format('d/m/Y H:i') }}</div>
                        <div><span class="font-semibold">Actualizado:</span> {{ $product->updated_at?->format('d/m/Y H:i') }}</div>
                    </div>

                    <div>
                        <h2 class="text-lg font-semibold mt-4 mb-2">Descripción</h2>
                        <p class="bg-gray-50 p-3 rounded-md border border-gray-200">
                            {{ $product->description ?? 'No disponible' }}
                        </p>
                    </div>
                </div>
            </div>

            <div class="mt-8">
                <a href="{{ route('products.index') }}"
                    class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    ← Volver a la lista de productos
                </a>
            </div>
        </div>
    </div>
@endsection



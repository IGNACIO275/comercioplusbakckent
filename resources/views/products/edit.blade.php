@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-8">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Editar Producto</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-6 rounded-lg shadow space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                class="w-full mt-1 px-3 py-2 border rounded shadow-sm focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Precio</label>
            <input type="number" name="price" step="0.01" value="{{ old('price', $product->price) }}"
                class="w-full mt-1 px-3 py-2 border rounded shadow-sm" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Stock</label>
            <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                class="w-full mt-1 px-3 py-2 border rounded shadow-sm" required>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Imagen actual</label>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}" alt="Imagen actual" class="w-32 h-32 object-cover mt-2">
            @else
                <p class="text-gray-500">Sin imagen</p>
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700">Cambiar Imagen</label>
            <input type="file" name="image" class="mt-1">
        </div>

        <div class="flex justify-end gap-4">
            <a href="{{ route('products.index') }}" class="px-4 py-2 text-gray-700 bg-gray-200 hover:bg-gray-300 rounded">
                Cancelar
            </a>
            <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
                💾 Actualizar
            </button>
        </div>
    </form>
</div>
@endsection

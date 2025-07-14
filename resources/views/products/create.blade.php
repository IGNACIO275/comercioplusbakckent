@extends('layouts.app')

@section('content')
<div class="container max-w-xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Crear Producto</h1>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf

        <div>
            <label for="name"><strong>Nombre:</strong></label>
            <input type="text" name="name" class="w-full border rounded p-2 text-black" required>
        </div>

        <div>
            <label for="description"><strong>Descripción:</strong></label>
            <textarea name="description" class="w-full border rounded p-2 text-black" required></textarea>
        </div>

        <div>
            <label for="price"><strong>Precio:</strong></label>
            <input type="number" step="0.01" name="price" class="w-full border rounded p-2 text-black" required>
        </div>

        <div>
            <label for="stock"><strong>Stock:</strong></label>
            <input type="number" name="stock" class="w-full border rounded p-2 text-black" required>
        </div>

        <div>
            <label for="category_id"><strong>Categoría:</strong></label>
            <select name="category_id" class="w-full border rounded p-2 text-black" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image"><strong>Imagen:</strong></label>
            <input type="file" name="image" class="w-full border p-2 text-black">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Guardar</button>
    </form>
</div>
@endsection



@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-10">
    <h2 class="text-2xl font-bold text-center text-blue-700 mb-6">Editar Perfil</h2>

    @if (session('success'))
        <div class="mb-4 text-green-600 font-semibold">{{ session('success') }}</div>
    @endif

    <form action="{{ route('profile.update', $profile->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6 bg-white p-8 rounded-2xl shadow-xl">
        @csrf
        @method('PUT')

        {{-- Nombre de usuario --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Nombre de usuario</label>
            <input type="text" name="username" value="{{ old('username', $profile->username) }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Fecha de nacimiento --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Fecha de nacimiento</label>
            <input type="date" name="birthdate" value="{{ old('birthdate', $profile->birthdate) }}"
                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        {{-- Otra información --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Otra información</label>
            <textarea name="other_info" rows="3"
                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('other_info', $profile->other_info) }}</textarea>
        </div>

        {{-- Imagen de perfil --}}
        <div>
            <label class="block text-sm font-medium text-gray-700">Foto de perfil</label>
            <input type="file" name="image"
                   class="mt-1 block w-full text-sm text-gray-500 file:bg-blue-600 file:text-white file:rounded-md file:border-0 file:px-4 file:py-2 hover:file:bg-blue-700">
        </div>

        {{-- Botón --}}
        <div class="text-right">
            <button type="submit"
                    class="bg-orange-600 text-white px-6 py-2 rounded-md hover:bg-orange-900 shadow-md">
                Guardar cambios
            </button>
        </div>
    </form>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-tr from-blue-50 to-white py-10 px-4">
        <div class="max-w-5xl mx-auto">
            <div
                class="bg-white shadow-2xl rounded-3xl border border-gray-200 overflow-hidden transform transition duration-300 hover:scale-[1.01]">
                <div class="flex flex-col md:flex-row items-center md:items-start gap-8 p-10 animate-fade-in-down">
                    {{-- Imagen de perfil --}}
                    <div class="flex-shrink-0 text-center">
                        @if ($profile->image)
                            <img src="{{ asset('storage/' . $profile->image) }}" alt="Imagen de perfil"
                                class="w-48 h-48 object-cover rounded-full border-4 border-blue-600 shadow-md mx-auto">
                        @else
                            <div
                                class="w-48 h-48 bg-gray-200 flex items-center justify-center rounded-full text-gray-400 text-6xl mx-auto">
                                <i class="fas fa-user"></i>
                            </div>
                        @endif
                        <p class="mt-4 text-lg font-semibold text-gray-700">{{ $profile->username }}</p>
                    </div>

                    {{-- Información del perfil --}}
                    <div class="flex-1">
                        <h1 class="text-3xl font-extrabold text-blue-700 mb-6">Información del Perfil</h1>
                        <ul class="space-y-3 text-lg text-gray-700">
                            <li><strong>Nombre real:</strong> {{ $profile->user->name }}</li>
                            <li><strong>Email:</strong> {{ $profile->user->email }}</li>
                            <li><strong>Fecha de nacimiento:</strong> {{ $profile->birthdate ?? 'No registrada' }}</li>
                            <li><strong>Otra información:</strong> {{ $profile->other_info ?? 'No disponible' }}</li>
                        </ul>
                    </div>
                </div>

                {{-- Botón --}}
                <div class="bg-gray-50 border-t px-10 py-6 text-right">
                    <a href="{{ route('profile.edit', $profile->id) }}"
                 class="inline-flex items-center gap-2 bg-orange-600 hover:bg-orange-700 text-white px-6 py-3 text-base font-medium rounded-full shadow-md transition duration-200">
                        <i class="fas fa-pen"></i> Editar Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

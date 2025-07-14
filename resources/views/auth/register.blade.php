<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="min-h-screen flex">

    <!-- Lado izquierdo con imagen de fondo -->
    <div class="w-1/2 h-screen bg-cover bg-center" style="background-image: url('{{ asset('img/imgpruebados.webp') }}');">
        <!-- Puedes agregar texto, logo o dejar vacío -->
    </div>

    <!-- Lado derecho con formulario -->
    <div class="w-1/2 flex items-center justify-center bg-gray-100">
        <div class="bg-white p-10 rounded-lg shadow-md w-full max-w-md">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Registro</h2>

            <form method="POST" action="{{ url('/register') }}">
                @csrf

                <input type="text" name="name" placeholder="Nombre"
                       class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>

                <input type="email" name="email" placeholder="Email"
                       class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>

                <input type="password" name="password" placeholder="Contraseña"
                       class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>

                <input type="password" name="password_confirmation" placeholder="Confirmar contraseña"
                       class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-green-500" required>

                <button type="submit"
                        class="w-full bg-orange-600 hover:bg-orange-700 text-white p-3 rounded font-semibold transition">
                    Registrar
                </button>
            </form>

            <p class="text-center mt-4 text-sm text-gray-700">
                ¿Ya tienes cuenta?
                <a href="{{ route('login') }}" class="text-green-600 hover:underline">Inicia sesión</a>
            </p>
        </div>
    </div>

</body>
</html>



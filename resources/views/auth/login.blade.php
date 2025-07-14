<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen w-screen flex overflow-hidden">




    <!-- Lado izquierdo con imagen -->
    <div class="w-1/2 h-full bg-cover bg-center rounded-l-3xl shadow-lg"
        style="background-image: url('{{ asset('img/imgpruebados.webp') }}');">
        <!-- Puedes agregar logo o dejar vacío -->
    </div>

    <!-- Lado derecho con formulario -->
    <div class="w-1/2 h-full flex items-center justify-center bg-gray-100">
        <div class="bg-white p-10 rounded-lg shadow-xl w-full max-w-md">
            <h2 class="text-3xl font-bold mb-6 text-center text-gray-800">Iniciar sesión</h2>

            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <input type="email" name="email" placeholder="Email"
                    class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                <input type="password" name="password" placeholder="Contraseña"
                    class="w-full mb-4 p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                    required>

                <button type="submit"
                     class="w-full bg-orange-600 hover:bg-orange-700 text-white p-3 rounded font-semibold transition">
                    Entrar
                </button>
            </form>

            <p class="text-center mt-4 text-sm text-gray-700">
                ¿No tienes cuenta?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate aquí</a>
            </p>
        </div>
    </div>

</body>

</html>

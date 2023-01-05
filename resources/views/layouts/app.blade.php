<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DevStagram - @yield('titulo')</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">
    {{-- HEADER --}}
    <header class="p-5 border-b bg-white shadow">
        <div class="container mx-auto flex justify-between">
            <h1 class="text-3xl font-black">
                DevStagram
            </h1>

            {{-- SI NO ESTÁ REGISTRADO EL USUARIO: --}}
            @guest
                {{-- BARRA DE NAVEGACION LOGIN-SIGNUP --}}
                <nav class="flex gap-2 items-center">
                    <a href="{{ route('login') }}"class="font-bold uppercase text-gray-600 text-sm">Login</a>
                    <a href="{{ route('register') }}" class="font-bold uppercase text-gray-600 text-sm">Crear Cuenta</a>
                </nav>
            @endguest

            {{-- SI ESTÁ REGISRADO EL USUARIO: --}}
            @auth
                <nav class="flex gap-2 items-center">
                    {{-- SALUDO --}}
                    <a href="#" class="font-bold text-gray-600 text-sm">
                        Hola <span class="font-normal"> {{ auth()->user()->name }}</span>
                    </a>
                    {{-- LOGOUT --}}
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="font-bold uppercase text-gray-600 text-sm">
                            <span class="font-normal"> Cerrar Sesi&oacute;n</span>
                        </button>
                    </form>
                </nav>
            @endauth
        </div>
    </header>


    <main class="container mx-auto mt-10">
        <h2 class="font-black text-center text-3xl mb-10">
            @yield('titulo')
        </h2>
        @yield('contenido')
    </main>

    {{-- FOOTER --}}
    <footer class="text-center p-5 text-gray-500 font-bold uppercase mt-10">
        DevStagram - Todos los derechos reservados {{ now()->year }}

    </footer>
</body>

</html>

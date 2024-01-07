<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Devstagram | @yield('title')</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

  <!-- Styles -->
  @vite('resources/css/app.css')

<body class="bg-gray-100">
  <header class="p-5 border-b bg-white shadow">
    <div class="container mx-auto flex justify-between items-center">
      <h1 class="text-3xl font-black">
        DevStagram
      </h1>
      <nav>
        <a class="font-bold uppercase text-gray-600 text-sm" href="#">Login</a>
        <a class="font-bold uppercase text-gray-600 text-sm" href="/register">Sign up</a>

      </nav>
    </div>

  </header>

  <main class="container mx-auto mt-10">
    <h2 class="text-3xl font-black mb-10 text-center">@yield('title')</h2>
    @yield('content')
  </main>

  <footer class="text-center p-5 text-gray-500 uppercase font-bold">
    DevStagram - Todos los derechos reservados {{ now()->year }}
  </footer>

</html>

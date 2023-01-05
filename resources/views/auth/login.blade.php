@extends('layouts.app')

@section('titulo')
    Inicia Sesión en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        {{-- IMAGEN --}}
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/login.jpg') }}" alt="Login">
        </div>

        {{-- CONTAINER FORMULARIO --}}
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form method="POST" action="{{ route('login') }}" novalidate>

                @csrf {{-- <-VALIDADOR DE CADENA --}}

                {{-- MENSAJE DE SESIÓN --}}
                @if (session('mensaje'))
                    <p class="text-red-600 font-bold text-center">{{ session('mensaje') }}</p>
                @endif

                {{-- EMAIL --}}
                <div class="mb-5">
                    <label for="email" class="mb-2 block uppercase text-gray-500  font-bold">
                        Email
                    </label>
                    <input id="email" name="email" type="email" placeholder="Tu correo electrónico"
                        class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" />
                    {{-- MENSAJE DE ERROR DE EMAIL --}}
                    @error('email')
                        <p class="text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>
                {{-- CONTRASEÑA --}}
                <div class="mb-5">
                    <label for="password" class="mb-2 block uppercase text-gray-500  font-bold">
                        Contraseña
                    </label>
                    <input id="password" name="password" type="password" placeholder="Password de registro"
                        class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror" />
                    {{-- MENSAJE DE ERROR DE CONTRASEÑA --}}
                    @error('password')
                        <p class="text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>

                {{-- CHECK-BOX MANTENER SESION ABIERTA --}}
                <div class="mb-5">
                    <input type="checkbox" name="remember" id="remember"> <label for="remember"
                        class="text-gray-500 text-sm">Mantener mi sesi&oacute;n abierta</label>
                </div>

                <input type="submit" value="Iniciar Sesión"
                    class=" text-white bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 rounded-lg" />
            </form>

        </div>
    </div>
@endsection

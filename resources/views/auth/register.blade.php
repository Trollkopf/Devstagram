@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md:gap-6 md:items-center">
        {{-- IMAGEN --}}
        <div class="md:w-6/12 p-5">
            <img src="{{ asset('img/registrar.jpg') }}" alt="registrar">
        </div>

        {{-- CONTAINER FORMULARIO --}}
        <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
            <form action="{{ route('register') }}" method="post" novalidate>

                @csrf {{-- <-VALIDADOR DE CADENA --}}
                {{-- NOMBRE --}}
                <div class="mb-5">
                    <label for="name" class="mb-2 block uppercase text-gray-500  font-bold">
                        Nombre
                    </label>
                    <input id="name" name="name" type="text" placeholder="Tu nombre"
                        class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" />
                    {{-- MENSAJE DE ERROR DE NOMBRE --}}
                    @error('name')
                        <p class="text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>
                {{-- NOMBRE DE USUARIO --}}
                <div class="mb-5">
                    <label for="username" class="mb-2 block uppercase text-gray-500  font-bold">
                        Username
                    </label>
                    <input id="username" name="username" type="text" placeholder="Tu nombre de usuario"
                        class="border p-3 w-full rounded-lg @error('username') border-red-500 @enderror"
                        value="{{ old('username') }}" />
                    {{-- MENSAJE DE ERROR DE USERNAME --}}
                    @error('username')
                        <p class="text-red-600 font-bold">{{ $message }}</p>
                    @enderror
                </div>
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
                {{-- REPETIR CONTRASEÑA --}}
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500  font-bold">
                        Repetir contraseña
                    </label>
                    <input id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Repite tu password" class="border p-3 w-full rounded-lg" />
                </div>

                <input type="submit" value="Crear Cuenta"
                    class=" text-white bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 rounded-lg" />
            </form>

        </div>
    </div>
@endsection

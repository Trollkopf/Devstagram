@extends('layouts.app')

@section('title')
  Regístrate en DevStagram
@endsection

@section('content')
  <div class="md:flex justify-center md:gap-10 md:items-center">
    <div class="md:w-7/12 p-5">
      <img src="{{ asset('img/registrar.jpg') }}" alt="imagen registro de usuarios">
    </div>
    <div class="md:w-4/12 bg-white rounded-lg shadow-xl p-6 ">
      <form action="{{ route('register') }}" method="POST" novalidate>
        @csrf
        {{-- NAME --}}
        <div class="mb-5">
          <label for="name" class="mb-2 block uppercase text-gray-500 font-bold" id="name">
            Name
          </label>
          <input id="name" type="text" name="name" placeholder="Tu nombre"
            class="border p-3 w-full rounded-lg @error('name') border-red-600 @enderror" value="{{ old('name') }}">
          @error('name')
            <p class="text-red-600 my-2 text-sm text-start">{{ $message }}</p>
          @enderror
        </div>

        {{-- USERNAME --}}
        <div class="mb-5">
          <label for="username" class="mb-2 block uppercase text-gray-500 font-bold" id="username">
            Username
          </label>
          <input id="username" type="text" name="username" placeholder="Tu nombre de usuario"
            class="border p-3 w-full rounded-lg @error('username') border-red-600 @enderror" value="{{ old('username') }}">
            @error('username')
            <p class="text-red-600 my-2 text-sm text-start">{{ $message }}</p>
          @enderror
        </div>

        {{-- EMAIL --}}
        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold" id="email">
            Email
          </label>
          <input id="email" type="email" name="email" placeholder="Tu email" class="border p-3 w-full rounded-lg @error('email') border-red-600 @enderror" value="{{ old('email') }}">
          @error('email')
            <p class="text-red-600 my-2 text-sm text-start">{{ $message }}</p>
          @enderror
        </div>

        {{-- PASSWORD --}}
        <div class="mb-5">
          <label for="password" class="mb-2 block uppercase text-gray-500 font-bold" id="password">
            Password
          </label>
          <input id="email" type="password" name="password" placeholder="Inserta una contraseña"
            class="border p-3 w-full rounded-lg @error('password') border-red-600 @enderror">
            @error('password')
            <p class="text-red-600 my-2 text-sm text-start">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
          <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold"
            id="password_confirmation">
            Repetir Password
          </label>
          <input id="password_confirmation" type="password"" name="password_confirmation"
            placeholder="Repite tu contraseña" class="border p-3 w-full rounded-lg">
        </div>

        <input type="submit" value="Crear Cuenta"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />

      </form>

    </div>
  @endsection

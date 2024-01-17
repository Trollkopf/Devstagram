@extends('layouts.app')

@section('title')
  Inicia sesión en DevStagram
@endsection

@section('content')
  <div class="md:flex justify-center md:gap-10 md:items-center">
    <div class="md:w-5/12 p-5">
      <img src="{{ asset('img/login.jpg') }}" alt="imagen login de usuarios">
    </div>
    <div class="md:w-4/12 bg-white rounded-lg shadow-xl p-6 ">
      <form action="{{ route('login') }}" method="POST" novalidate>
        @csrf

        {{-- EMAIL --}}
        <div class="mb-5">
          <label for="email" class="mb-2 block uppercase text-gray-500 font-bold" id="email">
            Email
          </label>
          <input id="email" type="email" name="email" placeholder="Tu email"
            class="border p-3 w-full rounded-lg @error('email') border-red-600 @enderror" value="{{ old('email') }}">
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

        <div class="mb-5 flex items-center">
          <input type="checkbox" name="remember"><label class=" mx-2 text-sm text-gray-500">Mantener mi
            sesión abierta</label>
        </div>

        <input type="submit" value="Iniciar Sesión"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />
        @if (session('error_message'))
          <p class="text-white bg-red-600 rounded-lg my-2 text-sm py-1 text-center">{{ session('error_message') }}</p>
        @endif

      </form>

    </div>
  @endsection

@extends('layouts.app')


@section('title')
  Perfil de <span class="capitalize">{{ $user->username }}</span>
@endsection

@section('content')
  <div class="flex justify-center">
    <div class="w-full md:w-8/12 lg:w-6/12 flex md:flex-row flex-col items-center">
      <div class="w-5/12 px-5">
        <img src="{{ asset('img/usuario.svg') }}" alt="imagen usuario" />
      </div>
      <div class="md:w-8/12 lg:w-6/12 px-5 py-10 md:py-10 flex items-center flex-col md:items-start md:justify-center">
       
        <p class="text-gray-700 text-2xl capitalize mb-3 mt-5">{{ $user->username }}</p>

        <p class="text-gray-800 text-sm md-3 font-bold">
          0
          <span class="font-normal">
             Seguidores
          </span>
        </p>
        <p class="text-gray-800 text-sm md-3 font-bold">
          0
          <span class="font-normal">
             Siguiendo
          </span>
        </p>
        <p class="text-gray-800 text-sm md-3 font-bold">
          0
          <span class="font-normal">
             Posts
          </span>
        </p>
      </div>
    </div>
  </div>
@endsection

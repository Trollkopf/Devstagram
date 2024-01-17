@extends('layouts.app')

@section('title')
  Crea una nueva publicación
@endsection

@push('styles')
  <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('content')
  <div class="md:flex md:items-center justify-center w-full">
    <div class="md:w-1/2 px-10">
      <form method="POST" enctype="multipart/form-data" id="dropzone"  action="{{ route('images.store') }}"
        class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
        @csrf
      </form>
    </div>

    <div class="md:w-1/2 p-10 bg-white rounded-lg shadow-xl mt-10 md:mt-0">
      <form action="{{ route('posts.store') }}" method="POST" novalidate>
        @csrf
        {{-- TITLE --}}
        <div class="mb-5">
          <label for="title" class="mb-2 block uppercase text-gray-500 font-bold" id="name">
            Titulo
          </label>
          <input id="title" type="text" name="title" placeholder="Título de la publicación"
            class="border p-3 w-full rounded-lg @error('title') border-red-600 @enderror" value="{{ old('title') }}">
          @error('title')
            <p class="text-red-600 my-2 text-sm text-start">{{ $message }}</p>
          @enderror
        </div>
        {{-- DESCRIPTION --}}
        <div class="mb-5">
          <label for="description" class="mb-2 block uppercase text-gray-500 font-bold" id="name">
            Descripción
          </label>
          <textarea id="description" type="text" name="description" placeholder="Descripción de la publicación"
            class="border p-3 w-full rounded-lg @error('description') border-red-600 @enderror">{{ old('description') }}</textarea>
          @error('description')
            <p class="text-red-600 my-2 text-sm text-start">{{ $message }}</p>
          @enderror
        </div>

        <div class="mb-5">
            <input name="image" type="hidden" value="{{ old('image') }}"/>
            @error('image')
            <p class="text-red-600 my-2 text-sm text-start">{{ $message }}</p>
          @enderror
        </div>

        <input type="submit" value="Crear Publicación"
          class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />

      </form>
    </div>
  </div>
@endsection

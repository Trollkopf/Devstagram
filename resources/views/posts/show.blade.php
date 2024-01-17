@extends('layouts.app')

@section('title')
  {{ $post->title }}
@endsection

@section('content')
  <div class="container mx-auto flex">
    <div class="md:w-1/2">
      <img src="{{ asset('uploads') . '/' . $post->image }}" alt="Imagen del post {{ $post->title }}" />
      <div class="p-3">
        <p>0 Likes</p>
      </div>
      <div>
        <p class="font-bold capitalize">{{ $post->user->username }}</p>
        <p class="text-sm text-gray-500"> {{ $post->created_at->diffForHumans() }}</p>
        <p class="mt-5">{{ $post->description }}</p>
      </div>
    </div>
    <div class="md:w-1/2 p-5">

      <div class="shadow bg-white p-5 mb-5">
        <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

        @auth
          <form action="{{ route('comment.store', ['post'=>$post, 'user'=>$user]) }}" method="POST">
            @csrf
            <div class="mb-5">
              <label for="comment" class="mb-2 block uppercase text-gray-500 font-bold" id="name">
                Añade un comentario
              </label>
              <textarea id="comment" type="text" name="comment" placeholder="Inserta un comentario"
                class="border p-3 w-full rounded-lg @error('comment') border-red-600 @enderror"></textarea>
              @error('comment')
                <p class="text-red-600 my-2 text-sm text-start">{{ $message }}</p>
              @enderror
            </div>
            <input type="submit" value="Comentar"
              class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg" />


          </form>

        @endauth

      </div>
    </div>
  </div>
@endsection

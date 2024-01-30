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
      @auth
        @if ($post->user_id === auth()->user()->id)
          <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
              @method('DELETE')
              @csrf
            <input type="submit" value="Eliminar publicación"
              class="bg-red-500 hover:bg-red-600 p-2 rounded-lg text-white font-bold cursor-pointer" />
          </form>
        @endif
      @endauth
    </div>


    <div class="md:w-1/2 p-5">

      <div class="shadow bg-white p-5 mb-5">
        @auth
          <p class="text-xl font-bold text-center mb-4">Agrega un nuevo comentario</p>

          @if (session('success'))
            <div class="bg-green-500 p-2 rounded-lg mb-6 text-white text-center uppercase font-bold">
              {{ session('success') }}</div>
          @endif

          <form action="{{ route('comment.store', ['post' => $post, 'user' => $user]) }}" method="POST">
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

        <div class="bg-white shadow mb-5 max-h-96 overflow-y-scroll mt-10">
          @if ($post->comments->count())
            @foreach ($post->comments as $comment)
              <div class="p-5 border-gray-300 border-b">
                <a href="{{ route('posts.index', $comment->user->username) }}"
                  class="capitalize font-bold text-gray-700">{{ $comment->user->username }}</p>
                  <p>{{ $comment->comment }}</p>
                  <p class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</p>
              </div>
            @endforeach
          @else
            <p class="p-10 text-center">No Hay Comentarios Todavía</p>
          @endif
        </div>


      </div>
    </div>
  </div>
@endsection

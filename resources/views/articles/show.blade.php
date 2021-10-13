@extends('layouts.inner')

@section('title', $article->title)

@section('current', $article->title)


@section('content_inner')

    <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
        <h1 class="text-black text-3xl font-bold mb-4">{{ $article->title }}</h1>

        <div class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
            <a href="{{ route('article.edit', $article) }}">Редактировать новость</a>
        </div>

        <div class="space-y-4">

            <img src="/assets/pictures/car_new_stinger.png" alt="" title="">

           @include('components.tags', ['tags' => $article->tags()])

            {!! $article->body  !!}
        </div>
        <div class="mt-4">
            <a class="inline-flex items-center text-orange hover:opacity-75" href="{{ route('article.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="inline-block h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
                К списку новостей
            </a>
        </div>
    </div>

@endsection

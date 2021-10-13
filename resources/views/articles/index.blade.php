@extends('layouts.inner')

@section('title', 'Все новости')

@section('current', 'Все новости')

@section('content_inner')

    <div class="col-span-4 sm:col-span-3 lg:col-span-4 p-4">
        <h1 class="text-black text-3xl font-bold mb-4">Все Новости</h1>

        <div class="inline-block bg-orange hover:bg-opacity-70 focus:outline-none text-white font-bold py-2 px-4 rounded">
            <a href="{{ route('article.create') }}">Добавить новость</a>
        </div>

        <div class="space-y-4">
        @foreach($articles as $article)
                <div class="w-full flex">
                    <div class="h-48 lg:h-auto w-32 sm:w-60 lg:w-32 xl:w-48 flex-none text-center overflow-hidden">
                        <a class="block w-full h-full hover:opacity-75" href="{{ route('article.show', $article) }}"><img src="/assets/pictures/car_rio_new.png" class="bg-white bg-opacity-25 w-full h-full object-contain" alt=""></a>
                    </div>

                    <div class="px-4 leading-normal">
                        <div class="mb-8 space-y-2">
                            <div class="text-black font-bold text-xl">
                                <a class="hover:text-orange" href="{{ route('article.show', $article) }}">{{ $article->title }}</a>
                            </div>
                            <p class="text-gray-600 text-base">
                                <a class="hover:text-orange" href="{{ route('article.show', $article) }}">{{ $article->description }}</a>
                            </p>

                            @include('components.tags', ['tags' => $article->tags()])

                            <div class="flex items-center">
                                <p class="text-sm text-gray-400 italic">{{ $article->published_at }}</p>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach

            {{ $articles->links() }}

        </div>
    </div>

@endsection()

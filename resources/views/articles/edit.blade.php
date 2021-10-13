@extends('layouts.app')

@section('title', 'Редактировать статью')

@section('current', 'Редактировать статью')

@section('content')

    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">Редактировать статью</h1>

            <form method="POST" action="{{ route('article.show', $article) }}">
                @method('PATCH')

                <x-form :article="$article" :tags="$tags"/>

                <div class="block mt-4">
                    <x-input.orange-button text="Сохранить" />
                    <x-input.grey-button text="Отменить" />
                </div>
            </form>

            <form method="POST" action="{{ route('article.show', $article) }}">
                @csrf
                @method('DELETE')
                <div class="mt-5">
                    <x-input.orange-button text="Удалить" />
                </div>
            </form>
        </div>
    </main>

@endsection()

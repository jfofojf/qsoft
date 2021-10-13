@extends('layouts.app')

@section('title', 'Новая статья')

@section('current', 'Новая статья')

@section('content')

    <main class="flex-1 container mx-auto bg-white">
        <div class="p-4">
            <h1 class="text-black text-3xl font-bold mb-4">Добавить статью</h1>

            <form method="POST" action="{{ route('article.index') }}">

                @include('components.form', ['article' => new \App\Models\Article()])

                <div class="block mt-4">
                    <x-input.orange-button text="Сохранить" />
                    <x-input.grey-button text="Отменить" />
                </div>
            </form>
        </div>
    </main>

@endsection()

@extends('layouts.app')

@section('content')

    @include('panels.nav')

    <div class="flex-1 grid grid-cols-4 lg:grid-cols-5 border-b">

        @include('panels.leftPanel')

        @yield('content_inner')

    </div>

@endsection

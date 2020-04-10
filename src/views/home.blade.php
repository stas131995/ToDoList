@extends('layouts.document')

@section('content')
<div class="container">
    @include('components.header')
    <ul class="list">
        @foreach ($todoItems as $model)
            @include('components.todo-item')
        @endforeach
    </ul>
    @include('components.form')
</div>
@endsection
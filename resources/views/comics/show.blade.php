@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="p-3">
            <h1>Comic product: {{ $comic->title }}</h1>
        </div>
        <div class="row row-cols-2">
            <div class="col p-4">
                <div>
                    <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}">
                </div>
            </div>

            <div class="col p-4">
                <h4>Info:</h4>
                <p>{{ $comic->description }}</p>
                <p><strong>Series:</strong> {{ $comic->series }}</p>
                <p><strong>Sale date:</strong> {{ $comic->sale_date }}</p>
                <p><strong>Type:</strong> {{ $comic->type }}</p>
                <p class="fw-bold">Price: {{ $comic->price }}</p>
            </div>
        </div>

    </div>
@endsection

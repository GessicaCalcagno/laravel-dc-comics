@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="py-2">Fumetti</h1>
        <div class="d-flex justify-content-end pb-5">
            <a class="btn btn-outline-success" href="{{ route('comics.create') }}">
                Aggiungi un Fumetto
            </a>
        </div>

        <table class="table">
            <thead class="striped">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Series</th>
                    <th scope="col">Sale Date</th>
                    <th scope="col">Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <th scope="row">{{ $comic->title }}</th>
                        <td>{{ $comic->description }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->sale_date }}</td>
                        <td>{{ $comic->type }}</td>
                        <td >
                            <div class="d-flex justify-content-around">
                                <a class="btn btn-success me-1" href="{{ route('comics.show', ['comic' => $comic->id]) }}">Info</a>
                                <a class="btn btn-warning me-1" href= "{{ route('comics.edit', ['comic' => $comic->id]) }}">Modifica</a>
    
                                <form action="{{ route('comics.destroy', ['comic' => $comic->id]) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button class="btn btn-danger me-1 delete-button">Cancella</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Includi lo script app.js -->
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

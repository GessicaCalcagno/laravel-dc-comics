@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Modifica</h1>

        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            @csrf
            {{-- specifichiamo che è PUT veramente non proprio POST --}}
            @method('PUT')
            
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title"
                    value='{{ $comic->title }}'>
            </div>
            <div class="mb-3">
                <label for="descripton" class="form-label">Descrizione</label>
                {{-- il texarea non è self closing come gli altri input, quindi lo inseriamo ma non come valore --}}
                <textarea class="form-control" id="descripton" placeholder="Descripton" name="description">
                {{ $comic->description }}
                </textarea>
            </div>

            <div class="mb-3">
                {{-- for deve essere uguale ad id --}}
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type">
                    <option>Select</option>
                    <option @selected($comic->type === 'comic book') value="comic book">Comic book</option>
                    <option @selected($comic->type === 'graphic novel') value="graphic novel">Graphic novel</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine</label>
                <input type="text" class="form-control" id="series" placeholder="Thumb" name="thumb"
                    value='{{ $comic->thumb }}'>
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" placeholder="Series" name="series"
                    value='{{ $comic->series }}'>
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di vendita</label>
                <input type="text" class="form-control" id="sale_date" placeholder="Sale date" name="sale_date"
                    value='{{ $comic->sale_date }}'>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" placeholder="Price" name="price"
                    value='{{ $comic->price }}'>
            </div>
            <button class="btn btn-success mb-3">Salva</button>
        </form>
    </div>
@endsection

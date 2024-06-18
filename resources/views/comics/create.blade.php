@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-3">
            <h4>Crea un nuovo Fumetto</h4>
        </div>
        {{-- -----CONTOLLO---- --}}
        {{-- Con errors any troviamo tutti i messaggi di errori e questo è lato client, nel controller: lato server --}}
        @if ($errors->any())
            {{-- @dd(errors) --}}
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('comics.store') }}" method="POST">
            {{-- Per motivi di sicurezza. Cookie per far riconoscere il form al server, senza questo non funziona, è un Token: un cookie, un input nascosto (lato server) che non possiamo manipolare dalla console, ed ha una chiave creata randomica. Corrispodenza biunivoca --}}
            @csrf
            <div class="mb-3">
                {{-- il name deve corrispondere al nome della colonna --}}
                <label for="title" class="form-label ">Titolo</label>
                {{-- -----CONTOLLO---- --}}
                {{-- Per fa rimanere i dati anche se appare l'errore con VALUE: e ritorniamo-ci rimanda nella stessa pagina con gli errori --}}
                <input type="text" value="{{ old('title') }}"
                    class="form-control 
                    @error('title')
                        is-invalid
                    @enderror"
                    id="title" placeholder="Title" name="title">
                @error('title')
                    <div id='title-error' class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descripton" class="form-label">Descrizione</label>
                <textarea class="form-control" id="descripton" placeholder="Descripton" name="description">
                </textarea>
            </div>

            <div class="mb-3">
                {{-- for deve essere uguale ad id --}}
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type">
                    <option selected>Select</option>
                    {{-- queste sono le VALIDAZIONE di base --}}
                    <option @selected(old('type') === 'comic book') value="comic book">Comic book</option>
                    <option @selected(old('type') === 'graphic novel') value="graphic novel">Graphic novel</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine</label>
                <input type="text" class="form-control" id="series" placeholder="Thumb" name="thumb"
                    value="{{ old('thumb') }}">
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" placeholder="Series" name="series"
                    value="{{ old('series') }}">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di vendita</label>
                <input type="text" class="form-control" id="sale_date" placeholder="Sale date" name="sale_date"
                    value="{{ old('sale_date') }}">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" placeholder="Price" name="price"
                    value="{{ old('price') }}">
            </div>
            <button class="btn btn-success mb-3">Salva</button>
        </form>

    </div>
@endsection

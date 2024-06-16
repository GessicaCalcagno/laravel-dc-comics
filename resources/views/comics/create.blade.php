@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="py-3">
            <h4>Crea un nuovo Fumetto</h4>
        </div>

        <form action="{{ route('comics.store') }}" method="POST">
            {{-- Per motivi di sicurezza. Cookie per far riconoscere il form al server, senza questo non funziona --}}
            @csrf
            <div class="mb-3">
                {{-- il name deve corrispondere al nome della colonna --}}
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
            </div>
            <div class="mb-3">
                <label for="descripton" class="form-label">Descrizione</label>
                <textarea  class="form-control" id="descripton" placeholder="Descripton" name="description">
                </textarea>
            </div>

            <div class="mb-3">
                {{-- for deve essere uguale ad id --}}
                <label for="type" class="form-label">Type</label>
                <select class="form-select" id="type" name="type">
                    <option selected>Select</option>
                    <option value="comic book">Comic book</option>
                    <option value="graphic novel">Graphic novel</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="thumb" class="form-label">Immagine</label>
                <input type="text" class="form-control" id="series" placeholder="Thumb" name="thumb">
            </div>

            <div class="mb-3">
                <label for="series" class="form-label">Series</label>
                <input type="text" class="form-control" id="series" placeholder="Series" name="series">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di vendita</label>
                <input type="text" class="form-control" id="sale_date" placeholder="Sale date" name="sale_date">
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="text" class="form-control" id="price" placeholder="Price" name="price">
            </div>
            <button class="btn btn-success mb-3">Salva</button>
        </form>

    </div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Fumetti</h1>

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
            @foreach ($comics  as $comic )
                
            <tr>
                <th scope="row">{{$comic->title}}</th>
                <td>{{$comic->description}}</td>
                <td>{{$comic->price}}</td>
                <td>{{$comic->series}}</td>
                <td>{{$comic->sale_date}}</td>
                <td>{{$comic->type}}</td>
            </tr>
            @endforeach
        </tbody>
      </table>

</div>
@endsection
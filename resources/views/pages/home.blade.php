@extends('layouts.main-layout')

@section('content')
<div class="container">

    <h1 class="py-3 text-center">Babazon</h1>

    <a href="{{route('product.create')}}" class="d-flex justify-content-center">
        <h4 class="btn btn-primary">Crea nuovo prodotto</h4>
    </a>

    @foreach ($categories as $category)
    <h2>{{ $category -> name }}</h2>
    <ul>
        @foreach ($category -> products as $product)
        <li>
            [{{ $product -> code }}] {{ $product -> name }}
            - {{ $product -> typology -> name }}
            - DIGITAL:
            {{ $product -> typology -> digital ? "YES" : "NO" }}
            <div>
                <a href="#">Edit</a>
                <a href="{{route('product.delete', $product)}}">Delete</a>
            </div>

        </li>
        @endforeach
    </ul>

    @endforeach
</div>

@endsection
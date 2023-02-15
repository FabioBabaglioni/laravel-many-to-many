@extends('layouts.main-layout')

@section('content')
<div class="container">
    <h2 class="text-center py-3">Crea nuovo prodotto</h2>

    <form class="row g-3 d-flex justify-content-center" action="{{route('product.store')}}" method="post">
        @csrf
        <div class="col-md-7">
            <label for="name" class="form-label fs-5">Nome prodotto</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="col-md-7">
            <label for="description" class="form-label fs-5">Descrizione</label>
            <textarea class="col-md-7" name="description" cols="40" rows="5"></textarea>
        </div>
        <div class="col-7">
            <label for="price" class="form-label fs-5">Prezzo</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="col-7">
            <label for="weight" class="form-label fs-5">Peso</label>
            <input type="number" class="form-control" name="weight">
        </div>
        <div class="col-7">
            <label for="typology" fs-5">Tipologia</label>
            <select name="typology">
                @foreach ($typologies as $typology)
                <option value="{{$typology -> id}}">{{$typology -> name}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-7">
            <h5>category</h5>
            <div class="check">
                @foreach ($categories as $category)
                <input type="checkbox" name="categories" value="{{$category -> id}}">
                <label for="categories" class="form-label fs-5">{{$category -> name}}</label>
                <br>
                @endforeach
            </div>
        </div>

        <div class="col-7">
            <button type="submit" class="btn btn-outline-success fs-5">Aggiungi prodotto</button>
        </div>
    </form>
</div>


@endsection
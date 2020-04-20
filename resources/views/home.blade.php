@extends('layouts.app')

@section('header')
@include('includes.header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5 pb-5">
            <h1>HOME SITE</h1>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Explicabo iure ipsum, doloribus. Itaque, quod pariatur necessitatibus et doloribus doloremque rem sed, minima iste ex sit, recusandae velit, cum molestias tempora.
        </div>

    </div>

    @if (isset($products))
        <div class="row">
            @foreach ($products as $product)

                <div class="col-md-3 mb-3">
                    <div class="card">
                      <div class="card-body text-center">
                        <img class="card-img-top mb-3" src="{{ isset($product->images()->first()->image) ? $product->images()->first()->image : url('admin/img/no-image.jpg') }}" alt="imagen del producto {{ $product->id }}" >
                        <h5 class="card-title"><a href="{{ url('products/' . $product->id) }}">{{ $product->name }}</a></h5>
                        <a href="#">{{ $product->category->name }}</a>
                        <p class="card-text">{{ $product->description }}</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                </div>

            @endforeach
        </div>
    @else
    <p>NADA</p>
    @endif

</div>
@endsection

@section('footer')
@include('includes.footer')
@endsection

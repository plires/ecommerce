@extends('layouts.app')

@section('header')
@include('includes.header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5 pb-5">
            <h1>HOME SITE</h1>
        </div>
    </div>

    @include('admin.includes.session-flash')

    <div class="row">
        <div class="col-md-6">
            <img class="img-fluid" src="{{ $product->featured_image_url }}" alt="{{ $product->name .' - '. $product->id }}">
            @if (isset($gallery))
                <div class="row">
                    @foreach ($gallery as $image)
                        <div class="col-md-3">
                            <img class="img-fluid" src="{{ $image }}" alt="pepe">
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <p><strong>Nombre: </strong>{{ $product->name }}</p>
            <p><strong>Descripción: </strong>{{ $product->description }}</p>
            <p><strong>Precio: </strong>{{ $product->price }}</p>
            <p><strong>Categoría: </strong>{{ $product->category->name }}</p>
            <button data-toggle="modal" data-target="#modalQuantityProduct" type="button" class="btn btn-primary">Agregar al carrito</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <p><strong>Mas Detalles: </strong><br>{{ $product->long_description }}</p>
        </div>
    </div>

</div>

<!-- Modal Cantidad del producto -->
<div class="modal fade show" data-backdrop="static" id="modalQuantityProduct" tabindex="-1" role="dialog" aria-labelledby="modalQuantityProductLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalQuantityProductLabel">Selecciona cantidad del producto</h5>
        <button id="modal-close" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ url('cart/') }}">
          <div class="modal-body">
                {{ csrf_field() }}
                <input name="product_id" type="hidden" value="{{ $product->id }}">
                <input class="form-control" name="quantity" type="number" value="1">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button data-toggle="modal" data-target="#modalQuantityProduct" type="submit" class="btn btn-primary" >Agregar al carrito</button>
          </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal Cantidad del producto end -->

@endsection

@section('footer')
@include('includes.footer')
@endsection

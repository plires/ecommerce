@extends('layouts.app')

@section('header')
@include('includes.header')
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5 pb-5">
            <h1>CARRO DE COMPRAS</h1>
        </div>

    </div>
    
    @include('admin.includes.messages')
    @include('admin.includes.session-flash')

    <div class="row">
        <div class="col-md-12">

          @if ($details->isNotEmpty())
            <p>Tu carrito de compras tiene {{ $details->count() }} productos</p>
            <table class="table">
              <caption>List of users</caption>
              <thead>
                <tr>
                  <th scope="col">Producto</th>
                  <th scope="col">Nombre</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Descuento</th>
                  <th scope="col">Subtotal</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($details as $key => $detail)
                  <tr data-id="{{ $detail->id }}">
                    <td>
                      <a href="{{ url('/products/' . $detail->product->id) }}">
                        <img height="50" src="{{ $detail->product->featured_image_url }}" alt="{{ $detail->product->id }}">
                      </a>
                    </td>
                    <td>
                      <a href="{{ url('/products/' . $detail->product->id) }}">
                        {{ $detail->product->name }}
                      </a>
                    </td>
                    <td>{{ $detail->quantity }}</td>
                    <td>{{ $detail->product->price }}</td>
                    <td>{{ $detail->discount }}</td>
                    <td>$ {{ $detail->quantity * $detail->product->price }}</td>
                    <td>
                      <div class="dropdown">
                        <button type="submit" class="btn_delete btn btn-secondary btn-confirm">
                          <i class="fas fa-user-times mr-3"></i>Eliminar
                        </button>
                      </div>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          @else
            Su carrito esta vacio
          @endif
            
        </div>
    </div>

</div>

<form action="{{ url('/cart/:CART_DETAIL_ID/') }}" method="DELETE" id="form-delete">
  <input name="_method" type="hidden" value="DELETE">
  {{ csrf_field() }}
</form>

@endsection

@section('footer')
@include('includes.footer')
@endsection

@section('scripts')
  <script src="{{ asset('js/cart/index.js') }}"></script>
@endsection

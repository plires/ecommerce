@extends('layouts/admin')

@section('title', 'Detalle de Producto')

<!-- Header Admin -->
@section('navbar')
  @include('admin.includes.navbar')
@endsection
<!-- Header Admin end -->

<!-- Aside Admin -->
@section('aside')
  @include('admin.includes.aside')
@endsection
<!-- Aside Admin end -->

<!-- Header Content Admin -->
@section('header-content')
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detalle del producto {{ $product->name }}</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Usuarios</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
<!-- Header Content Admin end -->

<!-- Content Main Admin -->
@section('main-content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-md-2">

                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Información del Producto</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ url('admin/products/'.$product->id) }}" class="needs-validation" novalidate>
                      {{ csrf_field() }}
                      <div class="card-body">

                       @include('admin.includes.errors')

                        {{-- Input nombre --}}
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input disabled type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre del producto" value="{{ old('name', $product->name) }}">
                          <div class="invalid-feedback">
                            Ingrese un nombre
                          </div>
                        </div>
                        {{-- Input nombre end --}}

                        {{-- Input descripcion --}}
                        <div class="form-group">
                          <label for="description">Descripción Corta</label>
                          <textarea disabled class="form-control" id="description" name="description" rows="2" placeholder="Ingrese una descripción corta del producto.">{{ old('description', $product->description) }}</textarea>
                          <div class="invalid-feedback">
                            Ingrese una descripción corta del producto
                          </div>
                        </div>
                        {{-- Input descripcion end --}}

                        {{-- Input descripcion larga --}}
                        <div class="form-group">
                          <label for="long_description">Descripción Larga</label>
                          <textarea disabled class="form-control" id="long_description" name="long_description" rows="5" placeholder="Ingrese una descripción larga del producto.">{{ old('long_description', $product->long_description) }}</textarea>
                        </div>
                        {{-- Input descripcion larga end --}}

                        {{-- Input precio --}}
                        <label for="price">Precio</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input disabled type="number" step="any" class="form-control" id="price" name="price" placeholder="Ingrese el precio del producto" value="{{ old('price', $product->price) }}">
                          <div class="input-group-append">
                            <span class="input-group-text">.00</span>
                          </div>
                          <div class="invalid-feedback">
                            Ingrese el precio del producto
                          </div>
                        </div>
                        {{-- Input precio end --}}

                        {{-- Input Categoria --}}
                        <div class="form-group">
                          <label>Categoría</label>
                          <select disabled id="category" name="category" class="form-control">
                              <option value="{{ $product->category->id }}">{{ $product->category->name }}</option>
                          </select>
                          <div class="invalid-feedback">
                            Ingrese la categoría del producto
                          </div>
                        </div>
                        {{-- Input Categoria end --}}
                        
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer text-right">
                        <a href="{{ url('admin/products') }}" class="btn btn-secondary mr-3">Volver al Listado</a>
                        <a href="{{ url('admin/products/'. $product->id . '/edit') }}" class="btn btn-primary">Editar</a>
                      </div>
                    </form>
                  </div>                 

                </div>
            </div>
            
        </div>
    </div>
@endsection
<!-- Content Main Admin end -->

<!-- Footer Admin -->
@section('footer')
  @include('admin.includes.footer')
@endsection
<!-- Footer Admin end -->






@extends('layouts/admin')

@section('title', 'Editar producto')

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
            <h1 class="m-0 text-dark">Edición del Producto {{ $product->name }}</h1>
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
    <div class="content create_product">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-md-2">

                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Editar Producto</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ url('admin/products/'.$product->id) }}" class="needs-validation" novalidate>
                      {{ method_field('put') }}
                      {{ csrf_field() }}
                      <div class="card-body">

                       @include('admin.includes.errors')

                        {{-- Input nombre --}}
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input required type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre del producto" value="{{ old('name', $product->name) }}">
                          <div class="invalid-feedback">
                            Ingrese un nombre
                          </div>
                        </div>
                        {{-- Input nombre end --}}

                        {{-- Input descripcion --}}
                        <div class="form-group">
                          <label for="description">Descripción Corta</label>
                          <textarea required class="form-control" id="description" name="description" rows="2" placeholder="Ingrese una descripción corta del producto.">{{ old('description', $product->description) }}</textarea>
                          <div class="invalid-feedback">
                            Ingrese una descripción corta del producto
                          </div>
                        </div>
                        {{-- Input descripcion end --}}

                        {{-- Input descripcion larga --}}
                        <div class="form-group">
                          <label for="long_description">Descripción Larga</label>
                          <textarea class="form-control" id="long_description" name="long_description" rows="5" placeholder="Ingrese una descripción larga del producto.">{{ old('long_description', $product->long_description) }}</textarea>
                        </div>
                        {{-- Input descripcion larga end --}}

                        {{-- Input precio --}}
                        <label for="price">Precio</label>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">$</span>
                          </div>
                          <input required type="number" step="any" class="form-control" id="price" name="price" placeholder="Ingrese el precio del producto" value="{{ old('price', $product->price) }}">
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
                          <select required id="category" name="category" class="form-control">
                            @foreach($categories as $category)
                              <option 
                                @if($category->id == old('category', $product->category->id))
                                selected
                                @endif
                               value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
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
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
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

<!-- Extra JS -->
@section('scripts')
<script src="{{ asset('admin/js/formsValidate.js') }}"></script>
@endsection
<!-- Extra JS end -->
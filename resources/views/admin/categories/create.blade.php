@extends('layouts/admin')

@section('title', 'Crear nueva categoría')

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
            <h1 class="m-0 text-dark">Crear Nueva Categoría</h1>
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
    <div class="content create_category">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-md-2">

                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Nueva Categoría</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ url('admin/categories') }}" class="needs-validation" novalidate>
                      {{ csrf_field() }}
                      <div class="card-body">

                       @include('admin.includes.errors')

                        {{-- Input nombre --}}
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input required type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre de la categoría" value="{{ old('name') }}">
                          <div class="invalid-feedback">
                            Ingrese un nombre
                          </div>
                        </div>
                        {{-- Input nombre end --}}

                        {{-- Input descripcion --}}
                        <div class="form-group">
                          <label for="description">Descripción Corta</label>
                          <textarea class="form-control" id="description" name="description" rows="2" placeholder="Ingrese una descripción de la categoría.">{{ old('description') }}</textarea>
                          <div class="invalid-feedback">
                            Ingrese una descripción de la categoría
                          </div>
                        </div>
                        {{-- Input descripcion end --}}
                        
                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer text-right">
                        <a href="{{ url('admin/categories') }}" class="btn btn-primary mr-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Crear Categoría</button>
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
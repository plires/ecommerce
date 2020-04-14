@extends('layouts/admin')

@section('title', 'Detalle de Usuario')

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
            <h1 class="m-0 text-dark">Detalle del usuario {{ $user->name }}</h1>
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
                      <h3 class="card-title">Información del Usuario</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ url('admin/users/'.$user->id) }}" class="needs-validation" novalidate>
                      {{ method_field('put') }}
                      {{ csrf_field() }}
                      <div class="card-body">

                       @include('admin.includes.errors')

                        {{-- Input nombre --}}
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input disabled type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre del usuario" value="{{ old('name', $user->name) }}">
                          <div class="invalid-feedback">
                            Ingrese un nombre
                          </div>
                        </div>
                        {{-- Input nombre end --}}

                        {{-- Input email --}}
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input disabled type="email" class="form-control" id="email" name="email" placeholder="Ingrese el email" value="{{ old('email', $user->email) }}">
                          <div class="invalid-feedback">
                            Ingrese un email
                          </div>
                        </div>
                        {{-- Input email end --}}

                        {{-- Input telefono --}}
                        <div class="form-group">
                          <label for="name">Teléfono</label>
                          <input disabled type="text" class="form-control" id="phone" name="phone" placeholder="Ingrese teléfono del usuario" value="{{ old('phone', $user->phone) }}">
                          <div class="invalid-feedback">
                            Ingrese un teléfono
                          </div>
                        </div>
                        {{-- Input telefono end --}}

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer text-right">
                        <a href="{{ url('admin/users') }}" class="btn btn-secondary mr-3">Volver al Listado</a>
                        <a href="{{ url('admin/users/'. $user->id . '/edit') }}" class="btn btn-primary">Editar</a>
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
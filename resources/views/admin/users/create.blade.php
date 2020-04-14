@extends('layouts/admin')

@section('title', 'Crear nuevo usuario')

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
            <h1 class="m-0 text-dark">Crear Nuevo Usuario</h1>
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
    <div class="content create_user">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 offset-md-2">

                  <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Nuevo Usuario</h3>
                    </div>

                    <!-- /.card-header -->
                    <!-- form start -->
                    <form role="form" method="post" action="{{ url('admin/users/') }}" class="needs-validation" novalidate>
                      {{ csrf_field() }}
                      <div class="card-body">

                       @include('admin.includes.errors')

                        {{-- Input nombre --}}
                        <div class="form-group">
                          <label for="name">Nombre</label>
                          <input required type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre del usuario" value="{{ old('name') }}">
                          <div class="invalid-feedback">
                            Ingrese un nombre
                          </div>
                        </div>
                        {{-- Input nombre end --}}

                        {{-- Input email --}}
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input required type="email" class="form-control" id="email" name="email" placeholder="Ingrese el email" value="{{ old('email') }}">
                          <div class="invalid-feedback">
                            Ingrese un email
                          </div>
                        </div>
                        {{-- Input email end --}}

                        {{-- Input telefono --}}
                        <div class="form-group">
                          <label for="name">Teléfono</label>
                          <input type="text" class="form-control" id="phone" name="phone" placeholder="Ingrese teléfono del usuario" value="{{ old('phone') }}">
                          <div class="invalid-feedback">
                            Ingrese un teléfono
                          </div>
                        </div>
                        {{-- Input telefono end --}}

                        {{-- Input password --}}
                        <div class="form-group">
                          <label for="name">Password</label>
                          <input required type="password" class="form-control" id="password" name="password" placeholder="Ingrese un password para el usuario">
                          <div class="invalid-feedback">
                            Ingrese un password para el usuario.
                          </div>
                        </div>
                        {{-- Input password end --}}

                        {{-- Input password_confirmation --}}
                        <div class="form-group">
                          <label for="name">Confirmar Password</label>
                          <input required type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ingrese la confirmación del password">
                          <div class="invalid-feedback">
                            Ingrese la confirmación del password.
                          </div>
                        </div>
                        {{-- Input password_confirmation end --}}

                      </div>
                      <!-- /.card-body -->

                      <div class="card-footer text-right">
                        <a href="{{ url('admin/users') }}" class="btn btn-primary mr-3">Cancelar</a>
                        <button type="submit" class="btn btn-primary">Enviar</button>
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
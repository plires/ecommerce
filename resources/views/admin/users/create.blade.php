<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="modalCreateTitle">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form role="form" method="post" action="{{ action('Admin\User\UserController@store') }}" class="needs-validation" novalidate>
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
            <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </form>

      </div>
      
    </div>
  </div>
</div>
<!-- Create Form User end -->


{{-- Errores --}}
@if ($errors->any())
  <script>
    $('#modalCreate').modal('show')
  </script>
@endif
{{-- Errores end --}}

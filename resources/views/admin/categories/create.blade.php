<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" role="dialog" aria-labelledby="modalCreateTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title" id="modalCreateTitle">Nueva Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form role="form" method="post" action="{{ action('Admin\Category\CategoryController@store') }}" class="needs-validation" novalidate>
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
            <button type="button" class="btn btn-secondary mr-3" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Crear Categoría</button>
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

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
        
        <form role="form" method="post" action="{{ action('Admin\Product\ProductController@store') }}" class="needs-validation" novalidate>
          {{ csrf_field() }}
          <div class="card-body">

           @include('admin.includes.errors')

            {{-- Input nombre --}}
            <div class="form-group">
              <label for="name">Nombre</label>
              <input required type="text" class="form-control" id="name" name="name" placeholder="Ingrese nombre del producto" value="{{ old('name') }}">
              <div class="invalid-feedback">
                Ingrese un nombre
              </div>
            </div>
            {{-- Input nombre end --}}

            {{-- Input descripcion --}}
            <div class="form-group">
              <label for="description">Descripción Corta</label>
              <textarea required class="form-control" id="description" name="description" rows="2" placeholder="Ingrese una descripción corta del producto.">{{ old('description') }}</textarea>
              <div class="invalid-feedback">
                Ingrese una descripción corta del producto
              </div>
            </div>
            {{-- Input descripcion end --}}

            {{-- Input descripcion larga --}}
            <div class="form-group">
              <label for="long_description">Descripción Larga</label>
              <textarea class="form-control" id="long_description" name="long_description" rows="5" placeholder="Ingrese una descripción larga del producto.">{{ old('long_description') }}</textarea>
            </div>
            {{-- Input descripcion larga end --}}

            {{-- Input precio --}}
            <label for="price">Precio</label>
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text">$</span>
              </div>
              <input required type="number" step="any" class="form-control" id="price" name="price" placeholder="Ingrese el precio del producto" value="{{ old('price') }}">
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
                  @if($category->id ==  old('category'))
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

@extends('layouts/admin')

@section('title', 'Listado de Productos')

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
            <h1 class="m-0 text-dark">Listado de Productos</h1>
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
                <div class="col-lg-12">

                  @include('admin.includes.messages')
                  @include('admin.includes.session-flash')
                  @include('admin.products.create')

                    <div class="card">
                      <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCreate">
                          <i class="fas fa-user-times mr-3"></i>Agregar Producto
                        </button>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->

                      @if (!empty($products))

                        <div class="card-body table-responsive p-0" style="height: 100%;">
                          <table class="table table-head-fixed table-hover text-nowrap">
                              <thead>
                                  <tr>
                                      <th>Nombre</th>
                                      <th>Precio</th>
                                      <th>Categoría</th>
                                      <th>Imagen</th>
                                      <th class="text-right">Opciones</th>
                                  </tr>
                              </thead>
                              <tbody>

                                
                                @foreach ($products as $product)

                                  <tr data-id="{{ $product->id }}">
                                      <td>
                                          <a href="{{ url('/admin/products/'.$product->id) }}" title="Ver Producto">
                                              {{ $product->name }}
                                          </a>
                                      </td>
                                      <td>
                                          <a href="{{ url('/admin/products/'.$product->id) }}" title="Ver Producto">
                                              {{ $product->price }}
                                          </a>
                                      </td>
                                      <td>
                                          <a href="{{ url('/admin/categories/'.$product->category_id) }}" title="Ver Producto">
                                            {{ isset($product->category->name) ? $product->category->name : 'Sin Categoría' }}
                                          </a>
                                      </td>
                                      <td>
                                          <a href="{{ url('/admin/products/'.$product->id) }}" title="Ver Producto">
                                              <img width="50" height="50" src="{{ $product->featured_image_url }}" alt="imagen del producto {{ $product->id }}">
                                          </a>
                                      </td>
                                      <td class="text-right">
                                          <div class="btn-group">
                                              <button type="button" class="btn btn-primary">Acciones</button>
                                              <button type="button" class="btn btn-primary dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                                                <span class="sr-only">Toggle Dropdown</span>
                                              </button>
                                                <div class="dropdown-menu" role="menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-1px, 37px, 0px);">
                                                  <a class="dropdown-item" href="{{ url('admin/products/'. $product->id) }}"><i class="fas fa-user-check mr-3"></i>Mostrar</a>
                                                  <div class="dropdown-divider"></div>
                                                  <a class="dropdown-item" href="{{ url('admin/products/'.$product->id.'/edit') }}"><i class="fas fa-user-edit mr-3"></i>Editar</a>
                                                  <div class="dropdown-divider"></div>
                                                    <button type="submit" class="btn_delete btn-confirm dropdown-item"><i class="fas fa-user-times mr-3"></i>Eliminar
                                                    </button>
                                                </div>
                                          </div>
                                      </td>
                                  </tr>
                                @endforeach

                              </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->

                      @else
                        <p>nada</p>
                      @endif

                    </div>

                </div>
            </div>
            
            <!-- Paginacion -->
            <div class="row">
              <div class="col-md-12 text-center m-auto">
                {{ $products->links() }}
              </div>
            </div>
            <!-- Paginacion end -->

        </div>
    </div>

    @include('admin.includes.modal-delete')

    <form action="{{ url('/admin/products/:PRODUCT_ID/') }}" method="DELETE" id="form-delete">
      <input name="_method" type="hidden" value="DELETE">
      {{ csrf_field() }}
    </form>

@endsection
<!-- Content Main Admin end -->

<!-- Footer Admin -->
@section('footer')
  @include('admin.includes.footer')
@endsection
<!-- Footer Admin end -->

@section('scripts')
  <script src="{{ asset('admin/js/products/index.js') }}"></script>
  <script src="{{ asset('admin/js/formsValidate.js') }}"></script>
@endsection


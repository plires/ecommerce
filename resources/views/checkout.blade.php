@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card">

                <div class="card-body">
                    <form method="post" action="{{ url('checkout/test') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                        <label for="id">Email address</label>
                        <input name="id" type="number" class="form-control" id="id" value="60">
                      </div>

                      <div class="form-group">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" value="test_user_94915103@testuser.com">
                      </div>

                      <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input name="cantidad" type="cantidad" class="form-control" id="cantidad" value="100">
                      </div>

                      <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input name="descripcion" type="descripcion" class="form-control" id="descripcion" value="Ergonomic Silk Shirt">
                      </div>

                      <div class="form-group">
                        <label for="cuotas">cuotas</label>
                        <input name="cuotas" type="cuotas" class="form-control" id="cuotas" value="1">
                      </div>

                      <div class="form-group">
                        <label for="metodoPago">metodoPago</label>
                        <input name="metodoPago" type="text" class="form-control" id="metodoPago" value="visa">
                      </div>
                      
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Agregar Movimientos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('movimientos.index') }}">Movimientos</a></li>
              <li class="breadcrumb-item active">Agregar</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- /.col-md-8 -->
            <div class="col-lg-8">
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Agregar Movimientos</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="guardar_movimientos" method="post" action="{{ route('movimientos.store') }}">
                  {{ csrf_field() }}
                  
                  <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="fecha">Fecha</label>
                            <input id="fecha" name="fecha" type="date" class="form-control" placeholder="Fecha" value="{{ old('fecha') }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="tipo_movimiento">Tipo</label>
                            <select id="tipo_movimiento" name="tipo_movimiento" class="form-control select">
                                <option disabled selected>Selecciona</option>
                                @foreach( $tipos as $tipo )
                                    @if( old('tipo_movimiento') == $tipo )
                                    <option value="{{ $tipo }}" selected>{{ $tipo }}</option>
                                    @else
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-8">
                            <label for="usuario_id">Usuarios</label>
                            <select id="usuario_id" name="usuario_id" class="form-control select">
                                <option disabled selected>Selecciona</option>
                                @foreach($usuarios as $usuario)
                                    @if( old('usuario_id') == $usuario->id)
                                    <option value="{{ $usuario->id }}" selected>{{ $usuario->name }}</option>
                                    @else
                                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="d-flex justify-content-center">
                      <div class='col-sm-6'>
                        <button type="submit" form="guardar_movimientos" class="btn btn-primary btn-block">Agregar</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@section('specific_js')
<script>
  //Navegacion
  $(document).ready(function(){
    $("#nav_item_existencias").addClass("menu-open");
    $("#nav_item_title_existencias").addClass("active");
    $("#nav_item_option_gestionar_existencias").addClass("active");
  }); 
</script>
@endsection
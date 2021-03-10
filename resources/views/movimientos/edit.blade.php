@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Movimientos</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('existencias.index') }}">Movimientos</a></li>
              <li class="breadcrumb-item active">Editar</li>
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
                  <h3 class="card-title">Editar Movimientos</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="guardar_movimientos" method="post" action="{{ route('movimientos.update', $movimiento->id) }}">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                  <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="fecha">Fecha</label>
                            <input id="fecha" name="fecha" type="date" class="form-control" placeholder="Fecha" value="{{ $movimiento->fecha }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="tipo_movimiento">Tipo</label>
                            <select id="tipo_movimiento" name="tipo_movimiento" class="form-control select">
                                <option disabled selected>Selecciona</option>
                                @foreach($tipos as $tipo)
                                    @if( $movimiento->tipo_movimiento == $tipo )
                                    <option value="{{ $tipo }}" selected>{{ $tipo }}</option>
                                    @else
                                    <option value="{{ $tipo }}">{{ $tipo }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-sm-8">
                            <label for="usuario_id">Usuario</label>
                            <select id="usuario_id" name="usuario_id" class="form-control select">
                                <option disabled selected>Selecciona</option>
                                @foreach($usuarios as $usuario )
                                    @if( $movimiento->usuario_id ) == $usuario->id)
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
                      <div class='col-sm-5'>
                        <button type="submit" form="guardar_movimientos" class="btn btn-primary btn-block">Guardar</button>
                      </div>
                      <div class='col-sm-5'>
                        <button id="cancelarButton" type="button" class="btn btn-danger btn-block">Cancelar</button>
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
    $("#nav_item_movimientos").addClass("menu-open");
    $("#nav_item_title_movimientos").addClass("active");
    $("#nav_item_option_gestionar_movimientos").addClass("active");
  }); 
</script>

<script>
    $("#cancelarButton").click(function(){
        window.location.href = "{{ route('movimientos.index') }}";
    });
</script>
@endsection
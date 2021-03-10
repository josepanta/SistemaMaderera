@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Mostrar Existencias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('existencias.index') }}">Existencias</a></li>
              <li class="breadcrumb-item active">Mostrar</li>
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
                  <h3 class="card-title">Mostrar Existencias</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->                  
                  <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" value="{{ $existencia->nombre }}" disabled>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="cantidad">Cantidad</label>
                            <input id="cantidad" name="cantidad" type="number" step="1" class="form-control" placeholder="Cantidad" value="{{ $existencia->cantidad }}" disabled>
                        </div>
                        <div class="form-group col-sm-8">
                            <label for="tamaño_id">Tamaño</label>
                            <input id="tamaño_id" name="tamaño_id" type="number" step="1" class="form-control" placeholder="Cantidad" value="{{ $existencia->tamaño->nombre }}" disabled>
                        </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="d-flex justify-content-center">
                      <div class='col-sm-6'>
                        <button id="regresarButton" type="submit" class="btn btn-primary btn-block">Regresar</button>
                      </div>
                    </div>
                  </div>
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

<script>
    $('#regresarButton').click(function(){
        window.location.href = "{{ route('existencias.index') }}";
    });
</script>
@endsection
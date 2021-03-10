@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Editar Tamaños</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item"><a href="{{ route('tamanos.index') }}">Tamaños</a></li>
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
                  <h3 class="card-title">Editar Tamaños</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="guardar_tamaños" method="post" action="{{ route('tamanos.update', $tamaño->id) }}">
                  {{ csrf_field() }}
                  {{ method_field('PATCH') }}
                  <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="nombre">Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="form-control" placeholder="Nombre" value="{{ $tamaño->nombre }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="ancho">Ancho</label>
                            <input id="ancho" name="ancho" type="number" step="0.01" class="form-control" placeholder="Ancho" value="{{ $tamaño->ancho }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="alto">Alto</label>
                            <input id="alto" name="alto" type="number" step="0.01" class="form-control" placeholder="Alto" value="{{ $tamaño->alto }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="grueso">Grueso</label>
                            <input id="grueso" name="grueso" type="number" step="0.01" class="form-control" placeholder="Grueso" value="{{ $tamaño->grueso }}">
                        </div>
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <div class="d-flex justify-content-center">
                      <div class='col-sm-5'>
                        <button type="submit" form="guardar_tamaños" class="btn btn-primary btn-block">Guardar</button>
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
    $("#nav_item_existencias").addClass("menu-open");
    $("#nav_item_title_existencias").addClass("active");
    $("#nav_item_option_gestionar_tamaños").addClass("active");
  }); 
</script>

<script>
    $("#cancelarButton").click(function(){
        window.location.href = "{{ route('tamanos.index') }}";
    });
</script>
@endsection
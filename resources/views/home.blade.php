@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Inicio</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Inicio</a></li>
              <li class="breadcrumb-item active">Bienvenido</li>
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
                <div class="card">
                    <div class="card-header">
                      <div class="row">
                        <h5 class="m-0 mr-1">Bienvenido</h5>
                        <h5 class="m-0" style="text-transform:uppercase;">{{ Auth::user()->name }}!</h5>
                      </div>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title"></h6>

                        <p class="card-text">Gestiona Existencias, Movimientos, de la Maderera.</p>
                        <a href="{{ route('movimientos.index') }}" class="btn btn-primary">Gestionar</a>
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

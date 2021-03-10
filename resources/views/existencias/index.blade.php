@extends('layouts.app')

@section('specific_css')
<!-- DataTables -->
<link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Existencias</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('home') }}">Inicio</a></li>
              <li class="breadcrumb-item active">Existencias</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- /.col-md-12 -->
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Existencias</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="existencias_table" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Tamaño</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($existencias as $existencia)
                                    <tr>
                                        <td>{{ $existencia->id }}</td>
                                        <td>{{ $existencia->nombre }}</td>
                                        <td>{{ $existencia->cantidad }}</td>
                                        <td>{{ $existencia->tamaño_id }}</td>
                                        <td>
                                          <div class="row justify-content-between">
                                            <input id="id" type="hidden" value="{{ $existencia->id }}">
                                            <button type="button" class="btn col-md-4 btn-primary btn-sm" onclick="javascript:editar($(this))"><i class="fa fa-edit"></i >Editar</button>
                                            <button type="button" class="btn col-md-3 btn-primary btn-sm" onclick="javascript:mostrar($(this))"><i class="fa fa-eye"></i> Ver</button>
                                            <button type="button" class="btn col-md-4 btn-primary btn-sm" onclick="javascript:eliminar($(this))"><i class="fa fa-trash"></i> Eliminar</button>
                                          </div>
                                        </td>
                                    </tr>
                                @endforeach 
                            </tfoot>
                        </table>
                    </div>
                <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->
@endsection

@section('specific_js')
<script src="../../dist/js/demo.js"></script>

<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
  //DataTable
  $(function () {
    $("#existencias_table").DataTable({
      "ordering": false,
      "responsive": true,
      "pageLength": 5,
      "lengthChange": false,
      "autoWidth": false,
      "searching": true,
      "buttons": [
        {
          'text': "Agregar",
          'action': function(){
            window.location.href = "{{ route('existencias.create') }}"
          }
        }
        ,"copy", "csv", "excel", "pdf", "print", "colvis"
      ],
      "language": {
        "url": "{{ asset('plugins/language/spanish.json') }}"
      },
      "initComplete": function(){
        $("#existencias_table").DataTable().buttons().container().appendTo('#existencias_table_wrapper .col-md-6:eq(0)')
      }
    });
  });
</script>

<script>
  //Navegacion
  $(document).ready(function(){
    $("#nav_item_existencias").addClass("menu-open");
    $("#nav_item_title_existencias").addClass("active");
    $("#nav_item_option_gestionar_existencias").addClass("active");
  }); 
</script>

<script>
  //Edit
  function editar(obj){
    var url = '{{ route("existencias.edit", ":id") }}'; 
    var id = obj.parent().find('input').val();

    url = url.replace(':id', id);
    window.location.href = url;
  }

  //Show
  function mostrar(obj){
    var url = '{{ route("existencias.show", ":id") }}';
    var id = obj.parent().find("input").val();

    url = url.replace(':id', id);
    window.location.href = url; 
  }

  //Delete
  function eliminar(obj){
    var url = '{{ route("existencias.destroy", ":id") }}';
    var id = obj.parent().find("input").val();
    url = url.replace(':id', id);
    
    $.ajax({
      url: url,
      type: "post",
      data: {"_method":"delete", "_token": "{{ csrf_token() }}",},
    }).done(function(){
      window.location.href = "{{ route('existencias.index') }}";
    });
  }
</script>
@endsection
@extends('adminlte::page')

@section('title', 'Rekap Data ' . date('Y'))
@section('content_header')
<h1>Rekap Data {{date('F Y')}}</h1>
@stop

@section('content')
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">

                <div class="row">

                    <div class="col-md-12">
                        <div class="table-responsive">

                            <table id="table_cuti" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Disetujui</th>
                                        <th>Pending</th>
                                        <th>Batal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $i=1;
                                    @endphp
                                    @foreach ($customer as $data)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $data->user_name  }}</td>
                                        <td>{{ $data->disetujui_count }}</td>
                                        <td>{{ $data->pending_count }}</td>
                                        <td>{{ $data->batal_count }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>

                        </div>

                    </div>
                </div>

            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
            @stop
              @include('footer')

            @section('plugins.Datatables', true)
            @section('plugins.DatatablesPlugins', true)

            @section('plugins.Sweetalert2', true)

            @section('js')
            <script type="text/javascript">
              
                 $(function () {
                    $("#table_cuti").DataTable({
                      "paging": true,
                      "lengthChange": false,
                      "searching": true,
                      "ordering": true,
                      "info": true,
                      "autoWidth": false,
                      "responsive": true,
                      "buttons": [
                            {
                                extend: 'excelHtml5',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3,4 ]
                                }
                            },
                            {
                                extend: 'pdfHtml5',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3,4 ]
                                }
                            },
                            {
                                extend: 'print',
                                exportOptions: {
                                    columns: [ 0, 1, 2, 3,4,5,6,7 ]
                                }
                            }
                        ]
                    }).buttons().container().appendTo('#table_cuti_wrapper .col-md-6:eq(0)');
                   
                  });
                

                
            </script>
           
            @stop
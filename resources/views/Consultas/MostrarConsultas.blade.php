@extends('layouts.admin')

@section('content')

    <div class="x_content">
        <table id="datatable" class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Telefono</th>
                <th>Genero</th>
                <th>Area</th>
                <th>Motivo</th>
                <th>Asesor de Consulta</th>

            </tr>
            </thead>
        </table>
    </div>


@endsection
@section('js')
    <script>
        $('#datatable').addClass('nowap').DataTable({
            dom: 'Bfrtip',
            buttons: [

                {
                    extend: 'excelHtml5',
                    exportOptions: {
                        columns: [ 0, 1, 2,3,4,5,6,7 ]
                    }
                },

            ],
            "processing": true,
            "serverSide": true,
            "bAutoWidth": false,
            "ajax": {
                url: '{{route('nuevaconsulta.index')}}'
            },
            "columns":[

                {data: 'persona.cedula'},
                {data: 'persona.nombre' },
                {data: 'persona.apellido'},
                {data: 'persona.celular'},
                {data: 'persona.genero'},
                {data: 'area'},
                {data: 'motivo'},
                {data: 'user.name'},
            ],
            columnDefs: [
                {targets: [-1, -3], className: 'dt-body-right'}
            ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
        });
    </script>
@endsection
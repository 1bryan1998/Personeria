@extends('layouts.admin')
@section('content')

<div class="x_content" style="height:100%">
    @foreach($usuarios as $usuario)
<div class="panel" style="height:300px">
    <div class="col-md-4 col-sm-4 col-xs-12 profile_details" style="margin-top: 40px" >
        <div class="well profile_view">
            <div class="col-sm-12">
                <h4 class="brief"><i>Informe sobre Consultas</i></h4>
                <div class="left col-xs-7">
                    <h2>{{$usuario->name}}</h2>
                    <p><strong>Cargo :</strong>{{$usuario->cargo}} </p>
                    <ul class="list-unstyled">
                        <li><i class="fa fa-building"></i>{{$usuario->area}} </li>
                        <li><i class="fa fa-phone"></i>{{$usuario->email}}</li>
                    </ul>
                </div>
                <div class="right col-xs-5 text-center">
                    <img src="{{asset('/Imagenes/'.$usuario->foto)}}" alt="" class="img-circle img-responsive">
                </div>
            </div>
            <div class="col-xs-12 bottom text-center">
                <div class="col-xs-12 col-sm-6 emphasis">

                </div>
                <div class="col-xs-12 col-sm-6 emphasis">
                    <button type="button" class="btn btn-success btn-xs"> <i class="fa fa-user">
                        </i> <i class="fa fa-comments-o"></i> </button>
                    <button type="button" class="btn btn-primary btn-xs">
                        <i class="fa fa-user"> </i> Ver Pefil
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-8 col-xs-12" style="height: 300px">
        <div id="piechart_3d-{{$usuario->id}}" style=" height: 300px;"></div>
    </div>

</div>
        @endforeach

</div>



@endsection
@section('js')
    <script >
        google.charts.load("current", {packages:["corechart"]});
        google.charts.setOnLoadCallback(drawChart);
        function drawChart() {
            var data;
            var options = {
                title: 'Mis Consultas',
                is3D: true,
            };
            @php foreach ($usuarios as $usuario){@endphp
            var chart{{$usuario->id}} = new google.visualization.PieChart(document.getElementById('piechart_3d-{{$usuario->id}}'));

            var Enero=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','01')->count()}}`;
            var Febrero=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','02')->count()}}`;
            var Marzo=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','03')->count()}}`;
            var Abril=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','04')->count()}}`;
            var Mayo=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','05')->count()}}`;
            var Junio=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','06')->count()}}`;
            var Julio=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','07')->count()}}`;
            var Agosto=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','08')->count()}}`;
            var Septiembre=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','09')->count()}}`;
            var Octubre=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','10')->count()}}`;
            var Noviembre=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','11')->count()}}`;
            var Diciembre=`{{\App\Consulta::where('user_id',$usuario->id)->whereMonth('created_at','12')->count()}}`;
            data = google.visualization.arrayToDataTable([
                ['Mes', 'Numero de Consultas'],
                ['Enero', validate(Enero)],
                ['Febrero',validate(Febrero)],
                ['Marzo',validate(Marzo)],
                ['Abril',validate(Abril)],
                ['Mayo',validate(Mayo)],
                ['Junio',validate(Junio)],
                ['Julio',validate(Julio)],
                ['Agosto',validate(Agosto)],
                ['Septiembre',validate(Septiembre)],
                ['Octubre',validate(Octubre)],
                ['Noviembre',validate(Noviembre)],
                ['Diciembre',validate(Diciembre)],
            ]);
            chart{{$usuario->id}}.draw(data, options);
            @php } @endphp
        }
        function validate(value) {
            if (value>0){
                return parseInt(value);
            }else {
                return 0;
            }
        }
    </script>

    @endsection


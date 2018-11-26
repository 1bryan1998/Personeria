@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
<h2>Nuevo Evento</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12" style="height:100px ">
                        <form  method="post" action="{{route('Añadirevento')}}" data-pdata-parsley-validate>
                            @csrf

                            <div class="x_panel">
                                <div>
                                    @if (Session::has('success'))
                                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                                    @elseif (Session::has('warnning'))
                                        <div class="alert alert-danger">{{ Session::get('warnning') }}</div>
                                    @endif

                                </div>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Actividad</label>
                                        <div class="">
                                            <input type="text" class="form-control" name="nombre_evento"  required="required"  >
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Inicio</label>

                                        <div class="">
                                            <input type="text" id="desde" class="form-control" name="fecha_inicio" autocomplete="off" required="required"  >

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Finalizacion</label>
                                        <div class="">
                                            <input type="text" id="hasta" class="form-control" name="fecha_finalizacion" autocomplete="off" required="required"  >

                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-1 col-sm-1 col-md-1 text-center"> &nbsp;<br/>
                                    <button type="submit" class="btn btn-success">Guardar</button>
                                </div>

                            </div>
                        </form>

                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12">


                        <div class="panel panel-primary">
                            <div class="panel-heading">Todos Mis Eventos</div>
                            <div class="panel-body" >
                                {!! $calendar_details->calendar() !!}
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 col-sm-8 col-xs-12"style="align-content: center">

                        <h4>Eventos proximos</h4>

                        <!-- end of user messages -->
                        <ul class="messages">
                            @foreach($eventos as $events)

                            <li>
                                <img src='{{asset('/Imagenes/'.Auth::user()->foto)}}' class="avatar" alt="Avatar">
                                <div class="message_date">
                                    <h3 class="date text-info"></h3>
                                    <p class="month">{{\Carbon\Carbon::parse($events->Fecha_inicio)->toFormattedDateString()}}</p>
                                </div>

                                <div class="message_wrapper">
                                    <h4 class="heading">{{Auth::user()->name}}</h4>
                                    <blockquote class="message">{{$events->Nombre_evento}}</blockquote>
                                    <br />
                                    <p class="url">
                                        <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                    <p class="month">El evento termina en: {{\Carbon\Carbon::parse($events->Fecha_finalizacion)->toFormattedDateString()}}</p>

                                    </p>
                                </div>
                            </li>
                                @endforeach
                        </ul>
                        {{$eventos->render()}}
                    </div>

                </div>


                    </div>

                    <!-- start project-detail sidebar -->
                    <!-- end project-detail sidebar -->

                </div>


    </div>

@endsection
@section('js')

    {!! $calendar_details->script() !!}


    <script type="text/javascript">

        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#desde').datepicker({
            format: 'yyyy-mm-dd',
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            if (ev.date.valueOf() >= checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate());
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('#hasta')[0].focus();
        }).data('datepicker');
        var checkout = $('#hasta').datepicker({
            format: 'yyyy-mm-dd',
            onRender: function(date) {
                return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            checkout.hide();
        }).data('datepicker');
    </script>
@endsection


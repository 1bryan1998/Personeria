@extends('layouts.admin')

@section('content')
    <form  method="post" action="{{route('Agregarproceso',$proceso->id)}}" data-parsley-validate>
        @
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Datos Personales </h2>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="nombre"required="required" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-length="[3,22]" placeholder="Nombre"  value="{{$proceso->persona->nombre}}" readonly >
                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" name="apellido"required="required" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-length="[3,22]" placeholder="Apellido" value="{{$proceso->persona->apellido}}" readonly>
                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="documento" required="required" data-parsley-trigger="keyup" data-parsley-type="number"data-parsley-length="[6,10]"  placeholder="N° Documento" value="{{$proceso->persona->cedula}}" readonly>
                            <span class="fal fa-ident form-control-feedback left" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control" name="telefono"  required="required" data-parsley-trigger="keyup" data-parsley-type="number" data-parsley-length="[10,11]" placeholder="Telefono" value="{{$proceso->persona->celular}}"readonly >
                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                            <input type="text" class="form-control has-feedback-left" name="direccion" placeholder="Direccion"value="{{$proceso->persona->direccion}}" value="{{$proceso->persona->direccion}}"readonly>
                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >
                            <select class="form-control has-feedback-right" id="6" name="genero" required readonly>
                                <option value=""  >seleccione una opcion</option>
                                <option @if($proceso->persona->genero=='Masculino')selected @endif>Masculino </option>
                                <option @if($proceso->persona->genero=='Femenino')selected @endif >Femenino</option>
                            </select>
                            <span class="fa fa-venus-mars form-control-feedback right" aria-hidden="true"></span>

                        </div>


                    </div>


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Caracteriazacion de Usuarios </h2>

                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="x_content">
                    <br />
                    <div id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Poblacion Vulnerable</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control" id="7" name="poblacionvulnerable" required readonly="">
                                    <option value="">seleccione una opcion</option>
                                    <option @if($proceso->persona->caracterizaciones->poblacion_vulnerable=='Victias Del Conflicto Armado')selected @endif>Victias Del Conflicto Armado</option>
                                    <option @if($proceso->persona->caracterizaciones->poblacion_vulnerable=='Infancia')selected @endif>Infancia </option>
                                    <option @if($proceso->persona->caracterizaciones->poblacion_vulnerable=='Tercera Edad')selected @endif>Tercera Edad</option>
                                    <option @if($proceso->persona->caracterizaciones->poblacion_vulnerable=='Ningunda de las anteriores')selected @endif>Ninguna de las Anteriores</option>
                                    <option @if($proceso->persona->caracterizaciones->poblacion_vulnerable=='Otros')selected @endif>Otros</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Grupos Etnicos</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="form-control"  id="8" name="gruposetnicos"required readonly>
                                    <option value="">seleccione una opcion</option>
                                    <option @if($proceso->persona->caracterizaciones->grupos_etnicos=='Pueblos y comunidades indígenas')selected @endif>Pueblos y comunidades indígenas</option>
                                    <option @if($proceso->persona->caracterizaciones->grupos_etnicos=='Comunidades negras o afrocolombianas')selected @endif>Comunidades negras o afrocolombianas</option>
                                    <option @if($proceso->persona->caracterizaciones->grupos_etnicos=='Comunidad raizal')selected @endif>Comunidad raizal</option>
                                    <option @if($proceso->persona->caracterizaciones->grupos_etnicos=='Pueblo Rom o Gitanor')selected @endif>Pueblo Rom o Gitanor</option>
                                    <option @if($proceso->persona->caracterizaciones->grupos_etnicos=='Ningunda de las anteriores')selected @endif>Ningunda de las anteriores</option>
                                    <option @if($proceso->persona->caracterizaciones->grupos_etnicos=='Otros')selected @endif>Otros</option>
                                </select>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Procesos a segir </h2>
                        <div class="clearfix"></div>
                    </div>


                    <div class="x_content">
                        <br />
                        <div class="form-horizontal form-label-left">
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Areas de Proceso</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="area" required>
                                        <option value="">seleccione una opcion</option >
                                        <option>Salud</option>
                                        <option>Servivios Publicos</option>
                                        <option>Victimas</option>
                                        <option>Derechos Humanos</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Resumen Factico <span class="required"></span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                              <textarea id="message" required="required" class="form-control" name="obsevacion" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Vamos! debes tener almenos 20 caracteres.."
                                        data-parsley-validation-threshold="10"></textarea>                            </div>
                                <
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Proceso a Seguir</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="proceso_asegir" required>
                                        <option value="">seleccione una opcion</option>
                                        <option>Derecho de Peticion</option>
                                        <option>Tutela</option>
                                        <option>Incidente de Desacato</option>
                                        <option>Revocatoria Directa</option>
                                        <option>P.Q.R</option>
                                    </select>
                                </div>

                            </div>
                            <div class="form-group" >
                                <div class="col-md-12 col-sm-12 col-xs-12 ">

                                    <button type="submit" class="btn btn-success">Guardar</button>
                                    <a class="btn btn-danger" > Cancelar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </form>
@endsection
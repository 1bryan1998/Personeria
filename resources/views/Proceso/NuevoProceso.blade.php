@extends('layouts.admin')

@section('content')
    <form  method="post" action="{{route('nuevoproceso.store')}}" data-parsley-validate>
        @csrf
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Datos Personales </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" name="nombre"required="required" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-length="[3,22]" placeholder="Nombre">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" name="apellido"required="required" data-parsley-trigger="keyup" data-parsley-pattern="^[a-zA-Z ]+$"data-parsley-length="[3,22]" placeholder="Apellido">
                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" name="documento" required="required" data-parsley-trigger="keyup" data-parsley-type="number"data-parsley-length="[6,10]"  placeholder="N° Documento">
                        <span class="fa fa-pencil form-control-feedback left" aria-hidden="true"></span>                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control" name="telefono"  required="required" data-parsley-trigger="keyup" data-parsley-type="number" data-parsley-length="[10,11]" placeholder="Telefono">
                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                        <input type="text" class="form-control has-feedback-left" name="direccion" placeholder="Direccion">
                        <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                    </div>

                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >
                        <select class="form-control has-feedback-right" name="genero" required>
                            <option value="">seleccione una opcion</option>
                            <option>Masculino</option>
                            <option>Femenino</option>
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
                    <div class="x_content">
                        <br />
                        <div id="demo-form2"  class="form-horizontal form-label-left" >

                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" required="required" >Poblacion Vulnerable</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="poblacionvulnerable" required>
                                        <option value="">seleccione una opcion</option>
                                        <option>Victias Del Conflicto Armado</option>
                                        <option>Infancia </option>
                                        <option>Tercera Edad</option>
                                        <option>Ninguna de las Anteriores</option>
                                        <option>Otros</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Grupos Etnicos</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select class="form-control" name="gruposetnicos" required>
                                        <option value="">seleccione una opcion</option>
                                        <option>Pueblos y comunidades indígenas</option>
                                        <option>Comunidades negras o afrocolombianas</option>
                                        <option>Comunidad raizal</option>
                                        <option>Pueblo Rom o Gitanor</option>
                                        <option>Ninguna de las Anteriores</option>
                                        <option>Otros</option>
                                    </select>
                                </div>
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
                        <div class="col-md-12 col-sm-12 col-xs-12 " style="text-align: right">
                            <div class="col-md-12 col-sm-12 col-xs-12 " >

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



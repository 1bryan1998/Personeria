@extends('layouts.admin')

@section('content')
    <div  role="main">
        <div class="">

            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edicion de Pocesos<small>Datos del proceso</small></h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <div class="form-horizontal form-label-left input_mask">

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="1" placeholder="nombre" value="{{$proceso->persona->nombre}}">
                                    <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="2" placeholder="apellido"  value="{{$proceso->persona->apellido}}">
                                    <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                </div>

                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="3" placeholder="cedula" value="{{$proceso->persona->cedula}}">
                                    <span class="fa fa-pencil form-control-feedback left" aria-hidden="true"></span>                                </div>


                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control" id="4" placeholder="direccion" value="{{$proceso->persona->direccion}}">
                                    <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <input type="text" class="form-control has-feedback-left" id="5" placeholder="celular" value="{{$proceso->persona->celular}}">
                                    <span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback" >
                                    <select class="form-control has-feedback-right" id="6" name="genero" required>
                                        <option value=""  >seleccione una opcion</option>
                                        <option @if($proceso->persona->genero=='Masculino')selected @endif>Masculino </option>
                                        <option @if($proceso->persona->genero=='Femenino')selected @endif >Femenino</option>
                                    </select>
                                    <span class="fa fa-venus-mars form-control-feedback right" aria-hidden="true"></span>

                                </div>



                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Poblacion Vulerable</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" id="7" name="poblacionvulnerable" required>
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
                                        <select class="form-control"  id="8" name="gruposetnicos"required>
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
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Areas de Proceso</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" id="9" name="area" required>
                                            <option value="">seleccione una opcion</option >
                                            <option @if($proceso->area_proceso=='Salud')selected @endif>Salud</option>
                                            <option @if($proceso->area_proceso=='Servivios Publicos')selected @endif>Servivios Publicos</option>
                                            <option @if($proceso->area_proceso=='Victimas')selected @endif>Victimas</option>
                                            <option @if($proceso->area_proceso=='Derechos Humanos')selected @endif>Derechos Humanos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado del Proceso</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select class="form-control" id="10" name="area" required>
                                            <option value="">seleccione una opcion</option >
                                            <option @if($proceso->estado=='Activo')selected @endif>Activo</option>
                                            <option @if($proceso->estado=='Finalizado')selected @endif>Finalizado</option>


                                        </select>

                                    </div>

                                </div>

                                <h4>@if(!(count($proceso->archivoproceso))) Los archivos corespondientes a este proceso estan pendientes, por favor suba los archivos pertinentes.  @else Agrege los archivos que quiera editar   @endif </h4>

                                <div class="container">
                                    <div class="row"    >
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                Carge los Archivos del Proceso Aca
                                            </div>
                                            <div class="panel-body">
                                                <form  method="post"  action= "{{route('nuevoproceso.update',$proceso->id)}}" class="dropzone" id="my-dropzone">
                                                    @csrf
                                                    {{ method_field('PUT') }}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                                        <button type="button" class="btn btn-primary">Cancel</button>
                                        <button class="btn btn-primary" type="reset">Reset</button>
                                        <button type="submit" class="btn btn-success" id="submit-all">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>



            </div>
        </div>
    </div>


@endsection

@section('js')

    <script>
        Dropzone.options.myDropzone = {
            autoProcessQueue: false,
            uploadMultiple: false,
            parallelUploads: 1,
            addRemoveLinks: true,
            acceptedFiles: ".zip,.rar",
            maxFilezise: 10,
            maxFiles:1,

            removedfile: function(file) {
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
            init: function() {
                var submitButton = document.querySelector("#submit-all")
                myDropzone = this; // closure

                submitButton.addEventListener("click", function() {
                    if (myDropzone.getQueuedFiles().length > 0)
                    {
                        if($('#1').val().trim()==''){
                            swal('Atención', 'Debe de sumistrar un nombre ', 'warning');
                        }else {
                            if($('#2').val().trim()==''){
                                swal('Atención', 'Debe de sumistrar un un apellido', 'warning');
                            }else {
                                if($('#3').val().trim()==''){
                                    swal('Atención', 'Debe de sumistrar un numero de documento', 'warning');
                                }else {
                                    if($('#4').val().trim()==''){
                                        swal('Atención', 'Debe de sumistrar una direcion', 'warning');
                                    }else {
                                        if($('#5').val().trim()==''){
                                            swal('Atención', 'Por favor suministrar un numeo de contacto', 'warning');
                                        }else {
                                            if($('#6 ').val().trim()==''){
                                                swal('Atención', 'Por favor suministrar el genero', 'warning');
                                            }else {
                                                if($('#7').val().trim()=='') {
                                                    swal('Atención', 'Por favor suministrar esta caracteristica', 'warning');
                                                } else {
                                                    if($('#8').val().trim()==''){
                                                        swal('Atención', 'Por favor suministrar esta caracteistica', 'warning');
                                                    } else {
                                                        if($('#9').val().trim()==''){
                                                            swal('Atención', 'Por favor suministrar una area asociada a este proceso', 'warning');
                                                        }
                                                        else {
                                                            if($('#10').val().trim()==''){
                                                                swal('Atención', 'Por favor suministrar el estado del proceso asociado', 'warning');
                                                            }
                                                            else {
                                                                myDropzone.processQueue();// Tell Dropzone to process all queued files.
                                                                }

                                                    }
                                                }
                                            }
                                        }
                                  }
                              }
                           }
                        }
                      }
                    }
                    else {
                        swal('Atención', 'Debe de subir almenos una archivo', 'warning');
                    }

                });

                // You might want to show the submit button only when
                // files are dropped here:
                this.on("addedfile", function() {
                    // Show submit button here and/or inform user to click it.
                });
                this.on("maxfilesexceeded", function(file){
                    swal('Atención', 'Ha alcanzado el máximo de archivos', 'warning');
                    this.removeFile(file);
                });

            },
            sending: function(file, xhr, formData) {
                var nombrep = $('#1').val();
                var apellido = $('#2').val();
                var cedula = $('#3').val();
                var direccion = $('#4').val();
                var celular = $('#5').val();
                var genero = $('#6').val();
                var poblacionvulnerable = $('#7').val();
                var gruposeticos = $('#8').val();
                var area = $('#9').val();
                var estado = $('#10').val();






                formData.append("Nombre", nombrep);
                formData.append("Apellido", apellido);
                formData.append("Cedula", cedula);
                formData.append("Direccion",direccion);
                formData.append("Celular", celular);
                formData.append("Genero",genero);
                formData.append("Poblacionvulnerable", poblacionvulnerable);
                formData.append("Gruposeticos", gruposeticos);
                formData.append("Area", area);
                formData.append("Estado", estado);

            },
            success: function(data) {
                window.location = `{{route('nuevoproceso.index')}}`;
            },error : function(xhr, status) {

            }
        };


    </script>
    @endsection
@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    <br />
                    <form action="{{route('User.update',['id' => \Illuminate\Support\Facades\Crypt::encrypt($usuario->id)])}}" method="POST" class="form-horizontal form-label-left" enctype="multipart/form-data" >
                        @csrf
                        {{ method_field('PUT') }}
                        <div class="col-md-3 col-sm-3 col-xs-12" style="text-align: center">
                        <div class="profile_img">
                            <div id="crop-avatar">
                                <!-- Current avatar -->
                                <img class="img-responsive avatar-view"  src='{{asset('/Imagenes/'.$usuario->foto)}}' alt="Avatar" title="Change the avatar">
                            </div>
                        </div>
                        </div>

                        <div class="col-md-9 col-sm-9 col-xs-12" style="text-align: center" >
                            <div class="row">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nombre">Nombre<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="Nombre" required="required" class="form-control col-md-7 col-xs-12" value="{{$usuario->name}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Cargo">Cargo<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="Cargo" required="required" class="form-control col-md-7 col-xs-12" value="{{$usuario->cargo}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Nombre">Area<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="Area" required="required" class="form-control col-md-7 col-xs-12" value="{{$usuario->area}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="Email">E-mail<span class="required"></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="Email" name="Email" required="required" class="form-control col-md-7 col-xs-12" value="{{$usuario->email}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" >cambia foto<span c></span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="file"  name="fotos"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                        <a class="btn btn-danger" href="{{route('home')}}"> Cancelar</a>
                                        <button class="btn btn-primary" >Confimar</button>


                                    </div>
                                </div>

                            </div>
                        </div>





                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
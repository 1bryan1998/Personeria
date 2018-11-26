@extends('layouts.admin')

@section('content')

    <form  method="post" action="{{route('User.store')}}" data-parsley-validate>
        @csrf
        <div class="x_content">

            <div class="col-md-3 col-sm-3 col-xs-12" style="text-align: center">
                <div class="profile_img">
                    <div id="crop-avatar">
                        <!-- Current avatar -->
                        <img class="img-responsive avatar-view" style="    height: 348px" src='/Imagenes/avatar.png' alt="Avatar" title="Change the avatar">
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-9col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                    <div class="form-group row">
                        <label for="name" class="col-md-3 col-form-label text-md-right">{{ __('Name') }}</label>

                        <div class="col-md-5">
                            <input id="Name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="Name" value="{{ old('name') }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-5">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="Email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-5">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-5">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="  form-group row" >
                            <label for="Area" class="col-md-3 col-form-label text-md-right">Cargo</label>
                            <div  class="col-md-5">
                                <input id="Cargo" type="text" class="form-control" name="Cargo" required>
                            </div>

                        </div>
                        <div class="  form-group row" >
                            <label for="Area" class="col-md-3 col-form-label text-md-right">Rol</label>
                            <div  class="col-md-5">
                                <select id="Area"  name="Rol"  required>
                                    <option value="">seleccione una opcion</option>
                                    <option>Admistrador</option>
                                    <option>Usuario</option>
                                </select>
                            </div>

                        </div>

                        <div class="  form-group row" >
                            <label for="Area" class="col-md-3 col-form-label text-md-right">Area</label>
                            <div  class="col-md-5">
                                <select id="Area"  name="Area"  required>
                                    <option value="">seleccione una opcion</option>
                                    <option value="">seleccione una opcion</option >
                                    <option>Salud</option>
                                    <option>Servivios Publicos</option>
                                    <option>Victimas</option>
                                    <option>Derechos Humanos</option>
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
    </form>
@endsection
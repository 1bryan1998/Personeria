@extends('layouts.admin')

@section('content')

    <div class="x_content  ">
        @foreach($usuarios as $usuario)
            <div class="col-md-3 col-sm-3 col-xs-12"  >
                <div class="panel" >
                   <div class="panel-body " style="height: 400px;width:175px">
                       <div class="profile_img">
                           <div id="crop-avatar">
                               <!-- Current avatar -->
                               <img class="img-responsive avatar-view"  src='{{asset('/Imagenes/'.$usuario->foto)}}' style="width:151px;height:151px; border-radius: 50%">
                           </div>
                       </div>
                       <div class="body" style="height: 163px">

                                       <h1 style="text-align: center">{{$usuario->name}}</h1>
                        <ul class="list-unstyled user_data"style="text-align: left">
                            <li><i class="fa fa-map-marker user-profile-icon"></i>{{$usuario->cargo}}
                            </li>

                            <li>
                                <i class="fa fa-briefcase user-profile-icon"></i>{{$usuario->area}}
                            </li>

                            <li>
                                <a  target="_blank">{{$usuario->email}}</a>
                            </li>
                        </ul>
                        </div>

                       <div  style="margin-left: 50px;height: 101px">
                           <div class="col-md-1 col-sm-1 col-xs-3" >
                               <form action="{{route('User.destroy',$usuario->id)}}" method="post">
                                   @csrf
                                   {{method_field('DELETE')}}
                                   <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                               </form>
                           </div>
                           <div class="col-md-3 col-sm-3 col-xs-3"  style="margin-left: 20px">
                               <a href="{{route('User.edit', \Illuminate\Support\Facades\Crypt::encrypt($usuario->id))}}" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                           </div>
                       </div>
                   </div>
               </div>
            </div>

        @endforeach

    </div>





@endsection
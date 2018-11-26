<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="{{asset('images/favicon.ico')}}" type="image/ico" />
  <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Personeria</title>
    <!-- calendar -->
        <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

      <!-- Font Awesome -->
      <link href="{{asset('vendors/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
      <!-- NProgress -->
      <link href="{{asset('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
      <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
      <!-- bootstrap-wysiwyg -->
      <link href="{{asset('vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
      <!-- Select2 -->
      <link href="{{asset('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet">
      <!-- Switchery -->
      <link href="{{asset('vendors/switchery/dist/switchery.min.css')}}" rel="stylesheet">
      <!-- starrr -->
      <link href="{{asset('vendors/starrr/dist/starrr.css')}}" rel="stylesheet">




      <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
      <link href="{{asset('css\datepicker.css')}}" rel="stylesheet">


      <link rel="stylesheet" type="text/css" href="{{ asset('vendors/dropzone/css/dropzone.css') }}">
      <link rel="stylesheet" type="text/css" href="{{ asset('vendors/dropzone/css/basic.css') }}">

    <link href="{{asset('css/style.css')}}" rel="stylesheet">
      <!-- Custom Theme Style -->
      <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css">

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="{{route('home')}}" class="site_title"><i class="fa fa-bank"></i> <span>Area de Trabajo</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic" style="text-align: center">
                <img src='{{asset('/Imagenes/'.Auth::user()->foto)}}' alt="..." class="img-circle profile_img" style="padding:2px">
               </div>
               <div class="profile_info">
                <span>   Bienvenido,</span>
                <h5 class="modal-title"  style="color: mintcream" id="myModalLabel2">{{Auth::user()->name}}</h5>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">

                  @role('User')
                  <li><a><i class="fa fa-home"></i>Consultas <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('nuevaconsulta.create')}}">Nueva Consulta</a></li>
                      <li><a href="{{route('nuevaconsulta.index')}}">Ver Consultas</a></li>
                    </ul>
                  </li>
                  @endrole

                  @role('User')
                  <li><a><i class="fa fa-edit"></i>Procesos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     <li><a href="{{route('nuevoproceso.create')}}">Nuevo proceso</a></li>
                    </ul>
                  </li>
                  @endrole

                  @role('User')
                  <li><a><i class="fa fa-desktop"></i> Consultar Procesos <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                   <li><a href="{{route('nuevoproceso.index')}}">Consultar procesos</a></li>

                    </ul>
                  </li>
                  @endrole


                  @role('Admin')
                  <li><a><i class="fa fa-user"></i>Perfiles<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('User.create')}}">Crear Perfiles</a></li>
                      <li><a href="{{route('User.index')}}">Ver Perfiles</a></li>
                    </ul>
                  </li>
                  @endrole

                  @role('Admin')
                  <li><a><i class="fa fa-book"></i>Consultas<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('Consultasadmin')}}">Consultas por usuarios</a></li>
                      <li><a href="{{route('nuevaconsulta.index')}}">Todas las Consultas</a></li>
                    </ul>
                  </li>
                  @endrole

                  @role('Admin')
                  <li><a><i class="fa fa-gavel"></i>Procesos<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('Adminprocesos')}}">Procesos por Usuario</a></li>
                      <li><a href="{{route('nuevoproceso.index')}}">Todos los Procesos</a></li>

                    </ul>
                  </li>
                  @endrole

                </ul>
              </div>

            </div>


          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav"style="background:#fff" >
          <div class="nav_menu" style="background:#fff">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
                <ul class="nav navbar-nav navbar-right">
                    <li class="">

                            <a  data-toggle="modal" data-target=".bs-example-modal-sm" class="user-profile dropdown-toggle">
                                <img src='{{asset('/Imagenes/'.Auth::user()->foto)}}' alt="...">
                              <span>{{Auth::user()->nombre}}</span>
                            </a>
                    </li>

                </ul>

            </nav>
          </div>
        </div>
        <!-- /top navigation -->
        <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-sm">
            <div class="modal-content">

              <div class="modal-header text-center">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                  </button>
                <img src='{{asset('/Imagenes/'.Auth::user()->foto)}}' alt="..." class="img-circle" style="width: 50%">
              </div>"
                <h4 class="modal-title" id="myModalLabel2" style="text-align: center">{{Auth::user()->name}}</h4>


              <div class="modal-footer" >
                <a class="btn btn-primary" href="{{route('perfil')}}">Editar Perfil</a>
                <a class="btn btn-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();">
                  Salir
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- page content -->
        <div class="right_col" role="main" >
          @yield('content')


        </div>


          <footer>
            <div class="pull-right">
             Tu personeria - sofware hecho por: ING Bayan Ricardo Ramirez Cano<a href="raniniez1998@gmail.com"> Contacto</a>
            </div>
            <div class="clearfix"></div>
          </footer>

      </div>
    </div>
    <!-- jQuery -->
    <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('js/sweetalert.min.js')}}"></script>
    @include('sweet::alert')
    <!-- Bootstrap -->
    <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
    <!-- gauge.js -->
    <script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <!-- bootstrap-progressbar -->
    <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
    <!-- Skycons -->
    <script src="{{asset('vendors/skycons/skycons.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('vendors/Flot/jquery.flot.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
    <!-- Flot plugins -->
    <script src="{{asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
    <script src="{{asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
    <script src="{{asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
    <!-- DateJS -->
    <script src="{{asset('vendors/DateJS/build/date.js')}}"></script>
    <!-- JQVMap -->
    <
    <script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
    <script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- Datatables -->
    <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>

    <

    <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>


    <script src="{https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>

    <script src="{{ asset('vendors/dropzone/dropzone.min.js') }}"></script>
    <script src="{{asset('vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <script src="{{asset('js\bootstrap-datepicker.js')}}"></script>
    <!-- Custom Theme Scripts -->
    <script src="{{asset('build/js/custom.min.js')}}"></script>
    <script src="{{asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
    <script src="{{asset('../vendors/moment/min/moment.min.js')}}"></script>
    <script  src="{{asset('js/loader.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <script src='fullcalendar/lang/es.js'></script>




    @yield('js')
  </body>
</html>

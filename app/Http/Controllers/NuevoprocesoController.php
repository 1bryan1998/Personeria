<?php

namespace App\Http\Controllers;
use App\ArchivoProceso;
use App\Persona;
use App\Caracterizacion;
use App\Proceso;
use App\User;
use DataTables;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Alert;

class NuevoprocesoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function Adminprocesos()
    {

        $usuarios= User::get();
        return view('Proceso.ProcesoPorUsuario',compact('usuarios'));
    }


    public function index(Request $request)
    {
        if ($request->ajax()){
            $procesos=Proceso::with('persona')->with('user');
            return DataTables::eloquent($procesos)
                ->addColumn('action', function($procesos) {
                    return '<a  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal-'.Proceso::where('persona_id',$procesos->id)->orderBy('id','desc')->pluck('id')->first().'">
                           mas
                    </a>
                            <div class="modal fade" id="exampleModal-'.Proceso::where('persona_id',$procesos->id)->orderBy('id','desc')->pluck('id')->first().'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Mas Opciones para este Proceso</h5>

                </div>
                <div class="modal-body">
                    <h4>Si deseas Crear un nuevo proceso a esta persona ten en cuenta que:</h4>
                    <p>  </p>
                    <h5>Debes finalizar el proceso anterior.</h5>
                    <h5> Debes subir los archivos correspondientes del proceso finalizado</h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <a class="btn btn-primary" id="editarproceso" href="'.route('nuevoproceso.edit',Crypt::encrypt(Proceso::where('persona_id',$procesos->id)->orderBy('id','desc')->pluck('id')->first())).'">Actualizar Proceso</a>
                    <a class="btn btn-primary"  id="añadirproceso"   href="'.route('Nuevoproceso',Crypt::encrypt(Proceso::where('persona_id',$procesos->id)->orderBy('id','desc')->pluck('id')->first())).'">Añadir Proceso</a>
                    <a class="btn btn-primary"  id="añadirproceso"   href="'.route('nuevoproceso.show',Crypt::encrypt(Proceso::where('persona_id',$procesos->id)->orderBy('id','desc')->pluck('id')->first())).'">Ver Proceso</a>
                </div>
            </div>
        </div>
    </div>

                    ';
                })->toJson();
        }
        return view('Proceso.Consultarprocesos');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Proceso.NuevoProceso');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $persona=new Persona;
        $persona->nombre = $request->nombre;
        $persona->apellido = $request->apellido;
        $persona->cedula = $request->documento;
        $persona->direccion = $request->direccion;
        $persona->celular = $request->telefono;
        $persona->genero = $request->genero;
        $persona->save();

        $caracteizacion=new Caracterizacion;
        $caracteizacion->poblacion_vulnerable = $request->poblacionvulnerable;
        $caracteizacion->grupos_etnicos = $request->gruposetnicos;
        $caracteizacion->persona_id = $persona->id;
        $caracteizacion->save();

        $proceso=new Proceso;
        $proceso->area_proceso = $request->area;
        $proceso->resumen_factico = $request->obsevacion;
        $proceso->proceso_a_seguir = $request->proceso_asegir;
        $proceso->persona_id = $persona->id;
        $proceso->user_id=\Auth::user()->id;
        $proceso->save();

        $archivo=new ArchivoProceso;
        $archivo->Url_archivo=" ";
        $archivo->proceso_id=$proceso->id;
        $archivo->save();

        return redirect()->route('home');
    }

    public function Agregarproceso(Request $request, $id){

        $proceso=new Proceso;
        $proceso->area_proceso = $request->area;
        $proceso->resumen_factico = $request->obsevacion;
        $proceso->proceso_a_seguir = $request->proceso_asegir;
        $proceso->persona_id = Proceso::findOrFail($id)->persona->id;
        $proceso->user_id=\Auth::user()->id;
        $proceso->save();

        $archivo=new ArchivoProceso;
        $archivo->Url_archivo=" ";
        $archivo->proceso_id=$proceso->id;
        $archivo->save();
        Alert::success('Proceso Agregado Satisfactoriamente!');
        return redirect()->route('home');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proceso = Proceso::findOrFail(Crypt::decrypt($id));

        if (Auth::user()->id==$proceso->user_id){
        return view('Proceso.VerProcesos',compact('proceso'));
}else{
            Alert::error('No tienes Permiso para Visualizar esta informacion ', '¡Error!')->autoclose(3000);
    return redirect()->route('nuevoproceso.index');
}




    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proceso = Proceso::findOrFail(Crypt::decrypt($id));

        if(Auth::user()->id==$proceso->user_id){
            if($proceso->estado=="Activo"){
                return view('Proceso.EditarProcesos',compact('proceso'));
            }else{
                Alert::error('El Proceso ya ha finalizado ', '¡Error!')->autoclose(3000);
                return redirect()->route('nuevoproceso.index');
            }
        }else{
            Alert::error('El usuario no tiene permiso para actualizar este proceso', '¡Error!')->autoclose(3000);
            return redirect()->route('nuevoproceso.index');
        }


    }


    public function Nuevoproceso($id)
    {

        $proceso = Proceso::findOrFail(Crypt::decrypt($id));
        if(Auth::user()->id==$proceso->user_id){

            if ($proceso->estado=='Activo') {
                Alert::error('Para crear un nuevo proceso a esta persona debes finalizar los procesos activos de esta persona', '¡Error!')->autoclose(3000);


                return redirect()->route('nuevoproceso.index');

            }elseif ($proceso->estado=='Finalizado'){
                return view('Proceso.AgregarProceso', compact('proceso'));
            }

        }else{
            return redirect()->route('nuevoproceso.index');
        }

    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $proceso = Proceso::findOrFail($id);


        $persona = Persona::findOrFail($proceso->persona_id);
        $persona->nombre = $request->Nombre;
        $persona->apellido = $request->Apellido;
        $persona->direccion = $request->Direccion;
        $persona->celular = $request->Celular;
        $persona->genero = $request->Genero;
        $persona->update();


        $caracteizacion=Caracterizacion::findOrFail($proceso->persona_id);
        $caracteizacion->poblacion_vulnerable = $request->Poblacionvulnerable;
        $caracteizacion->grupos_etnicos = $request->Gruposeticos;
        $caracteizacion->persona_id = $persona->id;
        $caracteizacion->update();


        $proceso->area_proceso = $request->Area;
        $proceso->estado = $request->Estado;
        $proceso->persona_id = $persona->id;
        $proceso->user_id=\Auth::user()->id;
        $proceso->update(
);

            if($request->hasFile('file')) {
                
                $arvhivo = ArchivoProceso::findOrFail($proceso->persona_id);
                    $file = $request->file('file');
                    $name = $persona->nombre;
                    $tipo = $proceso->proceso_a_seguir;
                    $asesor = \Auth::user()->name;
                    $exte=$file->getClientOriginalExtension();
                    $nombrearchivo = $name . $tipo . $asesor.'.'.$exte;
                Storage::disk('archivospocesos')->delete($arvhivo->url_archivo);
                $url = Storage::disk('archivospocesos')->putFileAs('',$file,$nombrearchivo);
                    $arvhivo->url_archivo = $url;
                    $arvhivo->proceso_id = $proceso->id;
                    $arvhivo->save();

            }
        Alert::success('Proceso Actualizado Correctamente')->autoclase(3000);
        return redirect()->route('perfil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Persona;
use App\Consulta;
use App\Caracterizacion;
use DataTables;
use Illuminate\Support\Facades\Auth;

class ConsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function Consultasadmin()
    {
        $usuarios= User::get();
        return view('Consultas.ConsultaPorUsuario',compact('usuarios'));
    }

    public static function index(Request $request)
    {
        if ($request->ajax()){
            return DataTables::eloquent(Consulta::with('persona')->with('user'))->toJson();


        }
        return view('Consultas.MostrarConsultas');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Consultas.Nuevaconsulta');
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
            $persona->cedula = $request->documento;
            $persona->nombre = $request->nombre;
            $persona->apellido = $request->apellido;
             $persona->direccion = $request->direccion;
             $persona->celular = $request->telefono;
             $persona->genero = $request->genero;
              $persona->save();

       $caracteizacion=new Caracterizacion;
        $caracteizacion->poblacion_vulnerable = $request->poblacionvulnerable;
        $caracteizacion->grupos_etnicos = $request->gruposetnicos;
        $caracteizacion->persona_id = $persona->id;
        $caracteizacion->save();

        $consulta=new Consulta;
        $consulta->area = $request->areaconsulta;
        $consulta->motivo = $request->motivoconsulta;
        $consulta->detalle = $request->obsevacion;
        $consulta->persona_id = $persona->id;
        $consulta->user_id=Auth::user()->id;
        $consulta->save();

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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

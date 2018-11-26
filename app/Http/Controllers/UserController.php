<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios= User::get();
      return view('Usuarios.ListarUsuarios',compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   return view('Usuarios.CrearUsuarios');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User();
        $user->name = $request->Name;
        $user->email= $request->Email;
        $user->password= Hash::make( $request->password_confirmation);
        $user->area= $request->Area;
        $user->cargo= $request->Cargo;
        $user->save();

        if ($request->Rol=="Admistrador"){

            $user->roles()->attach(1);

        }elseif ($request->Rol=="Usuario"){

            $user->roles()->attach(2);
        }



        return view('Usuarios.CrearUsuarios');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
     $usuario= User::findOrFail(Crypt::decrypt($id));
        return view('Usuarios.EditarUsuarios',compact('usuario'));
    }

    public function perfil()
    {
        return view('Perfil.Perfil');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     */
    public function Update( Request $request,$id){

        $user = User::findOrFail(decrypt($id));
        if($request->hasFile('fotos')){
            $file=$request->file('fotos');
            if ('avatar.png'!=($user->foto))
                Storage::disk('perfil')->delete($user->foto);
            $url = Storage::disk('perfil')->put('',$file);
            $user->foto=$url;

        }

        $user->name=$request->Nombre;
        $user->cargo=$request->Cargo;
        $user->email=$request->Email;
        $user->area=$request->Area;

        $user->update();
        if(Auth::user()->id==$user->id){
            Alert::success('Usuario Actualizado Correctamente!')->autoclose(3000);
            return Redirect::to('/home');

        }else{
            Alert::success('Usuario Actualizado Correctamente!')->autoclose(3000);
            return redirect()->route('User.index');


        }

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        try{
            $usuario = User::findOrFail($id);
            if(Auth::user()->id==$usuario->id){
                alert()->error('No Puedes borrar este usuario.');

            }else{

                $usuario->delete();
                alert()->success('Usuario Eliminado Exitosamente.');

            }
        DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
            Alert::error('El usuario no puede ser eliminado', '¡Error!')->autoclose(3000);
            return redirect()->route('User.index');
        }
        return redirect()->route('home');
    }
}

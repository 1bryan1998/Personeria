<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Eventos;
use Calendar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Eventos::where('user_id',Auth::user()->id)
            ->where("Fecha_finalizacion",'>',Carbon::yesterday())
            ->get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] =\MaddHatter\LaravelFullcalendar\Facades\Calendar::event(
                $event->Nombre_evento,
                true,
                new \DateTime($event->Fecha_inicio),
                new \DateTime($event->Fecha_finalizacion.' +1 day')
            );
        }
        $calendar_details=\MaddHatter\LaravelFullcalendar\Facades\Calendar::addEvents($event_list);
        $eventos = Eventos::where('user_id',Auth::user()->id)
            ->where("Fecha_finalizacion",'>',Carbon::yesterday())
            ->paginate(4);
        return view('home', compact('calendar_details','events', 'eventos') );
    }
    public function Añadirevento(Request $request)
    {

        $event = new Eventos();
        $event->Nombre_evento = $request['nombre_evento'];
        $event->Fecha_inicio = $request['fecha_inicio'];
        $event->Fecha_finalizacion = $request['fecha_finalizacion'];
        $event->user_id = Auth::user()->id;

        $event->save();
        return Redirect::to('/home');
    }
}

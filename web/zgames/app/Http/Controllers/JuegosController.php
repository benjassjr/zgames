<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Juego;
use App\Models\Consola;
class JuegosController extends Controller
{
    //

    public function getJuegosByConsola(Request $request){
        $input = $request->all();
        $idConsola = $input["idConsola"];
        $consola = Consola::find($idConsola);
        return $consola->juegos()->get();
    }

    public function getJuegos(){
        return Juego::all();
    }

    public function save(Request $request){
        $input = $request->all();
        $nombre = $input["nombre"];
        $fecha = $input["fechaLanzamiento"];
        $apto = $input["apto_ninios"];
        $precio = $input["precio"];
        $descripcion = $input["descripcion"];
        $consolaId = $input["consola_id"];

        $juego = new Juego();
        $juego->nombre = $nombre;
        $juego->fecha_lanzamiento = $fecha;
        $juego->descripcion = $descripcion;
        $juego->apto_ninios = $apto;
        $juego->precio = $precio;
        $juego->consola_id = $consolaId;

        $juego->save();
        return $juego;
    }

    public function remove(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $juego = Juego::findOrFail($id);
        $juego->delete();
        return "ok";
    }
}

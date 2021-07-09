<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Consola;

class ConsolasController extends Controller
{
    public function getMarcas(){
        $marcas = array();
        $marcas[] = "Sony";
        $marcas[] = "Microsoft";
        $marcas[] = "Nintendo";
        $marcas[] = "Sega";

        return $marcas;
    }

    public function getConsolas(){
        $consolas = Consola::all();
        return $consolas;
    }

    public function filtrarConsola(Request $request){
        $input = $request->all();
        $filtro = $input["filtro"];
        $consolas = Consola::where("marca", $filtro)->get();
        return $consolas;
    }

    public function crearConsola(Request $request){
        $input = $request->all();
        $consola = new Consola();
        $consola->nombre = $input["nombre"];
        $consola->marca = $input["marca"];
        $consola->anio = $input["anio"];

        $consola->save();
        return $consola;
    }

    public function eliminarConsola(Request $request){
        $input = $request->all();
        $id = $input["id"];
        $consola = Consola::findOrFail($id);
        $consola->delete();
        return "ok";
    }

}

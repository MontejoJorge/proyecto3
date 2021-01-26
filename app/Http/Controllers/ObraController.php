<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Obra;
use App\Models\Trabajador;
use App\Models\User;

class ObraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $obras = Obra::query();

        //Filtro estado
        if (isset($_GET["state"])){
            $selState = $_GET["state"];
        } else {
            $selState = "created";
        }
        $obras->where("state", $selState);

        //Ordenar
        if (isset($_GET["order"])){
            $selOrder = $_GET["order"];
        } else {
            $selOrder = "created";
        }

        if (isset($_GET["desc"])){
            $obras->orderBy($selOrder."_at", "desc");
        } else {
            $obras->orderBy($selOrder."_at", "asc");
        }



        //Datos de los filtros
        $states = ["created", "pending", "denied", "authorized"];
        $orderBy = ["created", "updated"];

        $obras = $obras->orderBy("created_at", "asc")->paginate(15);
        
        return view("obra.index", compact("obras","states","selState","orderBy","selOrder"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tiposObras = DB::table("tipos_obras")->get();
        $tiposEdificios = DB::table("tipos_edificios")->get();

        return view("obra.create", compact("tiposObras","tiposEdificios"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        Obra::create ([
            "requestor_id" => auth()->user()->id,
            "building_type" => $request->tipoEdificio,
            "construction_type"=> $request->tipoObra,
            "worker_id" => null,
            'postal_code' => $request->postal_code,
            'street_name' => $request->street_name,
            'number' => $request->number,
            'floor' => $request->floor,
            'door' => $request->door,
            'city' => $request->city,
            'province' => $request->province,
            "description" => $request->description,
            "blueprint" => $request->blueprint,
        ]);

        return back()->with("status", "Obra creada");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $obra = Obra::find($id);

        $trabajadores = null;
        if (!isset($obra->worker_id)){
            //$trabajadores = Trabajador::all();
            $trabajadores = Trabajador::withCount("obra_asignada")
            ->orderByRaw('obra_asignada_count ASC')
            ->get();
        }
        //$count = Trabajador::withCount("obra_asignada")->get();

        return view("obra.show", compact("obra","trabajadores"));
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

    }
    //funcion para asignar un trabajador a una obra
    public function trabajador(Request $request, $id)
    {
        $obra = Obra::find($id);
        $obra->update([
            "worker_id" => $request->tecnico,
            "state" => "pending"
        ]);
        return back()->with("status","Tecnico asignado");
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

    protected function validator(array $request)
    {
        return Validator::make($request, [
            "tipoEdificio" => ["required", "exists:tipos_edificios,id"],
            "tipoObra"=> ["required", "exists:tipos_obras,id"],
            'postal_code' => ["required"],
            'street_name' => ["required"],
            'number' => ["required"],
            'floor' => ["required"],
            'door' => ["required"],
            'city' => ["required"],
            'province' => ["required"],
            "description" => ["required"],
            "blueprint" => ["required"],
        ]);
    }
}

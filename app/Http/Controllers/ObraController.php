<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Obra;
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
        //$obras = DB::table('obras')->get();
        $obras = Obra::all();

        return view("obra.index", compact("obras"));
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
        //
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

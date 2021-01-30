<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obra;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        switch (auth()->user()->role) {
            case "coordinador" || "tecnico": 

                $createdCount=DB::table('obras')
                    ->where('state', "=", "created")
                    ->count();
                $pendingCount=DB::table('obras')
                    ->where('state', "=", "pending")
                    ->count();
                $aceptedCount=DB::table('obras')
                    ->where('state', "=", "acepted")
                    ->count();
                $deniedCount=DB::table('obras')
                    ->where('state', "=", "denied")
                    ->count();

                return view("homes.trabajador", compact("createdCount", "pendingCount", "aceptedCount", "deniedCount"));
                break;
            case "solicitante":
                return view("homes.solicitante");
                break;
            default:
                return route("login");
        }

        return view('home');
    }
}

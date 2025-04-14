<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    public function index()
    {
        $vehiculeType = DB::table('vehicule_type')->pluck('name');
        $energieType = DB::table('vehicule')->select('fuel_type')->distinct()->pluck('fuel_type');
        $typeGear = DB::table('vehicule')->select('transmission')->distinct()->pluck('transmission');
        return view('index', ['vehiculeTypes' => $vehiculeType,
            'energieTypes' => $energieType,
            'typeGears' => $typeGear]);
    }
}

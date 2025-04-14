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

        $vehicules = DB::table('vehicule')
            ->join('vehicule_type', 'vehicule.vehicule_type_id', '=', 'vehicule_type.id')
            ->join('vehicule_photo', 'vehicule.id', '=', 'vehicule_photo.vehicule_id')
            ->select('vehicule.id',
                'vehicule_photo.image_url as photo',
                'vehicule.brand',
                'vehicule.model',
                'vehicule.transmission',
                'vehicule.fuel_type',
                'vehicule.price_per_day',
                'vehicule_type.name as vehicule_type',
                DB::raw("IF(vehicule.air_conditioning = 1, 'Air conditionné', 'Sans climatisation') as air_conditionne")
            )
            ->where('vehicule_photo.display_order', 0)
            ->limit(6)
            ->get();


        return view('index', ['vehiculeTypes' => $vehiculeType,
            'energieTypes' => $energieType,
            'typeGears' => $typeGear,
            'vehicules' => $vehicules,]);
    }

    public function all() {
        $vehicules = DB::table('vehicule')
            ->join('vehicule_type', 'vehicule.vehicule_type_id', '=', 'vehicule_type.id')
            ->join('vehicule_photo', 'vehicule.id', '=', 'vehicule_photo.vehicule_id')
            ->select('vehicule.id',
                'vehicule_photo.image_url as photo',
                'vehicule.brand',
                'vehicule.model',
                'vehicule.transmission',
                'vehicule.fuel_type',
                'vehicule.price_per_day',
                'vehicule_type.name as vehicule_type',
                DB::raw("IF(vehicule.air_conditioning = 1, 'Air conditionné', 'Sans climatisation') as air_conditionne")
            )
            ->where('vehicule_photo.display_order', 0)
            ->limit(6)
            ->get();


        return view('vehicules', ['vehicules' => $vehicules]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use function Termwind\parse;
use function Termwind\render;

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

    public function all()
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
            ->get();

        return view('vehicules', ['vehiculeTypes' => $vehiculeType,
            'energieTypes' => $energieType,
            'typeGears' => $typeGear,
            'vehicules' => $vehicules,]);
    }

    public function detail($id)
    {
        $data = DB::table('vehicule')
            ->join('vehicule_type', 'vehicule.vehicule_type_id', '=', 'vehicule_type.id')
            ->join('vehicule_photo', 'vehicule.id', '=', 'vehicule_photo.vehicule_id')
            ->select(
                'vehicule.id',
                'vehicule_photo.image_url as photo',
                'vehicule.brand',
                'vehicule.model',
                'vehicule.transmission',
                'vehicule.fuel_type',
                'vehicule.price_per_day',
                'vehicule.seats',
                'vehicule.doors',
                'vehicule_type.name as vehicule_type',
                DB::raw("IF(vehicule.air_conditioning = 1, 'Yes', 'No') as air_conditionne")
            )
            ->where('vehicule.id', $id)->orderBy('vehicule_photo.display_order')->get();

        $photo = DB::table('vehicule_photo')->where('vehicule_id', $id)->get();
        $equipements = DB::table('vehicule')->join('vehicule_equipment', 'vehicule.id', '=', 'vehicule_equipment.vehicule_id')
            ->join('equipment', 'vehicule_equipment.equipment_id', '=', 'equipment.id')->select('equipment.name as name_equipement')->where('vehicule_id', $id)->get();
        if ($data->isEmpty()) {
            return abort(404);
        }
        return view('vehiculeDetail', ['vehicule' => $data, 'photos' => $photo, 'equipements' => $equipements]);
    }

    public function filter()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $query = DB::table('vehicule')
            ->join('vehicule_type', 'vehicule.vehicule_type_id', '=', 'vehicule_type.id')
            ->join('vehicule_photo', 'vehicule.id', '=', 'vehicule_photo.vehicule_id')
            ->select(
                'vehicule.id',
                'vehicule_photo.image_url as photo',
                'vehicule.brand',
                'vehicule.model',
                'vehicule.transmission',
                'vehicule.fuel_type',
                'vehicule.price_per_day',
                'vehicule_type.name as vehicule_type',
                DB::raw("IF(vehicule.air_conditioning = 1, 'Air conditionné', 'Sans climatisation') as air_conditionne")
            )
            ->where('vehicule_photo.display_order', 0);

        if (!empty($data['vehiculeType'])) {
            $query->where('vehicule_type.name', $data['vehiculeType']);
        }

        if (!empty($data['energieType'])) {
            $query->where('vehicule.fuel_type', $data['energieType']);
        }

        if (!empty($data['typeGear'])) {
            $query->where('vehicule.transmission', $data['typeGear']);
        }
        $vehicules = $query->orderBy('vehicule_photo.display_order')->get();

        return response()->json($vehicules);
    }

    public function reservation($id)
    {
        $data = DB::table('vehicule')
            ->join('vehicule_type', 'vehicule.vehicule_type_id', '=', 'vehicule_type.id')
            ->join('vehicule_photo', 'vehicule.id', '=', 'vehicule_photo.vehicule_id')
            ->select(
                'vehicule.id',
                'vehicule_photo.image_url as photo',
                'vehicule.brand',
                'vehicule.model',
                'vehicule.transmission',
                'vehicule.fuel_type',
                'vehicule.price_per_day',
                'vehicule_type.name as vehicule_type',
                DB::raw("IF(vehicule.air_conditioning = 1, 'Air conditionné', 'Sans climatisation') as air_conditionne")
            )
            ->where('vehicule_photo.display_order', 0)->where('vehicule.id', $id)->get();
        $photo = DB::table('vehicule_photo')->where('vehicule_id', $id)->get();

        if ($data->isEmpty()) {
            return abort(404);
        }
        return view('reservation', ['vehicule' => $data,'photos' => $photo]);
    }
}

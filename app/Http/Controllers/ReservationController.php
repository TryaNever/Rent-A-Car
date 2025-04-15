<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Mail\ReservationVehicule;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'id' => 'required|exists:vehicule,id',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);

        $price = DB::table('vehicule')->where('id', $validatedData['id'])->value('price_per_day');

        $dayCount = date_diff(date_create($validatedData['startDate']), date_create($validatedData['endDate']))->days + 1;
        $priceTotal = floatval($price) * $dayCount;

        DB::table('reservation')->insert([
            'email' => $validatedData['email'],
            'vehicule_id' => $validatedData['id'],
            'start_date' => $validatedData['startDate'],
            'end_date' => $validatedData['endDate'],
            'created_at' => now(),
            'status' => 'pending',
            'total_price' => $priceTotal
        ]);

            Mail::to('apernette@edenschool.fr')->send(new ReservationVehicule($validatedData['id']));

        return response()->json(['success' => 'You reservation is confirmed']);
    }
}

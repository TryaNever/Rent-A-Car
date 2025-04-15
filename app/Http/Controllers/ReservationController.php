<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'id' => 'required|exists:vehicule,id',
            'startDate' => 'required|date',
            'endDate' => 'required|date',
        ]);

        $price = DB::table('vehicule')->select('vehicule.price_per_day')->where('id', $validatedData['id'])->get();
        $day = date_diff(date_create($validatedData['startDate']), date_create($validatedData['endDate']));
        $priceTotal = floatval($price[0]->price_per_day) * ($day->days+1);
        DB::table('reservation')->insert([
            'email' => $validatedData['email'],
            'vehicule_id' => $validatedData['id'],
            'start_date' => $validatedData['startDate'],
            'end_date' => $validatedData['endDate'],
            'created_at' => now(),
            'status' => 'pending',
            'total_price' => $priceTotal
        ]);

        return response()->json(['success' => 'You reservation is confirmed']);
    }
}

<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;

class ReservationVehicule extends Mailable
{
    use Queueable, SerializesModels;

    public $id;
    public $subject = "Test d'email avec Laravel";

    public function __construct($id)
    {
        $this->id = $id;
    }

    public function build()
    {
        $reservationDetails = DB::table('reservation')
            ->join('vehicule', 'reservation.vehicule_id', '=', 'vehicule.id')
            ->join('vehicule_type', 'vehicule.vehicule_type_id', '=', 'vehicule_type.id')
            ->join('vehicule_photo', 'vehicule.id', '=', 'vehicule_photo.vehicule_id')
            ->select(
                'vehicule.id',
                'vehicule.brand',
                'vehicule.model',
                'vehicule.transmission',
                'vehicule.fuel_type',
                'vehicule.price_per_day',
                'vehicule_type.name as vehicule_type',
                'vehicule_photo.image_url as photo',
                'reservation.start_date',
                'reservation.end_date',
                DB::raw("IF(vehicule.air_conditioning = 1, 'Air conditionné', 'Sans climatisation') as air_conditionne")
            )
            ->where('vehicule.id', $this->id)
            ->where('vehicule_photo.display_order', 0)
            ->first();

        return $this->view('emails.email_reservation')
            ->subject("Récapitulatif de la réservation")
            ->with(['reservationDetails' => $reservationDetails]);
    }
}

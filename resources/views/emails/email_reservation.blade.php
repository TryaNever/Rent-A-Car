<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Récapitulatif de la réservation</title>
</head>
<body>

<div>
    <h1>Récapitulatif de votre réservation</h1>

    <div>
        <img src="{{ $reservationDetails->photo }}" alt="Photo du véhicule">
        <div>
            <p><p>Véhicule :</p> {{ $reservationDetails->brand }} {{ $reservationDetails->model }}</p>
            <p><p>Type de véhicule :</p> {{ $reservationDetails->vehicule_type }}</p>
            <p><p>Transmission :</p> {{ $reservationDetails->transmission }}</p>
            <p><p>Carburant :</p> {{ $reservationDetails->fuel_type }}</p>
            <p><p>Climatisation :</p> {{ $reservationDetails->air_conditionne }}</p>
        </div>
    </div>

    <div>
        <p><p>Date de début
                :</p> {{ \Carbon\Carbon::parse($reservationDetails->start_date)->format('d/m/Y') }}</p>
        <p><p>Date de fin :</p> {{ \Carbon\Carbon::parse($reservationDetails->end_date)->format('d/m/Y') }}
        </p>
    </div>

    <div>
        <p><p>Prix total
                :</p> {{ number_format($reservationDetails->price_per_day * \Carbon\Carbon::parse($reservationDetails->start_date)->diffInDays($reservationDetails->end_date), 2, ',', ' ') }}
            €</p>
    </div>

    <table>
        <thead>
        <tr>
            <th>Informations de la réservation</th>
            <th>Détails</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><p>Véhicule :</p></td>
            <td>{{ $reservationDetails->brand }} {{ $reservationDetails->model }}</td>
        </tr>
        <tr>
            <td><p>Type de véhicule :</p></td>
            <td>{{ $reservationDetails->vehicule_type }}</td>
        </tr>
        <tr>
            <td><p>Transmission :</p></td>
            <td>{{ $reservationDetails->transmission }}</td>
        </tr>
        <tr>
            <td><p>Carburant :</p></td>
            <td>{{ $reservationDetails->fuel_type }}</td>
        </tr>
        <tr>
            <td><p>Climatisation :</p></td>
            <td>{{ $reservationDetails->air_conditionne }}</td>
        </tr>
        <tr>
            <td><p>Date de début :</p></td>
            <td>{{ \Carbon\Carbon::parse($reservationDetails->start_date)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td><p>Date de fin :</p></td>
            <td>{{ \Carbon\Carbon::parse($reservationDetails->end_date)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td><p>Prix total :</p></td>
            <td>{{ number_format($reservationDetails->price_per_day * \Carbon\Carbon::parse($reservationDetails->start_date)->diffInDays($reservationDetails->end_date), 2, ',', ' ') }} €</td>
        </tr>
        </tbody>
    </table>
</div>

</body>
</html>

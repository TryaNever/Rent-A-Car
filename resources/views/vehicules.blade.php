<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
</head>
<body class="flex flex-col items-center">
    <div class="w-full flex flex-wrap justify-between">
        @foreach($vehicules AS $vehicule)
            <div class="w-3/10 p-5 m-5 bg-[#FAFAFA] rounded-2xl flex flex-col capitalize">
                <img src="{{ $vehicule->photo }}" alt="{{ $vehicule->model }}">
                <div>
                    <div class="flex justify-between">
                        <div>
                            <h4 class="text-2xl font-bold">{{ $vehicule->brand }}</h4>
                            <p>{{$vehicule->vehicule_type}}</p>
                        </div>
                        <div><p class="text-[#5937E0] font-bold text-2xl">$ {{ $vehicule->price_per_day }}</p>
                            <p>per day</p></div>
                    </div>
                    <div class="mt-5 flex justify-between"><p>{{ $vehicule->transmission }}</p>
                        <p>{{ $vehicule->fuel_type }}</p>
                        <p>{{ $vehicule->air_conditionne }}</p></div>
                </div>
                <a href="/vehicule/{{ $vehicule->id }}" class="bg-[#5937E0] text-white text-center rounded-xl py-2 mt-5">view details</a>
            </div>
        @endforeach
    </div>
</body>
</html>

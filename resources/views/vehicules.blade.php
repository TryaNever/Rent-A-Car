<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
</head>
<body class="flex flex-col items-center">
<h2 class="text-5xl font-bold my-10">Select a vehicle group</h2>
<form class="space-y-6">
@csrf
    <div>
        <h2 class="text-sm font-semibold mb-2">Type de véhicule</h2>
        <div class="flex flex-wrap gap-2">
            <label class="cursor-pointer">
                <input type="radio" name="vehiculeType" value="" class="sr-only peer" >
                <div class="px-4 py-2 rounded-full text-sm font-medium
                    bg-gray-100 text-black peer-checked:bg-violet-600 peer-checked:text-white">
                    All vehicles
                </div>
            </label>

            @foreach ($vehiculeTypes as $type)
                <label class="cursor-pointer">
                    <input type="radio" name="vehiculeType" value="{{ $type }}" class="sr-only peer" @if($type == $filter['vehiculeType']) checked @endif>
                    <div class="px-4 py-2 rounded-full text-sm font-medium
                        bg-gray-100 text-black peer-checked:bg-violet-600 peer-checked:text-white">
                        {{ ucfirst($type) }}
                    </div>
                </label>
            @endforeach
        </div>
    </div>
    <div>
        <h2 class="text-sm font-semibold mb-2">Type d'énergie</h2>
        <div class="flex flex-wrap gap-2">
            <label class="cursor-pointer">
                <input type="radio" name="energieType" value="" class="sr-only peer">
                <div class="px-4 py-2 rounded-full text-sm font-medium
                    bg-gray-100 text-black peer-checked:bg-violet-600 peer-checked:text-white">
                    All energy type
                </div>
            </label>

            @foreach ($energieTypes as $energie)
                <label class="cursor-pointer">
                    <input type="radio" name="energieType" value="{{ $energie }}" class="sr-only peer" @if($energie == $filter['energieType']) checked @endif>
                    <div class="px-4 py-2 rounded-full text-sm font-medium
                        bg-gray-100 text-black peer-checked:bg-violet-600 peer-checked:text-white">
                        {{ ucfirst($energie) }}
                    </div>
                </label>
            @endforeach
        </div>
    </div>

    <div>
        <h2 class="text-sm font-semibold mb-2">Type de boîte</h2>
        <div class="flex flex-wrap gap-2">
            <label class="cursor-pointer">
                <input type="radio" name="typeGear" value="" class="sr-only peer">
                <div class="px-4 py-2 rounded-full text-sm font-medium
                    bg-gray-100 text-black peer-checked:bg-violet-600 peer-checked:text-white">
                    All type of gear
                </div>
            </label>

            @foreach ($typeGears as $gear)
                <label class="cursor-pointer">
                    <input type="radio" name="typeGear" value="{{ $gear }}" class="sr-only peer" @if($gear == $filter['typeGear']) checked @endif>
                    <div class="px-4 py-2 rounded-full text-sm font-medium
                        bg-gray-100 text-black peer-checked:bg-violet-600 peer-checked:text-white">
                        {{ ucfirst($gear) }}
                    </div>
                </label>
            @endforeach
        </div>
    </div>
</form>

    <div class="w-[80%] flex flex-wrap justify-between" id="containerVehicules">
        @foreach($vehicules AS $vehicule)
            <div class="w-3/10 p-4 m-4 bg-[#FAFAFA] rounded-2xl flex flex-col capitalize">
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
<script src="{{ asset('js/vehiculeFilter.js') }}"></script>
@if(!empty($filter))
    <script>
        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());
        fetchFilter(data)
    </script>
@endif
</body>
</html>

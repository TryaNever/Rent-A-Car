<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Laravel</title>

    <!-- Fonts -->
    <script src="https://kit.fontawesome.com/882a8425ef.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
</head>
<body class="flex flex-col items-center">
<x-header></x-header>
<div class="rounded-4xl bg-[#5937E0] w-9/10 relative p-10">
    <img src="{{ asset('images/carBG.png') }}" class="absolute w-1/2 bottom-0 right-80 z-0 mx-auto blur-lg">

    <div class="flex items-center z-10 relative">
        <div class="text-white">
            <h2 class="font-bold text-6xl my-5">Experience the road like never before</h2>
            <p class="my-5 font-normal text-lg">Rent a car in just a few taps. Fast, flexible, and affordable, your next
                ride is always ready, wherever
                and whenever you need it.</p>
            <a href="/vehicules" class="my-5 bg-[#FF9E0C] text-white rounded-xl p-2">View all cars</a>
        </div>
        <form action="/vehicules" method="post" class="w-[40%] m-5 bg-white rounded-2xl p-10 flex flex-col">
            @csrf
            <h3 class="text-3xl text-center mb-5 font-bold">Book your car</h3>
            <select class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5" name="vehiculeType">
                <option value="">Vehicule type</option>
                @foreach($vehiculeTypes as $vehiculeType )
                    <option value="{{$vehiculeType}}">{{$vehiculeType}}</option>
                @endforeach
            </select>
            <select class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5" name="energieType">
                <option value="">Energy type</option>
                @foreach($energieTypes as $vehiculeType )
                    <option value="{{$vehiculeType}}">{{$vehiculeType}}</option>
                @endforeach
            </select>
            <select class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5" name="typeGear">
                <option value="">Type of gear</option>
                @foreach($typeGears as $vehiculeType )
                    <option value="{{$vehiculeType}}">{{$vehiculeType}}</option>
                @endforeach
            </select>
            <input type="submit" value="Book now" class="bg-[#FF9E0C] text-white rounded-2xl h-10 my-8">
        </form>
    </div>
</div>

<div class="w-screen flex justify-around mt-10">
    <div class="w-1/4 flex flex-col items-center">
        <i class="fa-solid fa-location-dot text-8xl my-5"></i>
        <h3 class="text-center font-semibold text-xl">Availability</h3>
        <p class="text-center">A wide range of vehicles, available anytime, wherever you need them.</p>
    </div>
    <div class="w-1/4 flex flex-col items-center">
        <i class="fa-solid fa-car-side text-8xl my-5"></i>
        <h3 class="text-center font-semibold text-xl">Comfort</h3>
        <p class="text-center">Enjoy a smooth, relaxing drive with clean, modern, well-equipped cars.</p>
    </div>
    <div class="w-1/4 flex flex-col items-center">
        <i class="fa-solid fa-wallet text-8xl my-5"></i>
        <h3 class="text-center font-semibold text-xl">Savings</h3>
        <p class="text-center">Smart prices, no hidden fees — only pay when you actually drive.</p>
    </div>

</div>
<div class="w-full flex flex-col p-10">

    <div class="flex justify-between mt-20"><h2 class="text-4xl font-bold">Choose the car that suits you</h2><a href="/vehicules">View All →</a></div>
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
            <a href="/vehicules/{{ $vehicule->id }}" class="bg-[#5937E0] text-white text-center rounded-xl py-2 mt-5">view details</a>
        </div>
    @endforeach
    </div>
</div>
<x-footer></x-footer>
</body>
</html>

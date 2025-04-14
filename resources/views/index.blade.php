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
<div class="rounded-4xl bg-[#5937E0] w-9/10 relative p-10">
    <img src="{{ asset('images/carBG.png') }}" class="absolute w-1/2 bottom-0 right-80 z-0 mx-auto blur-lg">

    <div class="flex items-center z-10 relative">
        <div class="text-white">
            <h2 class="font-bold text-6xl my-5">Experience the road like never before</h2>
            <p class="my-5 font-normal text-lg">Rent a car in just a few taps. Fast, flexible, and affordable, your next
                ride is always ready, wherever
                and whenever you need it.</p>
            <a href="" class="my-5 bg-[#FF9E0C] text-white rounded-xl p-2">View all cars</a>
        </div>
        <form method="get" class="w-[40%] m-5 bg-white rounded-2xl p-10 flex flex-col">
            @csrf
            <h3 class="text-3xl text-center mb-5 font-bold">Book your car</h3>
            <select class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5">
                <option value="">Vehicule type</option>
                @foreach($vehiculeTypes as $vehiculeType )
                    <option value="{{$vehiculeType}}">{{$vehiculeType}}</option>
                @endforeach
            </select>
            <select class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5">
                <option value="">Energy type</option>
                @foreach($energieTypes as $vehiculeType )
                    <option value="{{$vehiculeType}}">{{$vehiculeType}}</option>
                @endforeach
            </select>
            <select class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5">
                <option value="">Type of gear</option>
                @foreach($typeGears as $vehiculeType )
                    <option value="{{$vehiculeType}}">{{$vehiculeType}}</option>
                @endforeach
            </select>
            <input type="date" class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5">
            <input type="date" class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5">
            <input type="submit" value="Book now" class="bg-[#FF9E0C] text-white rounded-2xl h-10 my-8">
        </form>
    </div>
</div>

<div class="w-screen flex justify-between mt-10">
    <div class="w-1/4 flex flex-col items-center ">
        <img src="{{ asset('images/carBG.png') }}" alt="voiture bleu">
        <h3 class="text-center font-semibold text-xl">Availability</h3>
        <p class="text-center">A wide range of vehicles, available anytime, wherever you need them.</p>
    </div>
    <div class="w-1/4 flex flex-col items-center ">
        <img src="{{ asset('images/carBG.png') }}" alt="voiture bleu">
        <h3 class="text-center font-semibold text-xl">Comfort</h3>
        <p class="text-center">Enjoy a smooth, relaxing drive with clean, modern, well-equipped cars.</p>
    </div>
    <div class="w-1/4 flex flex-col items-center ">
        <img src="{{ asset('images/carBG.png') }}" alt="voiture bleu">
        <h3 class="text-center font-semibold text-xl">Savings</h3>
        <p class="text-center">Smart prices, no hidden fees — only pay when you actually drive.</p>
    </div>

</div>
</body>
</html>

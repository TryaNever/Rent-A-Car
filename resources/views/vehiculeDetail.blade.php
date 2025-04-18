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
    <script src="https://kit.fontawesome.com/882a8425ef.js" crossorigin="anonymous"></script>
</head>
<body class="flex flex-col items-center mx-20 min-h-sreen">
<x-header></x-header>
<div class="w-full h-[50vh] flex justify-between mt-20">
    <div class="flex flex-col justify-between w-1/2">
        <h3 class="text-3xl font-bold">{{ $vehicule[0]->brand }}</h3>
        <p class="text-[#5937E0] text-2xl font-bold">${{ $vehicule[0]->price_per_day }}<span
                class="font-normal text-sm text-[#00000099]"> / day</span></p>
        <img src="{{ $photos[0]->image_url }}" alt="" class="h-[25vh] object-contain">
        <div class="flex">
            @foreach($photos AS $photo)
                <img src="{{ $photo->image_url }}" alt=""
                     class="border rounded-3xl sepia mr-3 w-40 object-cover cursor-pointer img-carousel">
            @endforeach
        </div>
    </div>
    <div class="w-1/2">
        <h3 class="text-2xl font-semibold">Technical Specification</h3>
        <div class="flex flex-wrap justify-between mb-5">
            <div class="w-2/7 bg-[#FAFAFA] p-5 rounded-2xl my-5">
                <i class="fa-solid fa-gears"></i>
                <p>Gear Box</p>
                <p class="capitalize text-[#00000099]">{{ $vehicule[0]->transmission }}</p>
            </div>
            <div class="w-2/7 bg-[#FAFAFA] p-5 rounded-2xl my-5">
                <i class="fa-solid fa-gas-pump"></i>
                <p>Energy Type</p>
                <p class="capitalize text-[#00000099]">{{ $vehicule[0]->fuel_type }}</p>
            </div>
            <div class="w-2/7 bg-[#FAFAFA] p-5 rounded-2xl my-5">
                <i class="fa-solid fa-car-side"></i>
                <p>Type</p>
                <p class="capitalize text-[#00000099]">{{ $vehicule[0]->vehicule_type }}</p>
            </div>
            <div class="w-2/7 bg-[#FAFAFA] p-5 rounded-2xl my-5">
                <i class="fa-solid fa-door-open"></i>
                <p>Doors</p>
                <p class="capitalize text-[#00000099]">{{ $vehicule[0]->doors }}</p>
            </div>
            <div class="w-2/7 bg-[#FAFAFA] p-5 rounded-2xl my-5">
                <i class="fa-solid fa-wind"></i>
                <p>Air conditioner</p>
                <p class="capitalize text-[#00000099]">{{ $vehicule[0]->air_conditionne }}</p>
            </div>
            <div class="w-2/7 bg-[#FAFAFA] p-5 rounded-2xl my-5">
                <i class="fa-solid fa-chair"></i>
                <p>Seats</p>
                <p class="capitalize text-[#00000099]">{{ $vehicule[0]->seats }}</p>
            </div>
        </div>
        <a href="/vehicules/{{ $vehicule[0]->id }}/reservation"
           class="bg-[#5937E0] text-white text-center rounded-xl py-3 px-20 mt-10">Rent a car</a>
        <div class="mt-10">
            <h3 class="text-2xl font-semibold">Car Equipement</h3>
            <div class="flex flex-wrap w-1/2">
                @foreach($equipements AS $equipement)
                    <div class="flex items-center w-1/2"><i class="fa-solid fa-circle-check text-[#5937E0] text-xl p-3"></i>
                        <p class="text-[#00000099]">{{ $equipement->name_equipement }}</p></div>

                @endforeach
            </div>
        </div>
    </div>

</div>
<x-footer></x-footer>
<script src="{{ asset('js/vehiculeCarousel.js') }}"></script>

</body>
</html>

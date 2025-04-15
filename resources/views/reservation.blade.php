<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet"/>
</head>
<body class="flex flex-col items-center mx-20 min-h-screen">
<h2 class="w-full text-center text-4xl font-bold my-10">Reservation</h2>
<div class="w-full h-[50vh] flex justify-between mt-20">
    <div class="flex flex-col justify-between w-1/2">
        <h3 class="text-3xl font-bold">{{ $vehicule[0]->brand }}</h3>
        <p class="text-[#5937E0] text-2xl font-bold">${{ $vehicule[0]->price_per_day }}<span
                    class="font-normal text-sm text-[#00000099]"> / day</span></p>
        <img src="{{ asset('images/carBG.png') }}" alt="" class="h-[25vh] object-contain">
        <div class="flex">
            @foreach($photos AS $photo)
                <img src="{{ $photo->image_url }}" alt="" class="border rounded-3xl sepia mr-3 w-40 object-cover cursor-pointer img-carousel">
            @endforeach
        </div>
    </div>
    <form id="reservationForm" class="flex flex-col w-1/3">
        @csrf
        <input type="date" name="startDate" id="startDate" class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5">
        <input type="date" name="endDate" id="endDate" class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5">
        <div id="contain_error"></div>
        <input type="text" name="email" placeholder="Email" class="bg-[#FAFAFA] rounded-2xl my-3 h-10 px-5">
        <label for="total" class="flex items-center space-x-2 cursor-pointer">
            <input id="total" type="checkbox" class="peer hidden" />
            <div class="w-6 h-6 rounded-full border-2 border-violet-700 flex items-center justify-center peer-checked:bg-violet-700"></div>
            <span class="text-gray-800">Total Price</span>
        </label>
        <button type="submit" class="bg-[#5937E0] text-white text-center rounded-xl py-3 px-20 mt-4" id="submitBtn">Book now</button>

    </form>

</div>
<x-footer></x-footer>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>let dates = @json($dates)</script>
<script src="{{ asset('js/vehiculeCarousel.js') }}"></script>
<script src="{{ asset('js/formDatePrice.js') }}"></script>
</body>
</html>

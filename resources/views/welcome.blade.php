<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Travel System</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
<!-- Hero Section -->
<header class="bg-blue-600 text-white py-6">
    <div class="container mx-auto flex justify-between items-center">
        <div>
            <h1 class="text-4xl font-bold">Festival Travel System</h1>
            <p class="mt-2 text-lg">Plan je ultieme festivalervaring met gemak.</p>
        </div>
        <div class="flex space-x-4">
            <a href="/account" class="bg-white text-blue-600 font-semibold py-2 px-4 rounded hover:bg-blue-100">
                Mijn Account
            </a>
            <a href="/cart" class="bg-white text-blue-600 font-semibold py-2 px-4 rounded hover:bg-blue-100">
                Winkelwagentje
            </a>
        </div>
    </div>
</header>

<!-- Diensten Section -->
<section id="services" class="py-12">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center mb-8">Onze Diensten</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Kaart 1 -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-2">Bus Reizen</h3>
                <p class="text-gray-600">Reis comfortabel en voordelig naar festivals in heel Europa.</p>
            </div>
            <!-- Kaart 2 -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-2">Boekingen</h3>
                <p class="text-gray-600">Eenvoudig tickets boeken voor jouw favoriete festivals.</p>
            </div>
            <!-- Kaart 3 -->
            <div class="bg-white shadow-md rounded-lg p-6 text-center">
                <h3 class="text-xl font-semibold mb-2">Loyaliteitspunten</h3>
                <p class="text-gray-600">Verdien punten en krijg exclusieve kortingen en aanbiedingen.</p>
            </div>
        </div>

        <!-- Nieuwe Sectie -->
        <h2 class="text-3xl font-bold text-center my-12">Beschikbare bustickets voor actuele festivals</h2>

        <!-- Kaart: Populaire Festivals -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($festivals as $festival)
                <div class="bg-white shadow-md rounded-lg p-6 text-center">
                    <h3 class="text-xl font-semibold mb-4">{{ $festival->name }}</h3>
                    <p class="text-gray-600">{{ $festival->location }}</p>
                    <p class="text-gray-500">{{ $festival->date->format('d-m-Y') }}</p>
{{-- {{ route('festival.show', $festival->id) }}     --}}    <a href="#" class="mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">
                        Meer Informatie
                    </a>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Festival Travel System. Alle rechten voorbehouden.</p>
    </div>
</footer>
</body>
</html>

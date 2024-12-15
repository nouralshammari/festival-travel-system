<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Festival Travel System</title>
    @vite('resources/css/app.css')
    <style>
        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 500px;
            width: 100%;
            text-align: center;
        }
        .close-modal {
            background: red;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            float: right;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
<!-- Hero Section -->
<header class="bg-gradient-to-r from-black via-pink-700 to-blue-700 text-blue-100 p-4 flex justify-between items-center">
    <!-- Logo links -->
    <div class="flex-shrink-0">
        <img src="{{ asset('images/header-logo.png') }}" alt="bus logo" class="h-12 w-auto">
    </div>

    <!-- Tekst in het midden -->
    <div class="flex-1 text-center">
        <h1 class="text-4xl font-bold">Festival Travel System</h1>
        <p class="mt-1 text-lg">Plan je ultieme festivalervaring met gemak.</p>
    </div>

    <!-- Navigatie rechts -->
    <div class="flex space-x-4">
        <a href="/login" class="bg-white text-blue-600 font-semibold py-2 px-4 rounded hover:bg-blue-100">
            Mijn Account
        </a>
        <a href="/cart" class="bg-white text-blue-600 font-semibold py-2 px-4 rounded hover:bg-blue-100">
            Winkelwagentje
        </a>
        <a href="/register" class="bg-white text-blue-600 font-semibold py-2 px-4 rounded hover:bg-blue-100">
            Registreren
        </a>
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
                    <button class="more-info-btn mt-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700"
                            data-name="{{ $festival->name }}"
                            data-location="{{ $festival->location }}"
                            data-date="{{ $festival->date->format('d-m-Y') }}"
                            data-price="{{ $festival->price }}">
                        Meer Informatie
                    </button>
                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- Modal -->
<div id="modal" class="modal">
    <div class="modal-content">
        <button class="close-modal">&times;</button>
        <h3 id="modal-title" class="text-xl font-semibold mb-4"></h3>
        <p id="modal-location" class="text-gray-600"></p>
        <p id="modal-date" class="text-gray-500"></p>
        <p id="modal-price" class="text-gray-800 font-bold"></p>
        <button id="add-to-cart" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 mt-4">
            Voeg toe aan Winkelwagentje
        </button>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 Festival Travel System. Alle rechten voorbehouden.</p>
    </div>
</footer>

<script>
    // JavaScript for Modal Functionality
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('modal');
        const modalTitle = document.getElementById('modal-title');
        const modalLocation = document.getElementById('modal-location');
        const modalDate = document.getElementById('modal-date');
        const modalPrice = document.getElementById('modal-price');
        const addToCartButton = document.getElementById('add-to-cart');
        const closeModalButton = document.querySelector('.close-modal');

        document.querySelectorAll('.more-info-btn').forEach(button => {
            button.addEventListener('click', () => {
                modalTitle.textContent = button.dataset.name;
                modalLocation.textContent = `Locatie: ${button.dataset.location}`;
                modalDate.textContent = `Datum: ${button.dataset.date}`;
                modalPrice.textContent = `Prijs: €${button.dataset.price}`;

                modal.style.display = 'flex';
            });
        });

        closeModalButton.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });

        addToCartButton.addEventListener('click', () => {
            const ticket = {
                name: modalTitle.textContent,
                location: modalLocation.textContent.replace('Locatie: ', ''),
                date: modalDate.textContent.replace('Datum: ', ''),
                price: modalPrice.textContent.replace('Prijs: €', '')
            };

            fetch('{{ route('cart.add') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(ticket)
            })
                .then(response => response.json())
                .then(data => {
                    alert(data.message);
                    modal.style.display = 'none';
                })
                .catch(error => console.error('Error:', error));
        });

    });
</script>
</body>
</html>

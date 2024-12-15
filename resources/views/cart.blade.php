<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkelwagentje</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-800">
<div class="container mx-auto py-12">
    <h1 class="text-3xl font-bold mb-8">Winkelwagentje</h1>

    @if($cart)
        <table class="table-auto w-full bg-white shadow-md rounded-lg">
            <thead>
            <tr class="bg-blue-600 text-white">
                <th class="px-4 py-2">Festival</th>
                <th class="px-4 py-2">Locatie</th>
                <th class="px-4 py-2">Datum</th>
                <th class="px-4 py-2">Aantal</th>
                <th class="px-4 py-2">Prijs</th>
                <th class="px-4 py-2">Acties</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart as $index => $item)
                <tr>
                    <td class="border px-4 py-2">{{ $item['name'] }}</td>
                    <td class="border px-4 py-2">{{ $item['location'] }}</td>
                    <td class="border px-4 py-2">{{ $item['date'] }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="index" value="{{ $index }}">
                            <input type="number" name="quantity" value="{{ $item['quantity'] ?? 1 }}" min="1" class="w-16 text-center border rounded">
                            <button type="submit" class="ml-2 bg-green-600 text-white py-1 px-3 rounded hover:bg-green-700">Wijzig</button>
                        </form>
                    </td>
                    <td class="border px-4 py-2">€{{ $item['price'] * ($item['quantity'] ?? 1) }}</td>
                    <td class="border px-4 py-2">
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="index" value="{{ $index }}">
                            <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-700">Verwijder</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>Je winkelwagentje is leeg.</p>
    @endif

    <a href="/" class="inline-block mt-4 bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Verder winkelen</a>
</div>
</body>
</html>

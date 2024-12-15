<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        // Haal winkelwagenitems op uit de sessie
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request)
    {
        $ticket = $request->only(['name', 'location', 'date', 'price']);

        // Haal de huidige winkelwagen uit de sessie of maak een nieuwe
        $cart = session()->get('cart', []);

        // Voeg het ticket toe aan de winkelwagen
        $cart[] = $ticket;

        // Sla de winkelwagen op in de sessie
        session(['cart' => $cart]);

        return response()->json(['message' => 'Ticket toegevoegd aan winkelwagentje']);
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->index]); // Verwijder het item op de opgegeven index
        session(['cart' => $cart]);
        return redirect()->route('cart.index')->with('message', 'Ticket verwijderd.');
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->index])) {
            $cart[$request->index]['quantity'] = $request->quantity;
            session(['cart' => $cart]);
        }
        return redirect()->route('cart.index')->with('message', 'Aantal tickets gewijzigd.');
    }

}


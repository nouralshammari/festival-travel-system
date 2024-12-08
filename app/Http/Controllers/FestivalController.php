<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalController extends Controller
{
    public function index()
    {
        // Haal alle festivals op
        $festivals = Festival::all();

        // Retourneer naar de view met festivals als data
        return view('festivals.index', compact('festivals'));
    }

    public function show($id)
    {
        // Haal festival op met ID
        $festival = Festival::findOrFail($id);

        // Retourneer naar de view van het festival
        return view('festivals.show', compact('festival'));
    }
}

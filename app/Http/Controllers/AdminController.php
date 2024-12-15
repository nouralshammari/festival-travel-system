<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'employeesCount' => Employee::count(),
            'customersCount' => Customer::count(),
            'busTripsCount' => BusTrip::count(),
            'soldTicketsCount' => Ticket::where('status', 'sold')->count(),
            'availableTicketsCount' => Ticket::where('status', 'available')->count(),
        ]);
    }

}

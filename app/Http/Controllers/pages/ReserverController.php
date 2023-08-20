<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Periodique;
use App\Models\Agent;
use App\Models\Livre;
use App\Models\Reservation;

class ReserverController extends Controller
{
    

    public function index()
    {
        $reservations = Reservation::with(['agent', 'livre', 'periodique'])->get();

        $livresReservations = $reservations->filter(function ($reservation) {
            return $reservation->Type === 'Livre';
        });

        $periodiquesReservations = $reservations->filter(function ($reservation) {
            return $reservation->Type === 'Periodique';
        });

        return view('content.pages.Reserver', compact('livresReservations', 'periodiquesReservations'));
    }
    
    
}

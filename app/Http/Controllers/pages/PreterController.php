<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Preter;
use App\Models\Reservation;


class PreterController extends Controller
{
    public function index()
    {
        $preters = Preter::with(['reservation.agent', 'reservation.livre', 'reservation.periodique'])->get();
        return view('content.pages.Preter', compact('preters'));
    }
    public function preter(Request $request, $Revervation_id)
    {
        // Check if the request is a POST request
        if ($request->isMethod('post')) {
            // Find the reservation by ID
            $reservation = Reservation::findOrFail($Revervation_id);

            // Check if the reservation is for a Livre or a Periodique
            if ($reservation->Type === 'Livre') {
                // Create a new Preter record for Livre
                Preter::create([
                    'id_reserver' => $reservation->Revervation_id,
                    'date_Empruntant' => $request->input('date_Empruntant'),
                    'Nomber_jours' => date_diff(date_create($request->input('date_Empruntant')), date_create($reservation->Date_reservation))->format('%a'),
                    'Type' => 'Livre',
                ]);

                // Delete the reservation from the Reserver table
                
            } elseif ($reservation->Type === 'Periodique') {
                // Create a new Preter record for Periodique
                Preter::create([
                    'id_reserver' => $reservation->Revervation_id,
                    'date_Empruntant' => $request->input('date_Empruntant'),
                    'Nomber_jours' => date_diff(date_create($request->input('date_Empruntant')), date_create($reservation->Date_reservation))->format('%a'),
                    'Type' => 'Periodique',// Store the type in the Type column of Preter table
                ]);

                // Delete the reservation from the Reserver table
                
            }

            // Redirect to the Preter table
            return redirect('/pages/Preter');
    }
}
}
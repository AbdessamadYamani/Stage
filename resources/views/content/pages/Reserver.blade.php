@extends('layouts/contentNavbarLayout')

@section('title', 'Les modalités de prêt pour vous servir')
@section('content')

<!-- Livres Table -->
<div class="card mt-4">
    <h5 class="card-header">Livres</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Date Reservation</th>
                    <th>Agent Fullname</th>
                    <th>Agent Direction</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Cote</th>
                    <th>Nombre d'Exemplaires</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($livresReservations as $reservation)
                    <tr>
                        <td>{{ $reservation->Date_reservation }}</td>
                        <td>{{ $reservation->agent->Fullname }}</td>
                        <td>{{ $reservation->agent->Direction }}</td>
                        <td>{{ optional($reservation->livre)->Titre }}</td>
                        <td>{{ optional($reservation->livre)->Auteur }}</td>
                        <td>{{ optional($reservation->livre)->Cote }}</td>
                        <td>{{ optional($reservation->livre)->NBR_Exemplaire }}</td>
                        <td>
                            <form action="{{ route('preter', $reservation->Revervation_id) }}" method="POST">
                                @csrf
                                <input type="date" name="date_Empruntant" required>

                                <button type="submit" class="btn btn-primary">Preter</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Periodiques Table -->
<div class="card mt-4">
    <h5 class="card-header">Periodiques</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Date Reservation</th>
                    <th>Agent Fullname</th>
                    <th>Agent Direction</th>
                    <th>Collection</th>
                    <th>Titre</th>
                    <th>Cote</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($periodiquesReservations as $reservation)
                    <tr>
                        <td>{{ $reservation->Date_reservation }}</td>
                        <td>{{ $reservation->agent->Fullname }}</td>
                        <td>{{ $reservation->agent->Direction }}</td>
                        <td>{{ $reservation->periodique->Collection }}</td>
                        <td>{{ $reservation->periodique->Titre }}</td>
                        <td>{{ $reservation->periodique->Cote }}</td>
                        <td>
                            <form action="{{ route('preter', $reservation->Revervation_id) }}" method="POST">
                                @csrf
                                <input type="date" name="date_Empruntant" required>

                                <button type="submit" class="btn btn-primary">Preter</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

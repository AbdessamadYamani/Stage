@extends('layouts/contentNavbarLayout')

@section('title', 'Les modalités de prêt pour vous servir')
@section('content')

<div class="card mt-4">
    <h5 class="card-header">Livres</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Titre</th>
                    <th>Auteur</th>
                    <th>Cote</th>
                    <th>Nombre d'Exemplaires</th>
                    <th>Date de Réservation</th>
                    <th>Agent</th>
                    <th>Date Empruntant</th>
                    <th>Nombre de Jours</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($preters as $preter)
                @if (optional($preter->reservation)->Type === 'Livre')
                <tr>
                    <td>{{ optional($preter->reservation->livre)->Titre }}</td>
                    <td>{{ optional($preter->reservation->livre)->Auteur }}</td>
                    <td>{{ optional($preter->reservation->livre)->Cote }}</td>
                    <td>{{ optional($preter->reservation->livre)->NBR_Exemplaire }}</td>
                    <td>{{ $preter->reservation->Date_reservation }}</td>
                    <td>{{ $preter->reservation->agent->Fullname }}</td>
                    <td>{{ $preter->date_Empruntant }}</td>
                    <td>{{ date_diff(date_create($preter->date_Empruntant), date_create($preter->reservation->Date_reservation))->format('%a') }}</td>
                    <td>
                        <button class="btn btn-primary">Preter</button>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

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
                    <th>Nombre d'Exemplaires</th>
                    <th>Date Empruntant</th>
                    <th>Nombre de Jours</th>
                    <th>Preter</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($preters as $preter)
                @if (optional($preter->reservation)->Type === 'Periodique')
                <tr>
                    <td>{{ $preter->reservation->Date_reservation }}</td>
                    <td>{{ $preter->reservation->agent->Fullname }}</td>
                    <td>{{ $preter->reservation->agent->Direction }}</td>
                    <td>{{ optional($preter->reservation->periodique)->Collection }}</td>
                    <td>{{ optional($preter->reservation->periodique)->Titre }}</td>
                    <td>{{ optional($preter->reservation->periodique)->Cote }}</td>
                    <td>{{ optional($preter->reservation->periodique)->Nombre_Exemplaire }}</td>
                    <td>{{ $preter->date_Empruntant }}</td>
                    <td>{{ date_diff(date_create($preter->date_Empruntant), date_create($preter->reservation->Date_reservation))->format('%a') }}</td>
                    <td>
                        <button class="btn btn-primary">Preter</button>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection

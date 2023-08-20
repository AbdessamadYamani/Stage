@extends('layouts/contentNavbarLayout')

@section('title', 'Livres')

@section('content')
    <div class="card mt-4">
        <div class="card-header">
            <h5 class="card-title">Livres</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Numero Edition</th>
                            <th>Date Edition</th>
                            <th>Collection</th>
                            <th>Theme</th>
                            <th>Annee</th>
                            <th>Auteur</th>
                            <th>Langue</th>
                            <th>ISSN</th>
                            <th>Cote</th>
                            <th>Nombre Exemplaire</th>
                            <th>Edition MMSP</th>
                            <th>Nouvelle AQ</th>
                            <th>Collation</th>
                            <th>Edit</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr id="add-form-row">
                            <form action="{{ route('livre.store') }}" method="POST" onsubmit="return confirm('Are you sure you want to add this Livre?');">
                                @csrf
                                <td><input type="text" name="Numero_Edition" required></td>
                                <td><input type="date" name="Date_Edition" required></td>
                                <td><input type="text" name="Collection" required></td>
                                <td><input type="text" name="Theme" required></td>
                                <td><input type="number" name="Annee" required></td>
                                <td><input type="text" name="Auteur" required></td>
                                <td><input type="text" name="Langue" required></td>
                                <td><input type="text" name="ISSN" required></td>
                                <td><input type="text" name="Cote" required></td>
                                <td><input type="number" name="Nombre_Exemplaire" required></td>
                                <td><input type="text" name="Edition_MMSP" required></td>
                                <td>
                                    <input type="radio" name="Nouvelle_Aq" value="Yes" required> Yes
                                    <input type="radio" name="Nouvelle_Aq" value="No" required> No
                                </td>
                                <td>
                                    <input type="radio" name="Collation" value="Yes" required> Yes
                                    <input type="radio" name="Collation" value="No" required> No
                                </td>
                                <td><button type="submit" class="btn btn-success">Ajouter</button></td>
                            </form>
                        </tr>
                        @foreach ($livres as $livre)
                            <tr data-id="{{ $livre->id_Livre }}">
                                <td>{{ $livre->Numero_Edition }}</td>
                                <td>{{ $livre->Date_Edition }}</td>
                                <td>{{ $livre->Collection }}</td>
                                <td>{{ $livre->Theme }}</td>
                                <td>{{ $livre->Annee }}</td>
                                <td>{{ $livre->Auteur }}</td>
                                <td>{{ $livre->Langue }}</td>
                                <td>{{ $livre->ISSN }}</td>
                                <td>{{ $livre->Cote }}</td>
                                <td>{{ $livre->Nombre_Exemplaire }}</td>
                                <td>{{ $livre->Edition_MMSP }}</td>
                                <td>{{ $livre->Nouvelle_Aq }}</td>
                                <td>{{ $livre->Collation }}</td>
                                <td>
                                    <button type="button" class="btn btn-primary" onclick="editLivre({{ $livre->id_Livre }})">Edit</button>
                                </td>
                                <td> <!-- Add this cell for the "Supprimer" button -->
                                    <form action="{{ route('livre.destroy', $livre->id_Livre) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this Livre?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                    </form>
                                </td>
                            </tr>

                            @if ($loop->last)
                                <tr id="edit-form-row" style="display: none;">
                                    <td colspan="15"> <!-- Adjust colspan to include the new column -->
                                        <form id="edit-form" action="{{ route('livre.update', $livre->id_Livre) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="Numero_Edition">Numero Edition</label>
                                                    <input type="text" class="form-control" id="Numero_Edition" name="Numero_Edition" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Date_Edition">Date Edition</label>
                                                    <input type="date" class="form-control" id="Date_Edition" name="Date_Edition" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Collection">Collection</label>
                                                    <input type="text" class="form-control" id="Collection" name="Collection" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Theme">Theme</label>
                                                    <input type="text" class="form-control" id="Theme" name="Theme" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Annee">Annee</label>
                                                    <input type="number" class="form-control" id="Annee" name="Annee" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Auteur">Auteur</label>
                                                    <input type="text" class="form-control" id="Auteur" name="Auteur" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Langue">Langue</label>
                                                    <input type="text" class="form-control" id="Langue" name="Langue" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="ISSN">ISSN</label>
                                                    <input type="text" class="form-control" id="ISSN" name="ISSN" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Cote">Cote</label>
                                                    <input type="text" class="form-control" id="Cote" name="Cote" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Nombre_Exemplaire">Nombre Exemplaire</label>
                                                    <input type="number" class="form-control" id="Nombre_Exemplaire" name="Nombre_Exemplaire" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Edition_MMSP">Edition MMSP</label>
                                                    <input type="text" class="form-control" id="Edition_MMSP" name="Edition_MMSP" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Nouvelle_Aq">Nouvelle AQ</label>
                                                    <input type="text" class="form-control" id="Nouvelle_Aq" name="Nouvelle_Aq" readonly>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="Collation">Collation</label>
                                                    <input type="text" class="form-control" id="Collation" name="Collation" readonly>
                                                </div>
                                            </div>
                                            <button type="button" class="btn btn-secondary" onclick="cancelEdit()">Cancel</button>
                                            <button type="submit" class="btn btn-primary" name="Valider">Valider</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function editLivre(id) {
            // Hide all Edit buttons
            const editButtons = document.querySelectorAll('button[type="button"]');
            editButtons.forEach(button => button.style.display = 'none');

            // Display the Edit form row for the corresponding Livre
            const editFormRow = document.getElementById('edit-form-row');
            editFormRow.style.display = 'table-row';

            // Fill in the form fields with the current values
            const row = document.querySelector(`tr[data-id="${id}"]`);
            const numeroEdition = row.querySelector('td:nth-child(1)').textContent;
            const dateEdition = row.querySelector('td:nth-child(2)').textContent;
            const collection = row.querySelector('td:nth-child(3)').textContent;
            const theme = row.querySelector('td:nth-child(4)').textContent;
            const annee = row.querySelector('td:nth-child(5)').textContent;
            const auteur = row.querySelector('td:nth-child(6)').textContent;
            const langue = row.querySelector('td:nth-child(7)').textContent;
            const issn = row.querySelector('td:nth-child(8)').textContent;
            const cote = row.querySelector('td:nth-child(9)').textContent;
            const nombreExemplaire = row.querySelector('td:nth-child(10)').textContent;
            const editionMmsp = row.querySelector('td:nth-child(11)').textContent;
            const nouvelleAq = row.querySelector('td:nth-child(12)').textContent;
            const collation = row.querySelector('td:nth-child(13)').textContent;

            document.getElementById('Numero_Edition').value = numeroEdition;
            document.getElementById('Date_Edition').value = dateEdition;
            document.getElementById('Collection').value = collection;
            document.getElementById('Theme').value = theme;
            document.getElementById('Annee').value = annee;
            document.getElementById('Auteur').value = auteur;
            document.getElementById('Langue').value = langue;
            document.getElementById('ISSN').value = issn;
            document.getElementById('Cote').value = cote;
            document.getElementById('Nombre_Exemplaire').value = nombreExemplaire;
            document.getElementById('Edition_MMSP').value = editionMmsp;
            document.getElementById('Nouvelle_Aq').value = nouvelleAq;
            document.getElementById('Collation').value = collation;

            // Enable editing on the input fields
            const inputFields = editFormRow.querySelectorAll('input');
            inputFields.forEach(field => field.removeAttribute('readonly'));
        }

        function cancelEdit() {
            // Show all Edit buttons
            const editButtons = document.querySelectorAll('button[type="button"]');
            editButtons.forEach(button => button.style.display = 'inline-block');

            // Hide the Edit form row
            const editFormRow = document.getElementById('edit-form-row');
            editFormRow.style.display = 'none';

            // Disable editing on the input fields
            const inputFields = editFormRow.querySelectorAll('input');
            inputFields.forEach(field => field.setAttribute('readonly', 'readonly'));
        }
    </script>
@endsection

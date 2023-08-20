@extends('layouts/contentNavbarLayout')

@section('title', 'Agents')

@section('content')
<!-- Add these lines to your <head> section -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

<div class="card mt-4">
    <div class="card-header">
        <h5 class="card-title">Agents</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Fullname</th>
                        <th>Direction</th>
                        <th>Email</th>
                        <th>Edite</th>
                        <th>Supprimer</th>
                        <th>Envoyer un Email</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="add-form-row">
                        <form action="{{ route('agent.store') }}" method="POST" onsubmit="return confirm('Are you sure you want to add this Agent?');">
                            @csrf
                            <td><input type="text" name="Fullname" required></td>
                            <td><input type="text" name="Direction" required></td>
                            <td><input type="email" name="EmailAdd" required></td>
                            <td><button type="submit" class="btn btn-success">Ajouter</button></td>
                        </form>
                    </tr>
                    @foreach ($agents as $agent)
                    <tr data-id="{{ $agent->id_Agent }}">
                        <td>{{ $agent->Fullname }}</td>
                        <td>{{ $agent->Direction }}</td>
                        <td>{{ $agent->EmailAdd }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="editAgent({{ $agent->id_Agent }})">Edit</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="deleteAgent({{ $agent->id_Agent }})">Delete</button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#emailModal{{ $agent->id_Agent }}">Envoyer un Email</button>
                        </td>
                    </tr>
                    <tr id="edit-form-row-{{ $agent->id_Agent }}" style="display: none;">
                        <td colspan="6">
                            <form id="edit-form-{{ $agent->id_Agent }}" action="{{ route('agent.update', $agent->id_Agent) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-row">
                                    <!-- Form fields for editing -->
                                    <div class="col">
                                        <input type="text" name="Fullname" value="{{ old('Fullname', $agent->Fullname) }}" required>
                                    </div>
                                    <div class="col">
                                        <input type="text" name="Direction" value="{{ old('Direction', $agent->Direction) }}" required>
                                    </div>
                                    <div class="col">
                                        <input type="email" name="EmailAdd" value="{{ old('EmailAdd', $agent->EmailAdd) }}" required>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary" onclick="cancelEdit({{ $agent->id_Agent }})">Cancel</button>
                                <button type="submit" class="btn btn-primary" name="Valider">Valider</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@foreach ($agents as $agent)
<!-- Email Form Modal -->
<div class="modal fade" id="emailModal{{ $agent->id_Agent }}" tabindex="-1" role="dialog" aria-labelledby="emailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="emailModalLabel">Envoyer un Email</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="email-form{{ $agent->id_Agent }}" action="{{ route('agent.sendEmail') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="subject">Sujet</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="form-group">
                        <label for="content">Contenu</label>
                        <textarea class="form-control" id="content" name="content" rows="4" required></textarea>
                    </div>
                    <input type="hidden" name="receiver_id" value="{{ $agent->id_Agent }}">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-primary" onclick="submitEmailForm({{ $agent->id_Agent }})">Envoyer</button>
            </div>
        </div>
    </div>
</div>
@endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ... Email Modal ... -->

<script>
    function editAgent(id) {
        // Hide all Edit form rows
        const editFormRows = document.querySelectorAll('[id^="edit-form-row-"]');
        editFormRows.forEach(row => row.style.display = 'none');

        // Display the Edit form row for the corresponding Agent
        const editFormRow = document.getElementById(`edit-form-row-${id}`);
        if (editFormRow) {
            editFormRow.style.display = 'table-row';
        }
    }

    function cancelEdit(id) {
        // Show all Edit form rows
        const editFormRows = document.querySelectorAll('[id^="edit-form-row-"]');
        editFormRows.forEach(row => row.style.display = 'none');

        // Display the Edit button
        const editButton = document.querySelector(`button[data-id="${id}"]`);
        if (editButton) {
            editButton.style.display = 'inline-block';
        }
    }

    function sendEmail(agentId) {
        document.getElementById('receiver_id').value = agentId;
        $('#emailModal').modal('show');
    }
    function submitEmailForm(agentId) {
        $('#email-form' + agentId).submit();
    }
</script>

@endsection

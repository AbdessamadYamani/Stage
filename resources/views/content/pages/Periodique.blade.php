@extends('layouts/contentNavbarLayout')

@section('title', 'Create Periodique')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Create New Periodique</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('store') }}" method="POST">
                    @csrf

                 <div class="mb-3">
                        <label for="Numero_Edition" class="form-label">Numero Edition</label>
                        <input type="text" name="Numero_Edition" id="Numero_Edition" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Date_Edition" class="form-label">Date Edition</label>
                        <input type="date" name="Date_Edition" id="Date_Edition" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Collection" class="form-label">Collection</label>
                        <select name="Collection" id="Collection" class="form-control" required>
                            <option value="">choisire une Collection</option>
                            @foreach ($collections as $collection)
                                <option value="{{ $collection }}">{{ $collection }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                            <label for="theme">Theme</label>
                            <select class="form-control" id="theme" name="Theme">
                                <option value="">choisire une Theme</option>
                                @foreach($themes as $theme)
                                    <option value="{{ $theme }}">{{ $theme }}</option>
                                @endforeach
                            </select>
                      </div>

                    <div class="mb-3">
                        <label for="Annee" class="form-label">Annee</label>
                        <input type="text" name="Annee" id="Annee" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Titre" class="form-label">Titre</label>
                        <input type="text" name="Titre" id="Titre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Auteur" class="form-label">Auteur</label>
                        <input type="text" name="Auteur" id="Auteur" class="form-control" required>
                    </div>

                    <div class="form-group">
                            <label for="langue">Langues</label>
                            <select class="form-control" id="langue" name="langue">
                                <option value="">choisire une langue</option>
                                @foreach($langues as $langue)
                                    <option value="{{ $langue }}">{{ $langue }}</option>
                                @endforeach
                            </select>
                      </div>

                    <div class="mb-3">
                        <label for="ISSN" class="form-label">ISSN</label>
                        <input type="text" name="ISSN" id="ISSN" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Cote" class="form-label">Cote</label>
                        <input type="text" name="Cote" id="Cote" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Nombre_Exemplaire" class="form-label">Nombre Exemplaire</label>
                        <input type="number" name="Nombre_Exemplaire" id="Nombre_Exemplaire" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="Edition_MMSP" class="form-label">Edition MMSP</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Edition_MMSP" id="edition_mmsp_oui" value="1">
                            <label class="form-check-label" for="edition_mmsp_oui">
                                Oui
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Edition_MMSP" id="edition_mmsp_non" value="0" checked>
                            <label class="form-check-label" for="edition_mmsp_non">
                                Non
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="Nouvelle_Aq" class="form-label">Nouvelle Aq</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Nouvelle_Aq" id="nouvelle_aq_oui" value="1">
                            <label class="form-check-label" for="nouvelle_aq_oui">
                                Oui
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="Nouvelle_Aq" id="nouvelle_aq_non" value="0" checked>
                            <label class="form-check-label" for="nouvelle_aq_non">
                                Non
                            </label>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="Collation" class="form-label">Collation</label>
                        <input type="text" name="Collation" id="Collation" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Create Periodique</button>
               </form> 
            </div>
        </div>
    </div>
</div>
@endsection

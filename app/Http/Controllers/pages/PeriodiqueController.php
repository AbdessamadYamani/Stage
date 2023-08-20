<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Periodique;
use App\Models\Document;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
class PeriodiqueController extends Controller
{
    public function index()
  {
    return view('content.pages.Periodique');
  }
  public function store(Request $request)
  {
      
          $data = $request->validate([
              'Numero_Edition' => 'required',
              'Date_Edition' => 'required|date',
              'Collection' => 'required',
              'Theme' => 'required',
              'Annee' => 'required|integer',
              'Titre' => 'required',
              'Auteur' => 'required',
              'langue' => 'required', // Adjust the name to 'langue' since it's the field name in your form
              'ISSN' => 'required',
              'Cote' => 'required',
              'Nombre_Exemplaire' => 'required|integer',
              'Edition_MMSP' => 'required|integer',
              'Nouvelle_Aq' => 'required|integer',
              'Collation' => 'required'
          ]);

          // Convert the radio button values to integer 1 or 0
          $data['Edition_MMSP'] = (int) $request->input('Edition_MMSP', 0);
          $data['Nouvelle_Aq'] = (int) $request->input('Nouvelle_Aq', 0);

          DB::table('periodique')->insert($data);

          return redirect('/pages/Periodique')->with('success', 'Periodique created successfully.');
      
  }


public function create()
    {
        // Fetch unique values for Collection, Theme, and Langue fields from the documents table
        $collections = Document::distinct('collation')->pluck('collation');
        $themes = Document::distinct('theme')->pluck('theme');
        $langues = Document::distinct('Lang')->pluck('Lang');

        return view('content.pages.Periodique', compact('collections', 'themes', 'langues'));
    }
}

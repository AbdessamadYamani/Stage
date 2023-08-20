<?php

namespace App\Http\Controllers\pages;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Livre;


class LivreController extends Controller
{
    public function index()
    {
        $livres = Livre::all();
        $editable = true; // Set this to true when you want to enable editing

        return view('content.pages.Livre', compact('livres', 'editable'));
    }

   

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'Numero_Edition' => 'required',
        'Date_Edition' => 'required',
        'Collection' => 'required',
        'Theme' => 'required',
        'Annee' => 'required|integer|min:0',
        'Auteur' => 'required',
        'Langue' => 'required',
        'ISSN' => 'required',
        'Cote' => 'required',
        'Nombre_Exemplaire' => 'required|integer|min:0',
        'Edition_MMSP' => 'required',
        'Nouvelle_Aq' => 'required',
        'Collation' => 'required',
    ]);

    Livre::create($validatedData);

    return redirect()->route('livre.index')->with('success', 'Livre added successfully.');
}

public function edit($id)
{
    $livre = Livre::find($id);

    if (!$livre) {
        return redirect()->route('livre.index')->with('error', 'Livre not found.');
    }

    $editable = true; // Assuming you want the fields to be editable by default when accessing the edit page.

    return view('livre.edit', compact('livre', 'editable'));
}

public function update(Request $request, $id)
{
    $livre = Livre::findOrFail($id);

    if ($request->has('Valider')) {
        // Perform validation and update the Livre record
        $validatedData = $request->validate([
            'Numero_Edition' => 'required',
            'Date_Edition' => 'required',
            'Collection' => 'required',
            'Theme' => 'required',
            'Annee' => 'required|integer|min:0',
            'Auteur' => 'required',
            'Langue' => 'required',
            'ISSN' => 'required',
            'Cote' => 'required',
            'Nombre_Exemplaire' => 'required|integer|min:0',
            'Edition_MMSP' => 'required',
            'Nouvelle_Aq' => 'required',
            'Collation' => 'required',
        ]);

        $livre->update($validatedData);

        return redirect()->route('livre.index')->with('success', 'Livre updated successfully.');
    }

    // Handle the case when "Modify" is clicked
    $editable = true; // Set the $editable variable to true for the edit mode
    $livres = Livre::all(); // Get all Livres for displaying the table
    return view('content.pages.Livre', compact('livres', 'editable'));
}


public function destroy($id)
{
    $livre = Livre::findOrFail($id);
    $livre->delete();

    return redirect()->route('livre.index')->with('success', 'Livre deleted successfully.');
}

}

<?php

namespace App\Http\Controllers\pages;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\authenications;
use App\Models\utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

class SettingsController extends Controller
{
    public function showSettings()
    {
        $userId = session('id_user'); // Get the user's id from the session
        
        $user = utilisateur::find($userId);
       // dd($userId); // Debugging line
        return view('content.pages.Settings', compact('user'));
        if (!$user) {
            return redirect()->route('content.pages.Settings')->with('error', 'User not found.');
        }
    }

    public function updateSettings(Request $request)
    {
        $userId = session('user_id'); // Get the user's id from the session
        $user = Utilisateur::find($userId); // Retrieve the user by id
    
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'current_password' => 'required|password', // Custom validation rule
            'new_password' => 'nullable|min:6', // Optional new password
            // Add validation rules for other fields
        ]);
    
        // Verify the current password
        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->route('settings')->with('error', 'Current password is incorrect.');
        }
    
        // Update user data
        $user->nom = $request->input('nom');
        $user->prenom = $request->input('prenom');
    
        // Update the password if a new one is provided
        if ($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }
    
        // Update other user properties as needed
    
        $user->save();
    
        return redirect()->route('settings')->with('success', 'User information updated successfully.');
    }
    
}

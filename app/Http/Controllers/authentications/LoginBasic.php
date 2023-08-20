<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\authenications;
use App\Models\utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\QueryException;

class LoginBasic extends Controller
{
  public function index()
    {
        return view('content.authentications.auth-login-basic');
    }

    public function login(Request $request)
    {
        $request->validate([
            'password' => 'required',
            'email' => 'required',
        ]);

        $enteredPassword = $request->input('password');
        $enteredEmail = $request->input('email');

        // Enable query logging
        DB::connection()->enableQueryLog();

        // Retrieve user with matching email and password
        $matchingUser = utilisateur::where('email', $enteredEmail)
            ->where('password', $enteredPassword)
            ->first();

            session(['id_user' => $matchingUser->id_user]);

        // Retrieve the logged queries
        $queries = DB::getQueryLog();
        Session::flush(); 
        // Get the most recent query (which is the user retrieval)
        $userQuery = end($queries);

        if ($matchingUser) {
            // Redirect to the dashboardAnalytics function
            session(['user' => $matchingUser]);
            session(['id_user' => $matchingUser->id_user]);
            return redirect()->route('dash', ['name' => $matchingUser->prenom . ' ' . $matchingUser->nom]);
        } else {
            // Get the HTTP response status
            $responseStatus = http_response_code();

            // Build the error message with the query, values, and response status
            $errorMessage = 'Invalid email or password. Query: ' . $userQuery['query'] . ' with values: ' . json_encode($userQuery['bindings']) . ' Response Status: ' . $responseStatus;

            // Redirect back with the error message
            return back()->with('error', $errorMessage);
        }
    }
    public function logout()
{
    Auth::logout();
    Session::flush(); 

    return redirect()->route('out'); // Redirect to the login page after logout
}



    
    
    


    




    
      





    
    
    
    
    
}


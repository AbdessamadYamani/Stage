<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\emails;
use Illuminate\Support\Facades\Mail;

class AgentController extends Controller
{
    public function index()
    {
        $agents = Agent::all();
        $editable = false; // Set $editable to false by default
        return view('content.pages.Agent', compact('agents', 'editable'));
    }
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'Fullname' => 'required',
        'Direction' => 'required',
        'EmailAdd' => 'required|email|unique:agent', // Use 'agents' table
    ]);

    $agent = new Agent();
    $agent->Fullname = $validatedData['Fullname'];
    $agent->Direction = $validatedData['Direction'];
    $agent->EmailAdd = $validatedData['EmailAdd'];
    $agent->created_at = now(); // Insert current date
    $agent->save();

    return redirect()->route('agent.index')->with('success', 'Agent added successfully.');
}
    public function edit($id)
    {
        $agent = Agent::find($id);

        if (!$agent) {
            return redirect()->route('agent.index')->with('error', 'Agent not found.');
        }

        $editable = true; // Set $editable to true for the edit view
        return view('content.pages.Agent.index', compact('agents', 'agent', 'editable'));
    }

    public function update(Request $request, $id)
    {
        $agent = Agent::findOrFail($id);

        if ($request->has('Valider')) {
            $validatedData = $request->validate([
                'Fullname' => 'required',
                'Direction' => 'required',
                'EmailAdd'=>'required'
            ]);

            $agent->update($validatedData);

            return redirect()->route('agent.index')->with('success', 'Agent updated successfully.');
        }

        // Handle the case when "Modify" is clicked
        $editable = true; // Set $editable to true for the edit view
        return view('content.pages.Agent.index', compact('agents', 'agent', 'editable'));
    }

    public function destroy($id)
    {
        $agent = Agent::findOrFail($id);
        $agent->delete();

        return redirect()->route('agent.index')->with('success', 'Agent deleted successfully.');
    }
    public function sendEmail(Request $request)
{
    $validatedData = $request->validate([
        'subject' => 'required',
        'content' => 'required',
        'receiver_id' => 'required|exists:agent,id_Agent',
    ]);

    $agent = Agent::findOrFail($validatedData['receiver_id']);

    // Send the email using the mailable class
    //Mail::to($agent->EmailAdd)->send(new SendEmail($validatedData['subject'], $validatedData['content']));

    // Store the email in the database
    emails::create([
        'EmailAdd' => $agent->EmailAdd,
        'subject' => $validatedData['subject'],
        'content' => $validatedData['content'],
        'receiver_id' => $agent->id_Agent,
    ]);

    return redirect()->route('agent.index')->with('success', 'Email sent and stored successfully.');
}





}

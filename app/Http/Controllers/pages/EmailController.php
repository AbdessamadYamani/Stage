<?php

namespace App\Http\Controllers\pages;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Email; 

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $receiverId = $request->input('receiver_id');
        $subject = $request->input('subject');
        $content = $request->input('content');

        // Get the receiver's email
        $receiver = Agent::findOrFail($receiverId);

        // Send the email
        Mail::to($receiver->Email)->send(new SendEmail($subject, $content));

        // Save the email to the database
        Email::create([
            'EmailAdd' => $receiver->Email,
            'subject' => $subject,
            'content' => $content,
            'receiver_id' => $receiverId,
        ]);

        return redirect()->back()->with('success', 'Email sent successfully.');
    }
}

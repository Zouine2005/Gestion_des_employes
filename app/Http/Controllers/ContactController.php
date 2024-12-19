<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
            ]);
    
            $data = $request->only('name', 'email', 'subject', 'message');
    
            // Envoi de l'email
            Mail::send([], [], function ($message) use ($data) {
                $message->from($data['email'], $data['name'])
                        ->to('zouinemohamade@gmail.com') // Votre email de réception
                        ->subject($data['subject'])
                        ->setBody("Message: " . $data['message']);
            });
    
            return response()->json(['success' => 'Votre message a été envoyé avec succès!']);
        } catch (\Throwable $e) {
            return response()->json(['error' => $e->getMessage()], 500); // Renvoie l'erreur en JSON
        }
    }
}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function store(Request $request)
    {
        if ($request->filled('website_url')) {
            return redirect('/contactenos')->with('front_message_success', 'Solicitud validada y enviada con éxito');
        }

        $request->validate([
            'name' => ['required', 'min:3', 'max:25'],
            'email' => ['required', 'email'],
            'message' => ['required', 'min:10'],
        ]);

        $payload = [
            'ticket' => [
                'subject' => $request->input('subject', 'Contacto web'),
                'comment' => [
                    'body' => $request->input('message'),
                ],
                'requester' => [
                    'locale_id' => '1',
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                ],
                'priority' => 'normal',
                'tags' => ['CreateAPIFormFGS'],
            ],
        ];

        $token = env('ZENDESK_API_TOKEN');
        $email = env('ZENDESK_API_EMAIL', 'jarodriguez@fundaciongruposocial.co');

        if (! $token) {
            Log::warning('ZENDESK_API_TOKEN missing; contact form not submitted.');

            return redirect('/contactenos')->with('front_message_error', 'Tenemos un problema con el envío. Inténtelo de nuevo más tarde...');
        }

        $response = Http::withBasicAuth($email.'/token', $token)
            ->acceptJson()
            ->post('https://fundaciongruposocialhelp.zendesk.com/api/v2/tickets.json', $payload);

        if ($response->successful() && isset($response->json()['ticket'])) {
            return redirect('/contactenos')->with('front_message_success', 'Solicitud validada y enviada con éxito');
        }

        Log::warning('Zendesk contact failed', ['body' => $response->body()]);

        return redirect('/contactenos')->with('front_message_error', 'Tenemos un problema con el envío. Inténtelo de nuevo más tarde...');
    }
}

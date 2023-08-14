<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class EmailController extends Controller
{
    protected function validateRecaptcha($recaptchaResponse) {
        $client = new \GuzzleHttp\Client();
        $response = $client->post(
            'https://www.google.com/recaptcha/api/siteverify', [
                'form_params' =>
                    [
                        'secret' => env('RECAPTCHA_SECRET_KEY'),
                        'response' => $recaptchaResponse
                    ]
            ]
        );
        $body = json_decode((string)$response->getBody());

        // Log variables for debugging
        // \Log::info('Recaptcha Response:', ['response' => $recaptchaResponse]);
        // \Log::info('Body:', ['body' => $body]);

        return $body->success;
    }

    public function sendEmail(Request $request)
    {
        if (!$this->validateRecaptcha($request->recaptcha)) {
            return response()->json(['errors' => ['recaptcha' => 'Überprüfung fehlgeschlagen. Bitte versuche es erneut.']], 422);
        }

        $validator = Validator::make($request->all(), [
            'form-name' => 'required',
            'form-tel' => 'nullable|phone:AUTO,DE,US,EU',
            'form-mail' => 'required|email',
            'form-comment' => 'nullable|string|min:10|max:500',
            'form-date' => 'required',
            'items.*.selected.name' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value === 'Auswahl') {
                        $fail('Bitte wähle ein passendes Budget aus.');
                    }
                },
            ],
            'items2.*.selected.name' => [
                'required',
                function ($attribute, $value, $fail) {
                    if ($value === 'Auswahl' || $value === '/') {
                        $fail('Bitte gebe die gewünschte Anzahl an.');
                    }
                },
            ],
            'services.*.selected' => 'required|array|min:1',
        ], [
            'form-name.required' => 'Bitte verrat uns wie du heißt.',
            'form-tel.phone'=> 'Bitte verwende eine gültige Telefonnummer.',
            'form-mail.required' => 'Bitte gib deine E-Mail-Adresse an.',
            'form-mail.email' => 'Bitte gib eine gültige E-Mail-Adresse an.',
            'form-comment.min' => 'Deine Nachricht muss mindestens 10 Zeichen lang sein.',
            'form-comment.max' => 'Deine Nachricht darf maximal 500 Zeichen lang sein.',
            'form-date.required' => 'Bitte geben Sie den gewünschten Zeitraum an.',
            'items.required' => 'Bitte wähle ein passendes Budget aus.',
            'services.*.selected.required' => 'Bitte wähle eine oder mehrere unserer Leistungen aus.',
        ]);

        try {
            $validator->validate();
        } catch (ValidationException $e) {
            $errors = $e->validator->errors();
            return response()->json(['errors' => $errors], 422);
        }

        // E-Mail senden
        Mail::to(env('CONTACT_EMAIL', config('mail.from.address')))->send(new ContactFormMail($request->all()));

        // Erfolgsantwort zurückgeben
        return response()->json(['success' => true]);
    }
}
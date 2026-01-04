<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\OpenAIService;
use Illuminate\Support\Facades\Http;


class AIChatController extends Controller
{
    public function ask(Request $request)
    {
        try {
            
            $prompt = $request->prompt;

            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . config('services.openai.key'),
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful and knowledgeable medical assistant for a hospital management system. Assist doctors with diagnosis, drug interactions, and general medical queries. Be concise and professional.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
            ]);

            // Dump full response to debug
            $responseData = $response->json();
            if (!$response->ok()) {
                return response()->json([
                    'error' => 'API error',
                    'details' => $responseData,
                ], 500);
            }

            $reply = $responseData['choices'][0]['message']['content'] ?? 'No reply received';

            return response()->json([
                'reply' => $reply,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Request failed',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
    
}

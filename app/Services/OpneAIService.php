namespace App\Services;

use OpenAI\Client;

class OpenAIService
{
    protected $client;

    public function __construct()
    {
        $this->client = Client::create([
            'api_key' => config('services.openai.key'),
        ]);
    }

    public function chat(array $messages): string
    {
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => $messages,
        ]);

        return $response->choices[0]->message->content;
    }
}

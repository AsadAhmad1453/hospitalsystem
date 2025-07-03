<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class WeatherService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.openweather.key');
    }

    public function getWeatherByCoordinates($lat, $lon)
    {
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'lat' => $lat,
            'lon' => $lon,
            'appid' => $this->apiKey,
            'units' => 'metric',
        ]);

        return $response->json();
    }


    public function getWeatherByCity($city)
    {
        $url = 'https://api.openweathermap.org/data/2.5/weather';

        $response = Http::get($url, [
            'q' => $city,
            'appid' => $this->apiKey,
            'units' => 'metric',
        ]);

        if ($response->successful()) {
            return $response->json();
        }

        return ['error' => 'Unable to fetch weather data.'];
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WeatherService;

class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function apiWeather(Request $request)
    {
        $lat = $request->query('lat');
        $lon = $request->query('lon');
        $city = $request->query('city');

        $weatherService = new WeatherService();

        if ($lat && $lon) {
            $weather = $weatherService->getWeatherByCoordinates($lat, $lon);
        } elseif ($city) {
            $weather = $weatherService->getWeatherByCity($city);
        } else {
            return response()->json(['error' => 'No location provided'], 400);
        }

        return response()->json([
            'temp' => $weather['main']['temp'] ?? null,
            'description' => $weather['weather'][0]['description'] ?? null
        ]);
    }


    public function show(Request $request)
    {
        $city = $request->get('city', 'London');
        $weather = $this->weatherService->getWeatherByCity($city);

        return view('weather.show', compact('weather', 'city'));
    }
}

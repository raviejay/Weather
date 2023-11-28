<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $weather = "";
        $error = "";

        // Check if the 'city' parameter is present in the request
        if ($request->has('city')) {
            // Get the 'city' parameter from the request
            $city = $request->input('city');

            $urlContents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=" . urlencode($city) . "&appid=04a5c03cc3a8fe0824c27a591db37d9e");

            $weatherArray = json_decode($urlContents, true);

            if ($weatherArray['cod'] == 200) {
                $weather = "" . $city . " is currently '" . $weatherArray['weather'][0]['description'] . "'. ";

                $tempInCelcius = intval($weatherArray['main']['temp'] - 273) ."°C";

                $wind = $weatherArray['wind']['speed'] . "m/s.";
            
            } else {
                $error = "Could not find city - please try again.";
            }
        }

        // Pass the $weather and $error variables to the view
        return view('weather', [
            'weather' => $weather,
            'error' => $error,
            'tempInCelcius' => $tempInCelcius,
            'wind' => $wind,

        ]);
    }
}

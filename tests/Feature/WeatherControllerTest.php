<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetWeather()
    {
        // Simulate a request with the 'city' parameter
        $response = $this->get('/weather?city=London');
        //dd($response->getContent());
        // Assert the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert that the response contains expected content
        $response->assertSeeText('The weather in London is currently');
    }
}

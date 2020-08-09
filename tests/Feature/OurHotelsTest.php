<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OurHotelsTest extends TestCase
{
    /**
     * @test
     */
    public function ourhotels_get()
    {
        $response = $this->json('GET', '/');
        $response->assertStatus(200);

        $response = $this->json('GET', '/hotels');
        $response->assertStatus(200);

    }

    /**
     * @test
     */
    public function ourhotels_filter()
    {    
        $response = $this->json('GET', '/hotels?city=cairo');
        $response->assertStatus(200);
    
        $response = $this->json('GET', '/hotels?numberOfAdults=4');
        $response->assertStatus(200);
    
        $response = $this->json('GET', '/hotels?from_date=2020-10-10');
        $response->assertStatus(200);
    
        $response = $this->json('GET', '/hotels?to_date=2020-10-10');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function ourhotels_filters()
    {  
        $response = $this->json('GET', '/hotels?city=cairo&numberOfAdults=4&from_date=2020-10-10&to_date=2020-10-10');
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BestHotelsTest extends TestCase
{
    /**
     * @test
     */
    public function besthotels_get()
    {
        $response = $this->json('GET', '/besthotels');
        $response->assertStatus(200);       
    }

    /**
     * @test
     */
    public function besthotels_filter()
    {    
        $response = $this->json('GET', '/besthotels?city=cairo');
        $response->assertStatus(200);
    
        $response = $this->json('GET', '/besthotels?numberOfAdults=4');
        $response->assertStatus(200);
    
        $response = $this->json('GET', '/besthotels?from_date=2020-10-10');
        $response->assertStatus(200);
    
        $response = $this->json('GET', '/besthotels?to_date=2020-10-10');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function besthotels_filters()
    {  
        $response = $this->json('GET', '/besthotels?city=cairo&numberOfAdults=4&from_date=2020-10-10&to_date=2020-10-10');
        $response->assertStatus(200);
    }
}

<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TopHotelTest extends TestCase
{
    /**
     * @test
     */
    public function tophotel_get()
    {
        $response = $this->json('GET', '/tophotel');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function tophotel_filter()
    {    
        $response = $this->json('GET', '/tophotel?city=cairo');
        $response->assertStatus(200);
    
        $response = $this->json('GET', '/tophotel?numberOfAdults=4');
        $response->assertStatus(200);
    
        $response = $this->json('GET', '/tophotel?from_date=2020-10-10');
        $response->assertStatus(200);
    
        $response = $this->json('GET', '/tophotel?to_date=2020-10-10');
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function tophotel_filters()
    {  
        $response = $this->json('GET', '/tophotel?city=cairo&numberOfAdults=4&from_date=2020-10-10&to_date=2020-10-10');
        $response->assertStatus(200);
    }

}

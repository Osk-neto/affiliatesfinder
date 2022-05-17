<?php

namespace Tests\Unit;

use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //test if the home page have status 200
    public function test_home_page_render_status()
    {
        
        $response = $this->get('/affiliates');
        $this->withoutExceptionHandling();
        $response->assertStatus(200);
        
    }

    
}

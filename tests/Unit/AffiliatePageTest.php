<?php

namespace Tests\Unit;

use Tests\TestCase;

class AffiliatePageTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    //test if the file exist 
    public function test_if_exist_affiliatetxt_file()
    {
        
        

        $this->assertFileExists(public_path('affiliates.txt'));
    }
    
    //test if the header rendered
    public function test_affiliate_page_header_render()
    {
        $response = $this->get('/affiliates');
        $response->assertSee('Affiliates', $escaped = true);


    }
    //test if the table with affiliate datas is rendered
    public function test_affiliate_page_table_render()
    {
        $response = $this->get('/affiliates');
        $response->assertSee(['Affiliate ID','Affiliate Name'], $escaped = true);


    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    //

    function affiliatesView(){

        $affiliate_array_decoded = [];
        $affiliate_array_100km= [];
        // open file and get the contents, storing in a variable
        $affiliate_text = file_get_contents(public_path('affiliates.txt'));
        //turn the string into array
        $affiliate_array = explode("\n",$affiliate_text);    
        //using loop to decode each string inside the array and store in a new array
        foreach ($affiliate_array as $value ) {
           
            $affiliate_array_decoded[] =json_decode($value);
            
        }
        //using loop to calculate the distance between the points and check if it is less or equal to 100km.
        foreach ($affiliate_array_decoded as $value ) {
            //Using the Vincenty formula to find the distance
            $latitude_gambling = 53.3340285;
            $longitude_gambing = -6.2535495;
            $latitude_affiliate = $value->latitude;
            $longitude_affiliate = $value->longitude;
            
            $theta = $longitude_gambing - $longitude_affiliate;
            $distance = sin(deg2rad($latitude_gambling)) * sin(deg2rad($latitude_affiliate)) +  cos(deg2rad($latitude_gambling)) * cos(deg2rad($latitude_affiliate)) * cos(deg2rad($theta));
            $distance = acos($distance);
            $distance = rad2deg($distance);
            $distance_miles = $distance * 60 * 1.1515;
            $distance_in_km = $distance_miles *1.609344;

            //storing the objects with distance less or equal to 100km in a new array
            if($distance_in_km <= 100){
                $affiliate_array_100km[] = $value;
            }
            //Sort the array using the affiliate_id
            usort($affiliate_array_100km, function($a, $b) { 
                return $a->affiliate_id < $b->affiliate_id ? -1 : 1; 
            });
        }
        //returning the to the view with the array of affiliates with 100km of distance
        return view('affiliate.affiliates-view',[
            'affiliate_100km' =>$affiliate_array_100km,
        ]);
    }
    
}

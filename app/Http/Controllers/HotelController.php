<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nahid\JsonQ\Jsonq;

use App\Http\Requests;
use App\Hotel;
use App\Http\Resources\Hotel as HotelResource;


class HotelController extends Controller
{
    // index function for returning API for hotels/OurHotels
    function index(Request $request){

        if($request->from_date > $request->to_date){ //if user's filter has from_date after to_date
            return 'Please enter valid dates';
        }

        $path = storage_path()."\json\hotels.json"; //the path for the json containing the hotels data

        $jsonq = new Jsonq($path); //using jsonq for json filtering and sorting
        $res = $jsonq->from('hotels');
        if ($request->has('numberOfAdults')) { //checking if numberOfAdults is being considered as a filter 
            $res = $res
            ->where('numberOfAdults', '>=', $request->numberOfAdults); //keeping only hotels with numberofadults more than what the user needs
        }
        if ($request->has('city')) { //checking if city is being considered as a filter
            $res = $res
            ->whereContains('city', strtolower($request->city)); //keeping only hotels with city containing a substring from what the user inputs
        }
        if ($request->has('from_date')) { //checking if user is filtering by from_date
            $res = $res
            ->where('from_date', '<=', $request->from_date); //keeping hotels with "availability-from" date before or equal user's from_date 
        }
        if ($request->has('to_date')) { //checking if the user is filtering by to_date
            $res = $res
            ->where('to_date', '>=', $request->to_date); //keeping hotels with "availability-to" date after or equal user's to_date
        }
        
        $res = $res->sortBy('hotelRate', 'desc')->get(); //sorting result by hotel rate

        for ($x = 0; $x <= sizeof($res); $x++) { //looping for removing columns that are not going to be shown to user
            unset($res[$x]['numberOfAdults']);
            unset($res[$x]['discount']);
            unset($res[$x]['from_date']);  
            unset($res[$x]['to_date']);  
          }

        if(empty($res)){ //if no hotels were found within the filters users put
            return 'No hotels found within these entries';
        }
        else{
            $res = json_encode($res, JSON_PRETTY_PRINT);
            //beautifying the output json by having break lines and spaces
            $res = str_replace(array("{", "}", '","'),
             array("{<br /><br/>&nbsp;&nbsp;&nbsp;&nbsp;", "<br /><br />}", '",<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;"'), $res);
            return $res;
        }
    }

    
    function bestHotels(Request $request){
       
        if($request->from_date > $request->to_date){ //if user's filter has from_date after to_date
            return 'Please enter valid dates';
        }

        $path = storage_path()."\json\hotels.json"; //the path for the json containing the hotels data

        $jsonq = new Jsonq($path); //using jsonq for json filtering and sorting
        $res = $jsonq->from('hotels');
        $res = $res->where('provider', '==', 'BestHotels'); //keeping only hotels with numberofadults more than what the user needs
        if ($request->has('numberOfAdults')) { //checking if numberOfAdults is being considered as a filter 
            $res = $res
            ->where('numberOfAdults', '>=', $request->numberOfAdults); //keeping only hotels with numberofadults more than what the user needs
        }
        if ($request->has('city')) { //checking if city is being considered as a filter
            $res = $res
            ->whereContains('city', strtolower($request->city)); //keeping only hotels with city containing a substring from what the user inputs
        }
        if ($request->has('from_date')) { //checking if user is filtering by from_date
            $res = $res
            ->where('from_date', '<=', $request->from_date); //keeping hotels with "availability-from" date before or equal user's from_date 
        }
        if ($request->has('to_date')) { //checking if the user is filtering by to_date
            $res = $res
            ->where('to_date', '>=', $request->to_date); //keeping hotels with "availability-to" date after or equal user's to_date
        }
        
        $res = $res->sortBy('hotelRate', 'desc')->get(); //sorting result by hotel rate

        for ($x = 0; $x <= sizeof($res); $x++) { //looping for removing columns that are not going to be shown to user
            unset($res[$x]['numberOfAdults']);
            unset($res[$x]['discount']);
            unset($res[$x]['from_date']);  
            unset($res[$x]['to_date']);  
          }

        if(empty($res)){ //if no hotels were found within the filters users put
            return 'No hotels found within these entries';
        }
        else{
            $res = json_encode($res, JSON_PRETTY_PRINT);
            //beautifying the output json by having break lines and spaces
            $res = str_replace(array("{", "}", '","'),
             array("{<br /><br/>&nbsp;&nbsp;&nbsp;&nbsp;", "<br /><br />}", '",<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;"'), $res);
            return $res;
        }
    }


    function topHotel(Request $request){
        
        if($request->from_date > $request->to_date){ //if user's filter has from_date after to_date
            return 'Please enter valid dates';
        }

        $path = storage_path()."\json\hotels.json"; //the path for the json containing the hotels data

        $jsonq = new Jsonq($path); //using jsonq for json filtering and sorting
        $res = $jsonq->from('hotels');
        $res = $res->where('provider', '==', 'TopHotel'); //keeping only hotels with numberofadults more than what the user needs
        if ($request->has('numberOfAdults')) { //checking if numberOfAdults is being considered as a filter 
            $res = $res
            ->where('numberOfAdults', '>=', $request->numberOfAdults); //keeping only hotels with numberofadults more than what the user needs
        }
        if ($request->has('city')) { //checking if city is being considered as a filter
            $res = $res
            ->whereContains('city', strtolower($request->city)); //keeping only hotels with city containing a substring from what the user inputs
        }
        if ($request->has('from_date')) { //checking if user is filtering by from_date
            $res = $res
            ->where('from_date', '<=', $request->from_date); //keeping hotels with "availability-from" date before or equal user's from_date 
        }
        if ($request->has('to_date')) { //checking if the user is filtering by to_date
            $res = $res
            ->where('to_date', '>=', $request->to_date); //keeping hotels with "availability-to" date after or equal user's to_date
        }
        
        $res = $res->sortBy('hotelRate', 'desc')->get(); //sorting result by hotel rate

        for ($x = 0; $x <= sizeof($res); $x++) { //looping for removing columns that are not going to be shown to user
            unset($res[$x]['numberOfAdults']);
            unset($res[$x]['discount']);
            unset($res[$x]['from_date']);  
            unset($res[$x]['to_date']);  
          }

        if(empty($res)){ //if no hotels were found within the filters users put
            return 'No hotels found within these entries';
        }
        else{
            $res = json_encode($res, JSON_PRETTY_PRINT);
            //beautifying the output json by having break lines and spaces
            $res = str_replace(array("{", "}", '","'),
             array("{<br /><br/>&nbsp;&nbsp;&nbsp;&nbsp;", "<br /><br />}", '",<br /><br />&nbsp;&nbsp;&nbsp;&nbsp;"'), $res);
            return $res;
        }
    }

}


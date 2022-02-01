<?php

namespace App\Http\Controllers\WEB;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

class AccommodationsController extends Controller
{
    public function index($locale)
    {
        $lang = 'en';
        if($locale == 'en')
            $lang = 'es';
            
        return view('index');
    }



    public function accommodations($locale, Request $request)
    {
        // dd ('OK');
        $empieza    = $request->input('empieza');
        $code       = $request->input('code');
        $startDate  = $request->input('startDate');
        $endDate    = $request->input('endDate');
        $adults     = $request->input('adults');
        $kids       = $request->input('kids');
        $rooms      = $request->input('rooms');
        $now        = now();
       // $converted = Str::substr('The Laravel Framework', 4, 7);  // Laravel
       //22-09-2021 - 23-09-2021
        $day1    = Str::substr($empieza, 0, 2);
        $month1  = Str::substr($empieza, 3, 2);
        $year1   = Str::substr($empieza, 6, 4);
        $day2    = Str::substr($empieza, 13, 2);
        $month2  = Str::substr($empieza, 16, 2);
        $year2   = Str::substr($empieza, 19, 4);


        return view('storefront.accommodations')->with([
            'empieza'       => $empieza,
            'code'          => $code,
            'startDate'     => $startDate,
            'endDate'       => $endDate,
            'adults'        => $adults,
            'kids'          => $kids,
            'rooms'         => $rooms,
            'day1'          => $day1,
            'month1'        => $month1,
            'year1'         => $year1,
            'day2'          => $day2,
            'month2'        => $month2,
            'year2'         => $year2,

        ]); 
    }

    

    public function facebookfunction()
    {
        return redirect()->away('www.facebook.com/AdharaExpress');

    }




}

<?php

namespace App\Http\Controllers\WEB\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index($locale)
    {
        $lang = 'en';
        if($locale == 'en')
            $lang = 'es';
            
        return view('index')->with([
            'link1' => 'b01b30',
            'link2' => '',
            'link3' => '',
            'link4' => '',

        ]); 
    }

    public function rooms($locale)
    {
        return view('storefront.rooms')->with([
            'link1' => '',
            'link2' => 'b01b30',
            'link3' => '',
            'link4' => '',
        ]); 




        

    }

    public function contact($locale)
    {
        return view('storefront.contact')->with([
            'link1' => '',
            'link2' => '',
            'link3' => 'b01b30',
            'link4' => '',
        ]); 
    }

    public function covid($locale)
    {
        return view('storefront.covid')->with([
            'link1' => '',
            'link2' => '',
            'link3' => '',
            'link4' => 'b01b30',
        ]); 
    }

}

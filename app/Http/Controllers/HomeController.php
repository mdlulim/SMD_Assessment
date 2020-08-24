<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // loading home page with  list of countries 
        $response = Http::get('https://restcountries.eu/rest/v2/all');
        $countries = $response->json();
        $data = array();
        $cborders = array();
        $selectedCountry =array('name' => '');
        array_push($data, $countries);
        array_push($data, $cborders);
        array_push($data, $selectedCountry);
        return view('home', ['data' => $data]);
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function borders(Request $request)
    {
        // get selected country and return  borders
        $url = 'https://restcountries.eu/rest/v2/';
        $validatedData = $request->validate(['country' => 'required']);
        $countrycode     = $request->input('country');
        $response = Http::get($url.'alpha/'.$countrycode.'');
        $res = $response->json();
        $selectedCountry = $res;
        $resultBorders = $res['borders'];

        $cborders = array();
        foreach ($resultBorders as $border){
            $response = Http::get($url.'alpha/'.$border.'');
            $country = $response->json();
            array_push($cborders, $country['name']);
        }

        $resCountry= Http::get($url.'all');
        $countries = $resCountry->json();
        $data = array();
        array_push($data, $countries);
        array_push($data, $cborders);
        array_push($data, $selectedCountry);
        //var_dump($data[2]);die;
        return view('home', ['data' => $data]);
    }
}

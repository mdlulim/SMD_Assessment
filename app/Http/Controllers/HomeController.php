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
        $response = Http::get('https://restcountries.eu/rest/v2/all');
        $countries = $response->json();
        $myborders = array();
        return view('home', compact('countries', 'myborders'));
    }

      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function borders(Request $request)
    {
        $validatedData = $request->validate(['country' => 'required']);
        $countrycode     = $request->input('country');
        $response = Http::get('https://restcountries.eu/rest/v2/alpha/'.$countrycode.'');
        $res = $response->json();
        $resultBorders = $res['borders'];

        $cborders = array();
        foreach ($resultBorders as $border){
            $response = Http::get('https://restcountries.eu/rest/v2/alpha/'.$border.'');
            $country = $response->json();
            array_push($cborders, $country['name']);
        }
        
        $resCountry= Http::get('https://restcountries.eu/rest/v2/all');
        $countries = $resCountry->json();

        return view('home', ['countries' => $countries], ['borders' => $cborders]);
    }
}

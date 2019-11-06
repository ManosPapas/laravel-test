<?php

namespace App\Http\Controllers;

class ApiPostcodeController extends Controller
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

    public function validate_postcode(String $postcode)
    {
    	$url = "http://api.postcodes.io/postcodes/" . $postcode;

		$response = \Unirest\Request::get($url);

		return ($response->code == "200") ? true : false ;
    }
}
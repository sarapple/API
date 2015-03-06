<?php namespace App\Http\Controllers;

class ApiController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$states = array('AL'=>"Alabama", 
			'AK'=>"Alaska", 
			'AZ'=>"Arizona", 
			'AR'=>"Arkansas", 
			'CA'=>"California", 
			'CO'=>"Colorado", 
			'CT'=>"Connecticut", 
			'DE'=>"Delaware", 
			'DC'=>"District Of Columbia", 
			'FL'=>"Florida", 
			'GA'=>"Georgia", 
			'HI'=>"Hawaii", 
			'ID'=>"Idaho", 
			'IL'=>"Illinois", 
			'IN'=>"Indiana", 
			'IA'=>"Iowa", 
			'KS'=>"Kansas", 
			'KY'=>"Kentucky", 
			'LA'=>"Louisiana", 
			'ME'=>"Maine", 
			'MD'=>"Maryland", 
			'MA'=>"Massachusetts", 
			'MI'=>"Michigan", 
			'MN'=>"Minnesota", 
			'MS'=>"Mississippi", 
			'MO'=>"Missouri", 
			'MT'=>"Montana",
			'NE'=>"Nebraska",
			'NV'=>"Nevada",
			'NH'=>"New Hampshire",
			'NJ'=>"New Jersey",
			'NM'=>"New Mexico",
			'NY'=>"New York",
			'NC'=>"North Carolina",
			'ND'=>"North Dakota",
			'OH'=>"Ohio", 
			'OK'=>"Oklahoma", 
			'OR'=>"Oregon", 
			'PA'=>"Pennsylvania", 
			'RI'=>"Rhode Island", 
			'SC'=>"South Carolina", 
			'SD'=>"South Dakota",
			'TN'=>"Tennessee", 
			'TX'=>"Texas", 
			'UT'=>"Utah", 
			'VT'=>"Vermont", 
			'VA'=>"Virginia", 
			'WA'=>"Washington", 
			'WV'=>"West Virginia", 
			'WI'=>"Wisconsin", 
			'WY'=>"Wyoming"
		);
		return view('api')->with('states', $states);
	}

	public function demographics($location)
	{	
		$url = "http://www.zillow.com/webservice/GetDemographics.htm?zws-id=X1-ZWz1e2k1znmknf_5jgqp&".$location;
		$obj = file_get_contents($url);
		$xml = simplexml_load_string($obj);
		$json = json_encode($xml);
		return $json;
	}
}
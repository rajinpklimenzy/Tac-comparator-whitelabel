<?php

namespace App\Http\Controllers\Subscription;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Ixudra\Curl\Facades\Curl;
use App\Models\ActiveCampaign;
use Auth;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
public function index()
    {


$client = new \GuzzleHttp\Client();    

    $request = $client->get('https://tariefchecker.api-us1.com/api/3/contacts',[
'headers' => [
'Accept' => 'application/json',
'Content-type' => 'application/json',
'Api-Token' => '3f69314bf2d12325004faa27a223f3096a8ab91f4a82aab05431f29c693d9ac63abf2684',


]]);
     $response = $request->getBody()->getContents();

$collection = json_decode($response, true);



$contacts=(object)$collection;
unset($contacts->result_code);
unset($contacts->result_message);
unset($contacts->result_output);
   
   
$cc=$contacts->contacts;
$total_contacts=$contacts->meta['total'];
$total_pages=$total_contacts/20;
       
$pages=(int)floor($total_pages);

return view('admin.subscription.list',compact('cc','pages'));

    }


   


    public function addContact()
    {
       return view('admin.subscription.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
       
$first_name=$request->f_name;
$last_name=$request->l_name;
$phone=$request->phone;
$email=$request->email;


// By default, this sample code is designed to get the result from your ActiveCampaign installation and print out the result
$url = 'https://tariefchecker.api-us1.com';


$params = array(

    // the API Key can be found on the "Your Settings" page under the "API" tab.
    // replace this with your API Key
    'api_key'      => '3f69314bf2d12325004faa27a223f3096a8ab91f4a82aab05431f29c693d9ac63abf2684',

    // this is the action that adds a contact
    'api_action'   => 'contact_add',

    // define the type of output you wish to get back
    // possible values:
    // - 'xml'  :      you have to write your own XML parser
    // - 'json' :      data is returned in JSON format and can be decoded with
    //                 json_decode() function (included in PHP since 5.2.0)
    // - 'serialize' : data is returned in a serialized format and can be decoded with
    //                 a native unserialize() function
    'api_output'   => 'serialize',
);

// here we define the data we are posting in order to perform an update
$post = array(
    'email'                    => $email,
    'first_name'               => $first_name,
    'last_name'                => $last_name,
    'phone'                    => $phone,
    
    
);

// This section takes the input fields and converts them to the proper format
$query = "";
foreach( $params as $key => $value ) $query .= urlencode($key) . '=' . urlencode($value) . '&';
$query = rtrim($query, '& ');

// This section takes the input data and converts it to the proper format
$data = "";
foreach( $post as $key => $value ) $data .= urlencode($key) . '=' . urlencode($value) . '&';
$data = rtrim($data, '& ');

// clean up the url
$url = rtrim($url, '/ ');

// This sample code uses the CURL library for php to establish a connection,
// submit your request, and show (print out) the response.
if ( !function_exists('curl_init') ) die('CURL not supported. (introduced in PHP 4.0.2)');

// If JSON is used, check if json_decode is present (PHP 5.2.0+)
if ( $params['api_output'] == 'json' && !function_exists('json_decode') ) {
    die('JSON not supported. (introduced in PHP 5.2.0)');
}

// define a final API request - GET
$api = $url . '/admin/api.php?' . $query;

$request = curl_init($api); // initiate curl object
curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
curl_setopt($request, CURLOPT_POSTFIELDS, $data); // use HTTP POST to send form data
//curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment if you get no gateway response and are using HTTPS
curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

$response = (string)curl_exec($request); // execute curl post and store results in $response

// additional options may be required depending upon your server configuration
// you can find documentation on curl options at http://www.php.net/curl_setopt
curl_close($request); // close curl object

if ( !$response ) {
    die('Nothing was returned. Do you have a connection to Email Marketing server?');
}

// This line takes the response and breaks it into an array using:
// JSON decoder
//$result = json_decode($response);
// unserializer
$result = unserialize($response);
// XML parser...
// ...






return redirect()->route('admin.subscriptions');

    }


    public function delete($id) 
    {



        // By default, this sample code is designed to get the result from your ActiveCampaign installation and print out the result
        $url = 'https://tariefchecker.api-us1.com';


        $params = array(
            // the API Key can be found on the "Your Settings" page under the "API" tab.
            // replace this with your API Key
            'api_key' => '3f69314bf2d12325004faa27a223f3096a8ab91f4a82aab05431f29c693d9ac63abf2684',
            // this is the action that deletes a contact based on the ID you provide
            'api_action' => 'contact_delete',
            // define the type of output you wish to get back
            // possible values:
            // - 'xml'  :      you have to write your own XML parser
            // - 'json' :      data is returned in JSON format and can be decoded with
            //                 json_decode() function (included in PHP since 5.2.0)
            // - 'serialize' : data is returned in a serialized format and can be decoded with
            //                 a native unserialize() function
            'api_output' => 'serialize',
            // ID of the contact you wish to delete
            'id' => $id,
                // if you wish to delete the contact only from certain lists, list them here
                //'listids[123]' => 123,
                //'listids[345]' => 345,
        );

// This section takes the input fields and converts them to the proper format
        $query = "";
        foreach ($params as $key => $value)
            $query .= urlencode($key) . '=' . urlencode($value) . '&';
        $query = rtrim($query, '& ');

// clean up the url
        $url = rtrim($url, '/ ');

// This sample code uses the CURL library for php to establish a connection,
// submit your data, and show (print out) the response.
        if (!function_exists('curl_init'))
            die('CURL not supported. (introduced in PHP 4.0.2)');

// If JSON is used, check if json_decode is present (PHP 5.2.0+)
        if ($params['api_output'] == 'json' && !function_exists('json_decode')) {
            die('JSON not supported. (introduced in PHP 5.2.0)');
        }

// define a final API request - GET
        $api = $url . '/admin/api.php?' . $query;

        $request = curl_init($api); // initiate curl object
        curl_setopt($request, CURLOPT_HEADER, 0); // set to 0 to eliminate header info from response
        curl_setopt($request, CURLOPT_RETURNTRANSFER, 1); // Returns response data instead of TRUE(1)
//curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE); // uncomment if you get no gateway response and are using HTTPS
        curl_setopt($request, CURLOPT_FOLLOWLOCATION, true);

        $response = (string) curl_exec($request); // execute curl fetch and store results in $response
// additional options may be required depending upon your server configuration
// you can find documentation on curl options at http://www.php.net/curl_setopt
        curl_close($request); // close curl object

        if (!$response) {
            die('Nothing was returned. Do you have a connection to Email Marketing server?');
        }

// This line takes the response and breaks it into an array using:
// JSON decoder
//$result = json_decode($response);
// unserializer
        $result = unserialize($response);
// XML parser...
// ...
// Result info that is always returned
        echo 'Result: ' . ( $result['result_code'] ? 'SUCCESS' : 'FAILED' ) . '<br />';
        echo 'Message: ' . $result['result_message'] . '<br />';

// The entire result printed out
        echo 'The entire result printed out:<br />';
        echo '<pre>';
        print_r($result);
        echo '</pre>';

// Raw response printed out
        echo 'Raw response printed out:<br />';
        echo '<pre>';
        print_r($response);
        echo '</pre>';

// API URL that returned the result
        echo 'API URL that returned the result:<br />';
        echo $api;

        return redirect()->route('admin.subscriptions');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscription $subscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscription $subscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscription $subscription)
    {
        //
    }
}

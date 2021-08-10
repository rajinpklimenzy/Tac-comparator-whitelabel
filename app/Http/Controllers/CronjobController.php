<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Postalcode;
use Log;

class CronjobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }    

    public function storeSupplier() 
    {
        $postalcode = Postalcode::all();

        foreach ($postalcode as $postalcodes) {

            
            $client = new \GuzzleHttp\Client();
            $request = $client->get('https://api.tariefchecker.be/calculations', [
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-type' => 'application/json',
                    'Authorization' => 'Basic anVuZToxNjUyNGZjOTdiMjUyYTBhOGU3YzYyNWUxNTk1NzdmYw=='
                ],
                'query' => [
                    'locale' => 'nl',
                    'postal_code' => $postalcodes->postalcode,
                    'usage["day"]' => '3500',
                ]
            ]);
            
            $response = $request->getBody()->getContents();
            $json = $request->getBody()->getContents();
            $json = json_decode($response, true);
            $products = collect($json);

            foreach ($products as $supplier) {
                
                Supplier::firstOrCreate([
                    'id' => $supplier['supplier']['id'],
                    'name' => $supplier['supplier']['name'],
                    'logo' => $supplier['supplier']['logo'],
                    'url' => $supplier['supplier']['url'],
                    'origin' => $supplier['supplier']['origin'],
                    'customer_rating' => $supplier['supplier']['customer_rating'],
                    'greenpeace_rating' => $supplier['supplier']['greenpeace_rating'],
                    'type' => $supplier['supplier']['type'],
                ]);
            }

            foreach ($products as $product) {

                $get_product = $product['product'];

                Product::firstOrCreate([
                            'supplier_id' => $product['supplier']['id'],
                            'product_id' => $get_product['id'],
                            'product_name' => $get_product['name'],
                            'postalcode_id' => $postalcodes->id,
                            'description' => $get_product['description'],
                            'tariff_description' => $get_product['tariff_description'],
                            'type' => $get_product['type'],
                            'contract_duration' => $get_product['contract_duration'],
                            'service_level_payment' => $get_product['service_level_payment'],
                            'service_level_invoicing' => $get_product['service_level_invoicing'],
                            'service_level_contact' => $get_product['service_level_contact'],
                            'customer_condition' => $get_product['customer_condition'],
                            'origin' => $get_product['origin'],
                            'pricing_type' => $get_product['pricing_type'],
                            'green_percentage' => $get_product['green_percentage'],
                            'subscribe_url' => $get_product['subscribe_url'],
                            'terms_url' => $get_product['terms_url'],
                            'ff_pro_rata' => $get_product['ff_pro_rata'],
                            'inv_period' => $get_product['inv_period'],
                            'validity_period' => json_encode($product['price']['validity_period']),
                            'totals' => json_encode($product['price']['totals']),
                            'breakdown' => json_encode($product['price']['breakdown']),
                ]);
            }
        }
        Log::info('Cronlogged at ' . date("F j, Y, g:i a"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

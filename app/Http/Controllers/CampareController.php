<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Feature;
use App\Models\ServiceLimitation;

class CampareController extends Controller
{
    
        public function get_compare_button(Request $request){
        
            $id=$request->ids;
            $collection =Session::get('product_data');             
            $count= count($id);
            
            
            
          
        
        $filter = $collection->filter(function($value, $key) use ($id) {

            $list_desings_ids = $id;
            if (in_array($value['product']['id'], $list_desings_ids)) {
                return true;
            }
        });
        
        $get_res = $filter->take(3);
       
       
        $html="";
        
            $html .= \View::make('elements.compare', compact('get_res'))->render();
      
            
        return $html;
        
        }

        public function get_compare(Request $request) {
        
        $elec =Session::get('elec');
        $gas =Session::get('gas');
        $po =Session::get('po');
        $customer_type=Session::get('customer_type');
        $postal_code=Session::get('postal_code');
        $usage_elec_day=Session::get('usage_elec_day');
        $usage_elec_night=Session::get('usage_elec_night');
        $usage_gas=Session::get('usage_gas');        
        $id = $request->ids; 
        $collection =Session::get('product_data');
        $ids = explode(',', $id);
        $product_id = (object) $ids;
        
        $filter = $collection->filter(function($value, $key) use ($ids) {

            $list_desings_ids = $ids;
            if (in_array($value['product']['id'], $list_desings_ids)) {
                return true;
            }
        });
        
        $get_res = $filter->take(3);
        $product = $get_res->all();        
        $res = array_values($product);
        $feature = Feature::select('features.id','contract_details.part','contract_details.field', 'features.condition', 'features.NL_description', 'features.FR_description')
                           ->join('contract_details', 'contract_details.id', '=', 'features.contract_id')
                           ->get();
        $service = ServiceLimitation::get();

        $html = ""; $per = "0"; $per1 = "0";
        
        $html .= \View::make('elements.compare-data', compact('res','postal_code','customer_type','usage_elec_day','usage_elec_night','usage_gas','feature','service'))->render();

        echo $html;
    }

}

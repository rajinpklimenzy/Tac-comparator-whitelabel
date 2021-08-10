<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Feature;
use App\Models\ServiceLimitation;
use Jenssegers\Agent\Agent;

class SortController extends Controller
{
    
    public function get_sort(Request $request){
        
    $sort=$request->sort;
    
        if(Session::get('product_data_sort')){
             
              $collection =$products= collect(Session::get('product_data_sort'));
              
         }else{
             
              $collection =$products= collect(Session::get('product_data'));
         }

        if($sort=='high'){      
  
        if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_slD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                 $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD_slD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $sorted = $products->sortBy(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortBy(function ($item, $key) {
                return $item['price']['totals']['year']['incl_slD_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
    } 
     if($sort=='low'){      
    
    
       if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                
                $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_slD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                
                $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                 $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD_slD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_slD_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
      
    }   
   if($sort=='most'){      
   
    
       if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')!='true'){
                
               
                
                $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_slD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            if(Session::get('promo')!='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                
                $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')!='true'){
                
                
                
                 $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD_slD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')!='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            
            if(Session::get('promo')=='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                 $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_promoD_slD_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
            
            if(Session::get('promo')!='true' && Session::get('domi')=='true' && Session::get('email')=='true'){
                
                
                $sorted = $products->sortByDesc(function ($product, $key) {
                    return $product['price']['totals']['year']['incl_slD_loyaltyD'];
                });

                $sorted->values()->all();
                
                
                $sortedSingle = $sorted->sortByDesc(function ($item, $key) {
                return $item['price']['totals']['year']['incl_slD_loyaltyD'];
                })->first();
                $min=$sortedSingle['product']['id'];
                
            }
    
    
    }
    if($sort=='rela'){      
    $sorted = $collection->sortByDesc(function ($item, $key) {
    return $item['price']['totals']['year']['excl_promo'];
    });       
    }    
    
    
    
    
    $products = $sorted->values()->all();
    Session::put('product_data_sort',$products);
    $postal_code=Session::get('postal_code');
    $customer_type=Session::get('customer_type');  
    $usage_elec_day=Session::get('usage_elec_day'); 
    $usage_elec_night=Session::get('usage_elec_night'); 
    $usage_gas=Session::get('usage_gas'); 
    $usage_elec_day=Session::get('usage_elec_day'); 
    $html="";  $per="0";  $per1="0";

     $totalProducts = $collection->count();
        $pageNumber = (int) $request->get('page', 1);
        $perpage = 7;
        $totalPages = ceil($totalProducts / $perpage);
        $offset = ($pageNumber - 1) * $perpage;
        $products = $collection->slice($offset, $perpage);
        $html = '';
        $si='0';
        $packType="";
        
          $feature = Feature::select('features.id','contract_details.part','contract_details.field', 'features.condition', 'features.NL_description', 'features.FR_description')
                           ->join('contract_details', 'contract_details.id', '=', 'features.contract_id')
                           ->get();
          $service = ServiceLimitation::get();
           $agent = new Agent(); 
        foreach ($products as $getdetails) {
             $html.='<input type="hidden" class="count" value="'.$totalProducts.'">';
             
             if($agent->isDesktop()){
            $html .= \View::make('elements.product-item', compact('totalProducts','getdetails', 'customer_type', 'postal_code', 'usage_elec_day', 'usage_elec_night', 'usage_gas', 'totalPages', 'pageNumber','si','packType','feature','min','service'))->render();
        
             }elseif($agent->isTablet()){
                 
                 $html .= \View::make('elements.product-item', compact('totalProducts','getdetails', 'customer_type', 'postal_code', 'usage_elec_day', 'usage_elec_night', 'usage_gas', 'totalPages', 'pageNumber','si','packType','feature','min','service'))->render();
             }else{
                 
                 $html .= \View::make('mobile-view.home.elements.product-item', compact('totalProducts','getdetails', 'customer_type', 'postal_code', 'usage_elec_day', 'usage_elec_night', 'usage_gas','totalPages', 'pageNumber','si','totalProducts','packType','feature','min','service'))->render();
                 
             }
            
        }
        return $html;
        
    }
}

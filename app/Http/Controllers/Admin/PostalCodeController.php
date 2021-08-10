<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helpers\Datatable;
use App\Models\Postalcode;
use App\Models\Product;
use Storage;

class PostalCodeController extends Controller
{
//    public function __construct(Request $request)
//    {
//        parent::__construct($request);
//        $this->_viewPageBasePath = 'admin.postalcode.';
//        $this->__routeBasePath = 'admin.postalcode.index';
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = Storage::disk('local')->get('po.json');
        $json = json_decode($response, true);
        // $check=array_key_exists($postal,$json['electricity']);
        // dd($check);
        // if($check==true){        
        //     $html="";
        //     $data['available']='true';
            // $sub=count($json['electricity'][$postal]);
        // }
        return view('admin.postalcode.index', compact('json'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.postalcode.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd('sdj');
        // $ids = $request->postalcode;

        // foreach ($ids as $id) {
        if (isset ($request->check)) {
            $postalcode = $request->check; 
            $postalcode->save;
        }
        
        
        // }
        // $credits = Input::get('credit');
        // Postalcode::create([

        //      'postalcode'=>$request->postalcode,
        //      'area'=>$request->area,
        //  ]);
        return redirect()->route('postalcode.index');
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
        $postcode = Postalcode::find($id);
        return view('admin.postalcode.edit', compact('postcode'));
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
        $response = Storage::disk('local')->get('po.json');
        $json = json_decode($response, true);
        $check=array_key_exists($id,$json['electricity']);
        if ($check==true) { 
            foreach ($json['electricity'][$id] as $postalcode) {
                foreach ($postalcode as $value) {
                   $municipality[] = $value;
                }
            }
        }
        
        // Postalcode::where('id', $id)
        //         ->update([
        //             'postalcode' => $request->postalcode,
        //             'area' => $request->area,
        // ]);
        return view('admin.postalcode.create', compact('id','municipality'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::where('postalcode_id', $id)->delete();
        Postalcode::where('id', $id)->delete();
        return redirect()->route('postalcode.index');
        
    }
    
    // public function data(Request $request)
    // {
    //     return (new Datatable(Postalcode::class, $request))
    //         ->select(array('id','postalcode','area'))
    //         ->generalSearchOn(array('postalcode'))
    //         ->setSortFieldMap(array('id' => 'id'))
    //         ->getData();
    // }
}

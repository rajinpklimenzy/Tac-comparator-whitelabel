<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;

use App\Http\Helpers\Datatable;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index');
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
        $product = Product::find($id);
        if ($product->featured == 0) {
            Product::where('id' , $id)
                ->update([
                    'featured' => 1,
                ]);
        } else {
            Product::where('id' , $id)
                ->update([
                    'featured' => 0,
                ]);
        }
        return redirect()->route('product.index');
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
    
    public function data(Request $request)
    {
        return (new Datatable(Product::class, $request))
            ->select(array('products.id','products.product_id','products.product_name',
                'products.type','suppliers.name','suppliers.logo','postalcode.postalcode','products.featured'))
            ->join('suppliers', 'suppliers.id', '=', 'products.supplier_id')
            ->join('postalcode', 'postalcode.id', '=', 'products.postalcode_id')    
            ->generalSearchOn(array('products.product_name', 'products.product_id'))
            ->setSortFieldMap(array('id' => 'products.id'))
            ->getData();
    }
}

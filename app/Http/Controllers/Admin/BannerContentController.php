<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BannerContent;
use App\Http\Helpers\Datatable;
use Image;
use Toastr;
use Request as Requests;

class BannerContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page='Banner Content of All Pages';
        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
        $data=BannerContent::where('website',$domain)->get();
        return view('admin.request-content.bannerdata.index',compact('page','data'));
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
        $page='Edit Banner Data';
        $banner = BannerContent::where('id', $id)
                        ->first();
        return view('admin.request-content.bannerdata.edit', compact('banner','page'));
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
    
if($request->page=='request page'){
        request()->validate([
        'banner_image' => 'image|max:2047|dimensions:max_width=1400,max_height=150,min_width=1400,min_height=150'
    ],
    [
        'banner_image.image' => 'You have to choose an un supported file format!',
        'banner_image.uploaded' => 'Failed to upload an image. The image maximum size is 2MB.',
        'banner_image.dimensions' => 'You have to choose an un supported dimensions (1400 x 150)!',
    ]);

    }else{

         request()->validate([
        'banner_image' => 'image|max:2047|dimensions:max_width=1400,max_height=212,min_width=1400,min_height=212'
    ],
    [
        'banner_image.image' => 'You have to choose an un supported file format!',
        'banner_image.uploaded' => 'Failed to upload an image. The image maximum size is 2MB.',
        'banner_image.dimensions' => 'You have to choose an un supported dimensions (1400 x 212)!',
    ]);


    }

         if ($request->banner_image != null) {
            $originalImage = $request->file('banner_image');
            $thumbnailImage = Image::make($originalImage);
            $originalPath = 'images/';
            $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());

            $banner = BannerContent::find($id);
            $banner->banner_image = time() . $originalImage->getClientOriginalName();
            $banner->save();
        }
        BannerContent::where('id', $id)
                ->update([
                    'page_name' => $request->page,
                    'banner_content_in_english' => $request->content_eng,
                    'banner_content_in_NL' => $request->content_nl,
                    'banner_content_in_FR' => $request->content_fr,
                ]);
        Toastr::success('Banner Content updated Successfully', 'Updated');
        return back()->with('success','Banner Content updated successfully');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BannerContent::where('id', $id)->delete();
        return redirect()->route('banner-content.index');
    }
    
    public function data(Request $request)
    {
        return (new Datatable(BannerContent::class, $request))
            ->select(array('id','page_name','banner_content_in_english','banner_image'))
            ->generalSearchOn(array('page_name'))
            ->setSortFieldMap(array('id' => 'id'))
            ->getData();
    }
   
}

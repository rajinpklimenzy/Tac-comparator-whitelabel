<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Title;
use App\Models\SubtitleContent;
use App\Models\Videocontent;
use DB;
use App\Http\Helpers\Datatable;
use Toastr;
use Request as Requests;

class RequestContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
       
        $subcontent = SubtitleContent::select('subtitle_contents.id','subtitle_contents.title_id',
                                        'subtitle_contents.NL_subtitle','subtitle_contents.FR_subtitle',
                                        'subtitle_contents.NL_content','subtitle_contents.FR_content',
                                        'titles.NL_title','titles.FR_title')
                                        ->join('titles', 'titles.id', '=', 'subtitle_contents.title_id')
                                        ->where('website',$domain)
                                        ->get();
        $page="Request page content";

        $sub=SubtitleContent::select('subtitle_contents.id','subtitle_contents.title_id','subtitle_contents.subtitle',
                                        'subtitle_contents.NL_subtitle','subtitle_contents.FR_subtitle',
                                        'subtitle_contents.NL_content','subtitle_contents.FR_content',
                                        'subtitle_contents.content','titles.NL_title','titles.FR_title')
            ->join('titles', 'titles.id', '=', 'subtitle_contents.title_id')
            ->where('website',$domain)
            ->get();
        return view('admin.request-content.requestdata.edit', compact('subcontent','page','sub'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
        $videocontent = Videocontent::where('website',$domain)->first();
        return view('admin.request-content.videocontent.edit', compact('videocontent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                $data = $request->all();
                $url =Requests::getHost();
                $domain = str_replace('www.','',$url);
           

                  request()->validate([
        'videolink' => 'image|max:2047|dimensions:max_width=728,max_height=394,min_width=728,min_height=394'
    ],
    [
        'videolink.image' => 'You have to choose an un supported file format!',
        'videolink.uploaded' => 'Failed to upload an image. The image maximum size is 2MB.',
        'videolink.dimensions' => 'You have to choose an un supported dimensions (728 x 394)',
    ]);
                $videolink=null;
                if($request->videolink){
                 $videolink = time().'.'.$request->videolink->extension();
                $request->videolink->move('images/request-page/', $videolink);



                Videocontent::where('id', $data['id'])
                        ->where('website',$domain)
                        ->update([
                            'video' => $videolink
                            
                ]);
                        
                }

                
            preg_match('/(http:)/', $request->image_url, $matches1, PREG_OFFSET_CAPTURE);
            preg_match('/(https:)/', $request->image_url, $matches2, PREG_OFFSET_CAPTURE);
            if(empty($matches1 || $matches2)){
            return back()->with('error','Please add http / https tags.');
            }


                Videocontent::where('id', $data['id'])
                        ->where('website',$domain)
                        ->update([
                           
                            'image_url' =>$data['image_url'],
                            'NL_title' => $data['NL_title'],
                            'FR_title' => $data['FR_title'],
                            'NL_content' => $data['NL_description'],
                            'FR_content' => $data['FR_description']
                ]);
            
           
            return back()->with('success','Request page updated successfully');
    }


        public function request_add(Request $request)
    {
                $data = $request->all();
                $url =Requests::getHost();
                $domain = str_replace('www.','',$url);
         


                DB::table('subtitle_contents')->insert([
                            'website'=>$domain,
                            'title_id'=>1,
                            'subtitle'=>$request->NL_subtitle,
                            'content'=>$request->NL_subtitle,
                            'NL_subtitle' => $request->NL_subtitle,
                            'FR_subtitle' => $request->FR_subtitle,
                            'NL_content' => $request->NL_description,
                            'FR_content' => $request->FR_description,
                ]);
            
           
            return back()->with('success','Request page updated successfully');
    }
    
//    public function addSubtitle()
//    {
//        return view('admin.request-content.requestdata.addsubtitle');
//    }
    
    public function dataStore(Request $request)
    {

        if(isset($request->titleid)){}
        $title = Title::where('id', $request->titleid)
                ->update([
            'NL_title' => $request->NL_title,
            'FR_title' => $request->FR_title,        
        ]);
        Toastr::success('Title updated Successfully', 'Updated');
        return back()->with('success','Request page updated successfully');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subtitle = SubtitleContent::find($id);
        return view('admin.request-content.requestdata.subedit', compact('subtitle'));
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


         DB::table('subtitle_contents')->where('id', $id)
                        ->update([
                             'subtitle'=>$request->NL_subtitle,
                            'content'=>$request->NL_subtitle,
                            'NL_subtitle' => $request->NL_subtitle,
                            'FR_subtitle' => $request->FR_subtitle,
                            'NL_content' => $request->NL_description,
                            'FR_content' => $request->FR_description,
                        ]);
        return redirect()->route('request-content.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


        SubtitleContent::where('id', $id)->delete();
        return back()->with('success','Deleted successfully');
    }
    
    public function data(Request $request)
    {
        return (new Datatable(SubtitleContent::class, $request))
            ->select(array('subtitle_contents.id','subtitle_contents.title_id','subtitle_contents.subtitle',
                                        'subtitle_contents.NL_subtitle','subtitle_contents.FR_subtitle',
                                        'subtitle_contents.NL_content','subtitle_contents.FR_content',
                                        'subtitle_contents.content','titles.NL_title','titles.FR_title'))
            ->join('titles', 'titles.id', '=', 'subtitle_contents.title_id')
            ->generalSearchOn(array('NL_subtitle'))
            ->setSortFieldMap(array('id' => 'subtitle_contents.id'))
            ->getData();
    }
}

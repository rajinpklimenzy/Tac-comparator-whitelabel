<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use App\Http\Helpers\Datatable;
use Toastr;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $language = Language::select('pages.page','languages.id','languages.eng','languages.nl','languages.fr')
                    ->join('pages', 'pages.id', '=', 'languages.page_id')
                    ->get();
        $page='Manage Translation';
        return view('admin.language.index', compact('language','page'));
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
        $language = Language::select('pages.page','languages.id','languages.eng','languages.nl','languages.fr','languages.page_id')
                    ->join('pages', 'pages.id', '=', 'languages.page_id')
                    ->where('languages.page_id', $id)
                    ->get();
//        dd($language);
         $page='Manage Translation';
        return view('admin.language.index', compact('language','page'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Language::find($id);
        $page="Edit language of each content";
        return view('admin.language.edit', compact('language','page'));
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
        Language::where('id', $id)
                ->update([
                    'eng' => $request->content_eng,
                    'nl' => $request->content_nl,
                    'fr' => $request->content_fr,
                ]);
        Toastr::success('Language updated Successfully', 'Updated'); 
        return redirect()->route('page.index');
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
    
    public function data(Request $request, $id)
    {
        return (new Datatable(Language::class, $request))
            ->select(array('pages.page','languages.id','languages.eng','languages.nl','languages.fr'))
            ->join('pages', 'pages.id', '=', 'languages.page_id')
            ->where('languages.page_id', $id)    
            ->generalSearchOn(array('languages.eng'))
            ->setSortFieldMap(array('id' => 'languages.id'))
            ->getData();
    }
}

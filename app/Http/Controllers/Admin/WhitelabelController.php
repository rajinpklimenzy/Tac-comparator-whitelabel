<?php

namespace App\Http\Controllers\Admin;

use App\Models\Whitelabel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Artisan;
use DB;
use Image;
use Hash;
use Carbon\Carbon;
use Request as Requests;

class WhitelabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url =Requests::getHost();
        $host = str_replace('www.','',$url);
        if($host=='whitelable.wx.agency'){
        $page="Whitelabel app";
        
        $whitelabel=Whitelabel::orderBy('id', 'DESC')->where('fqdn','!=','whitelable.wx.agency')->get();

        return view('admin.whitelabel.index',compact('page','whitelabel'));

    }else{

        return redirect('admin/home');
    }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $name=$request->name;
        $subdomain=$request->domain_name;
        $email=$request->email;
        $locale=$request->locale;
        $password=$request->password;
        $conf_password=$request->conf_password;
       // $logo=$request->logo;

        // $image       = $request->file('logo');
        // $filename    = time().'.'.$image->extension();

       

        //Fullsize
        // $image->move('uploads/full/',$filename);

        // $image_resize = Image::make('uploads/full/'.$filename);
        // $image_resize->fit(600, 300);
        // $image_resize->save('uploads/logos/' .$filename);

        $exist=DB::table('hostnames')->where('fqdn',$subdomain)->exists();
        if($exist){
            return back()->with('error','Domain name Already exist.');
        }
        $exist=DB::table('admins')->where('email',$email)->exists();
        if($exist){
            return back()->with('error','Email Already used.');
        }


        DB::table('hostnames')->insert([

            'fqdn'=>$subdomain,
            'name'=>$name,
            'email'=>$email,
            'logo'=>'default-logo.png',
            'logo_fr'=>'default-logo.png',
            'fav_icon'=>'favicon-def.png',
            'locale'=>$locale,
            'wizard'=>1,
            'title'=>null,
            'meta'=>null,
            'seo_key'=>null,
            'title_fr'=>null,
            'meta_fr'=>null,
            'seo_key_fr'=>null,


            'created_at'=>Carbon::now()

        ]);

        DB::table('admins')->insert([

            'name'=>$name,
            'email'=>$email,
            'status'=>1,
            'role_id'=>2,
            'password'=>Hash::make($password),
            'website'=>$subdomain

        ]);

        DB::table('site_color')->insert([
            'website'=>$subdomain,
            'button_color'=>"linear-gradient(180deg, rgba(211, 92, 92, 1) 21%, rgba(191, 59, 60, 1) 66%)",
            'banner_background_color'=>"#ff0000",
            'banner_text_color'=>"#fff",
            'change_your_data_backgorund_color'=>"#2d67b7",
             
            'navigation_menu_button_color'=>"#ff0000",
            'navigation_text_color'=>"#212529",
            'header_text_color'=>"#ff0000",
            'sidebar_background_color'=>"#ff0000",
            'listing_background_color'=>"#ff0000",
            'filter_section_color_button'=>"#d1d5dc",
            'filter_section_color_checkbox'=>"#0067bd",
            'listing_background_color'=>"#effcef",
            'cta_button_color'=>"#ff0000",
            'more_info_button_color'=>"#e7ecf7",
            'more_tariffs_button_color'=>"#e0e3e7",
            'footer_background_color'=>"#f3f5fb",

            'change_your_data_text_color'=>"#fff",
            'change_your_data_button_color'=>"#fff",
            'listing_background_color_reg'=>"#ff0000",
            'navigation_icon_color'=>"#4578bf",
            'navigation_bar_color'=>"#fff",
            'navigation_text_inactive_color'=>"#007bff",
            'listing_background_color_reg'=>"#fff",
            'more_info_text_color'=>"#2c67b7",
            'filter_section_button_color'=>"#000",
            'more_tariffs_text_color'=>"#636468",
            'footer_text_color'=>"#000",

            'title_color'=>"#212529",
            'listing_text_color'=>"#212529",
            'listing_price_color'=>"#c91024",
            'cta_text_color'=>"#fff",
            'popularity_text_color'=>"#7f7f7f",
            'listing_icon_color'=>"#cdcfd1",

            'request_banner_background_color'=>"#212529",
            'request_banner_text_color'=>"#212529",
            'banner_background_color_activate'=>0,
            'request_banner_background_color_activate'=>0,
            'landing_page_background_color'=>"#212529",
            'landing_page_background_color_activate'=>0,
            'navigation_text_color_step3'=>"#212529",
            'navigation_text_inactive_color_step3'=>"#212529",
            'navigation_text_inactive_color_step3_inactive'=>"#212529",
            'landing_banner_text_color'=>"#fff",
            'form_text_color'=>"#4d4d4d",
            'langing_button_color'=>"#bd3434"



        ]);

        $data = [
   [
            'website'=>$subdomain,
            'page_name'=>'request page',
            'banner_content_in_english'=>'Congrats! You have chosen for',
            'banner_content_in_NL'=>'Proficiat! U hebt gekozen voor june',
            'banner_content_in_FR'=>'Félicitations, vous avez choisi',
            'banner_image'=>'1606470636banner_bg.jpg'

            ],
            [
            'website'=>$subdomain,
            'page_name'=>'sort page',
            'banner_content_in_english'=>'These are the best deals for',
            'banner_content_in_NL'=>'Kies hieronder jouw beste tarief <br>  voor {X1} in {X2} {X3}.',
            'banner_content_in_FR'=>'pour {X1} durant {X2} {X3}.',
            'banner_image'=>'1606470657banner_bg.jpg'

            ],
            [
            'website'=>$subdomain,
            'page_name'=>'sort_page banner',
            'banner_content_in_english'=>'You can save up to € 450.',
            'banner_content_in_NL'=>'Je kan tot {X4} Euro besparen',
            'banner_content_in_FR'=>"Vous pouvez économiser jusqu'à {X4} euro.",
            'banner_image'=>null

            ],
            [
            'website'=>$subdomain,
            'page_name'=>'sort_page last',
            'banner_content_in_english'=>'All displayed prices are for residential users and include VAT.',
            'banner_content_in_NL'=>'Alle getoonde prijzen zijn voor {X5} en zijn {X6}.',
            'banner_content_in_FR'=>'Tous les prix affichés sont pour les {X5} et sont {X6}.',
            'banner_image'=>null

            ]
];

        DB::table('banner_contents')->insert($data);


         DB::table('footers')->insert([
            [

            'website'=>$subdomain,
            'slug'=>'terms_conditions',
            'eng'=>'Terms and Conditions',
            'nl'=>'Algemene voorwaarden',
            'fr'=>'Termes et conditions',
            'link_nl'=>'https://www.tariefchecker.be/algemene-voorwaarden-en-bescherming-van-de-persoonsgegevens',
            'link_fr'=>'https://www.veriftarif.be/conditions-generales-et-protection-des-donnees-personnelles',
            'link_status'=>'1'

            ],
            [
            'website'=>$subdomain,
            'slug'=>'powered_by',
            'eng'=>'Powered by www.tariefchecker.be',
            'nl'=>'Aangedreven door www.tariefchecker.be',
            'fr'=>'Propulsé par www.tariefchecker.be',
            'link_nl'=>'http://www.tariefchecker.be/',
            'link_fr'=>'http://www.tariefchecker.be/',
            'link_status'=>'1'

            ],
            [
            'website'=>$subdomain,
            'slug'=>'frequent_questions',
            'eng'=>'Frequently Asked Questions',
            'nl'=>'Veel gestelde vragen',
            'fr'=>'Questions fréquemment posées',
            'link_nl'=>'https://www.tariefchecker.be/energie/faq ',
            'link_fr'=>'https://www.veriftarif.be/energie/faq',
            'link_status'=>'1'

            ],
            [
            'website'=>$subdomain,
            'slug'=>'contact',
            'eng'=>'contact',
            'nl'=>'Contact',
            'fr'=>'Contact',
            'link_nl'=>'https://www.tariefchecker.be/contact ',
            'link_fr'=>'https://www.veriftarif.be/contact',
            'link_status'=>'1'

            ]
        ]

        );

         DB::table('header')->insert(
            [
                
            'website'=>$subdomain,
            'faq_text'=>'FAQs',
            'faq_link'=>'https://www.tariefchecker.be/faq/geen-verbrekingsvergoedingen-meer-voor-particulieren-en-kmo-s',
            'faq_icon'=>'<i class="fas fa-question-circle" aria-hidden="true"></i>',
            'faq_text_fr'=>'FAQs',
            'faq_link_fr'=>'https://www.tariefchecker.be/faq/geen-verbrekingsvergoedingen-meer-voor-particulieren-en-kmo-s',
            'email_text'=>'Emailadres',
            'email_text_fr'=>'Emailadres',
            'email_link'=>'https://www.tariefchecker.be/contact',
            'email_link_fr'=>'https://www.tariefchecker.be/contact',
            'email_icon'=>'<i class="fas fa-envelope" aria-hidden="true"></i>'

            ]

        );



         DB::table('landing_page')->insert(
            [
                
            'website'=>$subdomain,
            'title'=>'Landing page Title',
            'title_fr'=>'Landing page Title',
            'subtitle'=>'Landing page Sub title',
            'subtitle_fr'=>'Landing page Sub title',
            'mascot_image'=>'default-moskot.png',
            'background_image'=>'banner_bg.jpg',
            'title_above_form'=>'Text above forms',
            'title_above_form_fr'=>'Text above form',
            'title_below_form'=>'Text below form',
            'ltitle_below_form_fr'=>'Text below form'
            

            ]

        );

         DB::table('tracking_code')->insert(
            [
                
            'website'=>$subdomain,
            'google_analytics'=>'',
            'facebook_pixel'=>'',
            'other_tracking_code'=>''
            

            ]

        );

        DB::table('videocontents')->insert(
            [
                
            'website'=>$subdomain,
            'video'=>'1607515295.png',
            'title'=>'switch Free and Direct to engine Electrable',
            'NL_title'=>'Energieleveranciers vergelijken met Tariefchecker.be june nl Lorem ipsum dolor sit amet, to check',
            'FR_title'=>"Comparez les fournisseurs d'énergie avec veriftarif.be june fr Lorem ipsum dolor sit amet,",
            'content'=>'switch Free and Direct to engine Electrable',
            'NL_content'=>'Met www.tariefchecker.be is het vaenderen van leverancier gemakkeliijk. june nl Lorem ipsum dolor sit amet, consectetur adipiscing elit,',
            'FR_content'=>'Avec www.veriftarif.be, il est facile de changer de fournisseur. june Lorem ipsum dolor sit amet, consectetur adipiscing elit,'
            

            ]

        );


         DB::table('subtitle_contents')->insert([
            [

            'website'=>$subdomain,
            'title_id'=>'1',
            'subtitle'=>'get the right rates',
            'NL_subtitle'=>'De juiste tarieven en kortingen',
            'FR_subtitle'=>'Les bons tarifs et les réductions de votre choix',
            'content'=>'you choose the best rates',
            'NL_content'=>'Je hebt gekozen voor het tarief dat het beste bij je past. Stap over via ons en verzeker je ervan dat je effectief de juiste tarieven en kortingen krijgt.',
            'FR_content'=>'Vous avez choisi pour le fournisseur et le tarif qui vous convient le mieux. Assurez-vous des tarifs et réductions selon votre choix en faisant le switch via Veriftarif.'

            ],
            [
              'website'=>$subdomain,
            'title_id'=>'1',
            'subtitle'=>'get the right rates',
            'NL_subtitle'=>'De juiste tarieven en kortingen',
            'FR_subtitle'=>'Les bons tarifs et les réductions de votre choix',
            'content'=>'you choose the best rates',
            'NL_content'=>'Je hebt gekozen voor het tarief dat het beste bij je past. Stap over via ons en verzeker je ervan dat je effectief de juiste tarieven en kortingen krijgt.',
            'FR_content'=>'Vous avez choisi pour le fournisseur et le tarif qui vous convient le mieux. Assurez-vous des tarifs et réductions selon votre choix en faisant le switch via Veriftarif.'

            ],
            [
              'website'=>$subdomain,
            'title_id'=>'1',
            'subtitle'=>'get the right rates',
            'NL_subtitle'=>'De juiste tarieven en kortingen',
            'FR_subtitle'=>'Les bons tarifs et les réductions de votre choix',
            'content'=>'you choose the best rates',
            'NL_content'=>'Je hebt gekozen voor het tarief dat het beste bij je past. Stap over via ons en verzeker je ervan dat je effectief de juiste tarieven en kortingen krijgt.',
            'FR_content'=>'Vous avez choisi pour le fournisseur et le tarif qui vous convient le mieux. Assurez-vous des tarifs et réductions selon votre choix en faisant le switch via Veriftarif.'

            ],
            [
              'website'=>$subdomain,
            'title_id'=>'1',
            'subtitle'=>'get the right rates',
            'NL_subtitle'=>'De juiste tarieven en kortingen',
            'FR_subtitle'=>'Les bons tarifs et les réductions de votre choix',
            'content'=>'you choose the best rates',
            'NL_content'=>'Je hebt gekozen voor het tarief dat het beste bij je past. Stap over via ons en verzeker je ervan dat je effectief de juiste tarieven en kortingen krijgt.',
            'FR_content'=>'Vous avez choisi pour le fournisseur et le tarif qui vous convient le mieux. Assurez-vous des tarifs et réductions selon votre choix en faisant le switch via Veriftarif.'

            ]
        ]

        );


         

        return back()->with('success','Whitelabel app created successfully');

    }

       public function edit()
    {
        $page="Edit App";
       
        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
        $app=Whitelabel::where('fqdn',$domain)->first();
        return view('admin.whitelabel.edit',compact('page','app'));

    }

    public function update(Request $request)
    {

        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);

        request()->validate([
        'logo' => 'image|max:2047|dimensions:max_width=153,max_height=77,min_width=153,min_height=77',
        'logo_fr' => 'image|max:2047|dimensions:max_width=153,max_height=77,min_width=153,min_height=77',
        'fav_icon' => 'image|max:2047|dimensions:max_width=32,max_height=32,dimensions:min_width=32,min_height=32',
        
    ],
    [
        'logo.image' => 'You have to choose an un supported file format!',
        'logo_fr.image' => 'You have to choose an un supported file format!',
        'fav_icon.image' => 'You have to choose an un supported file format!',
        'logo.uploaded' => 'Failed to upload an image. The image maximum size is 2MB.',
        'logo_fr.uploaded' => 'Failed to upload an image. The image maximum size is 2MB.',
        'fav_icon.uploaded' => 'Failed to upload an image. The image maximum size is 2MB.',
        'logo.dimensions' => 'Dimentions not supported( 153 x 77 ).',
        'logo_fr.dimensions' => 'Dimentions not supported( 153 x 77 ).',
        'fav_icon.dimensions' => 'Dimentions not supported( 32 x 32 ).'
    ]);


if($request->file('logo')){

       




        $logo       = $request->file('logo');
        $logoname    = time().'.'.$logo->extension();


        $logo->move('uploads/logos/',$logoname);
        $image_resize = Image::make('uploads/logos/'.$logoname);
       
       // $image_resize->fit(600, 300);
        $image_resize->save('uploads/logos/' .$logoname);

         Whitelabel::where('fqdn',$domain)->update([
            'logo'=>$logoname,
        ]);

    }

if($request->file('logo_fr')){

       


        $logo       = $request->file('logo_fr');
        $logoname    = time().'.'.$logo->extension();


        $logo->move('uploads/logos/',$logoname);
        $image_resize = Image::make('uploads/logos/'.$logoname);
       
        //$image_resize->fit(600, 300);
        $image_resize->save('uploads/logos/' .$logoname);

         Whitelabel::where('fqdn',$domain)->update([
            'logo_fr'=>$logoname,
        ]);

    }

if($request->file('fav_icon')){


        $fav_icon       = $request->file('fav_icon');
        $fav_iconname    = time().'.'.$fav_icon->extension();

        $fav_icon->move('uploads/fav-icon/',$fav_iconname);
        $image_resize = Image::make('uploads/fav-icon/'.$fav_iconname);
       
        $image_resize->save('uploads/fav-icon/' .$fav_iconname);

         Whitelabel::where('fqdn',$domain)->update([
            'fav_icon'=>$fav_iconname,

        ]);
    }






        Whitelabel::where('fqdn',$domain)->update([

            
            'name'=>$request->name,
            'locale'=>$request->locale,
            'wizard'=>$request->wizard,
            'title'=>$request->title,
            'meta'=>$request->meta,
            'seo_key'=>$request->seo_key,
            'title_fr'=>$request->title_fr,
            'meta_fr'=>$request->meta_fr,
            'seo_key_fr'=>$request->seo_key_fr


        ]);



        if($request->old_password && $request->password){

        $admin=DB::table('admins')->where('website',$domain)->first();
        if(Hash::check($request->old_password, $admin->password)){

            DB::table('admins')->where('website',$domain)->update([

                'password'=>Hash::make($request->password)

            ]);

            return back()->with('success','App Updated successfully');

        }else{

            return back()->with('error','Incorrect Old password.');

        }


        }

        return back()->with('success','App Updated successfully');
        

    }


    public function delete($id,$webid)
    {
        
        $admin=DB::table('admins')->where('email',$webid)->first();
        Whitelabel::where('id',$id)->delete();
        DB::table('admins')->where('email',$webid)->delete();
        DB::table('banner_contents')->where('website',$admin->website)->delete();
        DB::table('footers')->where('website',$admin->website)->delete();
        DB::table('header')->where('website',$admin->website)->delete();
        DB::table('landing_page')->where('website',$admin->website)->delete();
        DB::table('tracking_code')->where('website',$admin->website)->delete();
        
        return back()->with('success','Whitelabel app deleted successfully');

    }

    public function activate($id)
    {
        

        $host=Whitelabel::where('id',$id)->first();
       // DB::table('admins')->where('email',$webid)->first();

        if($host->activate==1){
            $host=Whitelabel::where('id',$id)->update([

                'activate'=>0
            ]);

             return back()->with('success','Whitelabel app Deactivated successfully');

        }else{

            $host=Whitelabel::where('id',$id)->update([

                'activate'=>1
            ]);

             return back()->with('success','Whitelabel app Activated successfully');

        }
        
       

    }




    public function landing_page_contents()
    {
        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
        $data=DB::table('landing_page')->where('website',$domain)->first();
        $page="Landing page Data";
        return view('admin.landing-page.index',compact('data','page'));
    }

    public function landing_page_update(Request $request)
    {

        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
     request()->validate([
        'image' => 'image|max:2047|dimensions:max_width=346,max_height=346,min_width=346,min_height=346',
        'background_image' => 'image|max:2047|dimensions:max_width=1284,max_height=529,min_width=1284,min_height=529'
    ],
    [
        'image.image' => 'You have to choose an un supported file format!',
        'image.uploaded' => 'Failed to upload an image. The image maximum size is 2MB.',
        'image.dimensions' => 'Dimentions not supported (346 x 346)',
        'background_image.image' => 'You have to choose an un supported file format!',
        'background_image.uploaded' => 'Failed to upload an image. The image maximum size is 2MB.',
        'background_image.dimensions' => 'Dimentions not supported (1284 x 529)'
    ]);

        if($request->file('image')){
        $image       = $request->file('image');
        $filename    = time().'.'.$image->extension();

        //Fullsize
        $image->move('images/landing-page-image/',$filename);

        $image_resize = Image::make('images/landing-page-image/'.$filename);
        $image_resize->fit(346, 346);
        $image_resize->save('images/landing-page-image/' .$filename);

        $data=DB::table('landing_page')->where('website',$domain)->update([
            'mascot_image'=>$filename   
        ]);  

        }


        if($request->file('background_image')){
        $image       = $request->file('background_image');
        $filename    = time().'.'.$image->extension();

        //Fullsize
        $image->move('images/landing-page-image/',$filename);

        $image_resize = Image::make('images/landing-page-image/'.$filename);
        
        $image_resize->save('images/landing-page-image/' .$filename);

        $data=DB::table('landing_page')->where('website',$domain)->update([
            'background_image'=>$filename   
        ]);  

        }


        $data=DB::table('landing_page')->where('website',$domain)->update([

            'title'=>$request->title,
            'subtitle'=>$request->subtitle,
            'title_above_form'=>$request->title_above_form,
            'title_below_form'=>$request->title_below_form,
            'title_fr'=>$request->title_fr,
            'subtitle_fr'=>$request->subtitle_fr,
            'title_above_form_fr'=>$request->title_above_form_fr,
            'ltitle_below_form_fr'=>$request->title_below_form_fr,


        ]);  

        return back()->with('success','Landing page data updated Successfully.');


    }

    public function header_content()
    {


        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
        $data=DB::table('header')->where('website',$domain)->first();
        $page="Header Contents";
        return view('admin.header-section.index',compact('data','page'));
    }

    public function header_content_update(Request $request)
    {

        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);

        DB::table('header')->where('website',$domain)->update([

            'faq_text'=>$request->faq_text,
            'faq_text_fr'=>$request->faq_text_fr,
            'faq_link'=>$request->faq_link,
            'faq_link_fr'=>$request->faq_link_fr,
            'faq_icon'=>$request->faq_icon,
            'email_text'=>$request->email_text,
            'email_text_fr'=>$request->email_text_fr,
            'email_link'=>$request->email_link,
            'email_link_fr'=>$request->email_link_fr,
            'email_icon'=>$request->email_icon,

        ]);

        return back()->with('success','Header contents updated Successfully.');

    }

    public function tacking_code()
    {
        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
        $page="Tracking codes";
        $tracking=DB::table('tracking_code')->where('website',$domain)->first();
        return view('admin.analytics.index',compact('tracking','page'));
    }

    public function tacking_code_update(Request $request)
    {

        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);

  
// Use preg_match() function to check match 
preg_match('/(<script>)/', $request->google_analytics, $matches1, PREG_OFFSET_CAPTURE);
preg_match('/(<script>)/', $request->facebook_pixel, $matches2, PREG_OFFSET_CAPTURE); 
preg_match('/(<script>)/', $request->other_tracking_code, $matches3, PREG_OFFSET_CAPTURE);  
  
// Display matches result 


if($request->google_analytics){

if(empty($matches1)){

    return back()->with('error','Please add analytics code with script tag.');
}

}

if($request->facebook_pixel){

if(empty($matches2)){

    return back()->with('error','Please add analytics code with script tag.');
}
    
}

if($request->other_tracking_code){

if(empty($matches3)){

    return back()->with('error','Please add analytics code with script tag.');
}
    
}



        
        $tracking=DB::table('tracking_code')->where('website',$domain)->update([

            'google_analytics'=>$request->google_analytics,
            'facebook_pixel'=>$request->facebook_pixel,
            'other_tracking_code'=>$request->other_tracking_code

        ]);
        return back()->with('success','analytics contents updated Successfully.');
    }

    public function site_color()
    {
        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
        $page="Color manage";
        $site_color=DB::table('site_color')->where('website',$domain)->first();
        return view('admin.color-management.index',compact('site_color','page'));
    }

    public function site_color_update(Request $request)
    {

        
        $url =Requests::getHost();
        $domain = str_replace('www.','',$url);
        DB::table('site_color')->where('website',$domain)->update([

            'button_color'=>$request->button_color,
            'banner_background_color'=>$request->banner_background_color,
            'banner_text_color'=>$request->banner_text_color,
            'change_your_data_backgorund_color'=>$request->change_your_data_backgorund_color,
            'navigation_menu_button_color'=>$request->navigation_menu_button_color,
            'navigation_text_color'=>$request->navigation_text_color,
            'header_text_color'=>$request->header_text_color,
            'sidebar_background_color'=>$request->sidebar_background_color,
            'listing_background_color'=>$request->listing_background_color,
            'filter_section_color_button'=>$request->filter_section_color_button,
            'filter_section_color_checkbox'=>$request->filter_section_color_checkbox,
            'listing_background_color'=>$request->listing_background_color,
            'cta_button_color'=>$request->cta_button_color,
            'more_info_button_color'=>$request->more_info_button_color,
            'more_tariffs_button_color'=>$request->more_tariffs_button_color,
            'footer_background_color'=>$request->footer_background_color,

            'change_your_data_text_color'=>$request->change_your_data_text_color,
            'change_your_data_button_color'=>$request->change_your_data_button_color,
            'listing_background_color_reg'=>$request->listing_background_color_reg,
            'navigation_icon_color'=>$request->navigation_icon_color,
            'navigation_bar_color'=>$request->navigation_bar_color,
            'navigation_text_inactive_color'=>$request->navigation_text_inactive_color,
            'listing_background_color_reg'=>$request->listing_background_color_reg,
            'more_info_text_color'=>$request->more_info_text_color,
            'filter_section_button_color'=>$request->filter_section_button_color,
            'more_tariffs_text_color'=>$request->more_tariffs_text_color,
            'footer_text_color'=>$request->footer_text_color,

            'title_color'=>$request->title_color,
            'listing_text_color'=>$request->listing_text_color,
            'listing_price_color'=>$request->listing_price_color,
            'cta_text_color'=>$request->cta_text_color,
            'popularity_text_color'=>$request->popularity_text_color,
            'listing_icon_color'=>$request->listing_icon_color,

            'request_banner_background_color'=>$request->request_banner_background_color,
            'request_banner_text_color'=>$request->request_banner_text_color,
            'banner_background_color_activate'=>$request->banner_background_color_activate,
            'request_banner_background_color_activate'=>$request->request_banner_background_color_activate,
            'landing_page_background_color'=>$request->landing_page_background_color,
            'landing_page_background_color_activate'=>$request->landing_page_background_color_activate,
            'navigation_text_color_step3'=>$request->navigation_text_color_step3,
            'navigation_text_inactive_color_step3'=>$request->navigation_text_inactive_color_step3,
            'navigation_text_inactive_color_step3_inactive'=>$request->navigation_text_inactive_color_step3_inactive,
            'landing_banner_text_color'=>$request->landing_banner_text_color,
            'form_text_color'=>$request->form_text_color,
            'langing_button_color'=>$request->langing_button_color,

            'cheapest_border_color'=>$request->cheapest_border_color,
            'cheapest_border_label_color'=>$request->cheapest_border_label_color,
            'active_tab_color'=>$request->active_tab_color,
            'link_color'=>$request->link_color,
            'discount_sum_color'=>$request->discount_sum_color,







        ]);
        return back()->with('success','Site colors updated Successfully.');
    }




    



}

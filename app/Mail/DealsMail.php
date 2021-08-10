<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Session;
 
class DealsMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $postal = Session::get('postal_code');
        $electricityDay = Session::get('usage_elec_day');
        $electricityNight = Session::get('usage_elec_night');
        $gas = Session::put('$gas');
        $productlist = Session::get('product_data');
        $parameters = Session::get('getParameters');
        $actual_link=Session::get('actual_link');





        return $this->view('mail.dealsmail', compact('postal','electricityDay','electricityNight','gas','productlist','parameters','actual_link'))->subject('Tariefchecker - bespaar nu tot €450');
    }
}

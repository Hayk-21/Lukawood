<?php
namespace App\Http\Controllers;

class HomeController extends MainController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['canonical']=route('home');
        $this->data['h2_callback']=setting('site.seo_h2_callback');

        return view('home',$this->data);
    }


}

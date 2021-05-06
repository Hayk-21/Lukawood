<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\MainController;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProfileController extends MainController
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $this->data['title']=setting('site.title');
        $this->data['keywords']=setting('site.keywords');
        $this->data['description']=setting('site.description');
        $this->data['orders']=Order::where('user_id','=',Auth::user()->id)->orderBy('id','DESC')->paginate(15);
        return view('auth.profile',$this->data);
    }
}

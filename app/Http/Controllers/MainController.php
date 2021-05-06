<?php
namespace App\Http\Controllers;

class MainController extends Controller
{
    public $data=[];


    public function __construct()
    {
    $this->data['title']=setting('site.title');
    $this->data['canonical']='';
    $this->data['keywords']=setting('site.keywords');
    $this->data['description']=setting('site.description');
    $this->data['hl']='';
    $this->data['hl_1']='';
    $this->data['hl_2']='';
    $this->data['h2_callback']='';
    $this->data['content']='';
    $this->data['content2']='';

    $this->data['breadcrumbs'][trans('Главная')]='/';
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Url;
use Illuminate\Http\Request;



class PageController extends MainController
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($path = NULL, Request $request)
    {
        $url = Url::where('path','=',$path)->FirstOrFail();
        $model = $url->model;

        if ($model instanceof Page) {
            return $this->getPage($path, $model, $request);
        }

        return abort(404);
    }

    public function getPage($path, $page, Request $request = NULL)
    {
        $this->data['page']=$page;

        $this->data['title']=$this->data['page']->getSeoTitle();
        $this->data['keywords']=$this->data['page']->seo_keywords;
        $this->data['description']=$this->data['page']->seo_description;
        $this->data['hl']=$this->data['page']->seo_h1;
        //$this->data['h2_callback']=$this->data['page']->seo_h2;
        $this->data['canonical']=route('page',['path'=>$path]);
        $this->data['breadcrumbs'][$this->data['page']->getTitle()] =$this->data['page']->getUrl();

        $slug_view='page.'.strtolower($this->data['page']->slug);

        if(view()->exists($slug_view)){

            return view($slug_view,$this->data)->render();
        }

        return view('page/main',$this->data);
    }
}

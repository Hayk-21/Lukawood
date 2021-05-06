<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Url;
use Illuminate\Http\Request;


class CatalogController extends MainController
{

    public function index($path = NULL, Request $request)
    {
        if($path == NULL) {
           return $this->home($request);
        }

        $url = Url::where('path','=',$path)->FirstOrFail();
        $model = $url->model;

        /*if ($model instanceof Work) {
            return $this->getWork($path, $model, $request);
        }*/
        if ($model instanceof Category) {
            return $this->getCategory($path, $model, $request);
        }

        return abort(404);
    }


    public function getCategory($path, $category, Request $request)
    {
        $_request=$request->all();

        $this->data['category']=$category;

        if (isset($_request['page'])) {

            if($_request['page']==1) {
                return redirect($path);
            }

        }

        $this->data['title']=$this->data['category']->getSeoTitle();
        $this->data['description']=$this->data['category']->seo_description;
        $this->data['keywords']=$this->data['category']->seo_keywords;
        $this->data['hl']=$this->data['category']->seo_h1;
        $this->data['hl_1']=$this->data['category']->seo_h2;
        $this->data['hl_2']=$this->data['category']->seo_h2_2;
        $this->data['h2_callback']=$this->data['category']->seo_h2_3;
        $this->data['canonical']=route('catalog',['path'=>$path]);
        $this->data['breadcrumbs'][__('Каталог')] = route('catalog');

        $ancestors = $category->ancestors()->defaultOrder()->get();
        foreach ($ancestors as $parent) {
            $this->data['breadcrumbs'][$parent->getTitle()] = $parent->getUrl();
        }

        $this->data['breadcrumbs'][$this->data['category']->getTitle()] = $this->data['category']->getUrl();

        if ($category->hasChildren()) {
            $this->data['categories'] = $category->descendants()->active()->orderBy('order')->get();
        } else {
            $this->data['categories'] = Category::active()->where('parent_id', '=', NULL)->orderBy('order')->get();
        }
        //$this->data['works']=$this->data['category']->works()->active()->orderBy('site_created','DESC')->paginate(6);

        return view('catalog/category',$this->data);
    }

    public function home(Request $request)
    {
        if (isset($request['page'])) {

            if($request['page']==1) {
                return redirect('category');
            }
        }

        $this->data['title']=setting('catalog.title');
        $this->data['description']=setting('catalog.description');
        $this->data['keywords']=setting('catalog.keywords');
        $this->data['hl']=setting('catalog.hl');
        $this->data['hl_1']=setting('catalog.hl_1');
        $this->data['hl_2']=setting('catalog.hl_2');
        $this->data['h2_callback']=setting('catalog.hl_3');
        $this->data['content']=setting('catalog.content');
        $this->data['content2']=setting('catalog.content2');
        $this->data['canonical']=route('catalog');
        $this->data['breadcrumbs'][__('Каталог')] = route('catalog');

        $this->data['categories']=Category::active()->where('parent_id','=',NULL)->orderBy('order')->get();

        return view('catalog/home',$this->data);
    }

}

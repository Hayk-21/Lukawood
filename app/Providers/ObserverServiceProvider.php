<?php
namespace App\Providers;
use App\Models\Category;
use App\Observers\CategoryObserver;
use App\Observers\PageObserver;
use App\Models\Page;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Page::observe(PageObserver::class);
        Category::observe(CategoryObserver::class);
    }

    public function register()
    {

    }
}
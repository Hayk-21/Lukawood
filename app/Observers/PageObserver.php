<?php
namespace App\Observers;

use App\Models\Page;

class PageObserver
{

    public function created(Page $page)
    {
        $page->manager_id=auth()->id();
        $page->save();
    }

}
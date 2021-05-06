<?php
namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{

    public function created(Category $category)
    {
        $category->manager_id=auth()->id();
        $category->save();
    }

}
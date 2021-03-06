<?php

namespace App\Http\Widgets;

use App\Models\Category;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;

class CategoryDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        $count = Category::active()->count();
        $string = trans_choice('Категорий', $count);

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-file-text',
            'title'  => "{$count} {$string}",
            'text'   => __('voyager::dimmer.page_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' => __('Все категории'),
                'link' => route('voyager.categories.index'),
            ],
            'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
        ]));
    }

}

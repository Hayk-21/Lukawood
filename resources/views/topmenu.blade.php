@php
    if (Voyager::translatable($items)) {
        $items = $items->load('translations');
    }
@endphp

@foreach ($items as $item)

    <?php
        $originalItem = $item;

        if (Voyager::translatable($item)) {
            $item = $item->translate($options->locale);
        }

        $listItemClass = null;
        $linkAttributes =  null;
        $styles = null;
        $icon = null;
        $caret = null;

        // Background Color or Color
        /*if(!empty($item->color)) {
            $styles = 'color:'.$item->color;
        }*/
    ?>

        <li>
            <a href="{{ url($item->link()) }}" target="{{ $item->target }}" style="{{ $styles }}" {!! $linkAttributes ?? '' !!}>
                {{ $item->title }}
            </a>
        </li>
@endforeach


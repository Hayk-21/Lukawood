<?php foreach ($images as $image): ?>
<div class="<?php if($category->position):?>col-lg-4 col-md-3 col-sm-6<?php else: ?>col-md-3 col-sm-6<?php endif;?>">
    <div class="img-top">
        <a href="{!! $image->getImage() !!}" data-lightbox="album-<?php echo $album_images->id?>"
           data-title="{!! $image->name !!}">
            <img class="img-responsive" src="<?php echo $image->getImage()?>" alt="{!! $image->name !!}"/>
            <?php if(!$category->position):?>
            <p class="img-title">{!! $image->name !!}</p>
            <hr class="hr-bold orange">
            <div class="clear"></div>
            <br/>
            <?php endif; ?>
        </a>
    </div>
</div>
<?php endforeach; ?>
<?php if($album_images->images_count()>$skip): ?>
<div id="idmore_block" class="col-sm-12">
    <div class="more_block">
        <button data-skip="<?php echo $skip?>" data-id="<?php echo $category->id?>" class="load_more_images">
            <i class="fi-creative-next"></i> Показать еще
        </button>
    </div>
</div>
<?php endif; ?>


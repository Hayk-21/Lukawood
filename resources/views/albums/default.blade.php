<div class="resp-tab-content" aria-labelledby="wow bounceIn animated fadeInRight" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
    <?php $album_images=$album->images; ?>
    <?php if($album_images): ?>
        <div class="row gorizontal-image">
        <?php foreach ($album_images as $image): ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="img-top">
                    <a href="{!! config('albums.image_folder')."/".$image->image !!}" data-lightbox="album-<?php echo $album->id?>" data-title="{!! $image->name !!}">
                        <img alt="{!! $image->name !!}" src="<?php echo ImgFly::imgPreset(config('albums.image_folder')."/".$image->image,'category_image_gorizontal')?>" alt="{!! $image->name !!}"/>
                    </a>
                </div>
        </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
</div>
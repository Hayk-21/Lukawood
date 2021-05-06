<?php if($album_images=\App\Models\Albums::find($category->album_id)): ?>
<div class="gallery " >
    <div class="container wow fadeInLeft bounceIn" data-wow-delay="0.5s" data-wow-offset="100">

        <?php /*if($category->content): ?>
        <div class="container">
            <?php echo $category->content; ?>
        </div>
        <?php endif; */?>

        <div class="add-hr"></div>

        <div class="container">
                <h2 class="gallery-title"><?php echo $hl_2?$hl_2:'Реализованные проекты';?></h2>
        </div>
        <div class="sap_tabs">
            <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                <ul class="resp-tabs-list">
                    <li class="resp-tab-item"><a href="<?php echo route('catalog'); ?>"><span>Все</span></a></li>
                    <li class="resp-tab-item active"><a href="<?php echo $category->getUrl(); ?>"><span><?php echo $category->getTitle(); ?></span></a></li>
                    <?php foreach ($categories as $_category): ?>
                    <?php if($category->id==$_category->id) continue ?>
                    <li class="resp-tab-item"><a href="<?php echo $_category->getUrl(); ?>"><span><?php echo $_category->getTitle(); ?></span></a></li>
                    <?php endforeach; ?>
                    <div class="clearfix"></div>
                </ul>
                <div class="resp-tabs-container">

                    <div class="resp-tab-content" aria-labelledby="wow bounceIn fadeInDownBig" data-wow-delay="0.4s" style="visibility: visible; -webkit-animation-delay: 0.4s;">
                        <div id="images" class="row <?php echo $category->position?'gorizontal-image':'vertical-image';?>">
                            <?php foreach ($album_images->images as $image): ?>
                            <div class="<?php if($category->position):?>col-lg-4 col-md-3 col-sm-6<?php else: ?>col-md-3 col-sm-6<?php endif;?>">
                                <div class="img-top">
                                    <a href="{!! $image->getImage() !!}" data-lightbox="album-<?php echo $album_images->id?>" data-title="{!! $image->name !!}">
                                        <?php /*<img class="img-responsive" src="<?php echo ImgFly::imgPreset($image->getImage(),'category_image_vertical')?>" alt="{!! $image->name !!}"/>*/ ?>
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

                            <?php if($album_images->images_count()>24): ?>
                            <div id="idmore_block" class="col-sm-12">
                                <div class="more_block">
                                    <button data-skip="24" data-id="<?php echo $category->id?>" class="load_more_images">
                                         <i class="fi-creative-next"></i> Показать еще
                                    </button>
                                </div>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
        $(document).on('click', '.load_more_images',function (e) {
            var category_id = $(this).data("id");
            var skip = $(this).data("skip");

            $.ajax({
                type: 'post',
                url: "{{ route('moreimages') }}",
                data: {category_id: category_id , skip: skip}
            }).done(function (data) {
                $('#idmore_block').remove();
                $("#images").append(data.html);
            });
        });
</script>
<?php endif; ?>

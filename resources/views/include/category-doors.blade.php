<?php if($album_images=$category->doors): ?>
<div class="door-forms-wrap">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="header2">
                <h2 class="title"><?php echo $hl_1?$hl_1:'Мы изготавливаем:' ?></h2>
                </div>
                <div class="door-forms-slider-wrap">
                    <div class="door-forms-slider owl-carousel">
                        <?php foreach ($album_images->images as $image): ?>
                         <div class="door-forms-item">
                                 <img src="<?php echo $image->getImage()?>" alt="{!! $image->name !!}"/>
                                 <span>{!! $image->name !!}</span>
                         </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="features-list" class="fl-fill">
    <div class="container wow fadeInRight bounceIn" data-wow-delay="0.4s" data-wow-offset="100">
        <div class="animate-in-view fadeIn bounceIn" data-animation="fadeIn">
            <div class="features-list columns-5">
                <div class="features-list-in "></div>
                <div class="feature">
                    <div class="media">
                        <div class="media-left media-middle feature-icon">
                            <i class="fi-ecommerce-truck"></i>
                        </div>
                        <div class="media-body media-middle feature-text">
                           Доставка по Беларуси
                        </div>
                    </div>
                </div>


                <div class="feature">
                    <div class="media">
                        <div class="media-left media-middle feature-icon">
                            <i class="fi-creative-like"></i>
                        </div>
                        <div class="media-body media-middle feature-text">
                            3 года полной гарантии
                        </div>
                    </div>
                </div>

                <div class="feature">
                    <div class="media">
                        <div class="media-left media-middle feature-icon">
                            <i class="fi-creative-clock"></i>
                        </div>
                        <div class="media-body media-middle feature-text">
                            Установка по ГОСТу
                        </div>
                    </div>
                </div>

                <div class="feature">
                    <div class="media">
                        <div class="media-left media-middle feature-icon">
                            <i class="fi-ecommerce-wallet"></i>
                        </div>
                        <div class="media-body media-middle feature-text">
                            Оплата по договору в 3 этапа
                        </div>
                    </div>
                </div>

                <div class="feature">
                    <div class="media">
                        <div class="media-left media-middle feature-icon">
                            <i class="fi-creative-bar-chart"></i>
                        </div>
                        <div class="media-body media-middle feature-text">
                          Собственное производство
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
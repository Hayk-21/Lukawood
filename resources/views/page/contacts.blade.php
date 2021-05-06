@extends('layouts.page.home')

@section('content')

<?php /*if ($page->block_h1): ?>
<div class="blocktop">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1><?php echo $hl?$hl:$page->getTitle() ?></h1>
                <div class="blocktopdesc">
                    <?php echo $page->block_h1 ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

    <div class="container">
        <div class="row">
            @include ('include/breadcrumbs',['breadcrumbs'=>$breadcrumbs])
        </div>
    </div>

    <div class="container">
        <div class="add-hr row"></div>

        <div class="row">

            <div id="left-sidebar" class="col-md-3 col-12">
                @include ('include/sidebar-main',['countries'=>$countries])
            </div>

            <div id="content" class="col-md-9 col-12">
                <div class="page">

                    <?php if (!$page->block_h1): ?>
                    <div class="row">
                        <div class="col-12">
                        <h1 class="page-h1"><?php echo $hl?$hl:$page->getTitle() ?></h1>
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="row">
                        <div class="col-12">
                        <div class="page-content">
                            {!! $page->content !!}
                        </div>
                        </div>
                    </div>

                    <?php if($page->images): ?>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title"><?php echo $page->images_h2?$page->images_h2:'Фотоальбом'?></h2>
                        </div>
                    </div>

                    <?php
                    $images=json_decode($page->images,true);
                    $images=str_replace("\\", "/", $images);
                    ?>
                    <div class="row clearfix">
                        <div class="col-12">
                            <div id="photo-slider" class="owl-carousel">
                                <?php $i=1; ?>
                                <?php foreach($images as $image): ?>
                                <div class="photo">
                                    <a href="/storage/<?php echo $image ?>" data-gallery="product-gallery" data-title="<?php echo $page->getTitle()?>" data-type="image" data-toggle="lightbox">
                                        <img src="{{ Imgfly::imgPreset('/storage/'.$image,'photo-slider') }}" class="img-fluid mx-auto d-block" />
                                    </a>
                                </div>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>

                    <?php if($page->seo_h2 && $page->block_h2): ?>
                    <div class="row">
                        <div class="col-12">
                            <h2 class="title"><?php echo $page->seo_h2?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <?php echo $page->block_h2; ?>
                        </div>
                    </div>
                    <?php endif; ?>


                    <div class="row">
                        <div class="col-12">
                        <div class="page-code">
                           <?php echo $page->code; ?>
                        </div>
                        </div>
                    </div>

                    <?php if($page->active_reviews): ?>
                    @include ('include/reviews',['reviews'=>$page->reviews->paginate(5),'model_type'=>'page'])
                    <?php endif; ?>


                </div>
            </div>
        </div>
    </div>*/ ?>

<div class="content">
    <div class="container">
        <div class="row">
            @include ('include/breadcrumbs',['breadcrumbs'=>$breadcrumbs])
        </div>
        <div class="add-hr row"></div>
    </div>


    <div class="contact">
        <div class="container">
            <h1><?php echo $hl?$hl:$page->getTitle() ?></h1>

            <div class="contact-grids">
            <div class="col-md-6 contact-grid wow fadeInLeft bounceIn" data-wow-delay="0.4s">
                    <div class="h4">Напишите нам сейчас!</div>
                    <p>Контакты</p>
                    <form class="form-contact" action="<?php echo route('maincall')?>" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <label>Имя</label>
                        <input type="text" name="client_name" placeholder="Введите имя" required>
                        <div class="row">
                            <div class="col-md-6 row-grid">
                                <label>Email</label>
                                <input type="text" name="client_email" placeholder="Email">
                            </div>
                            <div class="col-md-6 row-grid">
                                <label>Телефон</label>
                                <input type="text" name="client_phone" placeholder="+375 (00) 000-00-00" required>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row1">
                            <label>Сообщение</label>
                            <textarea name="client_message" placeholder="Введите сообщение"></textarea>
                        </div>
                        {!!  GoogleReCaptchaV3::renderField('maincall_id','maincall') !!}
                        <input onclick="yaCounter57091114.reachGoal('Otpravit_contact'); ga('send','event','Knopka','Otpravit_contact'); return true;" type="submit" value="Отправить">
                    </form>
            </div>
            {!! $page->content2; !!}
        </div>
    </div>

</div>

@endsection

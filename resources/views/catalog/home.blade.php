@extends('layouts.catalog.home')

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                @include ('include/breadcrumbs',['breadcrumbs'=>$breadcrumbs])
            </div>
            <div class="add-hr row"></div>
        </div>

        @include ('include/category-description')
        <?php /*@include ('include/category-doors')*/ ?>

        <div class="gallery">

            <div class="container">
                <div class="add-hr row"></div>
                    <h2 class="gallery-title"><?php echo $hl_2?$hl_2:'Реализованные проекты';?></h2>

                    <div class="sap_tabs">
                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <ul class="resp-tabs-list">
                                <li class="resp-tab-item active"><a href="<?php echo route('catalog'); ?>"><span>Все</span></a></li>
                                <?php foreach ($categories as $category): ?>
                                <li class="resp-tab-item"><a href="<?php echo $category->getUrl(); ?>"><span><?php echo $category->getTitle(); ?></span></a></li>
                                <?php endforeach; ?>
                                <div class="clearfix"></div>
                            </ul>
                            <div class="resp-tabs-container">
                                    {!! VoyagerAlbums::shortcode("[album('katalog-vse-izobrazheniya');]") !!}
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        @include('include/callback')
        @include('include/map')
    </div>
@endsection
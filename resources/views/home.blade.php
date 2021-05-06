@extends('layouts.home')

@section('banner-text')
    <?php echo setting('site.background_desc'); ?>
@endsection

@section('content')
    <div class="content">
        <?php echo setting('site.block1'); ?>

        <?php echo setting('site.block2'); ?>

        <?php echo setting('site.block4'); ?>

        <?php echo setting('site.block3'); ?>

        @include('include/callback')
        @include('include/map')
    </div>
@endsection
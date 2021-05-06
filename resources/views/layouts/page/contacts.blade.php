<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{ $keywords }}"/>
    <meta name="description" content="{{ $description }}"/>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/top.js') }}"></script>
    <link href="{{ $canonical }}" rel="canonical" />
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
</head>

<header>
    <div class="header head">
        <div class="container">
            <div class="heder-top">
                <div class="logo">
                    <a href="/" title="<?php echo setting('site.brand')?>"><?php echo setting('site.brand')?></a>
                </div>

                <div class="nav-icon">
                    <a href="#" class="navicon"></a>
                    <div class="toggle">
                        <ul class="toggle-menu">
                            <li><a class="active" href="/">Главная</a></li>
                            <?php echo menu('topmenu', 'topmenu'); ?>
                        </ul>
                    </div>
                </div>

                <div class="phone">
                    <?php echo setting('site.phone'); ?>
                </div>


                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</header>

<main>
    @include('flash::message')
    @yield('content')
</main>

<footer>
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <?php echo setting('site.footer'); ?>
                <a href="#" class="scrollup">Наверх</a>
            </div>
        </div>
    </div>
</footer>
</body>

{!!  GoogleReCaptchaV3::init() !!}
<script src="{{ mix('/js/bottom.js') }}"></script>
</html>

<!DOCTYPE HTML>
<html lang="{{ app()->getLocale() }}">
<head>
    <title>Ошибка 404</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <!-- Template CSS -->
    <link type="text/css" media="all" href="/css/404/style.css" rel="stylesheet" />
    <!-- Responsive CSS -->
    <link type="text/css" media="all" href="/css/404/respons.css" rel="stylesheet" />
    <link rel="shortcut icon" href="/favicon.ico.png" type="image/x-icon">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
</head>

<body>
    <!-- Load page -->
    <div class="animationload">
        <div class="loader">
        </div>
    </div>
    <!-- End load page -->

    <!-- Content Wrapper -->
    <div id="wrapper">
        <div class="container">
            <!-- Switcher -->
            <div class="switcher">
                <input id="sw" type="checkbox" class="switcher-value">
                <label for="sw" class="sw_btn"></label>
                <div class="bg"></div>
                <div class="text"><span class="text-l">Выкл</span><span class="text-d">Вкл</span><br />Свет</div>
            </div>
            <!-- End Switcher -->

            <!-- Dark version -->
            <div id="dark" class="row text-center">
                <div class="info">
                    <img src="/images/404.png" alt="404 error" />
                </div>
            </div>
            <!-- End Dark version -->

            <!-- Light version -->
            <div id="light" class="row text-center">
                <!-- Info -->
                <div class="info">
                    <img src="/images/404.gif" alt="404 error" />
                    <h4 class="h4">Страница, которую вы ищете, возможно была перемещена, удалена, переименована или никогда не существовала.</h4>
                    <a href="/" class="btn">Главная</a>
                    <a href="/contacts" class="btn btn-brown">Контакты</a>
                </div>
                <!-- end Info -->
            </div>
            <!-- End Light version -->

        </div>
        <!-- end container -->
    </div>
    <!-- end Content Wrapper -->
        <!-- Scripts -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="/js/404/modernizr.custom.js" type="text/javascript"></script>
    <script src="/js/404/jquery.nicescroll.min.js" type="text/javascript"></script>
    <script src="/js/404/scripts.js" type="text/javascript"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</body>
</html>
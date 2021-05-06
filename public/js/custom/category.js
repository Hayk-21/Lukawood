$(document).ready(function(){

    lightbox.option({
        albumLabel: "Изображение %1 из %2",
    });

    $('.door-forms-slider').owlCarousel({
        "items":"6",
        "nav":true,
        "slideSpeed":300,
        "dots":true,
        "rtl":false,
        "paginationSpeed":400,
        navText  : [
            "<span class=\"glyphicon glyphicon-chevron-left\"></span>",
            "<span class=\"glyphicon glyphicon-chevron-right\"></span>"
        ],
        "margin":0,
        responsive : {
            0 : {
                items : 1,
            },
            480: {
                items : 2,
            },
            768 : {
                items : 3,
            },
            992 : {
                items : 4,
            },
            1200 : {
                items : 6,
            },
        },
    });

});






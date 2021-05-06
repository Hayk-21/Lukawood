$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function(){

    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.scrollup').fadeIn();
        } else {
            $('.scrollup').fadeOut();
        }
    });

    $('.scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });

    $('.navicon').on('click', function (e) {
        e.preventDefault();
        $(this).toggleClass('navicon--active');
        $('.toggle').toggleClass('toggle--active');
    });

    $('#flash-overlay-modal').modal('show');


    $(window).width(function() {

        if ($(window).width() > 992) {
            window.wow.init();
        }

    });

    $('.inputfile').on('change', function (e) {

        var f_name = [];

        for (var i = 0; i < $(this).get(0).files.length; ++i) {

            f_name.push(' ' + $(this).get(0).files[i].name);

        }

        var f_name_count = f_name.length;

        if(f_name_count == 1) {

            $(".inputfile_view").html(f_name);

        } else {

            $(".inputfile_view").html('Выбрано ' + f_name_count + ' Файла(ов)');

        }

    });


});




jQuery(document).ready(function ($) {


    $(window).stellar();

    var links = $('.navigation').find('li');
    slide = $('.slide');
    button = $('.button');
    mywindow = $(window);
    htmlbody = $('html,body');


    slide.waypoint(function (event, direction) {

        dataslide = $(this).attr('data-slide');

        if (direction === 'down') {
            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').prev().removeClass('active');
        }
        else {
            $('.navigation li[data-slide="' + dataslide + '"]').addClass('active').next().removeClass('active');
        }

    });
 
    mywindow.scroll(function () {
        if (mywindow.scrollTop() == 0) {
            $('.navigation li[data-slide="1"]').addClass('active');
            $('.navigation li[data-slide="2"]').removeClass('active');
//            $('#head').css("width","100%");
//            $('#head').css("margin-left","auto");
//            $('#head').css("margin-right","auto");
//            $('#head').css("z-index","100");
//            $('#head').css("position","relative");
//            $('#head').css("background","url(../image/homepage/)");

//            $('#header').css("margin-top","174px");
//            $('#header').css("position","relative");
//            $('#header').css("z-index","100");
//            $('#header').css("left","50%");
//            $('#header').css("top","0");
//            $('#header').css("margin-left","-500px");
        }else{
//           $('#head').css("width","100%");
//            $('#head').css("margin-left","auto");
//            $('#head').css("margin-right","auto");
//            $('#head').css("z-index","100");
//            $('#head').css("position","relative");
//            $('#head').css("background-color","white");

//            $('#header').css("margin-top","174px");
//            $('#header').css("position","relative");
//            $('#header').css("z-index","100");
//            $('#header').css("left","50%");
//            $('#header').css("top","0");
//            $('#header').css("margin-left","-500px");
            
        }
        
    });

    function goToByScroll(dataslide) {
        htmlbody.animate({
            scrollTop: $('.slide[data-slide="' + dataslide + '"]').offset().top
        }, 2000, 'easeInOutQuint');
        
        
    }



    links.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);
    });

    button.click(function (e) {
        e.preventDefault();
        dataslide = $(this).attr('data-slide');
        goToByScroll(dataslide);

    });


});
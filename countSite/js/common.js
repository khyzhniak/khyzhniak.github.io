$('.slAwards').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: $('.slPrev'),
    nextArrow: $('.slNext'),
    responsive: [
        {
            breakpoint: 960,
            settings: {
                slidesToShow: 3,

            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,

            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,

            }
        }
    ]
});

$('.slMain').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slDots',
    autoplay: true,
    autoplaySpeed: 3000,
    lazyLoad: 'ondemand',
});
$('.slDots').slick({
    slidesToShow: 5,
    slidesToScroll: 5,
    asNavFor: '.slMain',
    centerMode: true,

    focusOnSelect: true,
    responsive: [
        {
            breakpoint: 960,
            settings: {
                // centerMode: false,

            }
        }
    ]
});

var slide1 = new Vivus('slide12', {type: 'delayed', duration: 150},
    function () {
        if (window.console) {
            $("#slide12").fadeOut(1200);
        }

    });
var slide2 = new Vivus('slide22', {type: 'delayed', duration: 150},
    function () {
        if (window.console) {
            $("#slide22").fadeOut(1200);
        }

    });
var slide3 = new Vivus('slide32', {type: 'delayed', duration: 150},
    function () {
        if (window.console) {
            $("#slide32").fadeOut(1200);
        }

    });
var slide4 = new Vivus('slide42', {type: 'delayed', duration: 1000},
    function () {
        if (window.console) {
            $("#slide42").fadeOut(1200);
        }
    });

$('.slMain').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
    var id1 = '#slide' + nextSlide + '2';
    var id2 = '#slide' + nextSlide + '1';
    var slide = 'slide' + nextSlide;
    $(id1).css('display', 'block');
    $(id2).css('display', 'none');
    $(id2).fadeIn(3000);
    console.log("slide-" + slide);
    if (nextSlide === 1) {
        slide1.reset().play();

    } else if (nextSlide === 2) {
        slide2.reset().play();

    } else if (nextSlide === 3) {
        slide3.reset().play();

    } else if (nextSlide === 4) {
        slide4.reset().play();

    }
    console.log("nextSlide-" + nextSlide);
});

function sendText(el) {
    var x = $(el).data("send");
    $('#ago').val(x);
    $('#hiddenInput').val(x);
    console.log('asdasd')
}

$('.loadPopup').fancybox();
jQuery('.menu-icon').click(function () {
    jQuery(this).toggleClass('opened');
});

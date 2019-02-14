$('.sl_ourProject').slick({
    prevArrow: '<div class="prevArrow customClick"></div>',
    nextArrow: '<div class="nextArrow customClick"></div>',
    responsive: [
        {
            breakpoint: 576,
            settings: {
                prevArrow: null,
                nextArrow: null,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 1
            }
        }]

});


$('.sl_partners').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    prevArrow: '<div class="prevArrow customClick"></div>',
    nextArrow: '<div class="nextArrow customClick"></div>',
    responsive: [
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 762,
            settings: {
                slidesToShow: 2
            }
        }, {
            breakpoint: 576,
            settings: {
                prevArrow: null,
                nextArrow: null,
                autoplay: true,
                autoplaySpeed: 2000,
                slidesToShow: 1
            }
        }]

});

$(document).ready(function () {
    $('.loadPopup').fancybox();
});

$('.showHide').click(function (e) {
    e.preventDefault();
    $('.hideContent').toggleClass('toggle');
    $('.showHide').text($('.hideContent').is(':visible') ? 'Меньше' : 'Больше направлений');

});

function shov() {
    $('.hideContent').toggleClass('toggle');
    $('.showHide').text($('.hideContent').is(':visible') ? 'Меньше' : 'Больше направлений');
}

function sendText(el) {
    var x = $(el).data("send");
    $('#hiddenInput').val(x);
}

//Плавная прокрутка
$(document).ready(function () {
    $("a").click(function () {
        var elementClick = $(this).attr("href");
        var destination = $(elementClick).offset().top;
        $('html').animate({scrollTop: destination}, 1100);
        return false;
    });
});
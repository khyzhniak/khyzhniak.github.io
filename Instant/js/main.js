jQuery(document).ready(function( $ ) {
    $('.sl_portfolio_page').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
    });
    $("a.group").fancybox();
});

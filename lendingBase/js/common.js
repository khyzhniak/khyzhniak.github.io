$('.wathButt').click(function(){
    $('.contentPrice').animate({opacity: 'toggle', height: 'toggle'}, 1000);
    $('.unit_6').animate({opacity: 'toggle', height: 'toggle'}, 1000);
    $('.unit_7').animate({opacity: 'toggle', height: 'toggle'}, 1000);
});

$(document).ready(function() {
    $('#carouselOne').owlCarousel({
        loop:true, //Зацикливаем слайдер
        margin:25, //Отступ от элемента справа в 50px
        nav:false, //Отключение навигации
        dots:true,
        dotsEach:true,
        autoplay:true, //Автозапуск слайдера
        smartSpeed:500, //Время движения слайда
        autoplayTimeout:4000, //Время смены слайда
        responsive:{ //Адаптивность. Кол-во выводимых элементов при определенной ширине.
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });
});
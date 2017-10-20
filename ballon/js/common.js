$(function () {
    (function ($) {
        $(function () {

            $('input, select').styler();

        });
    })(jQuery);
});
$(".portfolio_item").click(function () {	// Событие клика на маленькое изображение
    var img = $('img', jQuery(this));	// Получаем изображение, на которое кликнули
    var src = img.attr('src'); // Достаем из этого изображения путь до картинки
    $("body").append("<div class='popup'>" + //Добавляем в тело документа разметку всплывающего окна
        "<div class='popup_bg'></div>" + // Блок, который будет служить фоном затемненным
        "<img src=" + src + " class='popup_img' />" + // Само увеличенное фото
        "</div>");
    $(".popup").fadeIn(800); // Медленно выводим изображение
    $(".popup_bg").click(function () {	// Событие клика на затемненный фон
        $(".popup").fadeOut(800);	// Медленно убираем всплывающее окно
        setTimeout(function () {	// Выставляем таймер
            $(".popup").remove(); // Удаляем разметку высплывающего окна
        }, 800);
    });
});
//////////////////
$('.clickAdd').click(function () {
    $('.portfolio_item_add').animate({opacity: 'toggle', height: 'toggle'}, 1000);
    $('.clickAdd').animate({opacity: 'toggle', height: 'toggle'}, 1000);
    $('.clickClose').animate({opacity: 'toggle', height: 'toggle'}, 1000);
});
$('.clickClose').click(function () {
    $('.portfolio_item_add').animate({opacity: 'toggle', height: 'toggle'}, 1000);
    $('.clickAdd').animate({opacity: 'toggle', height: 'toggle'}, 1000);
    $('.clickClose').animate({opacity: 'toggle', height: 'toggle'}, 1000);
});
$(function() {
    $("a[rel]").overlay(function() {
        var wrap = this.getContent().find("div.wrap");
        if (wrap.is(":empty")) {
            wrap.load(this.getTrigger().attr("href"));
        }
    });
});
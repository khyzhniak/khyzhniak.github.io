$(function () {
    (function ($) {
        $(function () {
            $('input, select').styler();
        });
    })(jQuery);
});
$(".portfolio_item").click(function () {
    var img = $('img', jQuery(this));
    var src = img.attr('src');
    $("body").append("<div class='popup'>" + "<div class='popup_bg'></div>" + "<img src=" + src + " class='popup_img' />" + "</div>");
    $(".popup").fadeIn(800);
    $(".popup_bg").click(function () {
        $(".popup").fadeOut(800);
        setTimeout(function () {
            $(".popup").remove();
        }, 800);
    });
});
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

$(function calculator() {
    $('.calc').change(function () {
        var price, deliver, viewPrint, gas;
        var viewPrint = $('input[name=viewPrint]:checked').val();
        var quantity = $("#tirag option:selected").val();
        if (viewPrint == 1) {
            if (quantity == 100) {
                price = 21;
            }
            else if (quantity == 200) {
                price = 16;
            } else if (quantity == 300) {
                price = 14;
            } else if (quantity == 400) {
                price = 12;
            } else if (quantity == 500) {
                price = 11.4;
            } else if (quantity == 1000) {
                price = 7;
            } else if (quantity == 1500) {
                price = 6.6;
            } else if (quantity == 2000) {
                price = 6.5;
            } else if (quantity == 3000) {
                price = 6;
            } else if (quantity == 4000) {
                price = 5.5;
            } else if (quantity == 5000) {
                price = 5;
            } else if (quantity == 7000) {
                price = 4.5;
            } else if (quantity == 10000) {
                price = 4.2;
            }
        } else if (viewPrint == 2) {
            if (quantity == 100) {
                price = 30;
            }
            else if (quantity == 200) {
                price = 22;
            } else if (quantity == 300) {
                price = 19;
            } else if (quantity == 400) {
                price = 17;
            } else if (quantity == 500) {
                price = 16;
            } else if (quantity == 1000) {
                price = 9.5;
            } else if (quantity == 1500) {
                price = 8.4;
            } else if (quantity == 2000) {
                price = 7.8;
            } else if (quantity == 3000) {
                price = 7.4;
            } else if (quantity == 4000) {
                price = 6.5;
            } else if (quantity == 5000) {
                price = 6;
            } else if (quantity == 7000) {
                price = 5.5;
            } else if (quantity == 10000) {
                price = 5;
            }
        }
        var deliver = $('input[name=deliver]:checked').val();
        priceDeliver = +deliver;
        var gas = $('input[name=gasBollon]:checked').val();
        priceEnd = price * quantity;
        if (gas == 27 && quantity <= 300) {
            priceEnd = priceEnd + (27 * quantity);
            if (deliver == 400) {
                priceDeliver = priceDeliver + 150;
                priceEnd = priceEnd + priceDeliver;
            }
        } else if (gas == 27 && quantity == 400) {
            priceEnd = priceEnd + (27 * quantity);
            if (deliver == 400) {
                priceDeliver = priceDeliver + 600;
                priceEnd = priceEnd + priceDeliver;
            }
        } else if (gas == 27 && quantity >= 500) {
            priceEnd = priceEnd + (25 * quantity);
            if (deliver == 400) {
                priceDeliver = priceDeliver + 600;
                priceEnd = priceEnd + priceDeliver;
            }
        } else if (gas == 15 && quantity <= 300) {
            priceEnd = priceEnd + (15 * quantity);
            if (deliver == 400) {
                priceDeliver = priceDeliver + 150;
                priceEnd = priceEnd + priceDeliver;
            }
        } else if (gas == 15 && quantity == 400) {
            priceEnd = priceEnd + (15 * quantity);
            if (deliver == 400) {
                priceDeliver = priceDeliver + 600;
                priceEnd = priceEnd + priceDeliver;
            }
        } else if (gas == 15 && quantity >= 500 && quantity <= 1000) {
            priceEnd = priceEnd + (12 * quantity);
            if (deliver == 400) {
                priceDeliver = priceDeliver + 600;
                priceEnd = priceEnd + priceDeliver;
            }
        } else if (gas == 15 && quantity >= 1500 && quantity < 10000) {
            priceEnd = priceEnd + (10 * quantity);
            if (deliver == 400) {
                priceDeliver = priceDeliver + 600;
                priceEnd = priceEnd + priceDeliver;
            }
        } else if (gas == 15 && quantity == 10000) {
            priceEnd = priceEnd + (8 * quantity);
            if (deliver == 400) {
                priceDeliver = priceDeliver + 600;
                priceEnd = priceEnd + priceDeliver;
            }
        } else if (deliver == 400) {
            priceEnd = priceEnd + priceDeliver;
        }
        document.getElementById('rezult').innerHTML = +priceEnd + " руб.";
        document.getElementById('priceDeliv').innerHTML = +priceDeliver + " рублей";
    })
});

$(function form() {
    $('.changeForm').change(function () {
        var viewPrintColl = $('input[name=editColor]:checked').val();
        document.getElementById('colorPrint').value = "цвет печати: " + viewPrintColl;
        var viewBallColl = $('input[name=editColor1]:checked').val();
        document.getElementById('colorBall').value = "цвет шарика: " + viewBallColl;
        $("input[name=viewPrint]:checked").each(function () {
            var idRadioP = $(this).attr("id");
            var viewPrint = $("label[for='" + idRadioP + "']").text();
            document.getElementById('viewPrint').value = "вид печати: " + viewPrint;
        });
        $("input[name=gasBollon]:checked").each(function () {
            var idRadioC = $(this).attr("id");
            var gasForBall = $("label[for='" + idRadioC + "']").text();
            document.getElementById('gasForBall').value = "чем накачать: " + gasForBall;
        });
        var quantity = $("#tirag option:selected").val();
        document.getElementById('quantBall').value = "тираж: " + quantity;
        document.getElementById('delivForm').value = "стоимость доставки: " + priceDeliver;
        document.getElementById('sum').value = "итого: " + priceEnd;
    });
});
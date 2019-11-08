//Попап с информацией о сайте Mels Industries
if (document.documentElement.clientWidth > 768) {
    $(".mels_popup-open").hover(function () {
        $(".mels_popup-content").load("https://mels.industries/by_mels_popup_content/");
    });
    $(".mels_popup-open").click(function () {
        $(".mels_popup").fadeIn("slow");
    });
}

if (document.documentElement.clientWidth <= 768) {
    var jqBar = $(".copyright");
    $(window).scroll(function () {
        var scrollEvent = ($(window).scrollTop() > (jqBar.position().top - $(window).height()));
        if (scrollEvent) {
            $(".mels_popup-content").load("https://mels.industries/by_mels_popup_content/");
        }
    });
    $(".mels_popup-open").click(function () {
        $(".mels_popup").fadeIn("slow");
    });
}

$(".mels_popup-close_icon").click(function () {
    $(".mels_popup").fadeOut("fast");
});
$(document).mouseup(function (e) {
    if ($(".mels_popup").has(e.target).length === 0) {
        $(".mels_popup").fadeOut("fast");
    }
});
//end////////Попап с информацией о сайте Mels Industries

$('.sl_1').slick({
    arrows: false,
    dots: true
});
$('.sl_2').slick({
    arrows: false,
    dots: true,
    slidesToShow: 4,
    responsive: [

        {
            breakpoint: 960,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});
$('.sl_3').slick({
    arrows: false,
    dots: true,
    slidesToShow: 3,
    responsive: [

        {
            breakpoint: 960,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
            }
        }
    ]
});
$('.slItemServ').slick({
    arrows: false,
    dots: true,
});
// $('.sl_4').slick({
//     arrows: false,
//     dots: true,
//     slidesToShow: 2,
//     // swipe: false
//
// });

function xxx(el) {
    var name = el.getAttribute('id');
    var label = document.querySelector('label[for=' + name + ']');
    if (el.value != '') {
        label.style.top = '-20px'
        label.style.color = '#28a8cc'
        label.style.textTransform = 'uppercase'
        label.style.fontSize = '12px'
    } else {
        label.style.top = '0'
        label.style.color = '#111'
        label.style.textTransform = 'none'
        label.style.fontSize = '16px'
    }
}

(function () {
    var floatingLabel;
    floatingLabel = (function () {
        function floatingLabel(form, options) {
            var event, i, input, j, label, len, len1, ref, ref1;
            if (options == null) {
                options = {};
            }
            if (!form) {
                return;
            }
            options.focusClass || (options.focusClass = "focus");
            options.activeClass || (options.activeClass = "active");
            options.errorClass || (options.errorClass = "error");
            form.classList.add('has-floated-label');
            ref = form.querySelectorAll('label');
            for (i = 0, len = ref.length; i < len; i++) {
                label = ref[i];
                if (!(input = document.querySelector("#" + (label.getAttribute('for'))))) {
                    return;
                }
                ref1 = ['keyup', 'input', 'change'];
                for (j = 0, len1 = ref1.length; j < len1; j++) {
                    event = ref1[j];
                    input.addEventListener(event, function () {
                        this.parentNode.classList.remove(options.errorClass);
                        return this.parentNode.classList.toggle(options.activeClass, !!this.value);
                    });
                }
                input.addEventListener('focus', function () {
                    return this.parentNode.classList.add(options.focusClass);
                });
                input.addEventListener('blur', function () {
                    return this.parentNode.classList.remove(options.focusClass);
                });
                input.parentNode.classList.toggle(options.activeClass, !!input.value);
            }
        }

        return floatingLabel;
    })();
    window.floatingLabel = new floatingLabel(document.querySelector('.form'));
}).call(this);


// function sendText(el) {
//     var x = $(el).data("send");
//     $('#ago').val(x);
//     $('#hiddenInput').val(x);
//     console.log('asdasd')
// }
$('.loadPopup').fancybox();

$('.dropdown-top').click(function () {
    $('.dropdown-inside').animate({opacity: 'toggle', height: 'toggle'}, 1000);
});

$(document).on('click', function (e) {
    if (!$(e.target).closest(".dropdown").length) {
        $('.dropdown-inside').hide();
    }
    e.stopPropagation();
});


$('.subMenuHref').click(function () {
    $('.subMenu').animate({opacity: 'toggle', height: 'toggle'}, 100);
});

$(document).on('click', function (e) {
    if (!$(e.target).closest(".subMenuHref").length) {
        $('.subMenu').hide();
    }
    e.stopPropagation();
});

$('.accordion-item .heading').on('click', function (e) {
    e.preventDefault();

    // Add the correct active class
    if ($(this).closest('.accordion-item').hasClass('active')) {
        // Remove active classes
        $('.accordion-item').removeClass('active');
    } else {
        // Remove active classes
        $('.accordion-item').removeClass('active');

        // Add the active class
        $(this).closest('.accordion-item').addClass('active');
    }

    // Show the content
    var $content = $(this).next();
    $content.slideToggle(100);
    $('.accordion-item .acContent').not($content).slideUp('fast');
});
// $(document).on('click', function (e) {
//     if (!$(e.target).closest("#ham").length) {
//         $('#menu').hide();
//         ham.classList.remove('active');
//
//     }
//     e.stopPropagation();
// });
function toggleMenu() {
    ham.classList.toggle('active');
    menu.classList.toggle('activeMenu');

}

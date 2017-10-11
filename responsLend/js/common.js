$(document).ready(function() {

    $(".auth_buttons").click(function() {
        $(this).next().slideToggle();
    });

    $(".main_mnu_button").click(function() {
        $(".maian_mnu ul").slideToggle();
    });


    $(".fancybox").fancybox();



    var owl = $(".carousel");
    owl.owlCarousel({
        items: 3,
        autoHeight: true,

    });
    owl.on("mousewheel", ".owl-wrapper", function(e) {
        if (e.deltaY > 0) {
            owl.trigger("owl.prev");
        } else {
            owl.trigger("owl.next");
        }
        e.preventDefault();
    });
    $(".next_button").click(function() {
        owl.trigger("owl.next");
    });
    $(".prev_button").click(function() {
        owl.trigger("owl.prev");
    });

    $("#callback").submit(function() {
        $.ajax({
            type: "GET",
            url: "mail.php",
            data: $("#callback").serialize()
        }).done(function() {
            alert("Спасибо за заявку!");
            setTimeout(function() {
                $.fancybox.close();
            }, 1000);
        });
        return false;
    });

});

$(".clicBlock").click(function () {
    $(".rightContentIn").css("display", "block")
    $(".tagLine").css("display", "none")
});
$(".logoImg").click(function () {
    $(".rightContentIn").css("display", "none")
    $(".tagLine").css("display", "block")
});
$(function () {
    $("#tabs").tabs().addClass("ui-tabs-vertical ui-helper-clearfix");
    $("#tabs li").removeClass("ui-corner-top").addClass("ui-corner-left");
});
$(function () {
    $("#tabsForm").tabs();
});
$(document).ready(function () {

    $("form#buy").submit(function() {
        $.ajax({
            type: "POST",
            url: "buy.php",
            data: $(this).serialize()
        }).done(function() {
            $(this).find("input").val("");
            alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
            $("form#buy").trigger("reset");
        });
        return false;
    });
    
    $("form#sell").submit(function() {
        $.ajax({
            type: "POST",
            url: "sell.php",
            data: $(this).serialize()
        }).done(function() {
            $(this).find("input").val("");
            alert("Спасибо за заявку! Скоро мы с вами свяжемся.");
            $("form#sell").trigger("reset");
        });
        return false;
    });

});

 $(document).ready(function() {
     $('.bxslider').bxSlider({
         pagerCustom: '.bx_pager',
         сontrols: true,
         prevText: 'Prev',
         nextText: 'Next'
     });
 });

 $(document).ready(function() {
     $(".modalbox").fancybox();
     $("#f_contact").submit(function() {
         return false;
     });
     $("#f_send").on("click", function() {

         // тут дальнейшие действия по обработке формы
         // закрываем окно, как правило делать это нужно после обработки данных
         $("#f_contact").fadeOut("fast", function() {
             $(this).before("<p><strong>Ваше сообщение отправлено!</strong></p>");
             setTimeout("$.fancybox.close()", 1000);
         });
     });
 });

 $('form').submit(function() {
     if ($(this).isCorrectRequest() === true) {
         return true; } else {
         return false; } });

 (function($) {
     $.fn.isCorrectRequest = function() {

         this.find('input[type=text]').removeClass('incorrect');
         this.find('input[type=email]').removeClass('incorrect');

         var cansend = 'true';

         if (this.find('input[name=name]').hasClass("required")) {
             var nameInput = $(this).find('input[name=name]');
             nameInput.val($.trim(nameInput.val()));
             if (nameInput.val() !== undefined) {
                 if (nameInput.val().length === 0) {
                     nameInput.addClass('incorrect');
                     if (cansend !== 'false') { nameInput.focus(); }
                     cansend = 'false';

                 }
             }
         }
         if (this.find('input[name=phone]').hasClass("required")) {
             var phoneInput = $(this).find('input[name=phone]');
             phoneInput.val($.trim(phoneInput.val()));
             if (phoneInput.val() !== undefined) {
                 if (phoneInput.val().length === 0) {
                     phoneInput.addClass('incorrect');
                     if (cansend !== 'false') { phoneInput.focus(); }
                     cansend = 'false';
                 }
             }
         }
         if (this.find('input[name=email]').hasClass("required")) {
             var emailInput = $(this).find('input[name=email]');
             emailInput.val($.trim(emailInput.val()));
             if (emailInput.val() !== undefined) {
                 if (emailInput.val().length === 0) {
                     emailInput.addClass('incorrect');
                     if (cansend !== 'false') { emailInput.focus(); }
                     cansend = 'false';
                 }
             }
         }

         if (cansend === 'false') {
             return false; } else {
             return true; }
     };
 })(jQuery);
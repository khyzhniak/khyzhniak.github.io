<?
$check_spam_status = false;
/* эти поля должны быть пустыми (антиспам-фильтр) */
if (($_POST['name'] != 'name') or ($_POST['mail'] != '') or ($_POST['tel'] != '') or ($_POST['url'] != '') or ($_POST['email'] != '') or ($_POST['phone'] != '')) {
  $check_spam_status = true;
}
/* ссылка на страницу */
if (isset($_POST['pago'])) {
  $form_page_link = $_POST['pago'];
}
/* Проверка на заполненность */
if (($_POST['telefono'] == '') && ($_POST['posto'] == '') && ($_POST['telegram'] == '') && ($_POST['viber'] == '') && ($_POST['whatsapp'] == '') && ($_POST['skype'] == '')) {
  $check_spam_status = true;
}

/* на какую почту отправляем письмо */
$support_mail = 'garri.work@gmail.com';

/* вынимаем данные человека */
/* имя */
if (isset($_POST['nomo'])) {
  $user_name = $_POST['nomo'];
}
if (isset($_POST['firma'])) {
  $user_nameFirm = $_POST['firma'];
}
/* почта */
if (isset($_POST['posto'])) {
  $user_mail = $_POST['posto'];
}
/* телефон или скайп */
if (isset($_POST['telefono'])) {
  $user_phone = $_POST['telefono'];
}
/* сообщение человека */
if (isset($_POST['mesago'])) {
  $user_mes = $_POST['mesago'];
}
/* Telegram */
if (isset($_POST['telegram'])) {
  $user_telegram = $_POST['telegram'];
}
/* viber */
if (isset($_POST['viber'])) {
  $user_viber = $_POST['viber'];
}
/* whatsapp */
if (isset($_POST['whatsapp'])) {
  $user_whatsapp = $_POST['whatsapp'];
}
/* Skype */
if (isset($_POST['skype'])) {
  $user_skype = $_POST['skype'];
}

/* вынимаем данные о форме */
/* Где расположена форма */
if (isset($_POST['formo'])) {
  $form_location = $_POST['formo'];
}
/* ссылка на страницу */
if (isset($_POST['pago'])) {
  $form_page_link = $_POST['pago'];
}
/* Данные о форме (УТП) */
if (isset($_POST['ago'])) {
  $form_data = $_POST['ago'];
}


/* формируем тему письма */
$mail_subject = 'Сообщение с сайта ' . $_SERVER['HTTP_HOST'];
if ($user_name != '') {
  $mail_subject .= ' от ' . $user_name;
};
if ($user_mail != '') {
  $mail_subject .= ', e-mail: ' . $user_mail;
};
if ($user_phone != '') {
  $mail_subject .= ', тел: ' . $user_mail;
};

/* формируем содержимое тела письма */
$mail_message = '<html>
<head>
    <title>' . $mail_subject . '</title>
</head>
<body>
<div>Заявка с сайта ' . $_SERVER['HTTP_HOST'] . '</div>';
if ($user_name != '') {
  $mail_message .= '<div>Имя: ' . $user_name . '</div>';
}
if ($user_nameFirm != '') {
  $mail_message .= '<div>Название организации: ' . $user_nameFirm . '</div>';
}
if ($user_mail != '') {
  $mail_message .= '<div>E-mail: ' . $user_mail . '</div>';
}
if ($user_phone != '') {
  $mail_message .= '<div>Телефон: ' . $user_phone . '</div>';
}
if ($user_telegram != '') {
  $mail_message .= '<div>Telegram: ' . $user_telegram . '</div>';
}
if ($user_viber != '') {
  $mail_message .= '<div>Viber: ' . $user_viber . '</div>';
}
if ($user_whatsapp != '') {
  $mail_message .= '<div>Whatsapp: ' . $user_whatsapp . '</div>';
}
if ($user_skype != '') {
  $mail_message .= '<div>Skype: ' . $user_skype . '</div>';
}
if ($user_mes != '') {
  $mail_message .= '<div>Сообщение человека: ' . $user_mes . '</div>';
}
if ($form_data != '') {
  $mail_message .= '<div>Данные о форме (УТП): ' . $form_data . '</div>';
}
if ($form_location != '') {
  $mail_message .= '<div>Где расположена форма: ' . $form_location . '</div>';
}
//if ($form_page_link != '') {
//    $mail_message .= '<div>Ссылка на страницу: <a href="' . $form_page_link . '">' . $form_page_link . '</a></div>';
//}

$mail_message .= '</body></html>';

/* формируем заголовок письма */
$mail_headers = "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=utf-8\r\n";
$mail_headers .= "From: Form notice <notice@" . $_SERVER['HTTP_HOST'] . ">" . "\r\n";


/* отправляем в телеграмм */
$botToken = "594291734:AAG70373bScBEWP7GvQHcisW1YHeGxSqtFI";
$chat_id = "-384582078";
$telegram_message .= 'Заявка с сайта ' . $_SERVER['HTTP_HOST'] . PHP_EOL;
if ($user_name != '') {
  $telegram_message .= 'Имя: ' . $user_name . PHP_EOL;
}

if ($user_nameFirm != '') {
  $telegram_message .= 'Название организации: ' . $user_nameFirm . PHP_EOL;
}
if ($user_mail != '') {
  $telegram_message .= 'E-mail: ' . $user_mail . PHP_EOL;
}
if ($user_phone != '') {
  $telegram_message .= 'Телефон: ' . $user_phone . PHP_EOL;
}
if ($user_telegram != '') {
  $telegram_message .= 'Telegram: ' . $user_telegram . PHP_EOL;
}
if ($user_viber != '') {
  $telegram_message .= 'Viber: ' . $user_viber . PHP_EOL;
}
if ($user_whatsapp != '') {
  $telegram_message .= 'Whatsapp: ' . $user_whatsapp . PHP_EOL;
}
if ($user_skype != '') {
  $telegram_message .= 'Skype: ' . $user_skype . PHP_EOL;
}
if ($user_mes != '') {
  $telegram_message .= 'Сообщение человека: ' . $user_mes . PHP_EOL;
}
if ($form_data != '') {
  $telegram_message .= 'Данные о форме (УТП): ' . $form_data . PHP_EOL;
}
if ($form_location != '') {
  $telegram_message .= 'Где расположена форма: ' . $form_location . PHP_EOL;
}


/* отправляем сообщение */
if (!$check_spam_status) {

  if (mail($support_mail, $mail_subject, $mail_message, $mail_headers)) {
    $send_status = 'true';
  }

  $bot_url = "https://api.telegram.org/bot$botToken/";
  $url = $bot_url . "sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($telegram_message);
  file_get_contents($url);
}


?>
<!DOCTYPE html>
<html lang="ru">

<head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136768355-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-136768355-1');
  </script>
  <meta charset="UTF-8">
  <title>Бесплатное обучение в Словакии!</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <link rel="stylesheet" href="../css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="shortcut icon" href="../img/favicon.png" type="image/png">
  <!-- Facebook Pixel Code -->
  <script>
    !function (f, b, e, v, n, t, s) {
      if (f.fbq) return;
      n = f.fbq = function () {
        n.callMethod ?
          n.callMethod.apply(n, arguments) : n.queue.push(arguments)
      };
      if (!f._fbq) f._fbq = n;
      n.push = n;
      n.loaded = !0;
      n.version = '2.0';
      n.queue = [];
      t = b.createElement(e);
      t.async = !0;
      t.src = v;
      s = b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
      'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '516089888922203');
    fbq('track', 'PageView');
  </script>
  <noscript><img height="1" width="1" style="display:none"
                 src="https://www.facebook.com/tr?id=516089888922203&ev=PageView&noscript=1"/></noscript>
  <!-- End Facebook Pixel Code -->
</head>

<body>
<div class="unit unit_first">
  <header class="wr row center unit_header">
    <div class="address row center">
      <i class="fas fa-map-marker-alt"></i>
      <div class="address__text column">
        <span>адрес партнера в Украине:</span>
        <a target="_blank" href="https://goo.gl/maps/azuqtzn5zcv">Киев, ул. Ярославов Вал 7 офис 402</a>
      </div>
    </div>
    <div class="logo center">
      <img src="../img/logo.png" alt="">
    </div>
    <div class="tel row center ">
      <span class="showTel" onclick="showTel()">+38 067 466 55 68</span>
      <div style="display: none;" class="selLink">
        <a onclick="showTel()" target="_blank" href="tel:+380674665568">+38 067 466 55 68</a>
        <a onclick="showTel()" target="_blank" href="tel:+421918252258">+421 918 252 258</a>
        <a onclick="showTel()" target="_blank" href="tel:+421950708775">+421 950 708 775</a>
        <a onclick="showTel()" target="_blank" href="tel:+380633612212">+38 063 361 22 12</a>
        <a onclick="showTel()" target="_blank" href="tel:+380504883099">+38 050 488 30 99</a>
      </div>
    </div>
  </header>
  <div class="wr row">
    <div class="content column">
      <?php if ($check_spam_status !== true) { ?>
        <h1 class="title">Спасибо за доверие!</h1>
        <p class="garanty">Заявка спешно отправлена. Мы обработаем её и свяжемся с Вами в рабочее время.</p>
        <a href="/" class="btn">вернуться на главную</a>
      <? } else { ?>
        <h1 class="title">Заявка не отправлена!</h1>
        <p class="garanty">Из-за некорректного заполнения полей формы заявка не отправлена и не будет обработана.
          Рекомендуем Вам связаться с представителями компании другим способом.</p>
        <a href="/" class="btn">вернуться на главную</a>
      <?php } ?>
    </div>
    <div class="content column">
      <img class="img_first" src="../img/men_first.png" alt="Конкурентное европейское образование">
      <span class="item_first item_first__green center"><i class="fas fa-check"></i>Конкурентное европейское образование</span>
      <span class="item_first item_first__blue center"><i class="fas fa-check"></i>Родительский контроль за успеваемостью</span>
      <span class="item_first item_first__dark center"><i class="fas fa-check"></i>Полное сопровождение абитуриентов на <br>
всех этапах поступления</span>
    </div>
  </div>
</div>


<footer class="unit unit_footer">
  <div class="wr row">
    <div class="itemFooter column">
      <div class="address row">
        <i class="fas fa-map-marker-alt"></i>
        <div class="address__text column">
          <span>адрес партнера в Украине:</span>
          <p>г. Киев, ул. Ярославов Вал 7 <br> офис 402</p>
          <a href="https://goo.gl/maps/azuqtzn5zcv" class="goToMap"><i>Показать на карте</i></a>

        </div>
      </div>
      <p><a href="#">Наши услуги </a>|<a href="#"> О компании</a></p>
      <div class="soc row ">
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
    <div class="itemFooter center">
      <img src="../img/logo.png" alt="">
    </div>
    <div class="itemFooter column">
      <div class="itemFooterContact column "><a href="tel:+421950708775"><i
              class="fas fa-phone"></i>+421 950 708 775</a>
      </div>
      <div class="itemFooterContact column ">
        <a href="tel:+421950708775"><i class="fas fa-phone"></i>+421 950 708 775</a>
        <span>(Viber)</span>
      </div>
      <div class="itemFooterContact column ">
        <a href="tel:+380674665568"><i class="fas fa-phone"></i>+38 067 466 55 68</a>
        <span>(Viber,WhatsApp)</span>
      </div>
      <div class="itemFooterContact column ">
        <a href="tel:+380633612212"><i class="fas fa-phone"></i>+38 063 361 22 12</a>

      </div>
      <div class="itemFooterContact column ">
        <a href="tel:+380504883099"><i class="fas fa-phone"></i>+38 050 488 30 99</a>

      </div>
    </div>
  </div>
  <div class="wr row center copywrite">
    <p class="tac">
      © 2014–2019 slovak.education: все права защищены | сделано в <span class="mels_popup-open"
                                                                         id="mels_popup-open">Mels Industries</span></p>
  </div>
</footer>
<div class="mels_popup" style="display:none">
  <div class="mels_popup-container">
    <div class="mels_popup-close_icon"><i>
        <svg height="20" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
          <path fill="#111111"
                d="M193.94 256L296.5 153.44l21.15-21.15c3.12-3.12 3.12-8.19 0-11.31l-22.63-22.63c-3.12-3.12-8.19-3.12-11.31 0L160 222.06 36.29 98.34c-3.12-3.12-8.19-3.12-11.31 0L2.34 120.97c-3.12 3.12-3.12 8.19 0 11.31L126.06 256 2.34 379.71c-3.12 3.12-3.12 8.19 0 11.31l22.63 22.63c3.12 3.12 8.19 3.12 11.31 0L160 289.94 262.56 392.5l21.15 21.15c3.12 3.12 8.19 3.12 11.31 0l22.63-22.63c3.12-3.12 3.12-8.19 0-11.31L193.94 256z"
                class=""></path>
        </svg>
      </i></div>
    <div class="mels_popup-content"></div>
  </div>
</div>
<style>
  .content:first-child {
    align-items: flex-start;
  }

  .btn {
    margin-bottom: 100px;
  }
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="../js/common.js"></script>
<script>
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
</script>
</body>

</html>

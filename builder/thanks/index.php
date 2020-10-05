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
//$support_mail = 'garri.work@gmail.com';
//$support_mail = 'fastbuild.pro@gmail.com';
$support_mail = 'fastplaster26@gmail.com';


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
if ($form_page_link != '') {
  $mail_message .= '<div>Ссылка на страницу: <a href="' . $form_page_link . '">' . $form_page_link . '</a></div>';
}

$mail_message .= '</body></html>';

/* формируем заголовок письма */
$mail_headers = "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=utf-8\r\n";
$mail_headers .= "From: Form notice <notice@" . $_SERVER['HTTP_HOST'] . ">" . "\r\n";

/* отправляем в телеграмм */
$botToken = "752354926:AAGbqnc5bRwjfuaKAcBhezA00ztJrr0KViM";
$chat_id = "-1001164344542";
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
if ($form_page_link != '') {
  $telegram_message .= 'Ссылка на страницу: ' . $form_page_link . PHP_EOL;
}
//$telegram_message= mb_convert_encoding($telegram_message, 'CP1252');

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
  <meta charset="UTF-8">
  <title>Машинная штукатурка быстро, качественно, экономно</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="../css/slick.css">
  <link rel="stylesheet" href="../css/slick-theme.css">
  <link rel="stylesheet" href="../css/main.css">
  <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link rel="shortcut icon" href="../img/favicon.png" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css"/>
  <meta property="og:title" content="машинная штукатурка">
  <meta property="og:site_name" content="fastplaster">
  <meta property="og:url" content="fastplaster">
  <meta property="og:description" content="машинная штукатурка">
  <meta property="og:image" content="img/opengraph.jpg">
  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="машинная штукатурка">
  <meta name="twitter:description" content="машинная штукатурка">
  <meta name="twitter:image" content="img/opengraph.jpg">
  <meta itemprop="image" content="img/opengraph.jpg">
  <meta name="description" content="машинная штукатурка">
</head>

<body>
<div class="unit unit_first">
  <div class="wr column sb">
    <header class="header row sb content ">
      <div class="logo " content><img src="../img/logo.svg" alt=""></div>
      <div class="calBack column center afe ">
        <span class="mobHide">Звоните Пн-Пт с 9:00 до 18:00</span>
        <span class="dropdown subPhoneMenu center row ">
                    <span class="mobShow dropdown-top">
                    <i class="fas fa-phone "></i>
                        </span>
                    <span class="dropdown-top mobHide"><i class="fas fa-phone"></i> +38 096 833 21 21
                        <i class="fas fa-sort-down"></i></span>
                </span>
        <div class="dropdown-inside  ">
                    <span class="column">
                        <a href="tel:+380968332121" class="tel"><i class="fas fa-phone"></i> +38 096 833 21 21</a>
                        <a href="tel:+380445317007" class="tel"><i class="fas fa-phone"></i> +38 044 531 70 07</a>
                     </span>
        </div>
      </div>
    </header>
    <?php
    if ($check_spam_status !== true) { ?>

      <section class="firstSec column afs">
        <h1>машинная <span>штукатурка</span></h1>
        <span class="bottomTitle">быстро, качественно, экономно</span>
        <span class="addTitle">Штукатурим стены, откосы, потолки</span>
        <a class="btn" href="../index.html">На главную</a>
        <span class="priceLabel row center ">
                от <span class="bigText">190</span> грн/кв.м.*
                <img src="../img/icon_sale.png" alt="">
            </span>

      </section>
    <? } else { ?>

      <section class="firstSec column afs">
        <h1>Заявка не отправлена!</h1>
        <span class="addTitle"> Из-за некорректного заполнения полей формы заявка не отправлена и не будет обработана. Рекомендуем Вам связаться с представителями компании другим способом.</span>
        <a class="btn" href="../index.html">На главную</a>
        <span class="priceLabel row center ">
                от <span class="bigText">190</span> грн/кв.м.*
                <img src="../img/icon_sale.png" alt="">
            </span>

      </section>
    <?php } ?>
  </div>
</div>
<div class="unit unit_copywrite">
  <div class="wr row center ">
    <p class="tac">
      © 2014–2019 slovak.education: все права защищены | сделано в <span class="mels_popup-open"
                                                                         id="mels_popup-open">Mels Industries</span></p>
  </div>
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
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
  $('.dropdown-top').click(function () {
    $('.dropdown-inside').animate({opacity: 'toggle', height: 'toggle'}, 1000);
  });
  $(document).on('click', function (e) {
    if (!$(e.target).closest(".dropdown").length) {
      $('.dropdown-inside').hide();
    }
    e.stopPropagation();
  });
</script>
<style>
  .unit_copywrite {
    position: fixed;
    bottom: 0;
  }

  @media (max-width: 480px) {
    .unit_first .firstSec {
      margin-bottom: 250px;
    }
  }

</style>
</body>

</html>

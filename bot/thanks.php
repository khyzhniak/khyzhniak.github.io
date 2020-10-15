<?php
/* эти поля должны быть пустыми (антиспам-фильтр) */
if (($_POST['name'] != '') or ($_POST['mail'] != '') or ($_POST['tel'] != '') or ($_POST['url'] != '') or ($_POST['email'] != '') or ($_POST['phone'] != '')) {
  echo 'Antispam';
  die;
}
/* Проверка на заполненность */
if (($_POST['nomo'] == '') && ($_POST['posto'] == '') && ($_POST['telegram'] == '') && ($_POST['viber'] == '') && ($_POST['whatsapp'] == '') && ($_POST['skype'] == '')) {
  echo '<script type="text/javascript">';
  echo 'alert("Пустые все контактные данные. Обработчик в подобных ситуациях не запускается.");';
  echo 'window.location.href="' . $form_page_link . '";';
  echo '</script>';
  die;
}
/* ссылка на страницу */
if (isset($_POST['pago'])) {
  $form_page_link = $_POST['pago'];
}

/* на какую почту отправляем письмо */
$support_mail = 'garri.work@gmail.com';

/* вынимаем данные человека */
/* почта */
if (isset($_POST['nomo'])) {
  $user_name = $_POST['nomo'];
}

if (isset($_POST['posto'])) {
  $user_mail = $_POST['posto'];
}
if (isset($_POST['telefono'])) {
  $user_phone = $_POST['telefono'];
}
if (isset($_POST['mesago'])) {
  $user_message = $_POST['mesago'];
}

///* вынимаем данные о форме */
///* Где расположена форма */
if (isset($_POST['formo'])) {
  $form_location = $_POST['formo'];
}
/* ссылка на страницу */
if (isset($_POST['pago'])) {
  $form_page_link = $_POST['pago'];
}
///* формируем тему письма */
$mail_subject = 'Сообщение с сайта ' . $_SERVER['HTTP_HOST'];
if ($user_mail != '') {
  $mail_subject .= ', e-mail: ' . $user_mail;
};
///* формируем содержимое тела письма */
$mail_message = '<html>
<head>
  <title>' . $mail_subject . '</title>
</head>
<body>
<div>Новая заявка с сайта ' . $_SERVER['HTTP_HOST'] . '</div>';

if ($user_name != '') {
  $mail_message .= '<div>Имя: ' . $user_name . '</div>';
}

if ($user_mail != '') {
  $mail_message .= '<div>E-mail: ' . $user_mail . '</div>';
}
if ($user_phone != '') {
  $mail_message .= '<div>Телефон: ' . $user_phone . '</div>';
}
if ($user_message != '') {
  $mail_message .= '<div>Соощение: ' . $user_message . '</div>';
}
if ($form_location != '') {
  $mail_message .= '<div>Где расположена кнопка или услуга: ' . $form_location . '</div>';
}
if ($form_page_link != '') {
  $mail_message .= '<div>Ссылка на страницу: <a href="' . $form_page_link . '">' . $form_page_link . '</a></div>';
}
$mail_message .= '</body></html>';
/* формируем заголовок письма */
$mail_headers = "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=utf-8\r\n";
$mail_headers .= "From: Form notice <notice@" . $_SERVER['HTTP_HOST'] . ">" . "\r\n";
///* отправляем сообщение */
if (mail($support_mail, $mail_subject, $mail_message, $mail_headers)) {
  $send_status = 'true';
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Спасибо за вашу заявку!</title>
  <link rel="shortcut icon" href="img/favicon_alfa.png" type="image/png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="fonts/style.css">
</head>
<body>
<div class="thanks big-wr">
  <div class="wr">
    <div class="header_content">
      <a href="../">
        <img src="img/logo.png" alt="logo"></a>
    </div>
    <h2 class="title">Спасибо за вашу заявку!</h2>
    <p class="itemsTextDescr">Мы обработаем её в ближайшее время <br>и свяжемся с вами</p>
    <p>Вы можете перейти на главную страницу сайта.</p>
    <a class="btn" href="../index.html">На главную</a>
  </div>
</div>
<style>
  .thanks .wr {
    height: 100%;
  }

  .thanks {
    position: relative;
    height: 100vh;
    background: url('img/thanks_img.png') no-repeat 80% center;
  }

  .thanks:before {
    position: absolute;
    content: '';
    display: block;
    right: 0;
    top: 0;
    z-index: -1;
    background: url('img/bg_thanks1.jpg') no-repeat right top;
    width: 320px;
    height: 429px;
  }

  .thanks:after {
    position: absolute;
    content: '';
    display: block;
    left: 0;
    bottom: 0;
    z-index: -1;
    background: url('img/bg_thanks2.jpg') no-repeat left bottom;
    width: 366px;
    height: 505px;
  }

  .itemsTextDescr {
    text-transform: uppercase;
    font-size: 20px;
    color: #333;
  }

  .btn {
    padding: 10px 40px;
  }

  @media (max-width: 1200px) {
    .thanks {
      background: url(img/thanks_img.png) no-repeat right center;
    }
  }

  @media (max-width: 992px) {
    .thanks {
      background: none;
    }
  }

  @media (max-width: 762px) {
    .thanks:before {
      opacity: .2;
    }
    .thanks:after {
      opacity: .2;
    }
  }
</style>
</body>
</html>

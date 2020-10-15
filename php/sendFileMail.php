<?php /* Template Name: thanks */ ?>
<!--<form action=simple_mail.php enctype='multipart/form-data' method=post>-->
<!--<input type="hidden" name="formo" value="Страница резюме">-->
<!--<input type="hidden" name="pago" value="--><?php //echo $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?><!--">-->
<?php
/* эти поля должны быть пустыми (антиспам-фильтр) */
if (($_POST['name'] != '') or ($_POST['mail'] != '') or ($_POST['tel'] != '') or ($_POST['url'] != '') or ($_POST['email'] != '') or ($_POST['phone'] != '')) {
    echo 'Antispam';
    die;
}
/* Проверка на заполненность */
if (($_POST['telefono'] == '') && ($_POST['posto'] == '') && ($_POST['telegram'] == '') && ($_POST['viber'] == '') && ($_POST['whatsapp'] == '') && ($_POST['skype'] == '')) {
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
//$support_mail = 'a.lebed0542@gmail.com';

/* вынимаем данные человека */
/* почта */
if (isset($_POST['nomo'])) {
    $user_name = $_POST['nomo'];
}
if (isset($_POST['familinomo'])) {
    $user_name_last = $_POST['familinomo'];
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
if (isset($_POST['loko'])) {
    $user_location = $_POST['loko'];
}
if (isset($_POST['demando'])) {
    $user_request = $_POST['demando'];
}

if (isset($_POST['konsento'])) {
    $user_consent = '<div>' . $_POST['konsento'][0] . '</div><br>';
    $user_consent .= '<div>' . $_POST['konsento'][1] . '</div><br>';
    $user_consent .= '<div>' . $_POST['konsento'][2] . '</div><br>';
    $user_consent .= '<div>' . $_POST['konsento'][3] . '</div><br>';
}

// Если поле выбора вложения не пустое - закачиваем его на сервер
if (!empty($_FILES['bildoj']['tmp_name'])) {
    // Закачиваем файл
    $path = $_FILES['bildoj']['name'];
    if (copy($_FILES['bildoj']['tmp_name'], $path)) $picture = $path;
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

/* формируем тему письма */
$mail_subject = 'Сообщение с сайта ' . $_SERVER['HTTP_HOST'];
if ($user_mail != '') {
    $mail_subject .= ', e-mail: ' . $user_mail;
};

/* формируем содержимое тела письма */
$mail_message = '<html>
<head>
  <title>' . $mail_subject . '</title>
</head>
<body>
<div>Новая заявка с сайта ' . $_SERVER['HTTP_HOST'] . '</div>';

if ($user_name != '') {
    $mail_message .= '<div>Имя: ' . $user_name . '</div>';
}
if ($user_name_last != '') {
    $mail_message .= '<div>Фамилия: ' . $user_name_last . '</div>';
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
if ($user_location != '') {
    $mail_message .= '<div>Место нахождение: ' . $user_location . '</div>';
}
if ($user_request != '') {
    $mail_message .= '<div>Вопрос: ' . $user_request . '</div>';
}
if ($user_consent != '') {
    $mail_message .= '<div>Согласен на:<br> ' . $user_consent . '</div>';
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

/* отправляем сообщение */
if (empty($picture)) {
    if (mail($support_mail, $mail_subject, $mail_message, $mail_headers)) {
        $send_status = 'true';
    }
} else send_mail($support_mail, $mail_subject, $mail_message, $picture);

// Вспомогательная функция для отправки почтового сообщения с вложением
function send_mail($to, $thm, $html, $path)
{
    $fp = fopen($path, "r");
    if (!$fp) {
        print "Файл $path не может быть прочитан";
        exit();
    }
    $file = fread($fp, filesize($path));
    fclose($fp);
    $boundary = "--" . md5(uniqid(time())); // генерируем разделитель
    $headers = "MIME-Version: 1.0\n";
    $headers .= "Content-Type: multipart/mixed; boundary=\"$boundary\"\n";
    $multipart = "--$boundary\n";
    $multipart .= "Content-Type: text/html; charset=utf-8\r\n";
    $multipart .= "Content-Transfer-Encoding: Quot-Printed\n\n";
    $multipart .= "$html\n\n";
    $message_part = "--$boundary\n";
    $message_part .= "Content-Type: application/octet-stream\n";
    $message_part .= "Content-Transfer-Encoding: base64\n";
    $message_part .= "Content-Disposition: attachment; filename = \"" . $path . "\"\n\n";
    $message_part .= chunk_split(base64_encode($file)) . "\n";
    $multipart .= $message_part . "--$boundary--\n";
    if (!mail($to, $thm, $multipart, $headers)) {
        echo "К сожалению, письмо не отправлено";
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width,initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#F0544F">
    <title><?php wp_title(); ?></title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/slick.min.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/general.css">
    <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/css/style.css">
    <?php wp_head(); ?>
</head>
<body>
<div class="unit_header">
    <div class="ark_center">
        <div class="logo"></div>
        <ul class="menu">
            <li><span class="menu_item">Strona główna</span></li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/topstaff/about/" class="menu_item">O nas

                </a></li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/topstaff/employer/" class="menu_item">Dla pracodawcy
                    <i>
                        <svg aria-hidden="true" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                            <path fill="currentColor"
                                    d="M119.5 326.9L3.5 209.1c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0L128 287.3l100.4-102.2c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.7 4.7 12.3 0 17L136.5 327c-4.7 4.6-12.3 4.6-17-.1z"
                                    class=""></path>
                        </svg>
                    </i>
                </a>
                <ul class="submenu">
                    <li><a href="">Leasing pracowniczy</a></li>
                    <li><a href="">Pośrednictwo pracy</a></li>
                </ul>
            </li>
            <li><a href="/" class="menu_item">Dla pracownika
                    <i>
                        <svg aria-hidden="true" height="14" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 512">
                            <path fill="currentColor"
                                    d="M119.5 326.9L3.5 209.1c-4.7-4.7-4.7-12.3 0-17l7.1-7.1c4.7-4.7 12.3-4.7 17 0L128 287.3l100.4-102.2c4.7-4.7 12.3-4.7 17 0l7.1 7.1c4.7 4.7 4.7 12.3 0 17L136.5 327c-4.7 4.6-12.3 4.6-17-.1z"
                                    class=""></path>
                        </svg>
                    </i>
                </a>
                <ul id="submenu" class="submenu">
                    <li><a href="">Oferty pracy</a></li>
                    <li><a href="">Złóż CV</a></li>
                </ul>
            </li>
            <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/topstaff/news" class="menu_item">Aktualności</a>
            </li>
            <li><a href="/" class="menu_item">Kontakt</a></li>
        </ul>
        <div class="lang">
            <a href="/" class="pl"></a>
            <a href="/" class="ua"></a>
        </div>
        <div class="mobile_menu">
            <input type="checkbox" id="m_menu-toggle"/>
            <label for="m_menu-toggle"></label>
            <ul id="m_menu">
                <li><span class="menu_item">Strona główna</span></li>
                <li><a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/topstaff/about/" class="menu_item">O nas</a>
                </li>
                <li><a href="/" class="menu_item">Dla pracodawcy</a>
                    <ul class="submenu">
                        <li><a href="">Leasing pracowniczy</a></li>
                        <li><a href="">Pośrednictwo pracy</a></li>
                    </ul>
                </li>
                <li><a href="/" class="menu_item">Dla pracownika</a>
                    <ul id="submenu" class="submenu">
                        <li><a href="">Oferty pracy</a></li>
                        <li><a href="">Złóż CV</a></li>
                    </ul>
                </li>
                <li><a href="/" class="menu_item">Aktualności</a></li>
                <li><a href="/" class="menu_item">Kontakt</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="unit_main_screen">
    <div class="">
        <div class="slide_bg">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/img/unit_intro_bg.jpg" alt="">
            <div class="text_block">
                <div class="title">thanks</div>
                <div class="descr">Strona nie została znaleziona</div>
                <a href="http://<?php echo $_SERVER['HTTP_HOST'] ?>/topstaff/" class="button">Strona główna</a>
            </div>
        </div>
    </div>
</div>


<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/jquery.min.js"></script>
<script src="<?php echo esc_url(get_template_directory_uri()); ?>/js/init.spincrement.js"></script>
<?php get_footer(); ?>



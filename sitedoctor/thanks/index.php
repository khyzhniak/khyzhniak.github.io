<?
/* эти поля должны быть пустыми (антиспам-фильтр) */
if (($_POST['name'] != '') or ($_POST['mail'] != '') or ($_POST['tel'] != '') or ($_POST['url'] != '') or ($_POST['email'] != '') or ($_POST['phone'] != '')) {
    echo 'Сработал антиспам-фильтр, данные в обработчик не переданы.';
    die;
}
/* ссылка на страницу */
if (isset($_POST['pago'])) {
    $form_page_link = $_POST['pago'];
}
/* Проверка на заполненность */
if (($_POST['telefono'] == '') && ($_POST['posto'] == '') && ($_POST['telegram'] == '') && ($_POST['viber'] == '') && ($_POST['whatsapp'] == '') && ($_POST['skype'] == '')) {
    echo '<script type="text/javascript">';
    echo 'alert("Пустые все контактные данные. Обработчик в подобных ситуациях не запускается2.");';
    echo 'window.location.href="' . $form_page_link . '";';
    echo '</script>';
    die;
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

/* отправляем сообщение */
if (mail($support_mail, $mail_subject, $mail_message, $mail_headers)) {
    $send_status = 'true';
}
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
//if ($form_page_link != '') {
//    $telegram_message .= 'Ссылка на страницу: ' . $form_page_link . PHP_EOL;
//}
//$telegram_message= mb_convert_encoding($telegram_message, 'CP1252');

$bot_url = "https://api.telegram.org/bot$botToken/";
$url = $bot_url . "sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($telegram_message);
file_get_contents($url);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лазерная эпиляция всего тела, салон Alma Lasers Сумы</title>
    <meta name="description"
            content="Безопасно избавим Вас от нежелательных волос на теле. Быстрая и безболезненная процедура  проводится сертифицированными косметологами. Это дешевле и эффективнее других видов эпиляции. Действуют сезонные скидки и спецпредложения! | +38-095-17-34-877">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="../css/slick.css">
    <link rel="stylesheet" href="../css/slick-theme.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
            integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="shortcut icon" href="../img/favicon___.png" type="image/png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css"/>
    <meta property="og:title" content="Лазерная эпиляция всего тела, салон Alma Lasers Сумы">
    <meta property="og:site_name" content="laser.sumy.ua">
    <meta property="og:url" content="laser.sumy.ua">
    <meta property="og:description" content="Лазерная эпиляция всего тела, салон Alma Lasers Сумы">
    <meta property="og:image" content="img/opengraph.jpg">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Лазерная эпиляция всего тела, салон Alma Lasers Сумы">
    <meta name="twitter:description"
            content="Безопасно избавим Вас от нежелательных волос на теле. Быстрая и безболезненная процедура  проводится сертифицированными косметологами. Это дешевле и эффективнее других видов эпиляции. Действуют сезонные скидки и спецпредложения! | +38-095-17-34-877">
    <meta name="twitter:image" content="img/opengraph.jpg">
    <meta itemprop="image" content="img/opengraph.jpg">
    <meta name="description"
            content="Безопасно избавим Вас от нежелательных волос на теле. Быстрая и безболезненная процедура  проводится сертифицированными косметологами. Это дешевле и эффективнее других видов эпиляции. Действуют сезонные скидки и спецпредложения! | +38-095-17-34-877">
</head>
<body>
<div class="unit unit_header ">
    <div class="wr ">
        <header class="header row jsb content center">
            <div class="wrLogo  center">
                <div class="logo center"><img src="../img/logo.svg" alt=""></div>
                <div class="label "><img src="../img/labelHedaer.png" alt=""></div>
            </div>
            <nav class="nav  center">
                <a href="../index.html#price">цены</a>
                <a href="../index.html#about">о нас </a>
                <a href="../index.html#promotion">акции</a>
                <a href="../index.html#lifting">лифтинг</a>
                <a href="../index.html#contact">контакты</a>
            </nav>
            <div class="href center row ">
                <div class="soc">
                    <a target="_blank" href="https://www.instagram.com/maria.grishanova/?utm_source=ig_profile_share&igshid=182d7oz6i7om0"><i class="fab fa-instagram"></i></a>
                    <a target="_blank" href="https://www.facebook.com/profile.php?id=100008675496202"><i class="fab fa-facebook-square"></i></a>
                </div>
                <a class="phone" href="tel:+380951734877">+38 095 17 34 877</a>
                <a class="mes" href="#"><i class="fab fa-telegram"></i></a>
                <a class="mes" href="#"><i class="fab fa-viber"></i></a>
            </div>
        </header>
    </div>
</div>
<div class="unit unit_first unit_thanks">
    <div class="wr column afs first">
        <span class="netTitle">Cеть салонов лазерной эпиляции и косметологии в Сумах</span>
        <h1 class="title">БЛАГОДАРИМ ЗА ЗАЯВКУ!</h1>
        <p>Мы перезвоним Вам в ближайшее время для уточнения деталей
            записи.</p>
        <a href="../index.html" class="btn ">На главную</a>
    </div>
</div>

<footer class="unit unit_footer">
    <div class="wr row">
        <div class="content column afs">
            <div class="logoFooter">
                <img src="../img/logoFooter.svg" alt="">
            </div>
            <p>Сеть салонов лазерной эпиляции в Сумах</p>
        </div>
        <div class="content column center">
            <div class="navFooter row">
                <a href="index.php#price">Цены</a>
                <a href="index.php#about">О нас</a>
                <a href="index.php#lifting">Лифтинг</a>
                <a href="index.php#promotion">Акции</a>
            </div>
            <div class="row socFooter">
                <a target="_blank" href="https://www.instagram.com/maria.grishanova/?utm_source=ig_profile_share&igshid=182d7oz6i7om0"><i class="fab fa-instagram"></i></a>
                <a target="_blank" href="https://www.facebook.com/profile.php?id=100008675496202"><i class="fab fa-facebook-square"></i></a>
            </div>
        </div>
        <div class="content column afe">
            <div class="row center">
                <a class="phone" href="tel:+380951734877">+38 095 17 34 877</a>
                <a class="mes" href="#"><i class="fab fa-telegram"></i></a>
                <a class="mes" href="#"><i class="fab fa-viber"></i></a>
            </div>
        </div>
    </div>
</footer>
<div class="unit unit_copyright copyright">
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
                                class="">

                        </path>
                    </svg>
                </i></div>
            <div class="mels_popup-content"></div>
        </div>
    </div>
</div>

<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
<!--<script src="../js/common.js"></script>-->
<script>

</script>
</body>

</html>
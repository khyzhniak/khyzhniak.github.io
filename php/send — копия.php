<?

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
if ($form_page_link != '') {
$mail_message .= '<div>Ссылка на страницу: <a href="' . $form_page_link . '">' . $form_page_link . '</a></div>';
}

$mail_message .= '</body></html>';

/* формируем заголовок письма */
$mail_headers = "MIME-Version: 1.0\r\n";
$mail_headers .= "Content-type: text/html; charset=utf-8\r\n";
$mail_headers .= "From: Form notice <notice@" . $_SERVER['HTTP_HOST'] . ">" . "\r\n";

/* отправляем сообщение */
if (mail($support_mail, $mail_subject, $mail_message, $mail_headers)) {
$send_status = 'true';
}

?>


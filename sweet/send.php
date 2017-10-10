<?php

/* на какой email отправляем? */
// если почтовых ящиков несколько - перечислите через запятую
$our_mail = 'khyzhniakihor@gmail.com';

/* захватываем данные с формы */
$client_name = $_POST['name'];			// имя клиента
$client_mail = $_POST['email'];			// почта клиента
$client_phone = $_POST['phone'];		// телефон/скайп клиента
$form_name = $_POST['form_name'];		// название формы (указывает на то, что хотел человек, отправивший сообщение)
$page_name = $_POST['page_name'];		// название страницы (указывает на то, с какой страницы отправлено сообщение)
$select=$_POST['select'];
$check = '';//обработка чекбоксов
if (!empty($_POST["check"]) && is_array($_POST["check"]))
{
    $check = implode(" ", $_POST["check"]);
}

/* генерируем тему письма (создаем временную переменную) */
$post_subject = 'Заявка с site_name';								// указываем, с какого сайта сообщение
if ($client_name != '') { $post_subject .= ', '.$client_name; }		// добавляем имя в тему письма
if ($client_mail != '') { $post_subject .= ', '.$client_mail; }		// добавляем email в тему письма
if ($client_phone != '') { $post_subject .= ', '.$client_phone; }	// добавляем телефон/скайп в тему письма
// зачем так много параметров в теме письма? чтобы каждое письмо было уникальным

/* генерируем содержимое письма, которое будем отправлять владельцу сайта */
$post_message = '<html>
<head>
  <title>'.$post_subject.'</title>
</head>
<body>
<p>Заявка с site_name:</p>
<table>';
// проверяем, какие из полей были заполнены и собираем данные в сообщение
if ($client_name != '') {  $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">Имя: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$client_name.'</td></tr>'; }
if ($client_mail != '') {  $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">E-mail: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$client_mail.'</td></tr>'; }
if ($client_phone != '') { $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">Телефон/скайп: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$client_phone.'</td></tr>'; }
if ($form_name != '') {    $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">Название формы: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$form_name.'</td></tr>'; }
if ($page_name != '') { $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">Название страницы: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$page_name.'</td></tr>'; }
if ($select != '') { $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">Название Услуги: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$select.'</td></tr>'; }
if ($check != '') { $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">Меня заинтересовали: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$check.'</td></tr>'; }
$post_message .= '
</table>
</body>
</html>';
$post_headers  = "MIME-Version: 1.0\r\n";
$post_headers .= "Content-type: text/html; charset=utf-8\r\n";
$post_headers .= "From: site_name <notice@site_name>"."\r\n";

/* отправляем емейл владельцу сайта */
mail($our_mail, $post_subject, $post_message, $post_headers);


/* собираем информацию для отправки клиенту */
// тема сообщения
$post_subject = 'Ваша заявка с сайта site_name успешно получена';
// содержимое сообщения
$post_message = '<html>
<head>
  <title>Ваша заявка с сайта site_name успешно получена</title>
</head>
<body>
<p>Добрый день!</p>
<p>Благодарим Вас за внимание к сайту site_name!</p>
<p>Наши специалисты успешно получили заявку.</p>
<p>В ближайшее время мы свяжемся с Вами!</p>
<p>С уважением,<br />администрация site_name</p>
</body>
</html>';
// отправляем сообщение клиенту
mail($client_mail, $post_subject, $post_message, $post_headers);


// переходим на страницу "спасибо" после отправки сообщения владельцу сайта и клиенту
header( 'Location: thanks.php' );
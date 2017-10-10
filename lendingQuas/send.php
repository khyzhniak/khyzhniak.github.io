<?php

/* на какой email отправляем? */
// если почтовых ящиков несколько - перечислите через запятую
$our_mail = 'info@quasaragency.ru';

/* захватываем данные с формы */
$client_name = $_POST['name'];			// имя клиента
$client_serv = $_POST['serv'];			// почта клиента
$client_phone = $_POST['phone'];		// телефон/скайп клиента
$select = $_POST["select"];//обработка чекбоксов


/* генерируем тему письма (создаем временную переменную) */
$post_subject = 'Заявка с Quasar';								// указываем, с какого сайта сообщение
if ($client_name != '') { $post_subject .= ', '.$client_name; }		// добавляем имя в тему письма
if ($client_serv != '') { $post_subject .= ', '.$client_serv; }		// добавляем email в тему письма
if ($client_phone != '') { $post_subject .= ', '.$client_phone; }	// добавляем телефон/скайп в тему письма
// зачем так много параметров в теме письма? чтобы каждое письмо было уникальным

/* генерируем содержимое письма, которое будем отправлять владельцу сайта */
$post_message = '<html>
<head>
  <title>'.$post_subject.'</title>
</head>
<body>
<p>Заявка с Quasar:</p>
<table>';
// проверяем, какие из полей были заполнены и собираем данные в сообщение
if ($client_name != '') {  $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">Имя: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$client_name.'</td></tr>'; }
if ($client_phone != '') { $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">Телефон: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$client_phone.'</td></tr>'; }
if ($client_serv != '') {  $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">услуга: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$client_serv.'</td></tr>'; }

if ($select != '') { $post_message .= '<tr><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">Название Услуги: </td><td style="border: 1px solid #f9f1f1; padding: 5px 20px;">'.$select.'</td></tr>'; }
$post_message .= '
</table>
</body>
</html>';
$post_headers  = "MIME-Version: 1.0\r\n";
$post_headers .= "Content-type: text/html; charset=utf-8\r\n";
$post_headers .= "From: Quasar <notice@Quasar>"."\r\n";

/* отправляем емейл владельцу сайта */
mail($our_mail, $post_subject, $post_message, $post_headers);


// переходим на страницу "спасибо" после отправки сообщения владельцу сайта и клиенту
header( 'Location: index.html' );
?>
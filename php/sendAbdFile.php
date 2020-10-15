<?php
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
    echo 'alert("Пустые все контактные данные. Обработчик в подобных ситуациях не запускается.");';
    echo 'window.location.href="' . $form_page_link . '";';
    echo '</script>';
    die;
}

/* на какую почту отправляем письмо */
//$support_mail = 'ceo@mels.industries';
$support_mail = 'a0503579375@gmail.com';


/* вынимаем данные человека */
/* имя */
if (isset($_POST['nomo'])) {
    $user_name = $_POST['nomo'];
}
/* почта */
if (isset($_POST['posto'])) {
    $user_mail = $_POST['posto'];
}
/* телефон или скайп */
if (isset($_POST['telefono'])) {
    $user_phone = $_POST['telefono'];
}
/* телефон или скайп */
if (isset($_POST['fromo'])) {
    $fromo = $_POST['fromo'];
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
    $mail_subject .= ', тел: ' . $user_phone;
};

/* формируем содержимое тела письма */
$mail_message = '<html>
<head>
  <title>' . $mail_subject . '</title>
</head>
<body>
<div>Новая заявка с сайта ' . $_SERVER['HTTP_HOST'] . '</div>';
if ($user_name != '') {
    $mail_message .= '<div>Имя клиента:' . $user_name . '</div>';
}
if ($user_mail != '') {
    $mail_message .= '<div>E-mail заказчика: ' . $user_mail . '</div>';
}
if ($user_phone != '') {
    $mail_message .= '<div>Телефон заказчика:' . $user_phone . '</div>';
}
if ($fromo != '') {
    $mail_message .= '<div>Форма: ' . $fromo . '</div>';
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
    $mail_message .= '<div>Сообщение/вопрос: ' . $user_mes . '</div>';
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
/* отправляем в телеграмм */
$botToken = "673359284:AAHiliveVsgDE1qyiYRr6Tjrwc75Fwl1Kb4";
$chat_id = "-1001269516820";
$telegram_message .= 'Заявка с сайта ' . $_SERVER['HTTP_HOST'] . PHP_EOL;
if ($user_name != '') {
    $telegram_message .= 'Имя клиента:' . $user_name . PHP_EOL;
}
if ($user_mail != '') {
    $telegram_message .= 'E-mail заказчика: ' . $user_mail . PHP_EOL;
}
if ($user_phone != '') {
    $telegram_message .= 'Телефон заказчика:' . $user_phone . PHP_EOL;
}
if ($fromo != '') {
    $telegram_message .= 'Форма: ' . $fromo . PHP_EOL;
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

$bot_url = "https://api.telegram.org/bot$botToken/";
$url = $bot_url . "sendMessage?chat_id=" . $chat_id . "&text=" . urlencode($telegram_message);
file_get_contents($url);

// ////////////////////////////////////////
/* формируем заголовок письма */
$client_mail_headers = "MIME-Version: 1.0\r\n";
$client_mail_headers .= "Content-type: text/html; charset=utf-8\r\n";
$client_mail_headers .= "From: omelchenkoorg <notice@omelchenko.org>" . "\r\n";
/* формируем тему письма для клиента сайта */
$client_mail_subject = 'Сообщение с сайта omelchenko.org: Книга "Библия коучинга. Практические инструменты достижения цели.';
/* формируем содержимое тела письма для клиента сайта */
$client_mail_message = '<html>
<head>
  <title>Книга "Библия коучинга. Практические инструменты достижения цели."</title>
</head>
<body>
<p>Вы оставили заявку на получение книги «Библия коучинга. Практические инструменты достижения цели.»</p>
<p>Книгу Вы найдёте в .pdf файле, прикреплённом к данному письму.</p>
<p>После прочтения напишите ваши впечатления.</p>
<p>Также пишите вопросы, ответы на которые Вы хотели бы получить в моих последующих статьях, книгах и видео.</p>
<p>Статьи я выкладываю на сайте:</p>
<p><a href="https://omelchenko.org/">https://omelchenko.org/</a></p>
<p>Видео на ютуб-канале:</p>
<p><a href="https://www.youtube.com/c/OmelchenkoPro">https://www.youtube.com/c/OmelchenkoPro</a></p>
<p>С уважением, Андрей Омельченко!</p>';
$client_mail_message .= '</body></html>';
$fileatt = "https://omelchenko.pro/biblija_kouchinga_prakticheskie_instrumenty_dostizhenija_celi.pdf"; // Расположение файла
$file = fopen($fileatt, 'rb');
$data = fread($file, filesize($fileatt));
fclose($file);
$semi_rand = md5(time());
$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";
$headers .= "\nMIME-Version: 1.0\n" .
    "Content-Type: multipart/mixed;\n" .
    " boundary=\"{$mime_boundary}\"";
$message = "Это multi-part сообщение в формате MIME․\n\n" .
    "-{$mime_boundary}\n" .
    "Content-Type: text/plain; charset=\"iso-8859-1\n" .
    "Content-Transfer-Encoding: 7bit\n\n" .
    $mainMessage . "\n\n";

$data = chunk_split(base64_encode($data));
$message .= "--{$mime_boundary}\n" .
    "Content-Type: {$fileatttype};\n" .
    " name=\"{$fileattname}\"\n" .
    "Content-Disposition: attachment;\n" .
    " filename=\"{$fileattname}\"\n" .
    "Content-Transfer-Encoding: base64\n\n" .
    $data . "\n\n" .
    "-{$mime_boundary}-\n";
/* отправляем сообщение клиенту */
mail($user_mail, $client_mail_subject, $client_mail_message, $client_mail_headers, $files);

$fromoSendBase=str_replace("'","",$fromo);
//проверяем есть ли емейл в базе и на ревенство "a0503579375@gmail.com" если проходит условие сохраняем в базу новый емайл
$site='omelchenko.org-'.$fromoSendBase;
$mi = new mysqli('omelchen.mysql.tools', 'omelchen_email', 'acscbaau', 'omelchen_email');
$mi->set_charset("utf8");
if ($mi->connect_errno):
    die($mi->connect_error);
endif;
$sql = $mi->query("select `id` from `omelchenko_email` order by `id` desc limit 1");
$result = $sql->fetch_array();
$inbase_lastline_id = $result[id];
$pattern = "/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i";
preg_match_all($pattern, $user_mail, $result);
$r = array_unique(array_map(function ($j) {
    return $j[0];
}, $result));
if ($r[0]) {
    echo $r[0];
    for ($i = 1; $i <= $inbase_lastline_id; $i++) {
        $sql = $mi->query("select `email` from `omelchenko_email` where `id`=$i");
        $result = $sql->fetch_array();
        $inbase_email = $result[email];
        $arr[$i] = $inbase_email;
    }
    if ($user_mail != 'a0503579375@gmail.com') {
        if (array_search($r[0], $arr) == false) {
            $mi->query("insert into `omelchenko_email` set `email`='$user_mail',`name`='$user_name',`phone`='$user_phone',`from_site`='$site$site_form_data'");
        }
    }
}

?>

    <script>
        window.location.href = "http://omelchenko.org/thanks.html";

    </script>
    <!--<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
<?php
//    $mails = array('a0503579375@gmail.com');
////    $mails = array('garri.work@gmail.com');
//    define('MAIL_SUBJECT', 'Новая заявка с сайта omelchenko');
//
//    $headers   = array();
//    $headers[] = "MIME-Version: 1.0";
//    $headers[] = "Content-type: text/plain; charset=utf-8";
//    $headers[] = "X-Mailer: PHP/".phpversion();
//
//    (isset($_POST['name'])) ? $name = 'Имя клиента: ' . htmlspecialchars($_POST['name']) . "\n": $name = '';
//    (isset($_POST['phone'])) ? $phone = 'Телефон заказчика: ' . htmlspecialchars($_POST['phone']) . "\n": $phone = '';
//    (isset($_POST['email'])) ? $email = 'E-mail заказчика: ' . htmlspecialchars($_POST['email']) . "\n": $email = '';
//    (isset($_POST['message'])) ? $message = 'Сообщение/вопрос: ' . htmlspecialchars($_POST['message']) . "\n": $message = '';
//    (isset($_POST['from'])) ? $from = 'Форма: ' . htmlspecialchars($_POST['from']) . "\n": $from = '';
//
//    $result = true;
//
//    foreach ($mails as $val) {
//        if (!mail($val, MAIL_SUBJECT, $name . $phone . $email . $messageы . $from, implode("\r\n", $headers))) {
//            $result = false;
//            break;
//        }
//    }
//
//   /*if ($result) {
//		header('Location: thanks.html');
//		exit;
//	}*/
//    $new_email = htmlspecialchars($_POST['email']);
//?>
    <!--<style>* {background: black; }</style>-->
    <!-- <div id="guard"></div>-->
    <!--<script>-->
    <!--    $(guard).load('http://omelchenko.pro/mail/add.php?new_mail=--><?php //echo $new_email; ?>//');
    <!--//function addmail () {-->
    //
    <!--//    window.location.href = "http://omelchenko.org/thanks.html";-->
    <!--//};-->
    <!--//setTimeout(addmail, 100);-->
    <!--//</script>-->


<?php /*
header('Content-Type: text/html; charset=utf-8');

//$mail_to = "a0503579375@gmail.com";
$mail_to = "sinefighter@gmail.com";
$mail_from = "a0503579375@gmail.com";
$your_name = "Андрей";
$subject = "Заявка на теренинг";
$success_message = "Спасибо, ваша заявка принята!";


$response = array(
	"status" => "0"
);

function getMessage() {
	if(isset($_POST['phone']) && isset($_POST['email']) && $_POST['phone'] !='' &&  $_POST['email'] !='') {
		$message = "";
		$message .= "Новая заявка с сайта тренингов<br>";
		$message .= "---<br>";

		if(isset($_POST['name']) and !empty($_POST['name'])) {
			$message .= "Имя отправителя: {$_POST['name']}<br>";
		}

		$message .= "Тел. отправителя: {$_POST['phone']}<br>";
		$message .= "Email отправителя: {$_POST['email']}<br>";

		if(isset($_POST['question']) and !empty($_POST['question'])) {
			$message .= "Вопрос отправителя: {$_POST['question']}<br>";
		}

		return $message;
	} else {
		$response['message'] = "Не заполнены поля";
		echo json_encode($response);
		exit();
	}
}

require './vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;
$mail->CharSet = 'UTF-8';
$mail->isHTML(true);

$mail->setFrom($mail_from, 'Андрей Омельченко');
$mail->addAddress($mail_to, $your_name);
$mail->addReplyTo($mail_from, 'Information');         // Set email format to HTML

$mail->Subject = $subject;

$mail->Body    = getMessage();
$mail->AltBody = $subject;

if(!$mail->send()) {
	$response['message'] = 'Message could not be sent.';
	$response['message'] .= 'Mailer Error: ' . $mail->ErrorInfo;
	echo json_encode($response);
} else {
	$response['message'] = 'Message has been sent.';
	$response['status'] = "1";
    echo json_encode($response);
} */ ?>
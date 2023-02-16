<?php
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
$message = trim($_POST['message']);

// указываем адрес отправителя, можно указать адрес на домене Вашего сайта
$fromMail = 'info@youremail.ru';
$fromName = 'yoururl.ru';

// Сюда введите Ваш email
$emailTo = 'info@youremail.ru';
$subject = 'Запись на услугу';
$subject = '=?utf-8?b?'. base64_encode($subject) .'?=';
$headers = "Content-type: text/plain; charset=\"utf-8\"\r\n";
$headers .= "From: ". $fromName ." <". $fromMail ."> \r\n";

// тело письма
$body = "Запись на услугу с сайта yoururl.ru \nИмя: $name\nТелефон: $phone \nE-mail: $email\nСообщение: $message";

// сообщение будет отправлено в случае, если поле с номером телефона не пустое
if (strlen($phone) > 0) {
    $mail = mail($emailTo, $subject, $body, $headers, '-f'. $fromMail );

	    $list = array (
		array(iconv('utf-8', 'cp1251',$name), $email, $phone,  iconv('utf-8', 'cp1251',$message))
		);
		$fp = fopen('clients.csv', 'a');
		foreach ($list as $fields) {
			fputcsv($fp, $fields, ';', '"');
		}
		fclose($fp);
		}

?>
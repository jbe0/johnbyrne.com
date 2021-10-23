<?php

$file = 'email.log';
$today = date("d/m/y");

$from ="john@johnbyrne.com";
$to ="john@johnbyrne.com";
$name = Trim(stripslashes($_POST['name'])); /*receives 'name' data through post method and stores it in 'name' variable*/
$email = Trim(stripslashes($_POST['email']));
$message = Trim(stripslashes($_POST['message']));
$captcha = $_POST['captcha'];
$captcha = (int)$captcha;
$captcha2 = $_POST['captcha2'];
$checkbox = $_POST['checkbox'];

$subject ="New message from website!";

$body ="";
$body .="Name: "; /*'.' is used to append*/
$body .=$name;
$body .="\n";
$body .="Email: ";
$body .=$email;
$body .="\n\n";
$body .="Message: ";
$body .=$message;
$body .="\n";

if (($captcha == 15) and (empty($captcha2)) and ($checkbox == True) ) {
    $go = mail($to, $subject, $body, "From:<$from>");
    file_put_contents($file, $today.";Email sent.\n", FILE_APPEND);
    header('Location: contact_thank_you.html');
} else {
    file_put_contents($file, $today.";Email NOT sent.\n", FILE_APPEND);
    header('Location: contact_no_thank_you.html');
}

exit();

 ?>

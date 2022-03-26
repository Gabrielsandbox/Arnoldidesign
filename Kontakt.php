<?php

$name = $_POST['name']; // For some reason it is not getting the name
$email = $_POST['Email'];
$phone = $_POST['Telefon'];
$subject = $_POST['Betreff'];
$message = $_POST['Nachricht']; // Nachricht
$formcontent="Ein neuer Kunde hat über die Website Kontakt aufgenommen. \n \n Email: $email \n \n Betreff: $subject \n \n Telefon: $phone \n \n Nachricht: $message \n \n ";
$recipient = "info@kappelundpartner.de"; // Switch for info@kappelundpartner.com
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader);
header("Location: https://kappelundpartner.de/kontaktredirection.html", TRUE, 301); // Make proper return page

function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );

    $inject = join('|', $injections);
    $inject = "/$inject/i";

    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

?>

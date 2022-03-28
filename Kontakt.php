<?php
causeofparty
dateofparty
Personenanzahl
name
address (strasse)
plz
ort
email
phone
Nachricht


$causeofparty = $_POST['causeofparty']; // For some reason it is not getting the name
$dateofparty = $_POST['dateofparty'];
$Personenanzahl = $_POST['Personenanzahl'];
$name = $_POST['name'];
$address = $_POST['address'];
$plz = $_POST['plz'];
$ort = $_POST['ort'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$Nachricht = $_POST['Nachricht'];

$formcontent="Ein neuer Kunde hat über die Website Kontakt aufgenommen. \n \n Anlass Ihrer Feier: $causeofparty \n \n Datum Ihrer Feier: $dateofparty \n \n Personenanzahl: $Personenanzahl \n \n Vor-und nachname: $name \n \n Strasse: \n \n PLZ: $plz \n \n ORT: $ort \n \n E-mail: $email \n \n Telefon: $phone \n \n Nachricht: $Nachricht ";


$recipient = "gabrielmarinhoworks@gmail.com";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader);
header("Location: https://google.com", TRUE, 301); // Make proper return page

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

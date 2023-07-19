<?php
$name=$_POST["name"];
$email=$_POST["email"];
$mesaj=$_POST["message"];

$f=fopen("Contact Mesaje.txt","a+");
fwrite($f,"Nume: " .$name. "\n");
fwrite($f,"Email: " .$email. "\n");
fwrite($f,"Mesaj: " .$mesaj. "\n");
fwrite($f,"_______________________________ \n");

fclose($f);
header("Location:Tonivo_Contact.html");
?>
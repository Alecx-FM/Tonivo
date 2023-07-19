<!DOCTYPE html>
<?php
$user_corect = 'root';
$parola_corecta = 'root';
 
$mesaj = '';
if( isset( $_POST ) && !empty( $_POST[ 'trimite' ] ) ) {
	 
	$erori = 0;
	if( !isset( $_POST[ 'user' ] ) || strlen( $_POST[ 'user' ] ) == 0 ) {
		$mesaj =  'Numele de utilizator nu a fost specificat';
		$erori = 1;
	} elseif( !isset( $_POST[ 'pass' ] ) || strlen( $_POST[ 'pass' ] ) == 0 ) {
		$mesaj = 'Parola nu a fost specificata';
		$erori = 1;
	}
 
	if( $erori == 0 ) {
		# verificare simpla
		if( 	$_POST[ 'user' ] === $user_corect &&
				$_POST[ 'pass' ] === $parola_corecta )
		{
			
			$f = fopen("afisare.php", "r+") or die("Unable to open file!");
			echo fread($f,filesize("afisare.php"));
			fclose($f);
			exit; # nu mai afisez nimic altceva
		} else {
			# nu s-a facut login
			$mesaj = 'Username-ul sau parola sunt gresite';
		}
	}
}
?>
<html lang="en">
    <style>
  input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=password], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
legend{
    color: white;
}
    </style>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Cabana Tonivo</title>
</head>
<body>
  <div class="background-main">
    <ul class="navigation-bar">
      <li class="navigatie-butoane"><a href="Tonivo_Main.html">Home</a></li>
      <li class="navigatie-butoane"><a href="Tonivo_About.html">About</a></li>
      <li class="navigatie-butoane"><a href="Tonivo_Contact.html">Contact</a></li>
      <li class="cont-buton"><a href="Tonivo_Rezervare.html"><b>Rezervare</b></a></li>
    </ul>
  </div>
  <div class="rezervare">
    <img class="poza-rezervare" src="Sursa poze/Rezervare.jpg" width="45%" height="97%" alt="">
    <h1 class="h1_admin">Admin Login</h1>
    <form action="afisare.php" method="POST" style="width: 40%">
        <fieldset>
            <legend>Date de autentificare</legend>
            <input type="text" name="user" placeholder="Nume"/><br />
            <input type="password" name="pass" placeholder="Parola"/><br />
        </fieldset>
         
        <fieldset>
            <legend>Actiuni</legend>
            <input type="submit" value="Login" name="trimite" />
        </fieldset>
         
        </form>
</div>
</body>
</html>
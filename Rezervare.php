<?php
// Conectare la baza de date
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Tonivo";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificare conexiune
if ($conn->connect_error) {
  die("Conexiunea la baza de date a esuat: " . $conn->connect_error);
}

// Preluare date din formularul HTML
$nume = $_POST['fname'];
$prenume = $_POST['lname'];
$mail = $_POST['mail'];
$telefon = $_POST['telefon'];
$adresa = $_POST['adresa'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$numarpersoane = $_POST['numarpersoane'];

// Verificare existență client în baza de date
$sql = "SELECT id FROM client WHERE nume = '$nume' AND prenume = '$prenume' AND telefon = '$telefon'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Clientul există deja în baza de date, preluăm ID-ul existent
  $row = $result->fetch_assoc();
  $last_id = $row["id"];
} else {
  // Inserare date în tabela 'client'
  $sql = "INSERT INTO client (nume, prenume, mail, telefon, adresa) VALUES ('$nume', '$prenume', '$mail', '$telefon', '$adresa')";

  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
  } else {
    echo "Eroare: " . $sql . "<br>" . $conn->error;
  }
}

// Inserare date în tabela 'rezervare'
$sql = "INSERT INTO rezervare (checkin, checkout, numarpersoane, id_client) VALUES ('$checkin', '$checkout', '$numarpersoane', '$last_id')";

if ($conn->query($sql) === FALSE)
{echo "Eroare: " . $sql . "<br>" . $conn->error;}

// Inchidere conexiune la baza de date
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Cabana Tonivo</title>
</head>
<body>
  <div class="background-main">
  </div>
  <ul class="navigation-bar">
      <li class="navigatie-butoane"><a href="Tonivo_Main.html">Home</a></li>
      <li class="navigatie-butoane"><a href="Tonivo_About.html">About</a></li>
      <li class="navigatie-butoane"><a href="Tonivo_Contact.html">Contact</a></li>
      <li class="cont-buton"><a href="Tonivo_Rezervare.html"><b>Rezervare</b></a></li>
    </ul>
  <div class="rezervare-completa">
    <h1>Rezervare Completată</h1>
    <p class="rezervare-text1">Pentru orice neclaritate nu ezita să ne contactezi</p>
    <p class="rezervare-text2">Vă așteaptăm cu drag!</p>
</div>
</body>
</html>
<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Tonivo";

$conn = new mysqli($servername, $username, $password, $dbname) or die ("eroare conectare");
mysqli_select_db($conn,"Tonivo") or die("baza de date nu poate fi deschisa");
$sql = "SELECT nume,prenume,telefon,checkin, checkout, numarpersoane FROM client LEFT JOIN rezervare ON client.id = rezervare.id_client";
$result = mysqli_query($conn, $sql);


?>
<html lang="en">
    <style>
  table, td, th {  
  border: 1px solid #000;
  text-align: left;
}

table {
  border-collapse: collapse;
  width: 98%;
}

th, td {
  padding: 15px;
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
  <div class="background-admin">
  </div>
  <ul class="navigation-bar">
      <li class="navigatie-butoane"><a href="Tonivo_Main.html">Home</a></li>
      <li class="navigatie-butoane"><a href="Tonivo_About.html">About</a></li>
      <li class="navigatie-butoane"><a href="Tonivo_Contact.html">Contact</a></li>
      <li class="cont-buton"><a href="Tonivo_Rezervare.html"><b>Rezervare</b></a></li>
    </ul>
  <div class="admin">
    <h1> <center> Tabel rezervari </center></h1>
<p>
<table  border="1">
  <tr>
    <td><strong>Nume</strong></td>
    <td><strong>Prenume</strong></td>
    <td><strong>Telefon</strong></td>
    <td><strong>Checkin </strong></td>
	<td><strong>Checkout </strong></td>
	<td><strong>Persoane </strong></td>
  </tr>
  <?php
  
  while($vector=mysqli_fetch_assoc($result))
 	 {
        $nume = $vector['nume'];
        $prenume = $vector['prenume'];
        $telefon = $vector['telefon'];
        $checkin = $vector['checkin'];
        $checkout = $vector['checkout'];
        $numarpersoane = $vector['numarpersoane'];

	  echo "	
  		<tr>
    		<td>$nume</td>
    		<td>$prenume</td>
            <td>$telefon</td>
    		<td>$checkin</td>
			<td>$checkout</td>
			<td>$numarpersoane</td>
  		 </tr>";
}

?>
</table>
    
</div>
</body>
</html>
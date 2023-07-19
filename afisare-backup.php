<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Tonivo";

$conn = new mysqli($servername, $username, $password, $dbname) or die ("eroare conectare");
mysqli_select_db($conn,"Tonivo") or die("baza de date nu poate fi deschisa");
$sql = "SELECT nume,prenume,checkin, checkout, numarpersoane FROM client LEFT JOIN rezervare ON client.id = rezervare.id_client";
$result = mysqli_query($conn, $sql);


?>
<html>
<head>
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
</head>
<h1> <center> Tabel rezervari </center></h1>
<p>
<table  border="1">
  <tr>
    <td><strong>Nume</strong></td>
    <td><strong>Prenume</strong></td>
    <td><strong>Checkin </strong></td>
	<td><strong>Checkout </strong></td>
	<td><strong>Persoane </strong></td>
  </tr>
  <?php
  
  while($vector=mysqli_fetch_assoc($result))
 	 {
        $nume = $vector['nume'];
        $prenume = $vector['prenume'];
        $checkin = $vector['checkin'];
        $checkout = $vector['checkout'];
        $numarpersoane = $vector['numarpersoane'];

	  echo "	
  		<tr>
    		<td>$nume</td>
    		<td>$prenume</td>
    		<td>$checkin</td>
			<td>$checkout</td>
			<td>$numarpersoane</td>
  		 </tr>";
}

?>
</table>

<!DOCTYPE html>
<html>
<head>
	<title>Cities</title>
</head>
<body>
<?php
	$pais = $_POST['pais'];

	$conn = mysqli_connect('localhost','yaiza','yaiza');
	// conectamos con la bdd 

	mysqli_select_db($conn, 'world');
	// ens connectem a world 

	$consulta = 'SELECT city.Name cname, country.Name coname FROM country, city where country.Code=city.CountryCode and country.Name="'.$pais.'";';
	// carreguem la consulta a una variable

	$resultat = mysqli_query($conn, $consulta);
	// enviem la consulta -->

	if (!$resultat) {
	     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
	     			$message .= 'Consulta realitzada: ' . $consulta;
	     			die($message);
	 		}


	echo "<table border='1' bordercolor='blue'>";
	echo "<tr background='https://cdn141.picsart.com/279691193014201.png?c256x256'> <td>Ciutat</td> <td>Pais</td> </tr>";
	while( $registre = mysqli_fetch_assoc($resultat) ) {
 		
  		echo "<tr><td>".$registre["cname"]."</td><td>".$registre["coname"]."</td></tr>";

		}

echo "</table>";
?>
</body>
</html>
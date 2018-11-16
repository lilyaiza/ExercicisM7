<!DOCTYPE html>
<html>
<head>
	<title>Filtro</title>
</head>
<body>


<?php 

$conn = mysqli_connect('localhost','yaiza','yaiza');
// conectamos con la bdd 

mysqli_select_db($conn, 'world');
// ens connectem a world 

$consulta = "SELECT Name FROM country;";
// carreguem la consulta a una variable

$resultat = mysqli_query($conn, $consulta);
// enviem la consulta -->

if (!$resultat) {
     			$message  = 'Consulta invàlida: ' . mysqli_error() . "\n";
     			$message .= 'Consulta realitzada: ' . $consulta;
     			die($message);
 		}

//si no hi ha resultat (0 files o bé hi ha algun error a la sintaxi)
//posem un missatge d'error i acabem (die) l'execució de la pàgina web


echo '<form action="cities.php" method="post">';
echo "<select name='pais'>";
while( $registre = mysqli_fetch_assoc($resultat) ) {
 		
  		echo "<option>".$registre["Name"]."</option>";

		}

echo "</select>";
echo '<input type="submit">';
echo "</form>";

?>



</body>
</html>


<!--

Amplia l'exemple de les ciutats amb la BBDD World de forma que puguem filtrar les ciutats mostrades amb un menú desplegable (SELECT).

Guia:

    Pàgina 1: Comença per fer un llistat dels països utilitzant la taula COUNTRY.
    La FK que lliga la taula CITY i la taula COUNTRY és el CountryCode. El formulari desplegable ha de mostrar el nom del país, però ha d'enviar el CountryCode com a value a través de GET o POST a la pagina 2.
    Pàgina 2: Agafa el país enviat per l'usuari (GET o POST) i fes una query que filtri els resultats de la taula CITY i que només mostri les ciutats del país seleccionat.
    Puja aquest projecte a Github i crea un README.md que expliqui com posar en marxa l'exercici perquè funcioni correctament.
    Afegeix les banderes dels països al formulari (caldrà cercar-les per internet).
-->
<html>
<head>
	<title>How many recordings in the library are of the same piece?</title>
</head>

<body>
	<h3>How many recordings in the library are of the same piece?</h3>
	<hr>


<?php

	/* Koppla upp till ditt konto på servern och välj databas */
	$db = mysqli_connect("localhost", "", "", "___" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fråga och spara den i en variabel */
	$query = "SELECT composition.comp_name
    FROM composition
    GROUP BY composition.comp_name
    HAVING COUNT(comp_name) > 1";

	/* Kör SQL-frågan mot databasen och spara resultat-tabellen i en variabel */
	$result = mysqli_query($db,$query);

        if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	/* Här skriver jag ut antalet rader i resultat-tabellen */
	echo "<P>antal: " . mysqli_num_rows($result) . " recordings!\n </P>";


?>

<br>
<a href="main.php">Home</a>
</body>
</html>
<br><br>

  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>comp_name</th>
    </tr>


<?php

/* Hämta en rad i taget från resultat-tabellen och lägg attributvärdena i variablerna 
   $spid, $sname och $year. Skriv ut dessa samtidigt som du skapar en rad i en HTML-tabell */
while (list($comp_name) = mysqli_fetch_row($result))
{
        echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $comp_name . "</td>";
      echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br>
<a href="main.php">Home</a>
</body>

</html>
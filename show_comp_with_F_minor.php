<html>
<head>
	<title>Show compositions with Al Fine's favorite key (F# minor)</title>
</head>

<body>
	<h3>Show compositions with Al Fine's favorite key (F# minor)</h3>
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
    WHERE composition.comp_name LIKE '%F# Minor%'";

	/* Kör SQL-frågan mot databasen och spara resultat-tabellen i en variabel */
	$result = mysqli_query($db,$query);

        if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	/* Här skriver jag ut antalet rader i resultat-tabellen */
	echo "<P>antal: " . mysqli_num_rows($result) . " compositions!\n </P>";

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
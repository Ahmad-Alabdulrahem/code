<html>
<head>
	<title>comp_CD</title>
</head>

<body>
	<h3>comp_CD</h3>
	<hr>


<?php

	/* Koppla upp till ditt konto på servern och välj databas */
	$db = mysqli_connect("localhost", "", "", "___" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fråga och spara den i en variabel */
	$query = "SELECT comp_id, CD_NR, Instrument FROM comp_cd";

	/* Kör SQL-frågan mot databasen och spara resultat-tabellen i en variabel */
	$result = mysqli_query($db,$query);

        if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	/* Här skriver jag ut antalet rader i resultat-tabellen */
	//echo "<P>antal: " . mysqli_num_rows($result) . " studenter\n </P>";


?>

<br>
<a href="main.php">Home</a>
</body>
</html>
<br><br>

  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>comp_id</th>
      <th bgcolor=#eeeedd style='width: 200px;'>CD_NR</th>
      <th bgcolor=#eeeeee style='width: 200px;'>Instrument</th>
    </tr>


<?php

/* Hämta en rad i taget från resultat-tabellen och lägg attributvärdena i variablerna 
   $spid, $sname och $year. Skriv ut dessa samtidigt som du skapar en rad i en HTML-tabell */
while (list($comp_id, $CD_NR, $Instrument) = mysqli_fetch_row($result))
{
        echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $comp_id . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $CD_NR . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $Instrument . "</td>";
      echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br>
<a href="main.php">Home</a>
</body>

</html>
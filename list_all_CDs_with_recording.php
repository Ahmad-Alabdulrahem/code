<html>
<head>
	<title>List all CDs with a recording of BWV 780, together with artists' names and CD titles</title>
</head>

<body>
	<h3>List all CDs with a recording of BWV 780, together with artists' names and CD titles</h3>
	<hr>


<?php

	/* Koppla upp till ditt konto på servern och välj databas */
	$db = mysqli_connect("localhost", "", "", "___" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fråga och spara den i en variabel */
	$query = "SELECT cd.Title, cd.Performer FROM cd JOIN comp_cd ON cd.CD_NR = comp_cd.CD_NR JOIN composition ON comp_cd.comp_id = composition.comp_id WHERE composition.BWV_nr = 'BWV 780'";

	/* Kör SQL-frågan mot databasen och spara resultat-tabellen i en variabel */
	$result = mysqli_query($db,$query);

        if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	/* Här skriver jag ut antalet rader i resultat-tabellen */
	echo "<P>antal: " . mysqli_num_rows($result) . " CD(s)!\n </P>";


?>


  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>TItle</th>
      <th bgcolor=#eeeedd style='width: 200px;'>Performer</th>
    </tr>


<?php

/* Hämta en rad i taget från resultat-tabellen och lägg attributvärdena i variablerna 
   $spid, $sname och $year. Skriv ut dessa samtidigt som du skapar en rad i en HTML-tabell */
while (list($Title, $Performer) = mysqli_fetch_row($result))
{
        echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $Title . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $Performer . "</td>";
      echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br><br>
<a href="main.php">Home</a>
</body>

</html>
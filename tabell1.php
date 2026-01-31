<html>
<head>
	<title>CD</title>
</head>

<body>
	<h3>CD</h3>
	<hr>


<?php

	/* Koppla upp till ditt konto p� servern och v�lj databas */
	$db = mysqli_connect("localhost", "", "", "___" );


	if(!$db){
          echo("Could not connect to MySQL server!" . mysqli_connect_error());
          }


	/* Skriv din SQL-fr�ga och spara den i en variabel */
	$query = "SELECT CD_NR, CD_ID, Title, Label, Performer, time, genre FROM cd";

	/* K�r SQL-fr�gan mot databasen och spara resultat-tabellen i en variabel */
	$result = mysqli_query($db,$query);

        if(!$result)
	{
	echo("<P>Error performing query: </P>");
	}

	/* H�r skriver jag ut antalet rader i resultat-tabellen */
	//echo "<P>antal: " . mysqli_num_rows($result) . " studenter\n </P>";


?>

<br>
<a href="main.php">Home</a>
</body>
</html>
<br><br>

  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>CD_NR</th>
      <th bgcolor=#eeeedd style='width: 200px;'>CD_ID</th>
      <th bgcolor=#eeeeee style='width: 200px;'>Title</th>
      <th bgcolor=#eeeeee style='width: 200px;'>Label</th>
      <th bgcolor=#eeeeee style='width: 200px;'>Performer</th>
      <th bgcolor=#eeeeee style='width: 200px;'>time</th>
      <th bgcolor=#eeeeee style='width: 200px;'>genre</th>
    </tr>


<?php

/* H�mta en rad i taget fr�n resultat-tabellen och l�gg attributv�rdena i variablerna 
   $spid, $sname och $year. Skriv ut dessa samtidigt som du skapar en rad i en HTML-tabell */
while (list($CD_NR, $CD_ID, $Title, $Label, $Performer, $time, $genre) = mysqli_fetch_row($result))
{
        echo "<tr>";
	echo "<td bgcolor=#aaaaaa>" . $CD_NR . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $CD_ID . "</td>";
	echo "<td bgcolor=#aaaaaa>" . $Title . "</td>";
    echo "<td bgcolor=#aaaaaa>" . $Label . "</td>";
    echo "<td bgcolor=#aaaaaa>" . $Performer . "</td>";
    echo "<td bgcolor=#aaaaaa>" . $time . "</td>";
    echo "<td bgcolor=#aaaaaa>" . $genre . "</td>";
      echo "</tr>";
}
 
 
 //mysqli_close($db);

?>

  </table>

<br>
<a href="main.php">Home</a>
</body>

</html>
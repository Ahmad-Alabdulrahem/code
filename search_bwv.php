<html>
<head>
	<title>Search BWV number</title>
</head>

<body>

	<h3>Search BWV number</h3>
	<hr>

<form action="/~yazaibra100/search_bwv.php" method="POST">
<table>
  <tr>
    <td><p>Enter a BWV number (BWV XXX):</p></td>
  </tr>
  <tr>
    <td><input type="text" name="textfield" size = 20 ></td>
    <td><input type="submit" name="button" value="Search"></td>
  </tr>
</table>
</form>

<?php
    if(isset($_POST['button']))
    {
        if(preg_match("/BWV [0-9]+/" , $_POST['textfield']) == true)
        {
           $db = mysqli_connect("localhost", "", "", "___" );
           if(!$db)
           {
             echo("Could not connect to MySQL server!" . mysqli_connect_error());
           }
           $query = "SELECT composition.comp_name, cd.Title, cd.Performer, comp_cd.Instrument
           FROM (composition INNER JOIN comp_cd ON comp_cd.comp_id = composition.comp_id) INNER JOIN cd ON comp_cd.CD_NR = cd.CD_NR
           WHERE composition.BWV_nr = " . "'" . $_POST['textfield'] . "'";
           
           $result = mysqli_query($db,$query);

           if(!$result)
           {
              echo("<P>Error performing query: </P>");
           }
           //echo "<P>antal: " . mysqli_num_rows($result) . " CD(s)!\n </P>";
        }
    }
?>

<br>
<a href="main.php">Home</a>
</body>
</html>
<br><br>

  <table border="1">
    <tr>
      <th bgcolor=#eeeeee style='width: 200px;'>comp_name</th>
      <th bgcolor=#eeeeee style='width: 200px;'>Title</th>
      <th bgcolor=#eeeeee style='width: 200px;'>Performer</th>
      <th bgcolor=#eeeeee style='width: 200px;'>Instrument</th>
    </tr>

<?php
    while (list($comp_name, $Title, $Performer, $Instrument) = mysqli_fetch_row($result))
    {
        echo "<tr>";
	      echo "<td bgcolor=#aaaaaa>" . $comp_name . "</td>";
        echo "<td bgcolor=#aaaaaa>" . $Title . "</td>";
        echo "<td bgcolor=#aaaaaa>" . $Performer . "</td>";
        echo "<td bgcolor=#aaaaaa>" . $Instrument. "</td>";
        echo "</tr>";
    }
?>

</table>

<br>
<a href="main.php">Home</a>
</body>

</html>
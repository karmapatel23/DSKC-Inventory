<?php
$dbc = mysqli_connect("sql304.byethost7.com:3306", "b7_14337608", "Wesharethis1", "b7_14337608_login")
OR dies('Could not connect to MySQL:' .mysqli_connect_error());

$query = "SELECT * FROM Logs";
$result = mysqli_query($dbc,$query);

while($row = mysql_fetch_array($result,)){
    print "<tr><td>".$row['Item']."</td><td>".$row['Unit Size']."</td></tr>";
}
?>

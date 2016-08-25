<?php
###########################################################
/*
This software belongs to DSKC.TK using it without the explicit
permission of the owner is strictly prohibited
No modifications should be made to this file without a permission from
the creator of this file
Please contact DSKC.TK for further instructions.
*/
###########################################################
session_start();
include('session.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Table</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  

<!-- adding 2 style css files here to make it look better -->
<link rel="stylesheet" href="css/reset.css">
 <link rel="stylesheet" href="css/style.css">

 
</head>

<body>

<section> <!--Table stuff below plz-->
<h1> Welcome to DSKC Beta Lab</h1>  
<div  class="tbl-header">


<div align="right">
<button type="button" class="btn btn-success"><a href="index.php?ac=logout" style="color:#FFFFFF">Logout</a></button>
</div>
<h1>Supplies</h1>
<form action="update.php" method="post">
<select name="math">
    <option value="add">Add</option>
    <option value="subtract">Subtract</option>
  </select>
<table width="1000" border="1">
  <tr>
    <td width="250">&nbsp;</td>
    <td width="250">Unit Size</td>
    <td width="250">Quantity</td>
    <td width="250">Price per Unit</td>
  </tr>
  <tr>
    <td>Coffee Beans (lb)</td>
    <td><input type="text" size='1.5' name="coffeeS"> </td>
    <td><input type="text" size='1.5' name="coffeeQ"></td>
    <td><input type="text" size='1.5' name="coffeeP"></td>
  </tr>
  <tr>
    <td>Cream (oz)</td>
    <td><input type="text" size='1' name="creamS"></td>
    <td><input type="text" size='1' name="creamQ"></td>
    <td><input type="text" size='1' name="creamP"></td>
  </tr>
  <tr>
    <td>Sugar (oz)</td>
    <td><input type="text" size='1' name="sugarS"></td>
    <td><input type="text" size='1' name="sugarQ"></td>
    <td><input type="text" size='1' name="sugarP"></td>
  </tr>
  <tr>
    <td>Cups</td>
    <td><input type="text" size='1' name="cupsS"></td>
    <td><input type="text" size='1' name="cupsQ"></td>
    <td><input type="text" size=1' name="cupsP"></td>
  </tr>
</table>
<input  class="btn btn-success" type="submit" value="Submit" ></input>
</form>
<br></br>

<h1>Current Values</h1>
<table width = "1000" border="1">
<tr>
   
    <td width="250">Item</td>
    <td width="250">Quantity</td>
    <td width="250">Price</td>
   
  </tr>
<?php
$dbc = mysqli_connect("sql304.byethost7.com:3306", "b7_14337608", "Wesharethis1", "b7_14337608_login")
OR dies('Could not connect to MySQL:' .mysqli_connect_error());
$query = "SELECT * FROM Supplies";
$result = mysqli_query($dbc,$query);

while($row = mysqli_fetch_array($result)){
     
     echo "<tr>";
     echo "<td>".$row[0]."</td>";
     echo "<td>".$row[1]."</td>";
	 echo "<td>".$row[2]."</td>";
     echo "</tr>";

}
?>

</table>
<p></p>
<p></p>
<div class="table-responsive">  
                     <div id="live_data"></div>       
                     <form method="post" action="excel2.php" >  
                          <input type="submit" name="export_excel" class="btn btn-success" value="Export Current Values to Excel" />  
                     </form>  
</div>  
<br></br>
<h1>Logs</h1>

  
  <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo">Click to view logs</button>

  <div id="demo" class="collapse">
<table width="98%" border="1">
<tr>
    <td width="250">Name </td>
    <td width="250">Unit Size</td>
    <td width="250">Quantity</td>
    <td width="250">Price per Unit</td>
    <td width="250">Time</td>
  </tr>

<?php
$dbc = mysqli_connect("sql304.byethost7.com:3306", "b7_14337608", "Wesharethis1", "b7_14337608_login")
OR dies('Could not connect to MySQL:' .mysqli_connect_error());
$query = "SELECT * FROM Logs ORDER BY Time DESC";
$result = mysqli_query($dbc,$query);

while($row = mysqli_fetch_array($result)){
     
     echo "<tr>";
     echo "<td>".$row[0]."</td>";
     echo "<td>".$row[1]."</td>";
	 echo "<td>".$row[2]."</td>";
	 echo "<td>".$row[3]."</td>";
	  echo "<td>".$row[4]."</td>";
     echo "</tr>";

}
?>
</table>

<p></p>
<p></p>
<p></p>
<!-- putting this button to sleep for now
<div class="table-responsive">  
                     <div id="live_data"></div>       
                     <form method="post" action="excel.php" >  
                          <input type="submit" name="export_excel" class="btn btn-success" value="Export Logs to Excel" />  
                     </form>  

</div>
-->
</div>
</div>
</section>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        <script src="js/index.js"></script>

<!-- Back to top floating button here-->
<script type="text/javascript">
// back to top ends here
$('body').prepend('<a href="#" class="back-to-top" style="color:#FFC300">Back to Top</a>');

var amountScrolled = 300;

$(window).scroll(function() {
	if ( $(window).scrollTop() > amountScrolled ) {
		$('a.back-to-top').fadeIn('slow');
	} else {
		$('a.back-to-top').fadeOut('slow');
	}
});

$('a.back-to-top, a.simple-back-to-top').click(function() {
	$('html, body').animate({
		scrollTop: 0
	}, 700);
	return false;
});
</script>
<!-- That thing ends here-->
    </body>
</html>
	
<?php

 $dbc = mysqli_connect("sql304.byethost7.com:3306", "b7_14337608", "Wesharethis1", "b7_14337608_login")
 OR dies('Could not connect to MySQL:' .mysqli_connect_error());
 $math = $_POST['math'];
 $coffeeS = $_POST["coffeeS"];
 $coffeeQ = $_POST["coffeeQ"];
 $coffeeP = $_POST["coffeeP"];
 $creamS = $_POST["creamS"];
 $creamQ = $_POST["creamQ"];
 $creamP = $_POST["creamP"];
 $sugarS = $_POST["sugarS"];
 $sugarQ = $_POST["sugarQ"];
 $sugarP = $_POST["sugarP"];
 $cupsS = $_POST["cupsS"];
 $cupsQ = $_POST["cupsQ"];
 $cupsP = $_POST["cupsP"];

 if($math == "add"){
 if(!(empty($coffeeS)&& empty($coffeeQ)&& empty($coffeeP))){
   $name = "Coffee Beans (lb)";
   $temp = $coffeeS * $coffeeQ;
   $temp2 = $coffeeP * $coffeeQ;
   $statement = mysqli_prepare($dbc, "UPDATE Supplies SET Quantity = ? + Quantity, Price = ? + Price WHERE Item = ?");
    mysqli_stmt_bind_param($statement, "iis", $temp, $temp2,$name);
    mysqli_stmt_execute($statement);
    $query = mysqli_prepare($dbc, "INSERT INTO `Logs` (`Item`, `Unit Size`, `Quantity`, `Price per Unit`) VALUES (?,?,?,?)");
     mysqli_stmt_bind_param($query, "siii", $name, $coffeeS,$coffeeQ,$coffeeP);
     mysqli_stmt_execute($query);
 }
 if(!(empty($creamS)&& empty($creamQ)&& empty($creamP))){
   $name = "Cream (oz)";
   $temp = $creamS * $creamQ;
   $temp2 = $creamP * $creamQ;
   $statement = mysqli_prepare($dbc, "UPDATE Supplies SET Quantity = ? + Quantity, Price = ? + Price WHERE Item = ?");
    mysqli_stmt_bind_param($statement, "iis", $temp, $temp2,$name);
    mysqli_stmt_execute($statement);
    $query = mysqli_prepare($dbc, "INSERT INTO `Logs` (`Item`, `Unit Size`, `Quantity`, `Price per Unit`) VALUES (?,?,?,?)");
     mysqli_stmt_bind_param($query, "siii", $name, $creamS,$creamQ,$creamP);
     mysqli_stmt_execute($query);
 }
 if(!(empty($sugarS)&& empty($sugarQ)&& empty($sugarP))){
   $name = "Sugar (oz)";
   $temp = $sugarS * $sugarQ;
   $temp2 = $sugarP * $sugarQ;
   $statement = mysqli_prepare($dbc, "UPDATE Supplies SET Quantity = ? + Quantity, Price = ? + Price WHERE Item = ?");
    mysqli_stmt_bind_param($statement, "iis", $temp, $temp2,$name);
    mysqli_stmt_execute($statement);
    $query = mysqli_prepare($dbc, "INSERT INTO `Logs` (`Item`, `Unit Size`, `Quantity`, `Price per Unit`) VALUES (?,?,?,?)");
     mysqli_stmt_bind_param($query, "siii", $name, $sugarS,$sugarQ,$sugarP);
     mysqli_stmt_execute($query);
 }
 if(!(empty($cupsS)&& empty($cupsQ)&& empty($cupsP))){
   $name = "Cups";
   $temp = $cupsS * $cupsQ;
   $temp2 = $cupsP * $cupsQ;
   $statement = mysqli_prepare($dbc, "UPDATE Supplies SET Quantity = ? + Quantity, Price = ? + Price WHERE Item = ?");
    mysqli_stmt_bind_param($statement, "iis", $temp, $temp2,$name);
    mysqli_stmt_execute($statement);
    $query = mysqli_prepare($dbc, "INSERT INTO `Logs` (`Item`, `Unit Size`, `Quantity`, `Price per Unit`) VALUES (?,?,?,?)");
     mysqli_stmt_bind_param($query, "siii", $name, $cupsS,$cupsQ,$cupsP);
     mysqli_stmt_execute($query);
 }
 } elseif($math == "subtract"){
   if(!(empty($coffeeS)&& empty($coffeeQ)&& empty($coffeeP))){
     $name = "Coffee Beans (lb)";
     $temp = $coffeeS * $coffeeQ;
     $temp2 = $coffeeP * $coffeeQ;
     $statement = mysqli_prepare($dbc, "UPDATE Supplies SET Quantity = Quantity - ?, Price = Price - ?
       WHERE Item = ?");
      mysqli_stmt_bind_param($statement, "iis", $temp, $temp2,$name);
      mysqli_stmt_execute($statement);
      if(mysqli_error($dbc) != null){
        echo "Process was not executed. Current coffee supply is too low. <br>";
      }else{
      $name = "Coffee Beans (lb) Subtract";
      $query = mysqli_prepare($dbc, "INSERT INTO `Logs` (`Item`, `Unit Size`, `Quantity`, `Price per Unit`) VALUES (?,?,?,?)");
       mysqli_stmt_bind_param($query, "siii", $name, $coffeeS,$coffeeQ,$coffeeP);
       mysqli_stmt_execute($query);
     }
   }
   if(!(empty($creamS)&& empty($creamQ)&& empty($creamP))){
     $name = "Cream (oz)";
     $temp = $creamS * $creamQ;
     $temp2 = $creamP * $creamQ;
     $statement = mysqli_prepare($dbc, "UPDATE Supplies SET Quantity = Quantity - ?, Price = Price - ?
       WHERE Item = ? ");
      mysqli_stmt_bind_param($statement, "iis", $temp, $temp2,$name);
      mysqli_stmt_execute($statement);
      if(mysqli_error($dbc) != null){
        echo "Process was not executed. Current cream supply is too low. <br>";
      }else{
      $name = "Cream (oz) Subtract";
      $query = mysqli_prepare($dbc, "INSERT INTO `Logs` (`Item`, `Unit Size`, `Quantity`, `Price per Unit`) VALUES (?,?,?,?)");
       mysqli_stmt_bind_param($query, "siii", $name, $creamS,$creamQ,$creamP);
       mysqli_stmt_execute($query);
     }
   }
   if(!(empty($sugarS)&& empty($sugarQ)&& empty($sugarP))){
     $name = "Sugar (oz)";
     $temp = $sugarS * $sugarQ;
     $temp2 = $sugarP * $sugarQ;
     $statement = mysqli_prepare($dbc, "UPDATE Supplies SET Quantity = Quantity - ?, Price = Price - ?
       WHERE Item = ?");
      mysqli_stmt_bind_param($statement, "iis", $temp, $temp2,$name);
      mysqli_stmt_execute($statement);
      if(mysqli_error($dbc) != null){
        echo "Process was not executed. Current sugar supply is too low. <br>";
      }
      else{
       $name = "Sugar (oz) Subtract";
      $query = mysqli_prepare($dbc, "INSERT INTO `Logs` (`Item`, `Unit Size`, `Quantity`, `Price per Unit`) VALUES (?,?,?,?)");
       mysqli_stmt_bind_param($query, "siii", $name, $sugarS,$sugarQ,$sugarP);
       mysqli_stmt_execute($query);
     }
   }
   if(!(empty($cupsS)&& empty($cupsQ)&& empty($cupsP))){
      $name = "Cups";
     $temp = $cupsS * $cupsQ;
     $temp2 = $cupsP * $cupsQ;
     $statement = mysqli_prepare($dbc, "UPDATE Supplies SET Quantity = Quantity - ?, Price = Price - ?
       WHERE Item = ?");
      mysqli_stmt_bind_param($statement, "iis", $temp, $temp2,$name);
      mysqli_stmt_execute($statement);

      if(mysqli_error($dbc) != null){
        echo "Process was not executed. Current cup supply is too low. <br>";
      }
      else{
      $name = "Cups Subtract";
      $query = mysqli_prepare($dbc, "INSERT INTO `Logs` (`Item`, `Unit Size`, `Quantity`, `Price per Unit`) VALUES (?,?,?,?)");
       mysqli_stmt_bind_param($query, "siii", $name, $cupsS,$cupsQ,$cupsP);
       mysqli_stmt_execute($query);
     }
   }
 }



 mysqli_close($conn);

function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}

Redirect('http://dd.22web.org/Test/', false);
?>

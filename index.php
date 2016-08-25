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

error_reporting(0);
include("config.php");

//comment

 
?>




<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



<!-- Stuff ends here-->

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/style.css">

    </head>
    <body>
 <section> <!-- PHP and stuff below plz -->
 
<div  class="tbl-header">
<?php
	$error = '';
	if(isset($_POST['is_login'])){
		$sql = "SELECT * FROM ".$SETTINGS["USERS"]." WHERE `email` = '".mysql_real_escape_string($_POST['email'])."' AND `password` = '".mysql_real_escape_string($_POST['password'])."'";
		$sql_result = mysql_query ($sql, $connection ) or die ('request "Could not execute SQL query" '.$sql);
		$user_info = mysql_fetch_assoc($sql_result);
		$user = $user_info['email'];
		if(!empty($user)){
			$_SESSION['user_info'] = $user;
		}
		else{
			$error = 'Wrong email or password.';
		}
	}
	
	if(isset($_GET['ac']) && $_GET['ac'] == 'logout'){
		$_SESSION['user_info'] = null;
		unset($_SESSION['user_info']);
	}

?>
	



    <?php if(isset($_SESSION['user_info']) ) { 
	   
		header("location: table.php"); ?>

<?php } else { ?>
	    <form id="login-form" class="login-form" name="form1" method="post" action="index.php">
	    	<input type="hidden" name="is_login" value="1">
	        <div class="h1"><h1>Login Form</h1></div>
	        <div id="form-content">
	            <div class="group">
	                <label for="email">Email</label>
	                <div><input id="email" name="email" class="form-control required" type="name" placeholder="Email"></div>
	            </div>
	           <div class="group">
	                <label for="name">Password</label>
	                <div><input id="password" name="password" class="form-control required" type="password" placeholder="Password"></div>
	            </div>
	            <?php if($error) { ?>
	                <em>
						<label class="err" for="password" generated="true" style="display: block;"><?php echo $error ?></label>
					</em>
				<?php } ?>
	            <div class="group submit">
	                <label class="empty"></label>
	                <div><input class="btn btn-info" name="submit" type="submit" value="Submit"/></div>
	            </div>
	        </div>
	        <div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
              <h2>This is a closed beta, please login with given credentitals.</h2>   
	    </form>
	<?php } ?>   
</div>

</section>
    </body>
</html>
	
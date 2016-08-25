<?php

session_start();
   include('config.php');
  
   
if(!(isset($_SESSION['user_info'])) && ($_SESSION['user_info'] != ' ')){
                header ("Location: index.php");
                exit; 
            }
  
?>
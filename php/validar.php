<?php 
session_start();

if($_POST['username']=="dropinkev@gmail.com" && $_POST['password']=="360flip")
{
   $_SESSION["username"] = $_POST['username'];
   echo 'logeado';
}
else
{
	echo "error";
}


 ?>
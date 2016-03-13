<?php

//error_reporting(0);
require 'connect.php';

if(isset($_GET['username'] , $_GET['id']))
{
	if(!empty($_GET['username']) && !empty($_GET['id']) ){
	$username = trim($_GET['username']);
	$id = trim($_GET['id']);

	$people = $db->prepare("SELECT password FROM persons WHERE username = ? AND id = ?");
	$people->bind_param('si', $username , $id);
	$people->execute();
	$people->store_result();

	if($people->num_rows > 0) { 
    $people->bind_result($password);

      
		while($people->fetch())
		{
		echo $password, '<br/>';
		  
		}
	 }else{

	 	echo 'combination of username and id is invalid';
	 }

 }else{
 	echo 'Please insert a username and id';
 }

}
?>


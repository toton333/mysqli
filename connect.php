<?php

   $db = new mysqli("localhost" , "root", "ladygaga123", "test");
   
   if($db->connect_errno)
   {
     
     //$db->connect_error; //for development purpose only
	 
     die("Sorry, some technical porblem occured , try agan later");
   }
  
  
<?php
error_reporting(0);
require 'connect.php';

if($result = $db->query("SELECT  * FROM persons"))
{
  
    if($result->num_rows)
	{
	
		/*
		we can do this way but it is a waste of resources cause we are extracting all rows
		
		 $rows = $result->fetch_all(MYSQLI_ASSOC);
		 
		 foreach($rows as $row)
		 {
		  
			echo "username : ",$row["username"], "     password : ",$row["password"],"</br>";
		 
		 }
		 
		 echo '<pre>',print_r($rows),'</pre>';
		
		*/
		
		//using a while  loop is better
		
		while($row = $result->fetch_object()) //better to use fetch_object() than fetch_assoc() and use $row["username"]
		{
		  echo $row->username, ' ', $row->password, '<br/>';
		}
		
		$result->free(); //freeing up the memory
	
	}else
	{
	
       echo "No result found";
	}


}else
{

//die($db->error);  //for development purpose only
 echo "Error occured, try again later";

}

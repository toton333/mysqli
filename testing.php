<?php

require_once "connect.php";
echo "<h3>First method</h3>";


$query = "SELECT * FROM chat";
//leaving the if statements for simplecity
//first method

$result = $db->query($query);

while($row = $result->fetch_object()){ //$row is an object now , to make $row an array we can use fetch_array(), fetch_assoc() etc

 echo $row->message, "<br/>";
}


//alternative way using extract

/*
   while($row = $result->fetch_assoc()){
   
     extract($row);
	 
	 echo $message, "<br/>";
   
   }

*/





?>
<hr />
<?php

echo "<h3>second method using prepared statement</h3>";
//second method using prepared statement

$result = $db->prepare($query);

$result->execute();

$result->bind_result($id, $sender,$message, $time); //have to supply all fields

//need to use store_result() beforehand if we want to use data_seek()
/*
$result->store_result();
$result->data_seek(2);
*/

while($result->fetch()){

  echo $message, "<br/>";
}




?>
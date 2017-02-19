<?php
 
 
 //$collection = $_GET['collection'];
 
 //create a mySQL DB connection:
$dbhost = "182.50.133.146";
$dbuser = "auxstudDB6c";
$dbpass = "auxstud6cDB1!";
$dbname = "auxstudDB6c";
 $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

 //testing connection success
 if(mysqli_connect_errno()) {
 die("DB connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")"
 );
 }
 
 $query="SELECT * FROM tbl_item_223";

 //$query="SELECT *, tbl_collections_223.pic FROM tbl_item_223 INNER JOIN tbl_collections_223 where tbl_collection_223.id=".collection." and tbl_item_223.collection=".collection;
 $result= mysqli_query($connection, $query);
 if(!$result){
 	die("DB query failed");
 }
 $table= array();
 while ($row=mysqli_fetch_row($result)) {
     $item=array();
	 $item["index"]=$row[0];
	 $item["model"]=$row[1];
	  $item["price"]=$row[2];
	   $item["is_optic"]=$row[3];
	    $item["is_poleroid"]=$row[4];
		$item["pic_name"]=$row[5];
		$item["collection"]=$row[6];
		$item["gender"]=$row[7];
		$item["color"]=$row[8];
		$item["frame"]=$row[9];
		
	
		$table[]=$item;
 }
 
 echo json_encode($table, JSON_PRETTY_PRINT);
 mysqli_free_result($result);
 mysqli_close($connection);
 
?>

<?php

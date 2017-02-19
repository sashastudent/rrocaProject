<?php
 
 $id = -1;
if(isset($_GET['id'])){
	$id=$_GET['id'];	
}

include('includs/db.php');
if($id==-1){
 	$query="SELECT * FROM tbl_item_223";
}else{
	$query="SELECT * FROM tbl_item_223 where `index`=".$id ;
}
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

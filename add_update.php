<?php
include('includs/db.php');
$id = -1;
if(isset($_POST['id'])){
$id=$_POST['id'];	
}

 		$model = $_POST['model'];
		$price = $_POST['price'];
		$is_optic = $_POST['is_optic'];
		$is_poleroid = $_POST['is_poleroid'];
		$pic = $_POST['pic'];
		$collection = $_POST['collection'];	
		$gender = $_POST['gender'];	
 		$color = $_POST['color'];	
		$frame = $_POST['frame'];			
 
 if($id==-1){
	 $query = "insert into tbl_item_223(`model`,`price`, `is_optic`, `is_poleroid` , `pic_name`, `collection`, `gender`, `color`,`frame`)
	 values($model,$price,$is_optic,$is_poleroid,'$pic','$collection',$gender,'$color','$frame')";
 }else {
	 $query = "UPDATE `tbl_item_223`
	SET
	`model` = $model,
	`price` = $price,
	`is_optic` = $is_optic,
	`is_poleroid` = $is_poleroid,
	`pic_name` = '$pic',
	`collection` = '$collection',
	`gender` = $gender, 
	`color` = '$color',
	`frame`='$frame'
	WHERE 
		`index`=$id
	";
 	
 }
 
 $result= mysqli_query($connection, $query);
 if(!$result){
 	die("DB query failed - ".mysqli_error($connection)."<br> SQL <br>".$query."<br>FORM PARAMETERS<br>".file_get_contents("php://input"));
 }
 
 header('Location: '."admin.html");
 die();
 	/*		
	echo"model".$model;
	echo"price: ".$price."<br>";
	echo"is_optic:".$is_optic."<br>";
	echo"is_poleroid:".$is_poleroid."<br>";
	echo"pic:".$pic."<br>";
 	echo"collection:".$collection."<br>";	
 	echo"gender:".$gender."<br>";
 	echo"color:".$color."<br>";
 	echo"frame:".$frame."<br>";

	*/
	
 				?>
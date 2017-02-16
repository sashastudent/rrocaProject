<!DOCTYPE html>
<html>
	<head>
		<title>collection rroca page</title>
		<link rel="stylesheet" href="includs/style.css" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<script src="includs/jquery-3.1.1.min.js"></script>
		<script src="includs/script.js"></script> 
	</head>
	<body id="collec">
		<div id="wrapper">
			<header>
				<a href="index.html" id="logo" ></a>
				<nav>
					<ul class="topnav" id="myTopnav">
						<li><a href ="#" class="nav_white">Magazine</a></li>
						<li><a href ="#" class="nav_white">Hot in rroca</a></li>
						<li><a href ="collection.php" class="nav_white">Collection</a></li>	
						<li><a href ="#"class="nav_grey">שמש אופטי</a></li>
						<li><a href ="#"class="nav_grey">אודות</a></li>
						<li><a href ="#"class="nav_grey">סניפים</a></li>
						<li><a href ="#"class="nav_grey">שרות לקחות</a></li>
						<li><a href ="#"class="nav_grey">צור קשר</a></li>
						<li><a href ="searchpage.php" class="nav_grey">חיפוש דגם</a></li>				
						<li class="icon">
                        <a href="javascript:void(0);"  onclick="myFunction()">☰</a>
                    	</li>
						<div class="clear"></div>
					</ul>
				</nav>			
			</header>
			<main>
				
				<h1>Collections</h1>
				
				<?php 
					include ('includs/db.php');
					$query = 'SELECT pic FROM  tbl_collections_223';
					$result = mysqli_query($connection, $query);
					if(!$result){
						die("DB query failed");
					}
					
					while($row = mysqli_fetch_assoc($result)){
						$imageUrl = "images/collections/".$row['pic'];
						echo "<div class='itemBox'>";
						echo "<a href='items.html', style='background-image: url(".$imageUrl.")'></a></div>" ;				
					}
					
					mysqli_free_result($result); 
					
				 ?>
				
			<div class="clear"></div>	
			</main>
				
			<footer>
				<nav id="navInFooterCollecP">
					<ul>
						<li><a href="#">צור קשר</a></li>
						<li><a href="#">שרות לקוחות </a></li>
						<li><a href="#">סניפים</a></li>
						<li><a href="#">אודות</a></li>
						<li><a href="#">Franchiding opportunities</a></li>
						<li><a href="collection.php">Collections</a></li>
						<li><a href="#">Hot In rroca</a></li>
						<li><a href="#">Magazine</a></li>
						<div class="clear"></div>
					</ul>
					<p>
						2017(c) רוקה בע"מ כל הזכויות שמורות
					</p>
				</nav>
			</footer>
		</div>
	</body>
</html>
<?
//close DB connectoion 
mysqli_close($connaction);
?>
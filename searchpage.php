<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Search page</title>
		<link rel="stylesheet" href="includs/style.css" />
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<script src="includs/jquery-3.1.1.min.js"></script>
		<script src="includs/script.js"></script>
	</head>
	<body id="searchP">
		<div id="wrapper">
			<header>
				<a href="index.html" id="logo" ></a>
				<nav>
					<ul class="topnav" id="myTopnav">
						<li><a href ="collection.php" class="nav_white">Collection</a></li>
						<li><a href ="#"class="nav_white">Hot in rroca</a></li>
						<li><a href ="#"class="nav_white">Magazine</a></li>
						<li><a href ="#"class="nav_grey">Franchising Opportunities</a></li>
						<li><a href ="searchpage.php"class="nav_grey">חיפוש דגם</a></li>
						<li><a href ="#"class="nav_grey">שמש אופטי</a></li>
						<li class="icon">
							<a href="javascript:void(0);"  onclick="myFunction()">☰</a>
						</li>
						<div class="clear"></div>
					</ul>
				</nav>
			</header>
			<section>
				<h1>חיפוש דגם</h1>
					<form action="#" method="post">
						<label> מותג 
							<p><select name="brand" id="brandJson">
								</select>
							</p>
						</label>
						<label> צבע 
							<p><select name="color" id="colorsJson">
								</select>
							</p>
						</label>	
						<label for="priceFrom","priceTo" > מחיר </label>
						<input type="text" name="priceFrom" placeholder="מ">									
						<input type="text" name="priceTo" placeholder="עד">
						<label> סוג מסגרת 
							<p><select name="frame" id="framesJson">
								</select>
							</p>
						</label>
						<label for="text"> טקסט חופשי </label>
						<input type="text" name="text"/>					
					</form>
			</section>
			<main>
				
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
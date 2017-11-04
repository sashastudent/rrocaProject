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
					<form action="searchpage.php" method="post" autocomplete="on">
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
						<input type="text" name="priceFrom" required="on" placeholder="מ">									
						<input type="text" name="priceTo" required="on" placeholder="עד">
						<label> סוג מסגרת 
							<p><select name="frame" id="framesJson">
								</select>
							</p>
						</label>
						<label for="text"> טקסט חופשי </label>
						<input type="text" name="text"/>	
						<div class="clear"></div>
						<div class="line"></div>
						<input type="checkbox" name="women" value="women">
						<label for="women">נשים</label>
						<input type="checkbox" name="man" value="man">
						<label for="man">גברים</label>
						<input type="checkbox" name="optic" value="optic">
						<label for="optic">שמש/אופטי</label>
						<input type="checkbox" name="polaroid" value="polaroid">
						<label for="polaroid">פולארויד</label>
						<button type="submit" name="submit">שלח</button>
								
					</form>
			</section>
			<main>
				<p class="isresponsiv">no responsive for phone</p>
				<section>
				<?php
						include ('includs/search.php');	
				?>
				<div class="clear"></div>
			 	</section>
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
<?php
if (!isset($_POST['submit'])) {
	include ('includs/db.php');
	$query = "SELECT I.price, I.pic_name, I.model, I.collection, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.id = I.collection";

	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("DB query failed");
	}
	if ($result -> num_rows > 0) {

		while ($rows = mysqli_fetch_assoc($result)) {
			$imgpath = "images/" . $rows['pic_name'] . ".png";

			echo "<div class=resultBox>" . "<p>" . $rows['name'] . "</p>";
			echo "<p>" . $rows['model'] . "</p>";
			echo "<div class=clear></div><img src=" . $imgpath . ">";
			echo "<p>" . $rows['price'] . " ש&quot;ח </p></div>";

		}
	}
}
else if (isset($_POST['submit'])) {
	include ('includs/db.php');
	$output = NULL;
	$brand = $connection -> real_escape_string($_POST['brand']);
	$color = $connection -> real_escape_string($_POST['color']);
	$fprice = $connection -> real_escape_string($_POST['priceFrom']);
	$tprice = $connection -> real_escape_string($_POST['priceTo']);
	$frame = $connection -> real_escape_string($_POST['frame']);
	$text = $connection -> real_escape_string($_POST['text']);

	if (!empty($_POST['women'])) {
		$women = 1;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.gender, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.gender <= '$women'";
	} else if (!empty($_POST['man'])) {
		$man = 0;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.gender, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.gender <= '$man'";
	} else if (!empty($_POST['optic'])) {
		$optic = 1;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.is_optic, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.is_optic='$optic'";
	} else if (!empty($_POST['polaroid'])) {
		$plaroid = 1;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.is_poleroid, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.is_poleroid= '$plaroid'";
	} else if (!empty($_POST['women']) && !empty($_POST['optic'])) {
		$women = 1;
		$optic = 1;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.is_optic, I.gender, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.is_optic='$optic'
							  AND I.gender <= '$women'";
	} else if (!empty($_POST['women']) && !empty($_POST['polaroid'])) {
		$women = 1;
		$plaroid = 1;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.gender, I.is_poleroid, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.is_poleroid= '$plaroid'
							  AND I.gender <= '$women'";
	} else if (!empty($_POST['women']) && !empty($_POST['optic']) && !empty($_POST['polaroid'])) {
		$women = 1;
		$optic = 1;
		$plaroid = 1;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.gender, I.is_poleroid, I.is_optic, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.is_poleroid= '$plaroid'
							  AND I.is_optic='$optic'
							  AND I.gender <= '$women'";
	} else if (!empty($_POST['man']) && !empty($_POST['optic'])) {
		$man = 0;
		$optic = 1;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.is_optic, I.gender, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.is_optic='$optic'
							  AND I.gender <= '$man'";
	} else if (!empty($_POST['man']) && !empty($_POST['polaroid'])) {
		$man = 0;
		$plaroid = 1;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.is_poleroid, I.gender, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.is_poleroid= '$plaroid'
							  AND I.gender <= '$man'";
	} else if (!empty($_POST['man']) && !empty($_POST['polaroid']) && !empty($_POST['optic'])) {
		$man = 0;
		$plaroid = 1;
		$optic = 1;
		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.is_poleroid, I.is_optic, I.gender, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND I.is_optic='$optic'
							  AND I.is_poleroid= '$plaroid'
							  AND I.gender <= '$man'";
	} else {
		//qveary without cheakboxs

		$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, C.name
							  FROM tbl_item_223 I
							  INNER JOIN tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.name = '$brand'
							  AND I.frame='$frame'
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'";
	}

	$result = mysqli_query($connection, $query);
	if (!$result) {
		die("DB query failed");
	}

	if ($result -> num_rows > 0) {

		while ($rows = mysqli_fetch_assoc($result)) {
			$imgpath = "images/" . $rows['pic_name'] . ".png";

			echo "<div class=resultBox>" . "<p>" . $rows['name'] . "</p>";
			echo "<p>" . $rows['model'] . "</p>";
			echo "<div class=clear></div><img src=" . $imgpath . ">";
			echo "<p>" . $rows['price'] . " ש&quot;ח </p></div>";
		}
	} else {
		$output = "אין תוצאות חיפוש";
		echo "<p class=noResult>" . $output . "</p>";
	}
}
?>
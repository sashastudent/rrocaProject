<?php

if (!isset($_POST['submit'])) {
	include ('db.php');
	$query = "SELECT I.price, I.pic_name, I.model, I.collection, C.name
							  FROM hb_rocca.tbl_item_223 I
							  INNER JOIN hb_rocca.tbl_collections_223 C
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
	mysqli_free_result($result);
} else if (isset($_POST['submit'])) {
	include ('includs/db.php');
	$output = NULL;
	$brand = $connection -> real_escape_string($_POST['brand']);
	$color = $connection -> real_escape_string($_POST['color']);
	$fprice = $connection -> real_escape_string($_POST['priceFrom']);
	$tprice = $connection -> real_escape_string($_POST['priceTo']);
	$frame = $connection -> real_escape_string($_POST['frame']);
	$text = $connection -> real_escape_string($_POST['text']);

	$query = "SELECT I.color, I.frame, I.price, I.pic_name, I.model, I.gender, C.name, I.is_poleroid, I.is_optic
							  FROM hb_rocca.tbl_item_223 I
							  INNER JOIN hb_rocca.tbl_collections_223 C
							  ON C.id = I.collection
							  WHERE C.id = I.collection
							  AND I.price >= '$fprice'
							  AND I.price <= '$tprice'
							  AND C.name = '$brand'
							  AND I.color = '$color'";

	if (!empty($_POST['women'])) {
		$women = 1;

		$query .= " AND I.gender = '$women'";

	}
	if (!empty($_POST['man'])) {
		$man = 0;
		$query .= " AND I.gender = '$man'";

	}
	if (!empty($_POST['optic'])) {
		$optic = 1;
		$query .= " AND I.is_optic='$optic'";

	}
	if (!empty($_POST['polaroid'])) {
		$plaroid = 1;
		$query .= " AND I.is_poleroid= '$plaroid'";

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

	mysqli_free_result($result);

	//mysqli_close($connaction);
}
?>
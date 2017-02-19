/**
 * @author Sasha & Alisa
 */

$("document").ready(function() {
	getGlasses();
	$(".lightbox").hide();
	hideBoxLite();
	boxLight();
	bgr();
	readColorsJSON();
	readFramesJSON();
	readCollectionsJSON();
	hideBoxLite();

});

var bgr = function() {

	var randomNum,
	    imageUrl;
	randomNum = Math.floor(Math.random() * 4) + 1;
	imageUrl = "images/hp_bgr" + randomNum + ".jpg";
	$("#homeP").find("main").css('background-image', 'url(' + imageUrl + ')');
};

var boxLight = function() {

	$(".glass_item").on("click", function() {
		var clicked_index=$(this).attr("index");
		$.each(glasses, function(){
			if(this.index==clicked_index){
				 $('.model').html("<p> דגם "+this.model+"</p>");
	       		 $('.price').html("<p>מחיר "+this.price+" שח </p>");
	       		 if(this.is_optic==1){
	       		 	 $('.is_optic').html("<p>אופטי</p>");
	       		 }
	       		 else{
	       		 	$('.is_optic').html("<p>לא אופטי</p>");
	       		 }
	       		 if(this.is_poleroid==1){
	       		 	 $('.is_poleroid').html("<p>פולרויד</p>");
	       		 }
	       		 else{
	       		 	$('.is_poleroid').html("<p>לא פולרויד</p>");
	       		 }
	       			
	       		 $(".lightbox").show();
			}
			
		});

	
	});

};

var myFunction = function() {

	var x = document.getElementById("myTopnav");
	if (x.className === "topnav") {
		x.className += " responsive";
	} else {
		x.className = "topnav";
	}
};

var readColorsJSON = function() {

	$.getJSON("includs/json_colors.json", function(data) {

		$.each(data, function(key, value) {
			var len = value.length;
			for (var i = 0; i < len; i++) {
				$("#colorsJson").append("<option value=" + value[i] + ">" + value[i] + "</option>");
			}

		});
	});
};

var readFramesJSON = function() {

	$.getJSON("includs/json_frames.json", function(data) {

		$.each(data, function(key, value) {
			var len = value.length;
			for (var i = 0; i < len; i++) {
				$("#framesJson").append("<option value=" + value[i] + ">" + value[i] + "</option>");
			}

		});

	});
};

var readCollectionsJSON = function() {

	$.getJSON("includs/json_collections.json", function(data) {

		$.each(data, function(key, value) {
			var len = value.length;
			for (var i = 0; i < len; i++) {
				$("#brandJson").append("<option value=" + value[i] + ">" + value[i] + "</option>");
			}

		});

	});
};

var hideBoxLite = function() {

	$(".lightbox").on("click", function() {

		$(".lightbox").hide();
	});
};
var setCollectionPic = function() {
	var collection_name = glasses[0].collection_pic;

	$("#collection_image_container").html("<img class='collection-logo' src= 'images/collections/" + collection_name + "' height=80 width=160>");

};
var table;
var getTable = function() {

	$.getJSON("table.php", function(data) {
		table = data;
		var tableHtml = "";

		tableHtml += "<table class='items_admin_table'><tr>" + "<th class=col_head1>delete</th>" + "<th class=col_head1>update</th>" + "<th class=col_head1>add</th>" + "<th class=col_head1>Index</th>" + "<th class=col_head2>Model</th>" + "<th class=col_head3>Price</th>" + "<th class=col_head4>Is optic</th>" + "<th class=col_head5>Is poleroid</th>" + "<th>Name</th>" + "<th>Collection</th>" + "<th>Gender</th>" + "<th>Color</th>" + "<th>Frame</th>" + "</tr>";
		$.each(data, function() {
			tableHtml += "<tr>" + "<td><a href='#' onClick='deleteRow(" + this.index + "); return false;'>delete</a></td>" + "<td><a href='addUpdate.html?id=" + this.index + "'>update</a></td>" + "<td><a href='addUpdate.html'>add</a></td>" + "<td>" + this.index + "</td>" + "<td>" + this.model + "</td>" + "<td>" + this.price + "</td>" + "<td>" + this.is_optic + "</td>" + "<td>" + this.is_poleroid + "</td>" + "<td>" + this.pic_name + "</td>" + "<td>" + this.collection + "</td>" + "<td>" + this.gender + "</td>" + "<td>" + this.color + "</td>" + "<td>" + this.frame + "</td>" + "</tr>";

		});
		tableHtml += "</table>";

		$('#admin_table').html(tableHtml);
		/*
		 $('#admin_table').html("<table><tr>"+
		 "<th class=col_head1>Index</th>"+
		 "<th class=col_head2>Model</th>"+
		 "<th class=col_head3>Price</th>"+
		 "<th class=col_head4>Is optic</th>"+
		 "<th class=col_head5>Is poleroid</th>"+
		 "<th>Name</th>"+
		 "<th>Collection</th>"+
		 "<th>Gender</th>"+
		 "<th>Color</th>"+
		 "<th>Frame</th>"+
		 "</tr>");
		 $.each(data, function(){
		 $('#admin_table').append("<tr>"+
		 "<td>"+this.index+"</td>"+
		 "<td>"+this.model+"</td>"+
		 "<td>"+this.price+"</td>"+
		 "<td>"+this.is_optic+"</td>"+
		 "<td>"+this.is_poleroid+"</td>"+
		 "<td>"+this.pic_name+"</td>"+
		 "<td>"+this.collection+"</td>"+
		 "<td>"+this.gender+"</td>"+
		 "<td>"+this.color+"</td>"+
		 "<td>"+this.frame+"</td>"+
		 "</tr>" );

		 });
		 $('#admin_table').append("</table>");
		 });
		 */

	});
	//getJson
};
//getTable
var glasses;
var getGlasses = function() {
	var collection = getQueryStringValue("collection");

	$.getJSON("glasses.php?collection=" + collection, function(data) {
		glasses = data;

		$.each(data, function() {
			$('#wrap').append("<div class='box'><div class='innerContent'><div index=" + this.index + " class='" + this.pic_name + " glass_item'></div></div></div>");

		});
		for (var i = data.length; i < 15; i++) {
			$('#wrap').append("<div class='box'></div>");

		}
		boxLight();
		setCollectionPic();
	});

};


function deleteRow(id) {

	$.post("delete_item.php", {
		id : id
	}).done(function(data) {
		getTable();
	});
}

function getQueryStringValue(key) {
	var keyValues = location.search.substr(1).split("&");
	for (var i = 0; i < keyValues.length; i++) {
		var keyValue = keyValues[i].split("=");

		if (keyValue[0] == key) {
			return keyValue[1];
		}
	}
}

function loadEditGlasses() {

	var index = getQueryStringValue("id");
	if (!index) {
		return;
	}
	$("input[name='id']").val(index);

	$.getJSON("table.php?id=" + index, function(result) {
		data = result[0];
		$("input[name='model']").val(data.model);
		$("input[name='price']").val(data.price);
		$("input[name='is_optic']").val(data.is_optic);
		$("input[name='is_poleroid']").val(data.is_poleroid);
		$("input[name='pic_name']").val(data.pic_name);
		$("input[name='collection']").val(data.collection);
		$("input[name='gender']").val(data.gender);
		$("input[name='color']").val(data.color);
		$("input[name='frame']").val(data.frame);
	});
}

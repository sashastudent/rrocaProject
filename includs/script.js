/**
 * @author Sasha & Alisa
 */

$("document").ready(function() {
	boxLight();
	bgr();
	readColorsJSON();
	readFramesJSON();
	readCollectionsJSON();
		
});

var bgr = function() {

	var randomNum,
	    imageUrl;
	randomNum = Math.floor(Math.random() * 4) + 1;
	imageUrl = "images/hp_bgr" + randomNum + ".jpg";
	$("#homeP").find("main").css('background-image', 'url(' + imageUrl + ')');
};

var boxLight = function() {

	$(".lightbox").hide();

	$(".item").on("click", function() {

		$(".lightbox").show();
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


var readColorsJSON = function(){
	
	$.getJSON("includs/json_colors.json" ,function(data){
	
		$.each(data, function(key, value) {
				var len = value.length;
			for(var i=0; i<len; i++){
				$("#colorsJson").append("<option value="+value[i]+">"+value[i]+"</option>");
			}
		  
		});		
	});
};

var readFramesJSON = function(){
	
	$.getJSON("includs/json_frames.json" ,function(data){
		
			$.each(data, function(key, value) {
				var len = value.length;
			for(var i=0; i<len; i++){
				$("#framesJson").append("<option value="+value[i]+">"+value[i]+"</option>");
			}
		  
		});	
		
	});
};


var readCollectionsJSON = function(){
	
		$.getJSON("includs/json_collections.json" ,function(data){
		
			$.each(data, function(key, value) {
				var len = value.length;
			for(var i=0; i<len; i++){
				$("#brandJson").append("<option value="+value[i]+">"+value[i]+"</option>");
			}
		  
		});	
		
	});
};
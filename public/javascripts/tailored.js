$(document).ready(function(){
	$( ".demographics" ).submit(function( event ) {
		var params = $( this ).serialize();
		$.ajax({
	  		type: "GET",
	 		url: "demographics/" + params,
			datatype: "json"
			})
	  	.done(function( msg ) {
	    	var result = JSON.parse(msg);
	    	var talk = result.response.pages.page[2].segmentation.liveshere;
	    	var latitude = result.response.region.latitude;
	    	var longitude = result.response.region.longitude;
	    	$("#results").html( "" );
	    	console.log(latitude, longitude);
	    	$("#results").append('<img src="https://maps.googleapis.com/maps/api/streetview?size=200x200&location='+ latitude +','+ longitude +'&heading=235">');
	    	$("#results").append('<img src="https://maps.googleapis.com/maps/api/staticmap?center='+ latitude +','+ longitude +'&zoom=11&size=200x200">');
	    	$("#results").append( "<h1>What they say about: "+ result.request.city + ", " + result.request.state + "</h1>");
	    	for (var i = 0; i < talk.length; i++) {
	    		$("#results").append( "<h2>"+talk[i].title+"</h2>"+
	    							"<p>"+talk[i].name+"</p>"+
	    							"<p>"+talk[i].description+"</p>"
	    							);
	    	};	
	  	});
  		event.preventDefault();
  	});
});
$( document ).ready(function(){ 
	 // Call the scroll function 
	goToByScroll("main_video_screen");
	
	 videojs("#main_video_screen").ready(function(){
	    	var myPlayer = this;
	    	$( "#main_video_screen" ).click(function(){
	    		if( ($(this).find("#countFlag").val() != "1" ) && ( !myPlayer.paused() == true )){
		    		$(this).find("#countFlag").val( "1" );
		    		var countVideoId = $(this).find("#countVideoId").val();
		    		//var currentTime = myPlayer.currentTime();
		    		$.ajax({
				        url: "./async-saveVideoCount.php",
				        cache : false,
				        dataType : "json",
				        type : "POST",
				        data : { countVideoId : countVideoId },
				        success : function(data){
				            if(data.result == "success"){
				            	alert(countVideoId + 1);
				            	
				            	 return;
				            }
				            else{
				                return;
				            }
				        }
				    });		
	    		}
	    	});
	    });
});
function onPlayVideo( obj ){
	var videoId = $( obj ).parents("#videoThumbnail").eq(0).find("#viewVideoForm").eq(0).find("#referVideoId").val();
	$( ".form-horizontal" ).find("#videoId").val( videoId );
	$( ".form-horizontal" ).submit();
}

function onVideoSearch(){
	var country = $( "#country" ).val();
	var state = $( "#state" ).val();
	var city = $( "#city" ).val();
	var keywords = $( "#keywords" ).val();
	
	if(/^[a-zA-Z- ]*$/.test(country) == false){ 
		alert( "Please input the Country correctly!"); return; 
	}
	if(/^[a-zA-Z- ]*$/.test(state) == false){ 
		alert( "Please input the State correctly!"); return; 
	}
	if(/^[a-zA-Z- ]*$/.test(city) == false){ 
		alert( "Please input the City correctly!"); return; 
	}
	$( ".form-horizontal" ).submit();
}
function goToByScroll(id){
    // Remove "link" from the ID
  id = id.replace("link", "");
    // Scroll
  $('html,body').animate({
      scrollTop: $("#"+id).offset().top},
      'slow');
}
function onClear(){
	$( "#country" ).val( "" );
	$( "#state" ).val( "" );
	$( "#city" ).val( "" );
	$( "#keywords" ).val( "" );
	window.location.href = "./tourist.php";
}
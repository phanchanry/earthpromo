var videoPlayer = false;
$( document ).ready(function(){ 
	 // Call the scroll function 
	if ($('#main_video_screen').length) {
		  // do something
		goToByScroll("main_video_screen");
		
		videojs("main_video_screen", {
		    plugins: {
		        addThis: {
		          reddit: false,
		          delecious: false,
		          website_url: false,
		          embed: true,
		          facebook: true,
		          twitter: true,
		          googleplus: false,
		          linkedin: false,
		          pinterest: true,
		          delicious: false,
		          reddit: false,
		          email:false,
		          embed: false,
		          more: false
		        }
		    }
		}, function(){
		// Player (this) is initialized and ready.
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
				            	$(this).find("#countVideoId").val(countVideoId + 1);
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
		if (videoPlayer) {
			 v = videojs('main_video_screen');
		     v.controls(false);
		}
	}
	
});
function onPlayVideo( obj ){
	var videoId = $( obj ).parents("#videoThumbnail").eq(0).find("#viewVideoForm").eq(0).find("#referVideoId").val();
	$( ".form-horizontal" ).find("#videoId").val( videoId );
	$( ".form-horizontal" ).submit();
}

function onVideoSearch(){
	
	var city = $( "#city" ).val();
	var keywords = $( "#keywords" ).val();
	
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
	$( "#city" ).val( "" );
	$( "#keywords" ).val( "" );
	window.location.reload;
}

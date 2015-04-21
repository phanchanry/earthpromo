function onVideoSave( ){
	var videoId = $("#videoId").val( );
	var videoCategory = $("#videoCategory").val( );
	var videoCity = $("#videoCity").val( );
	var title = $("#title").val( );
	
	$.ajax({
        url: "async-saveVideo.php",
        dataType : "json",
        type : "POST",
        data : { videoId : videoId, videoCategory : videoCategory, videoCity: videoCity, title : title },
        success : function(data){
            if(data.result == "success"){
                alert("Video saved successfully.");
                return;
            }
        }	
    });	
}
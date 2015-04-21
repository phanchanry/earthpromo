var opts;
var adminYN;
$( document ).ready( function(){
	 isAdminCheck();
	 $("#cloneUploadVideoForm").load('upload-videoForm.php');
	 opts = {
			  lines: 7, // The number of lines to draw
			  length: 3, // The length of each line
			  width: 3, // The line thickness
			  radius: 3, // The radius of the inner circle
			  corners: 1, // Corner roundness (0..1)
			  rotate: 0, // The rotation offset
			  direction: 1, // 1: clockwise, -1: counterclockwise
			  color: '#333', // #rgb or #rrggbb or array of colors
			  speed: 1, // Rounds per second
			  trail: 60, // Afterglow percentage
			  shadow: false, // Whether to render a shadow
			  hwaccel: false, // Whether to use hardware acceleration
			  className: 'spinner', // The CSS class to assign to the spinner
			  zIndex: 2e9, // The z-index (defaults to 2000000000)
			  top: '0px', // Top position relative to parent in px
			  left: '100%', // Left position relative to parent in px
			};
	 var categoryIndex;
		$( ".video-package" ).find("button.btn-u").click(function(){
			categoryIndex = $(this).val();
			var invoiceId = $( "#invoice").val();
			invoiceId = categoryIndex + "_" + invoiceId;
			$( "#invoice").val( invoiceId );
			$.ajax({
		        url: "./async-getPayDayCount.php",
		        cache : false,
		        dataType : "json",
		        type : "POST",
		        data : { categoryIndex : categoryIndex },
		        success : function(data){
		            if(data.result == "success"){
		            	$( ".video-package" ).addClass("hide");
		            	var categoryName = data.videoCategory;
		            	categoryName = categoryName.toLowerCase().replace(/\b[a-z]/g, function(letter) {
		            	    return letter.toUpperCase();
		            	});
		            	if( adminYN == 'N'){
			            	if( ((categoryIndex == "1") || (categoryIndex == "3") || (categoryIndex == "4") || (categoryIndex == "6")) && ((data.countPayDay == null) || (data.countPayDay >= 365)) ){
			            		$( "#hidePayRequest" ).attr( "id", "payRequest" );
			            		$( "#payRequest" ).removeClass("hide");
			            		if( data.countPayDay == null )
			            			$( "#payRequest" ).find("#newRequest").removeClass( "hide" );
			            		else if( data.countPayDay >= 365 )
			            			$( "#payRequest" ).find("#expiredRequest").removeClass( "hide" );
			            		$( "#videoCategory" ).val( categoryIndex );
			            	}else
			            		cloneVideoUploadForm(categoryName, categoryIndex);
		            	}else
		            		cloneVideoUploadForm(categoryName, categoryIndex);
		            }
		            else{
		            	alert("Failed");
		                return false;
		            }
		        }
		    });
		});
		$( "#videoPay" ).click(function(){
			var invoiceId = $( "#invoice" ).val();

			$.ajax({
		        url: "./async-saveInvoice.php",
		        cache : false,
		        dataType : "json",
		        type : "POST",
		        data : { invoiceId : invoiceId },
		        success : function(data){
		            if(data.result == "success"){
		            	var amount = data.payAmount;
		            	$("#amount").val( amount );
		            	$( "#createPromosForm").submit();	
		            }
		            else{
		            	alert("Failed");
		                return;
		            }
		        }
		    });	
		});
		
});

function onVideoUpload(){
	
	var temp = [];
	var description =$( "#uploadVideoForm" ).find( "#description" ).val();
	var videoCategory = $( "#uploadVideoForm" ).find( "#videoCategory" ).val();
	var videoCity = $( "#uploadVideoForm" ).find( "#videoCity" ).val();
	var fileUpload = $( "#uploadVideoForm" ).find( "#fileUpload" ).val();
	var videoImage = $( "#uploadVideoForm" ).find("#videoThumbnail").find("img").attr("src");

	if( description == "" ){ alert( "Please input description!" ); return; }
	if( videoCategory == "" ){ alert( "Please select video category!" ); return; }
	if( videoCity == "0" ){ alert( "Please select video City!" ); return; }
	if( fileUpload == "" ){ alert( "Please upload mp4 file!" ); return; }
	if( videoImage == "" ){ alert( "Please upload video thumbnail!" ); return; }
	
	var target = document.getElementById('videoLoadingBar');
	var spinner = new Spinner(opts).spin(target);
	$( "#videoLoadingBar" ).removeClass("hide");
	$("input#fileUpload").parents("form").ajaxForm({
		 success: function(data) {
			 spinner.stop();
			 if (data == "exceed") {
				 alert("This file was too big or Invalid Format, not uploaded");
				 return;
			 } else if (data == "invalid") {
				 alert("This file had an invalid file extension, not uploaded");
				 return;
			 }
			  var videoUploadResult = data;
			  temp = videoUploadResult.split("::");
				uploadFilePath = temp[1];
				if( temp[0] == "" ){ alert( videoUploadResult ); return; }
				$.ajax({
			        url: "./async-savePromos.php",
			        cache : false,
			        dataType : "json",
			        type : "POST",
			        data : { description : description,
			        	   videoCategory : videoCategory,
			        	       videoCity : videoCity,
			        	  uploadFilePath : uploadFilePath, 
			        	      videoImage : videoImage },
			        success : function(data){
			            if(data.result == "success"){
			            	alert( "Submit Succesfully!" );
			            	$( "#description" ).val( "" );
			            	$( "#videoCity" ).val( "0" );
			            	$( "#fileUpload" ).val( "" );
			            	$( "#imageUpload" ).val( "" );
			            	$("#videoThumbnail").find("img").attr("src", "" );
			            	 return;
			            }
			            else{
			            	alert("Failed");
			                return;
			            }
			        }
			    });		
		 }
	}).submit();
}
function reloadWindow(){
	window.location.reload();
}

function isAdminCheck(){
	$.ajax({
        url: "./async-getIsAdmin.php",
        cache : false,
        dataType : "json",
        type : "POST",
        success : function(data){
            if(data.result == "success"){
            	adminYN = data.isAdmin;
            }
            else{
            	alert("Failed");
            }
        }
    });	
}
function cloneVideoUploadForm( categoryName, categoryIndex){
	var getType = "choose";
	$.ajax({
        url: "./async-getCityInfo.php",
        cache : false,
        dataType : "json",
        type : "POST",
        data : { getType : getType },
        success : function(data){
            if(data.result == "success"){
            	var objClone = $( "#cloneUploadVideoForm" ).clone();
              	objClone.attr( "id", "uploadVideoForm" );
              	objClone.removeClass( "hide" );
              	objClone.find( "#videoCategory" ).text( categoryName );
              	objClone.find( "#videoCategory" ).val( categoryIndex );
              	$( ".panel-body" ).append( objClone );
              	
              	$("#cloneUploadVideoForm").empty();
              	
            	var cityData = data.city;
            	for(var i = 0 ; i < cityData.length ; i ++ ){
            		var tempObj = "<option value=" + cityData[i].ep_city + ">" + cityData[i].ep_city_name + "</option>";
            		objClone.find( "#videoCity" ).append(tempObj);
            	}
            	$("input#imageUpload").change( function(){
            		var target = document.getElementById('thumbLoadingBar');
            		var spinner = new Spinner(opts).spin(target);
            		$( "#thumbLoadingBar" ).removeClass("hide");
            		$(this).parents("form").ajaxForm({
            			 success: function(data) {
            				 $("input#imageUpload").parents("form").find("#videoThumbnail").html( data );
            				 spinner.stop();
            			 }
            		}).submit();
            	});
            	 return;
            }
            else{
            	alert("Failed");
                return;
            }
        }
    });		
  	
}

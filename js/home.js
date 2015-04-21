function onSearchVideo(){
	var city = $( "#city" ).val();
	var videoCategory = $( "#videoCategory" ).val();
	
	//if( city == "" ){ alert("Please input the City!"); return; }
	if( videoCategory == "0" ){ alert("Please select category!"); return; }
	
	switch ( videoCategory ){
	case "1":
		$( "#homeSearchForm" ).attr("action", "business.php");
		$( "#homeSearchForm" ).submit();
		break;
	case "2":
		$( "#homeSearchForm" ).attr("action", "jobseekers.php");
		$( "#homeSearchForm" ).submit();
		break;
	case "3":
		$( "#homeSearchForm" ).attr("action", "entertainment.php");
		$( "#homeSearchForm" ).submit();
		break;
	case "4":
		$( "#homeSearchForm" ).attr("action", "tourist.php");
		$( "#homeSearchForm" ).submit();
		break;
	case "5":
		$( "#homeSearchForm" ).attr("action", "talent.php");
		$( "#homeSearchForm" ).submit();
		break;
	case "6":
		$( "#homeSearchForm" ).attr("action", "invest.php");
		$( "#homeSearchForm" ).submit();
		break;
	}	
}
//$( document ).ready( function(){
//	 $( "#state" ).autocomplete({
//		 source: function( request, response ) {
//			 $.ajax({
//			        url: "./async-getStateInfo.php",
//			        cache : false,
//			        dataType : "json",
//			        type : "POST",
//			        data : { state : request.term },
//			        success: function( data ) {	        	
//			            response( $.map(data.state, function( item ) {
//			              return {	            	 
//			            	value : item.ep_state  
//			              }	            
//			            }));
//			          }
//			    });
//		 	}
//	   });
//	 
//});
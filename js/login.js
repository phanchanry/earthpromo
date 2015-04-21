$(document).ready( function(){
	$("#username").focus();
	$("#username").keyup( function(event){
		if( event.keyCode == 13 )
			$("#password").focus();
	});
	
	$("#password").keyup( function(event){
		if( event.keyCode == 13 )
			onLoginSubmit();
	});
});
function onLoginSubmit(){
	var username = $( "#username" ).val();
	var password = $( "#password" ).val();
	
	if( username == ""){ alert( "Please input Username!" ); return; }
	if( password == ""){ alert( "Please input Password!" ); return; }
	
	$.ajax({
        url: "./async-logInSubmit.php",
        cache : false,
        dataType : "json",
        type : "POST",
        data : { username: username, password: password },
        success : function(data){
            if(data.result == "success"){
            	 window.location.href = "home.php";
            	 return;
            }
            else{
            	alert("Failed");
                return;
            }
        }
    });	
}	
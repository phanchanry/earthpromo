$(document).ready( function(){
	$("#username").focus();
	$("#password").keyup( function(event){
		if( event.keyCode == 13 ){
			onSignInSubmit();
		}
	})
});
function onSignInSubmit( ){
	var username = $("#username").val( );
	var password = $("#password").val( );
	$.ajax({
        url: "/admin/async-signIn.php",
        dataType : "json",
        type : "POST",
        data : { username : username, password : password },
        success : function(data){
            if(data.result == "success"){
                window.location.href = "index.php";
                return;
            }else{
            	alert("Username and Password is incorrect.");
            	$("#username").focus();
            	return;
            }
        }
    });		
}
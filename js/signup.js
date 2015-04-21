$(document).ready( function(){
	
	$("#city").focus();
	$("#city").keyup( function(event){
		if( event.keyCode == 13 )
			$("#username").focus();
	});
	$("#username").keyup( function(event){
		if( event.keyCode == 13 )
			$("#email").focus();
	});
	
	$("#email").keyup( function(event){
		if( event.keyCode == 13 )
			$("#password").focus();
	});
	
	$("#password").keyup( function(event){
		if( event.keyCode == 13 )
			$("#confirmPassword").focus();
	});
	$("#confirmPassword").keyup( function(event){
		if( event.keyCode == 13 )
			onSignupSubmit();
	});
});
function onSignupSubmit(){
	
	var username = $("#username").val();
	var email = $("#email").val();
	var password = $("#password").val();
	var confirmPassword = $("#confirmPassword").val();
	var referredBy = $("#referredBy").val();
	var phoneNumber = $("#phoneNumber").val();
	
	if( username == "" ){ alert("Please input the Username."); return; }
	if( email == "" ){ alert("Please input the Email Address!"); return; }
	if( referredBy == "" ){ alert("Please input the Referred by!"); return; }
	if( phoneNumber == "" ){ alert("Please input the Phone number!"); return; }
	if( password == "" ){ alert("Please input the Password!"); return; }
	
	if( validateUsername(username) ){
		alert("Username mustn't include space, special characters."); return;
	}
	if( !validateEmail( email ) ){ alert("Please input the Email Address correctly!"); return; }
	if( !IsNumeric( phoneNumber ) ){ alert("Please input the Phone number correctly!"); return; }
	if( password != confirmPassword ){ alert( "Please input the Password correctly!" ); return; }
	
	$.ajax({
        url: "/async-signupSubmit.php",
        dataType : "json",
        type : "POST",
        data : {
        		username : username, 
        		   email : email, 
        	  referredBy : referredBy,
        	 phoneNumber : phoneNumber,
        		password : password },
        success : function(data){
            if(data.result == "success"){
                alert("Your account registered successfully.Please Log in");
                window.location.href = "index.php";
                return;
            }else if( data.result == "exits" ){
            	alert("Username or Email is already registered.");
            	return;
            }else{
            	alert( "Failed" );
            }
        }
    });
}

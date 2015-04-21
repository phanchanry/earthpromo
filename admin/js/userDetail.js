
function onUserSave( ){
	var city = "-1";
	var userId = $("#userId").val( );
	var username = $("#username").val( );
	var password = $("#password").val( );
	var email = $("#email").val( );
	var adminYn = $("#adminYn").val( );
	var referredBy = $("#referredBy").val( );
	var phoneNumber = $("#phoneNumber").val( );

	if( city == "" ){ alert("Please input the City."); return; }
	if( username == "" ){ alert("Please input the Username."); return; }
	if( email == "" ){ alert("Please input the Email Address."); return; }
	if( referredBy == "" ){ alert("Please input the Referred by."); return; }
	if( phoneNumber == "" ){ alert("Please input the Phone number."); return; }
	
	if( !validateEmail( email ) ){ alert("Please input the Email Address correctly."); return; }
	if( userId == "" ){ if( password == "" ){ alert("Please input the Password."); return; } }
	if( !IsNumeric( phoneNumber ) ){ alert("Please input the Phone number correctly!"); return; }

	$.ajax({
        url: "async-saveUser.php",
        dataType : "json",
        type : "POST",
        data : { city : city, userId : userId, username : username, password : password, email : email, adminYn : adminYn, referredBy : referredBy, phoneNumber : phoneNumber },
        success : function(data){
            if(data.result == "success"){
                alert("User saved successfully.");
                return;
            }
        }
    });	
		
}
$(document).ready(function(){

	$( "#loginForm" ).on( "submit", function( event ) {
		 event.preventDefault();
		 var usernameLogin = $('#usernameLogin').val();
		 var pwdLogin = $('#pwdLogin').val();
		 $.ajax({
		 	url:'actions/loginValidate.php',
		 	type:'POST',
		 	data:{
		 		usernameLogin:usernameLogin,
		 		pwdLogin:pwdLogin
		 	},
		 	success:function(response){
			 		// alert(response);
			 			$('.responseLogin').html(response).effect('shake');
			 		
		 		}
		 	});
		});
})
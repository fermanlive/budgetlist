$(document).ready(function() {


    $('#registerform').submit(function(e){
        e.preventDefault(); 

		var password = $('#password').val();
		var confirmpassword = $('#confirmpassword').val();
		if(password.length == 0){
			var headMessage = "Contraseña Invalida";
			var message = "Escriba una contraseña por favor";
			alert(headMessage,message);
			return false;
		}
		
		if(password != confirmpassword){
			var headMessage = "Contraseñas no coinciden";
			var message = "Por favor verificar que las contraseñas sean iguales";
			alert(headMessage,message);
			return false;
		}


		var name = $('#name').val();
		if(name.length == 0){
			var message = "Escriba un Nombre por favor";
			var headMessage = "Nombre Error";
			alert(headMessage,message);
			return false;
		}

		var email = $('#email').val();
		if(email.length == 0){
			var message = "Escriba un email por favor";
			var headMessage = "Email no ingresado";
			alert(headMessage,message);
			return false;
		} 
		var alphemail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		if(!alphemail.test(email)){
			var message = "Escriba un correo valido por favor";
			var headMessage = "Email Error";
			alert(headMessage,message);	
			return false;
		}
		let valid= 0;

        if(valid == 0){

            $.ajax({
               url: BASE_URL+'register/save_register',
               type:"post",
               data:new FormData(this), //this is formData
               processData:false,
               contentType:false,
               cache:false,
               //async:true,
               //dataType: 'JSON',
               success: function(data){

                    console.log(data);
                    if(data>0){
                    	document.getElementById("alertRegister").style.display = "none"; 
                    	document.getElementById("alertRegisterSuccess").style.display = "block"; 
                    }else{
                    	document.getElementById("alertRegister").style.display = "block"; 
                    }
                }
            });

        }
       
    });


});


function alert(headMessage,message){
	 document.getElementById("alertRegister").style.display = "block"; 
	 var div = document.getElementById('alertRegister');
	 div.innerHTML = '<strong>'+headMessage+':</strong> '+message;
}


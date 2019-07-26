  $(function(){

	$('#SaveMonth').on('click', function(){
		SaveExpense();
		return false;
	});

     function SaveExpense(){

     	event.preventDefault();
		var DateInitMonth = $('#DateInitMonth').val();
		if(DateInitMonth.length == 0){
			var headMessage = "Contraseña Invalida";
			var message = "Escriba una contraseña por favor";
			alert(headMessage,message);
			//return false;
		}
	
		var DateEndMonth = $('#DateEndMonth').val();
		if(DateEndMonth.length == 0){
			var message = "Escriba un Nombre por favor";
			var headMessage = "Nombre Error";
			alert(headMessage,message);
			//return false;
		}

		var nameMonth = $('#nameMonth').val();
		if(nameMonth.length == 0){
			var message = "Escriba un email por favor";
			var headMessage = "Email no ingresado";
			alert(headMessage,message);
			//return false;
		} 
		let valid= 0;

		let data = JSON.stringify({DateInitMonth,DateEndMonth,nameMonth});
        if(valid == 0){

            $.ajax({

               type:"post",
               url: BASE_URL+'gastos/SaveMonth',
               dataType:"json",
               data:{data: data}, //this is formData
               success: function(data){
               	console.log(data);
                }
            });

        }
    }  


});


function alert(headMessage,message){

}


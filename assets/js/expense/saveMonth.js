  $(function(){

	$('#SaveMonth').on('click', function(){
		SaveExpense();
		return false;
	});

     function SaveExpense(){

     	event.preventDefault();
		var nameExpense = $('#nameExpense').val();
		if(nameExpense.length == 0){
			var headMessage = "Contraseña Invalida";
			var message = "Escriba una contraseña por favor";
			alert(headMessage,message);
			//return false;
		}
	
		var TypeExpense = $('#TypeExpense').val();
		if(TypeExpense.length == 0){
			var message = "Escriba un Nombre por favor";
			var headMessage = "Nombre Error";
			alert(headMessage,message);
			//return false;
		}

		var MountExpense = $('#MountExpense').val();
		if(MountExpense.length == 0){
			var message = "Escriba un email por favor";
			var headMessage = "Email no ingresado";
			alert(headMessage,message);
			//return false;
		} 
		var DateExpense = $('#DateExpense').val();
		if(DateExpense.length == 0){
			var message = "Escriba un email por favor";
			var headMessage = "Email no ingresado";
			alert(headMessage,message);
			//return false;
		} 

		var priorityExpense = document.getElementById("priorityExpense").checked; 

		let valid= 0;

		let data = JSON.stringify({nameExpense,TypeExpense,MountExpense,DateExpense,priorityExpense });
        if(valid == 0){

            $.ajax({

               type:"post",
               url: BASE_URL+'gastos/saveExpense',
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


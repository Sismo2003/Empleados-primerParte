function loginIn(){
    var correo = $('#entryName').val();
    var passw = $('#pass').val();
    if(correo == "" || passw ==""){
        $('.errormessage').show();
        $('.errormessage').html('Faltan Campos por llenar');
        setTimeout("$('.errormessage').hide(); $('.errormessage').html('')",5000);

    }else{
        var ruta = "email="+correo+"&passw="+passw;
        $.ajax(
            {
                url:"../BackEnd/verifyLogIn.php",
                type:'POST',
                dataType:'text',
                data:ruta,
                success: function(response) {
                    if(response == 0){
                        $('.errormessage').show();
                        $('.errormessage').html('Datos incorrectos');
                        setTimeout("$('.errormessage').hide(); $('.errormessage').html('')",5000);
                    }else{
                        window.location.href='tableEmpleoyees.php';
                    }
                },
                error:function (){
                    alert("Error archivo no encontrados");
                }
            }
        );
    }
}
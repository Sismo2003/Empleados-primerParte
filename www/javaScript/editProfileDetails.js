
function emailVerification(correo){
    var ruta = $('#entryEmail').val();
    if(ruta != correo){
        $.ajax({
            url:"../BackEnd/existingEmail.php",
            type:"POST",
            data:"correo="+ruta,
            success:function (res){
                if(res == 1){
                    $('#entryEmail').val('');
                    $('#emailverfication').show();
                    $('#emailverfication').html('El correo '+ ruta  + ' ya se encuentra registrado.');
                    setTimeout("$('#emailverfication').hide(); $('#emailverfication').html(correo)",5000);
                    $('#entryEmail').val(correo);
                }
            },
            error:function (){
                alert("ERROR");
            }
        });
    }

}
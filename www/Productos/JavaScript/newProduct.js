
function codeVerfication(){
    var ruta = $('#productCode').val();
    $.ajax({
        url:"../BackEnd/existingCode.php",
        type:"POST",
        data:"code="+ruta,
        success:function (res){
            if(res >= 1){
                $('#productCode').val('');
                $('#ExistingEmail').show();
                $('#ExistingEmail').html('El Codigo '+ ruta  + ' ya se encuentra registrado.');
                setTimeout("$('#ExistingEmail').hide(); $('#ExistingEmail').html('')",5000);

            }
        },
        error:function (){
            alert("ERROR");
        }
    });
}
function codeVerficationSecond(x){
    var ruta = $('#productCode').val();
    if(x != ruta){
        $.ajax({
            url:"../BackEnd/existingCode.php",
            type:"POST",
            data:"code="+ruta,
            success:function (res){
                if(res >= 1){
                    $('#productCode').val('');
                    $('#ExistingEmail').show();
                    $('#ExistingEmail').html('El Codigo '+ ruta  + ' ya se encuentra registrado.');
                    setTimeout("$('#ExistingEmail').hide(); $('#ExistingEmail').html('')",5000);

                }
            },
            error:function (){
                alert("ERROR");
            }
        });
    }
}

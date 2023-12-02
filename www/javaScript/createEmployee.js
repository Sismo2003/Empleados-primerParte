
function emailverificationPHP(){
    var ruta = $('#email').val();
    $.ajax({
        url:"../BackEnd/existingEmail.php",
        type:"POST",
        data:"correo="+ruta,
        success:function (res){
            if(res == 1){
                $('#email').val('');
                $('#emailverfication').show();
                $('#emailverfication').html('El correo '+ ruta  + ' ya se encuentra registrado.');
                setTimeout("$('#emailverfication').hide(); $('#emailverfication').html('')",5000);

            }
        },
        error:function (){
            alert("ERROR");
        }
    });
}
function test(){
    document.register.method = 'POST';
    document.register.action = '../BackEnd/newEmployee.php'
    document.register.valid();
}

function emailverificationPHP(){
    var ruta = $('#entryEmail').val();
    $.ajax({
        url:"existingEmail.php",
        type:"POST",
        data:"correo="+ruta,
        success:function (res){
            if(res == 1){
                $('#entryEmail').val('');
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
function deleteThis(nodo,identificacion){
    var confirmation = confirm("Seguro que deseas eliminar a este empleado?");
    if(confirmation){
        $.ajax(
            {
                url:"deteleSql.php",
                type:"POST",
                data:"id="+identificacion,
                success:function (){
                    var where = nodo.parentNode;
                    var tr = where.parentNode;
                    $(tr).hide();
                },
                error:function (){
                    alert("ERROR");
                }
            }
        )
    }else{
        alert("No se elimino nada");
    }
}
function valid(){
    var name = $('#entryName').val();
    var passw = $('#pass').val();
    var combox = $('#rol').val();
    var lastname = $("#entrylastName").val();
    var email = $("#entryEmail").val();
    if(name == "" || passw =="" || combox == 0 || lastname=="" || email == ""){
        $('#incompleateData').show();
        $('#incompleateData').html('Faltan Campos por llenar');
        setTimeout("$('#incompleateData').hide(); $('#incompleateData').html('')",5000);
    }else{
        var ruta = "nombre="+name+"&pass="+passw+"&rol="+combox+"&apellido="+lastname+"&correo="+email;
        $.ajax(
            {
                url:"empleados_salva.php",
                type:"POST",
                data:ruta,
                success:function (){
                    alert("Registro con exito");
                },
                error:function (){
                    alert("ERROR");
                }

            }
        )
    }
}
function profileDetails(id){
    $.ajax({
        url:"ProfileDetails.php",
        type:"POST",
        data:"id="+id,
        success:function (res){
           window.location.href='ProfileDetails.php?id='+id;
        },
        error:function (){
            alert('Archivo no encontrado.');
        }
    });

}
function editProfile(id){
    $.ajax({
        url:"edit.php",
        type:"POST",
        data:"id="+id,
        success:function (res){
            window.location.href='edit.php?id='+id;
        },
        error:function (){
            alert('Archivo no encontrado.');
        }
    });
}
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
                url:"verificaUsuario.php",
                type:'POST',
                dataType:'text',
                data:ruta,
                success: function(response) {
                    if(response == 0){
                        $('.errormessage').show();
                        $('.errormessage').html('Datos incorrectos');
                        setTimeout("$('.errormessage').hide(); $('.errormessage').html('')",5000);
                    }else{
                        window.location.href='tableempleoyees.php';
                    }
                },
                error:function (){
                    alert("Error archivo no encontrados");
                }
            }
        );
    }
}

function editvalid(x){
    var id = parseInt(x);
    var name = $('#entryName').val();
    var passw = $('#pass').val();
    var combox = $('#rol').val();
    var lastname = $("#entrylastName").val();
    var email = $("#entryEmail").val();
    if(passw ==""){
        if(name == ""  || combox == 0 || lastname=="" || email == ""){
            $('#incompleateData').show();
            $('#incompleateData').html('Faltan Campos por llenar');
            setTimeout("$('#incompleateData').hide(); $('#incompleateData').html('')",5000);

        }else{
            var ruta = "id="+id+"&nombre="+name+"&pass="+'NULLFLAGXF2A0DC036'+"&rol="+combox+"&apellido="+lastname+"&correo="+email;
            $.ajax(
                {
                    url:"editDB.php",
                    type:"POST",
                    data:ruta,
                    success:function (res){
                        window.location.href='tableempleoyees.php';
                    },
                    error:function (){
                        alert("ERROR");
                    }

                }
            )
        }
    }else{
        if(name == ""  || combox == 0 || lastname=="" || email == ""){
            $('#incompleateData').show();
            $('#incompleateData').html('Faltan Campos por llenar');
            setTimeout("$('#incompleateData').hide(); $('#incompleateData').html('')",5000);

        }else{
            var ruta = "id="+id+"&nombre="+name+"&pass="+passw+"&rol="+combox+"&apellido="+lastname+"&correo="+email;
            $.ajax(
                {
                    url:"editDB.php",
                    type:"POST",
                    data:ruta,
                    success:function (res){
                        window.location.href='tableempleoyees.php';
                    },
                    error:function (){
                        alert("ERROR");
                    }

                }
            )
        }
    }

}
function editProfilevalid(correo){
    var ruta = $('#entryEmail').val();
    if(ruta != correo){
        $.ajax({
            url:"existingEmail.php",
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
function prueba(test){
    alert(test);
}
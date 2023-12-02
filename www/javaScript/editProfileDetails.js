function editvalid(x){
    var id = parseInt(x);
    var name = $('#entryName').val();
    var passw = $('#pass').val();
    var combox = $('#rol').val();
    var lastname = $("#entryLastName").val();
    var email = $("#entryEmail").val();
    var file = $("#picture").val();
    alert(file);
    if(name == ""  || combox == 0 || lastname=="" || email == ""){
        $('#incompleateData').show();
        $('#incompleateData').html('Faltan Campos por llenar');
        setTimeout("$('#incompleateData').hide(); $('#incompleateData').html('')",5000);

    }else{
        if(file == "" && passw == ""){
            var ruta = "id="+id+"&nombre="+name+"&pass="+'NULLFLAGXF2A0DC036'+"&rol="+combox+"&apellido="+lastname+"&correo="+email+"&picture="+"NULLVALUEFORPICTUREX456";
        }
        else if(file == "" && passw != ""){
            var ruta = "id="+id+"&nombre="+name+"&pass="+passw+"&rol="+combox+"&apellido="+lastname+"&correo="+email+"&picture="+"NULLVALUEFORPICTUREX456";
        }
        else if(file != "" && passw == ""){
            var ruta = "id="+id+"&nombre="+name+"&pass="+'NULLFLAGXF2A0DC036'+"&rol="+combox+"&apellido="+lastname+"&correo="+email+"&picture="+file;
        }
        else{
            var ruta = "id="+id+"&nombre="+name+"&pass="+passw+"&rol="+combox+"&apellido="+lastname+"&correo="+email+"&picture="+file;
        }
        $.ajax(
            {
                url:"../BackEnd/editProfileDetailsDataBase.php",
                type:"POST",
                data:ruta,
                success:function (res){
                    window.location.href='empleoyeesTable.php';
                },
                error:function (){
                    alert("ERROR");
                }

            }
        )
    }

}

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
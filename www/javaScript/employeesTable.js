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
        url:"editProfileDetails.php",
        type:"POST",
        data:"id="+id,
        success:function (res){
            window.location.href='editProfileDetails.php?id='+id;
        },
        error:function (){
            alert('Archivo no encontrado.');
        }
    });
}
function deleteProfile(nodo,identificacion){
    var confirmation = confirm("Seguro que deseas eliminar a este empleado?");
    if(confirmation){
        $.ajax(
            {
                url:"../BackEnd/ProfileDeleteSQL.php",
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
function deleteThis(nodo,identificacion){
    var confirmation = confirm("Seguro que deseas eliminar a este empleado?");
    if(confirmation){
        $.ajax(
            {
                url:"../BackEnd/ProfileDeleteSQL.php",
                type:"POST",
                data:"id="+identificacion,
                success:function (){
                    window.location.href='empleoyeesTable.php';
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
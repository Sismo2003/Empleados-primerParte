function edit(id){
    window.location.href='edit-promotion.php?id='+id;
}
function details(id){
    window.location.href='details.php?id='+id;
}
function  deleted(nodo,id){
    var confirmation = confirm("Seguro que deseas eliminar a este Producto?");
    if(confirmation){

        $.ajax(
            {
                url:"../BackEnd/ProfileDeleteSQL.php",
                type:"POST",
                data:"id="+parseInt(id),
                success:function (res){
                    window.location.href='showOffers.php';

                },
                error:function (){
                    alert("ERROR");
                }
            }
        )
    }
}
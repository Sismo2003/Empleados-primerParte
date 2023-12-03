function editProduct(id){
    $.ajax({
        url:"editProductDetails.php",
        type:"POST",
        data:"id="+id,
        success:function (res){
            window.location.href='editProductDetails.php?id='+id;
        },
        error:function (){
            alert('Archivo no encontrado.');
        }
    });
}


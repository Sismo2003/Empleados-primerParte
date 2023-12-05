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

/*
*


$itemOrderSeach = "SELECT * FROM items_orders WHERE order_id = '$existingOrderId' AND product_id = '$itemId'";
$item_ordersRes = $con->query($itemOrderSeach);
$existingAmount = '';
while($row = $OrdeRes->fetch_array()) {
$existingAmount = $row["amount"];
}

* */

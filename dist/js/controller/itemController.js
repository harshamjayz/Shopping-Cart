$(document).ready(function () {
    var url = location.search;
    var values = url.split("=");
    var itemCode = values[1];
    console.log(itemCode);
    var qtyOnHand;


    var ajaxconfig = {
        method:"GET",
        url:"api/items.php?action=one",
        data:{
            itemCode:itemCode
        },
        async:true
    }
    $.ajax(ajaxconfig).done(function(response){
        qtyOnHand = response.qtyOnHand;
        $("img").attr('src',response.URL);
        $("#itemCode").html(response.itemCode);
        $("#itemName").html(response.description);
        $("#qtyOnHand").html(response.qtyOnHand);
        $("#unitPrice").html(response.unitPrice);
    });
});

$("button").click(function (){
    if(("#inputQty").val() >= qtyOnHand){

    }
})
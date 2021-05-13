function addToCart(productId){
    var number=$("#a").val();
    
    $.post("http://localhost/flora/inc/ajaxRequests/cart.php",{productid:productId,number:number},function(response){
        alert(response['ok']);
    });
}

function updateNumberOfCart(productId,type){
    //get number of products
    var number=$("#"+productId+"_number").val();

    if(type=='increase'){
        number= parseInt(number)+1;
    }else if(type=='decrease'){
        number=parseInt(number)-1;
    }

    //update number input value
    $("#"+productId+"_number").val(number);

    $.post("http://localhost/flora/inc/ajaxRequests/cart.php",{productid:productId,number:number},function(response){
        var response=JSON.parse(response);

        //update price text
        $("#"+productId+"_sumprice").text(response['sumprice']+" تومان ")
    });
}
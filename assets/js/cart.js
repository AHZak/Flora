function addToCart(productId){
    var number=$("#a").val();
    
    $.post("http://localhost/flora/inc/ajaxRequests/cart.php",{productid:productId,number:number},function(response){
        alert("محصول مورد نظر به سبد خرید اضافه شد");
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
        $("#"+productId+"_sumprice").text(response['sumprice']+" تومان ");
        $("#fullsum").text(response['fullsum']+" تومان");
    });
}

function deleteFromCart(productId){
    $.post("http://localhost/flora/inc/ajaxRequests/cart.php",{delcart:productId},function(response){
        var response=JSON.parse(response);
       // console.log(response);
        $("#delcart_"+productId).remove();
        $("#fullsum").text(response['fullsum']+" تومان");
    });
}
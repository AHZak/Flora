
$(document).ready(function(){
    var cat="";
    var instockstatus="";
    var order="";
    $("#cat").change(function(){
        cat=$(this).val();
        //SEND LOAD PAGE REQUEST
        updateProTbContent("http://localhost/flora/inc/ajaxRequests/updateFilter.php?cat="+cat+"&instock="+instockstatus+"&order="+order);

        //SHOW CURRENT SELECTED OPTION TEXT IN INLINE BUTTON
        
        document.getElementById("selected-cat-btn").style.display = "inline-block";
        document.getElementById("selected-cat-btn").innerHTML=$("#cat option:selected").text();
    });
    $("#order").change(function(){
        order=$(this).val();
        //SEND LOAD PAGE REQUEST
        updateProTbContent("http://localhost/flora/inc/ajaxRequests/updateFilter.php?cat="+cat+"&instock="+instockstatus+"&order="+order);

        //SHOW CURRENT SELECTED OPTION TEXT IN INLINE BUTTON
        document.getElementById("selected-order-btn").style.display = "inline-block";
        document.getElementById("selected-order-btn").innerHTML=$("#order option:selected").text();
    });
    $("#instockstatus").change(function(){
        instockstatus=$(this).val();
        //SEND LOAD PAGE REQUEST
        updateProTbContent("http://localhost/flora/inc/ajaxRequests/updateFilter.php?cat="+cat+"&instock="+instockstatus+"&order="+order);

        //SHOW CURRENT SELECTED OPTION TEXT IN INLINE BUTTON
        document.getElementById("selected-instock-btn").style.display = "inline-block";
        document.getElementById("selected-instock-btn").innerHTML=$("#instockstatus option:selected").text();
    });

    $("#selected-cat-btn").on('click',function(event){
        //make custom a property
        event.preventDefault();
        cat="";
        document.getElementById("cat").selectedIndex ="all";
        document.getElementById("selected-cat-btn").style.display = "none";
        //SEND LOAD PAGE REQUEST
        updateProTbContent("http://localhost/flora/inc/ajaxRequests/updateFilter.php?cat="+cat+"&instock="+instockstatus+"&order="+order);
    });

    $("#selected-order-btn").on('click',function(event){
        //make custom a property
        event.preventDefault();
        order="";
        document.getElementById("order").selectedIndex ="all";
        document.getElementById("selected-order-btn").style.display = "none";
        //SEND LOAD PAGE REQUEST
        updateProTbContent("http://localhost/flora/inc/ajaxRequests/updateFilter.php?cat="+cat+"&instock="+instockstatus+"&order="+order);
    });

    $("#selected-instock-btn").on('click',function(event){
        //make custom a property
        event.preventDefault();
        instockstatus="";
        document.getElementById("instockstatus").selectedIndex ="all";
        document.getElementById("selected-instock-btn").style.display = "none";
        //SEND LOAD PAGE REQUEST
        updateProTbContent("http://localhost/flora/inc/ajaxRequests/updateFilter.php?cat="+cat+"&instock="+instockstatus+"&order="+order);
    });
});

function updateProTbContent(url){
    var encodedUrl=encodeURI(url);
    
    $("#pro-tb-list-content").load(encodedUrl);
    $('body').scrollTop(0);
    //history.pushState(null,null,url);
}

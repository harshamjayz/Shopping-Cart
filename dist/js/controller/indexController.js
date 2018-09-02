$(document).ready(function () {
    $queryparam = window.location.search;
    $paramarray = $queryparam.split("=");
    if($paramarray !== null){
        $("#btnusername").text($paramarray[1]);
    }
    $ajaxconfig = {
        method:"GET",
        url:"api/items.php?action=all",
        async:true
    }
    $.ajax($ajaxconfig).done(function(response){
        console.log("aavA")
           response.forEach(function(item){
               var html = '<div class="col-lg-4 col-md-6 mb-4">'+
                          '<div class="card">'+
                          '<div class="view overlay">'+
                          '<img src="'+item.URL+'" class="card-img-top" alt="" height="180" width="30" id="'+item.itemCode+'">'+
                                  '<a>'+
                                    '<div class="mask rgba-white-slight"></div>'+
                                  '</a>' +
                                  '</div>' +
                                  '<div class="card-body text-center">'+
                                  '<a href="" class="grey-text">' +
                                  '<h5>'+item.description+'</h5>'+
                                  '</a>'+
                                  '<h5>'+
                                    '<strong>'+
                                         '<button type="button" class="btn btn-primary"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Add To Cart</button>' +
                                     '</strong>' +
                                   '</h5>'+
                                   '<h4 class="font-weight-bold blue-text">' +
                                     '<strong>'+item.unitPrice+'</strong>' +
                                   '</h4>' +
                                 '</div>' +
                               '</div>' +
                             '</div>';

               $("#itemrow").append(html);



           });

        $(".card").click(function(eventData){
            console.log("dfgsdfh");
            var itemCode = $(this).find("div > img").attr('id');
            console.log(itemCode);
            window.location.assign("item.html?itemCode="+itemCode);
        });

       });




});
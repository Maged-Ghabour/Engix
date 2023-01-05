
// Self Invoking Function
(function($) {
    $('.item-quantity').on('change' , function(e){

        $.ajax({
            url: "/cart/" + $(this).data('id'),
            method: "put",
            data: {
                "quantity" : $(this).val(),
                _token : csrf_token,
            }
        });
});


$('.remove-item').on('click' , function(e){

    let id = $(this).data('id');
    $.ajax({
        url: "/enginx/cart/" + id,
        method: "delete",
        data: {
            _token : csrf_token,
        },
        success : response=>{
            $(`#${id}`).remove();
        }
    });
});


$('.add-to-cart').on('click' , function(e){

    $.ajax({
        url: "/enginx/cart" ,
        method: "post",
        data: {
            product_id :$(this).data('id') ,
            quantity : $(this).data('quantity') ,
            _token : csrf_token,
        },
        success : response=>{
           alert("Product Add ..!")
        }
    });
});


})(jQuery);

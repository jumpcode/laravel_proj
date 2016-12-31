$(document).ready(function(){

    $("#add_product").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        e.preventDefault(); 

        var record = {
            name: $('#name').val(),
            quantity: $('#quantity').val(),
            price: $('#price').val(),
            _token: token,
        }
       
        console.log(record);
        console.log('URL',url);
        $.ajax({

            type: "POST",
            url: url, //"/larv-test/public/product_add",
            data: record,
            dataType: 'json',
          })
            .done(function(data){                
                var row = '';                
                var total = 0;
                var table = '<table>';
                data['products'].forEach(function(product){
                  table = table+'<tr><td span class="col-md-3">'+product.name+'</td><td class="col-md-2">'+product.quantity+'</td><td class="col-md-2">'+product.price+'</td><td class="col-md-4">'+product.created_at+'</td></tr>';
                  total+=parseFloat(product.price*product.quantity);
                  console.log('TOTal2',total,product.price,product.quantity);
                });
                table+='</table>';
                $('#product_list').html(table);
                $('#total').html(total.toFixed(2));
           });
            /*success: function (data) {
                console.log('DATA',data);

               
            },

            error: function (data) {
                console.log('Error:', data);
            }
            */
     });
    
});
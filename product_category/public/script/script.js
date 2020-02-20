
function addToCart(parms) {
    var request = $.ajax({
        url: 'http://localhost/product_category/public/User/Cart',
        method: 'POST',
        data: parms
    });
        request.success(function() {
            alert("Added to Cart");
        });
        
    
    console.log((parms));
}
function getCart() {
    var request = $.ajax({
        url: 'http://localhost/product_category/public/User/Cart/get',
    });
        request.success(function(result) {
            
            var result = JSON.parse(result);
            if(result != "") {
                var cartData = "<table class='table'><tr><th>Product Name</th><th>Price</th><th>Quantity</th><th>Action</th></tr>";
                for(const product in result) {
                    temp = result[product];
                    cartData += "<tr>";
                        for(const column in temp) {
                            cartData += "<td>" + temp[column] + "</td>";
                        }
                    cartData += "<td><i class='glyphicon remove glyphicon-trash' id='remove-"+temp['name']+"'></i></td></tr>";
                    
                }
                
                cartData += '</table>';
            }
            else {
                cartData = "Cart Empty";
            }
            document.getElementById('cart').innerHTML = cartData;
            
        });
        
    
    
}
function removeFromCart(parms) {
    var request = $.ajax({
        url: 'http://localhost/product_category/public/User/Cart/remove',
        method: 'POST',
        data: parms
    });
        request.success(function() {
            alert("Removed from Cart");
            getCart();
        });
        
    
    console.log((parms));
}
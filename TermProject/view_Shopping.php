<!DOCTYPE html>
<html>
    <head>
        <title>Shopping: tarotbypoonam</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- jQuery library -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Arima+Madurai:wght@700&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Della+Respira&display=swap');
            @import url('https://fonts.googleapis.com/css2?family=Martel:wght@600&display=swap');
            body{
                overflow-x: hidden;
            }
            body::-webkit-scrollbar{
                display: none;
            } 
            .header-text{
                color: white;
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                z-index: 2;
            }
            .header-h1{
                max-width: 40vw;
                font-weight: bold;
                margin-left: 5vh;
                margin-top: 10vh;
                color: white;
                font-size: 3.5vw;
                font-family: 'Arima Madurai', cursive;
            }
            .product-row{
                grid-auto-rows: 1fr;
            }
            .card{
                height: 100%;
            }
            
            .card-img-top{
                border: none;
                margin-top: 2%;
                width: 100%;
                height: 30vw;
                object-fit: contain;
            }
            aside  h1, aside h3{
                font-family: 'Arima Madurai', cursive;
            }
            .card-title{
                font-weight: bold;
                font-family: 'Della Respira', serif;
            }
            .card-body {
                font-family: 'Martel', serif;
                max-height: 50vh;
                object-fit: contain;
            }
            .card-text{
                font-size: 1.2vw;
            }
            .mycartlist{
                padding-bottom: 1em;
                height: auto;
                min-height: 50em;
            }
        </style>
    </head>
    <body>
        
        <header class="imgContainer">
            <div style="background-image: url('Healing_crystals.jpg');
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                height: 90vh;
                opacity: 0.95;
                filter: blur(4px);"></div>
            <div class="header-text">
                <?php include('view_NavBar.php'); ?>
            <span class="container-fluid">
                <h1 class="header-h1">Shop the Products.</h1>
                <h3 class="header-h1">Shop the crystals and stones in best deal from tarotbypoonam.</h3>
            </span>
            </div>
            
        </header>
        <div class="row">
            <aside id="shop-products" class="shadow-lg p-3 m-5 bg-white rounded" style="width: 60vw;">
                <h1 class="text-center">Tarot shopping products</h1>
                <div id="shoppingProducts" class="container-fluid">
            
                </div>
            </aside>
            <aside  class="col">
                <div  class="mycartlist shadow bg-white rounded m-5">
                    <h3 class="text-center">My shopping Cart</h3>
                    <div class="container-fluid mb-5" id="mycartlist">
                
                </div>
                </div>
            </aside>
        
        </div>
        
        <!-- Payment modal window -->
        <div class="modal fade" id="modal-payment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Verify your details before making payment.</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div id="payment-details" class="modal-body">
                    
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button id="payment-done" type="button" class="btn btn-primary">Out for delivery</button>
              </div>
            </div>
          </div>
        </div>

    </body>
    
    <script>
        
        function showProducts(){
            $.ajax({
            url: "Controller.php",
            data: {
                page: 'ShoppingPage', 
                command: 'show-products'
            },
            type: 'Post',
            success: function(responseText){
                
                var productlist = JSON.parse(responseText);
                //console.log(productlist);
                var str = "<div class=' row row-cols-1 row-cols-md-2'>";
                for(let i = 0; i < productlist.length; i++){
                    str += "<div class='product-row col mb-4'>"
                    str += "<div class='card'>";
                    str += "<img src="+productlist[i][1]+" class='card-img-top' alt='...'>";
                    str += "<div class='card-body'>";
                    str += "<h5 class='card-title'>"+productlist[i][2]+"</h5>";
                    str += "<p class='card-text'>"+productlist[i][3]+"</p>";
                    str += "<p class='card-text'>Price: $"+productlist[i][4]+"</p></div><button  type='button' product-id='"+productlist[i][0]+"'       class='btn btn-primary'>Add to cart</button></div></div>";
                }
                str += "</div>";
                $("#shoppingProducts").html(str);
                
                
                $('button[product-id]').click(function(){
                    var productId = $(this).attr("product-id");
                    insertintocart(productId);
                });
                
            }
                /*End of success method*/
            }); //end of ajax
        }// end of functions
        showProducts();
        
        function insertintocart(productId){
            if(productId == ""){
                console.log("Cart is empty");
            }else{
                $.ajax({
                    url: "Controller.php",
                    data: {
                        page: "ShoppingPage", command: "add-to-cart", product_id: productId
                    },
                    type: "Post",
                    success: function(responseText){
                        showmyCart();
                    }
                })
            }
        }
        
        function showmyCart(){
            $.ajax({
                url: "Controller.php",
                data: {
                    page: "ShoppingPage", command: "show-my-cart"
                },
                type: 'Post',
                success: function(responseText){
                    var data = JSON.parse(responseText);
                    if(data[0][0][0][0] == null){
                        var str = "Your cart is empty";
                        $("#mycartlist").html(str);
                    }
                    else{
                            var myproductlist = data[0][1];
                            var str = "";
                            str += "<div class='my-5'><p class='d-inline ml-5'>Total Cost: $"+data[0][0][0]+"</p><button id='payment-button' data-toggle='modal' data-target='#modal-payment' class='d-inline float-right btn btn-primary'>Make a payment</button></div>";
                            
                        for(let i = 0; i < myproductlist.length; i++){
                            str += "<div class='product-row col mb-4'>"
                            str += "<div class='card'>";
                            str += "<img src="+myproductlist[i][0]+" class='card-img-top' alt='...'>";
                            str += "<div class='card-body'>";
                            str += "<h5 class='card-title'>"+myproductlist[i][1]+"</h5>";
                            str += "<p class='card-text'>Quantity: "+myproductlist[i][2]+"</p>";
                            str += "<p class='card-text'>Price for each: $"+myproductlist[i][3]+"</p></div><button  type='button' remove-product-id='"+myproductlist[i][4]+"'       class='btn btn-primary'>Remove item</button></div></div>";
                        }
                        $("#mycartlist").html(str);
                        $("button[remove-product-id]").click(function(){
                            var remove_id = $(this).attr('remove-product-id');

                            removecartproduct(remove_id);
                        });
                    }
                    
                    $("#payment-button").click(function(){
                        //console.log("Button clicked");
                        $.ajax({
                            url: "Controller.php",
                            data: {
                                page: "ShoppingPage", command: 'makepayment'
                            },
                            type: "Post",
                            success: function(responseText){
                                //console.log(responseText);
                                var user_payment = JSON.parse(responseText);
                                //console.log(responseText);
                                var str = "";
                                str += "<b class='text-center'>Want to make any changes please update your user details in about me page.</b><br><br>";
                                str += "<h5>Fullname: "+user_payment[0][0]+"</h5>";
                                str += "<h5>Email: "+user_payment[0][1]+"</h5>";
                                str += "<h5>Contact: "+user_payment[0][2]+"</h5>";
                                str += "<h5>Address: "+user_payment[0][3]+"</h5>";
                                str += "<h5>Total: $"+user_payment[1][0]+"</h5>";
                                
                                $("#payment-details").html(str);
                                $("#payment-done").click(function(){
                                    $("#modal-payment").modal('hide');
                                    $.ajax({
                                        url: "Controller.php",
                                        data: {
                                            page: "ShoppingPage", command: "emptyCart"
                                        },
                                        type: "Post",
                                        success: function(){
                                            showmyCart();
                                        }
                                    })
                                })
                            }
                        })
                    });
                    
                    
                }
            });
        }
        
        function removecartproduct(remove_id){
            $.ajax({
                url: "Controller.php",
                data: {
                    page: "ShoppingPage", command: "removefromcart", product_id: remove_id
                },
                type: "Post",
                success: function(){
                    showmyCart();
                }
            })
        }
        
        showmyCart();
        
        
    </script>
</html>
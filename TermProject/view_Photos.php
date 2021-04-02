<!DOCTYPE html>
<html>
    <head>
        <title>Photos: tarotbypoonam</title>
        <meta charset="UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- jQuery library -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    
    <style>
        
        body::-webkit-scrollbar{
            display: none;
        }
        .box-container{
            left: 25%;
            position: absolute;
            width: 45%;
            height: 7%;
            border: 4px solid  #8e4785;
        }
        .element-container{
            width: 100%;
            height: 100%;
            vertical-align: middle;
        }
        .search{
            border: none;
            height: 100%;
            width: 95%;
            padding: 0 5%;
            font-size: 1rem;
            color: #fff;
            font-weight: 500;
        }
        .search:focus{
            outline: none;   
        }
        
        .photos-body{
            margin: 5%;
            padding: 0;
        }
        
        .container{
            width: 100%;
            margin: 12% 2%;
            columns: 4;
            column-gap:0.5%;
        }
        
        .container .box{
            width: 100%;
            margin: 0 0 1%;
            overflow: hidden;
        }
        
        .container .box img{
            max-width: 100%;
        }
        
        .box:hover{
            transform: scale(1.2);
        }
        @media(max-width: 953px){
            .box-container{
            width: 45% !important;
        }
        .element-container{
            width: 100%;
            height: 100%;
            padding: 0 1vw;
            vertical-align: middle;
        }
        .search{
            border: none;
            width: 90%;
            padding: 0 2%;
        }
        }
        @media(max-width: 735px){
        .box-container{
            width: 60vw !important;
            margin: 2.5vw 1vw !important;
        }
        .element-container{
            width: 100%;
            height: 100%;
            vertical-align: middle; 
        }
        .search{
            border: none;
            width: 85%;
            padding: 0 1%;
        }
            
            .container{
            width: 100%;
            margin: 20vw 8%;
            columns: 3;
            column-gap: 1%;
        }
            
        }
        
         @media(max-width: 468px){
            .box-container{
            width: 60vw !important;
            margin: 7vw 1vw !important;
        }
        .element-container{
            width: 100%;
            height: 100%;
            vertical-align: middle;
        }
        .search{
            border: none;
            width: 85%;
            padding: 0 3%;
        }
             .container{
            width: 100%;
            margin: 25vw 8%;
            columns: 1;
            column-gap: 1%;
        }
            
        }
    </style>
    <body>
        <div style="background-color: #ffcccb;">
            <?php include('view_NavBar.php');?>
        </div>  
        <main style="margin-top: -4.9%;">
        <div style="background-image: url('Candles.jpg')">
        <div class="container-fluid">
            <div class="box-container my-3 mx-auto rounded-pill">
                <div class="element-container">
                    <input style="background-color: transparent;" id="search-term" type="text" placeholder="Search here..." class="search rounded-pill">
                    <input type="image" id="search-button" class="align-self-center" src="search.svg">
                </div>
            </div>
            <div class="photos-body overflow-auto rounded-lg" style="">
                <div id="photo-list" class="container">
            </div>
        </div>
            </div>
            </div>
            </main>
        
        <script>
            alert("This page has a default feature of downloading only the tarot images but you can search for any of the images");
            function show_photos(){
                var term = $("#search-term").val();
                if(term === "" || term.toLowerCase() === "tarot"){
                    tarot_images();
                }
                else{
                    //alert(term);
                $.ajax({
                    url: "https://pixabay.com/api/?key=20657540-d2a9a089d8bd13a58f416baa8&q="+term+"&image_type=photo&per_page=50",
                    type: "GET",
                    success: function(responseText){
                       // console.log(responseText);
                            var photos = responseText;
                        console.log(photos);
                        var str = "";
                        for(let i = 0; i<photos.hits.length; i++){
                            
                            str+="<div class='box' ><img id="+i+" class='img-picture' src=" + photos.hits[i].largeImageURL + "></div>";
                            
                            /*let img = document.querySelector(".img-picture");
                            console.log(img);
                            img.crossOrigin = 'anonmyous';
                            let canvas = document.createElement('canvas');
                            canvas.width = img.clientWidth;
                            canvas.height = img.clientHeight;
                            let context = canvas.getContext('2d');

                                // copy image to it (this method allows to cut image)
                                context.drawImage(img, 0, 0);
                                // we can context.rotate(), and do many other things on canvas
                                
                                // toBlob is async opereation, callback is called when done
                                //canvas.crossOrigin = 'anonymous';
                                canvas.toBlob(function(blob) {
                                    
                                  // blob ready, download it
                                  let link = document.createElement('a');
                                  link.download = srclink;

                                    link.href = srclink;
                                    //link.click();
                                    link.classList.add('btn');
                                    link.classList.add('btn-primary');
                                    link.innerHTML = "Download";
                                    console.log(link);
                                    $("#photo-list").append(link);

                                  // delete the internal blob reference, to let the browser clear memory from it
                                  URL.revokeObjectURL(link.href);
                                }, 'image/png');*/
                        }
                        $("#photo-list").html(str);
                        $("a[id]").click(function(){
                            console.log($(this).attr("id"));
                            
                        });
                    }
                });
                }
            }
            $("#search-button").click(function(event){
                event.preventDefault();
                show_photos();
            });
            show_photos();
            
            function tarot_images(){
                var str = "";
                    for( let i =0; i < 35; i++){
                                str+="<div ><img id="+i+" class='box img-picture' src=term_images/tarot-"+i+".jpg><a href=term_images/tarot-"+i+".jpg  id="+i+" class='btn btn-primary' download>Download</a></div>";
                            }
                    $("#photo-list").html(str);
            }
        </script>
    </body>
</html>

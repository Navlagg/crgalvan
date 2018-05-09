<?php

    function onsubmit(){
        header(processLogin.php);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Conchitas!</title>
       
        
        
     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){ 

             $("#username").change( function(){ 
               
                    $.ajax({

                    type: "POST",
                    url: "checkUsernameAPI.php",
                    dataType: "json",
                    data: { "username": $("#username").val()},
                    success: function(data,status) {
                        //alert(data);
                        if(!data){
                            $("#usernameError").html("Incorrect username!");
                            $("#usernameError").css("color", "red");
                           
                            }
                         else{
                             $("#usernameError").html(" ");
                          
                         }
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                    
                    });//ajax
             });
                    
                    $("#password").change( function(){ 
                         var pass1 = document.getElementById("#password").value;
                    //alert( $("#username").val() )
                       
                            //alert(data);
                            if(pass1 != "secret"){
                                $("#passwordError").html("Wrong password!");
                                $("#passwordError").css("color", "red");
                               
                                }
                                else{
                                    $("#passwordError").html(" ");
                                    alert($("#password"))

                                }
                        
                    
                } );
                
             } );
        
       function validateForm(){
            
            var isValid = true;
            $("#usernameError").html("");
            //alert( $("#firstName").val()  );
            
            //checking that first name is not left blank
            
            //$("loginForm").hover(function(){
            //      if ($("#username").val() != "admin") {
            //     $("#usernameError").html("Wrong username").show();
            //     isValid = false;
            // }
            // });
            // if ($("#username").val() != "admin") {
            //     $("#usernameError").html("Wrong username");
            //     return;
            //     isValid = false;
            // }
            
            
            //CHECK USERNAME
            if(isValid == true){
            $.ajax({
                    type: "post",
                    url: "processLogin.php",
                    dataType: "json",
                    data: { "username": $("#username").val(), "password": $("#password").val() },
                    success: function(data,status) {
                          //alert(data);  
                          if (data) {
                              $("#usernameError").html("");
                              $("#username").css({"background-color": "green"});
                              
                          } else {
                             
                              $("#usernameError").html("Wrong username");
                              $("#username").css({"background-color": "red"});
                              isValid = false;
                          }
                      },
                      complete: function(data,status) { //optional, used for debugging purposes
                          //alert(status);
                      }
                  });//AJAX 
                  return isValid;
            }
            
            
        }
        
         </script>
        

   <link rel="stylesheet" href="css/styles.css" type="text/css" />
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   
 
    </head>
    <body>
        <div class="container">
           
        <h1> <b> Welcome to La Conchita! </b></h1>
        <h2>Admin Sign in</h2>
        <form onsubmit= "validateForm()" action = "processLogin.php" method="POST">
            Username: <input type="text" name="username" id="username"/>
                    <span id="usernameError" class="error"> </span>
                     <br />
            Password: <input type="password" id="password" name="password"/>
                    <span id="passwordError" class="error"> </span><br />
            
            <input type="submit" name="loginForm" />
        </form>
    
    </br>
    <form action="guest.php">
        <h2>Guest Sign In:</h2>
        <button type="submit" name = "guestLogin">Guest</button>
    </form>
   
</div>

    </body>
</html>

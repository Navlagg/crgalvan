<?php
    include "val.php";
?>

<!doctype html>
<html>
    <head>
        <title>Homework 4 | Quiz</title>
    
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"   integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="   crossorigin="anonymous"></script>
        
        <script>
            var id = "<?php echo $_GET['userId']; ?>";
var score;
            
    function checkQuiz(){
        score = 0;
        
        if ($("#q1").val().toLowerCase() != "html") {
            $("#q1Error").html("Incorrect!");
            $("#q1Error").css("color", "red");
        } else {
            score++;
            $("#q1Error").html("Correct!");
            $("#q1Error").css("color", "green");
        }
        
        if ($('[name="colorPerCell"]:checked').val() != "C++") {
            $("#q2Error").html("Incorrect!");
            $("#q2Error").css("color", "red");
        } else {
            score++;
            $("#q2Error").html("Correct!");
            $("#q2Error").css("color", "green");
        }
        
        if ($("#q3").val() != "none") {
            $("#q3Error").html("Incorrect!");
            $("#q3Error").css("color", "red");
        } else {
            score++;
            $("#q3Error").html("Correct!");
            $("#q3Error").css("color", "green");
        }
        
        if ($('#q41').is(":checked") == true && $('#q43').is(":checked") == true && $('#q42').is(":checked") == false) {
            score++;
            $("#q4Error").html("Correct!");
            $("#q4Error").css("color", "green");
        } else {
            $("#q4Error").html("Incorrect!");
            $("#q4Error").css("color", "red");
        }
        
        if ($("#q5").val() != "7") {
            $("#q5Error").html("Incorrect!");
            $("#q5Error").css("color", "red");
        } else {
            score++;
            $("#q5Error").html("Correct!");
            $("#q5Error").css("color", "green");
        }
        
        $.ajax({
            type: "GET",
            url: 'postScore.php?userId=' + id + "&score=" + score,
            success: function (response) {//response is value returned from php (for your example it's "bye bye"
                alert(response);
            }
        });
        
        $("#result").html("Score: " + score + " / 5");
        
        return score;
    }
        </script>
        
        <style>
            .error {
                 color: red;
            }
            
            html {
                background-color: white;
                font-family: sans-serif;
            }
            
            body {
                width: 75%;
                margin: 0 auto;
            }
            
            fieldset {
                margin-top: 50px;
                margin-bottom: 50px;
                background-color: #EEEEEE;
            }
        </style>
    </head>
    
    <body>
        <form onsubmit="return validateForm()">
            <fieldset>
                <legend>Quiz</legend>
                    
                1. What markup language is used to create webpages?
                <br/>
                <br/>
                <input type="text" id="q1"/>
                <br/>
                <br/>
                <span id="q1Error" class="error"></span>
                <br/>
                <br/>
                
                2. What language IS NOT used to create websites?
                <br/>
                <br/>
                <input type="radio" name="colorPerCell" value="HTML" id="html" /><label for="html">HTML</label>
                <input type="radio" name="colorPerCell" value="JavaScript" id="js" /><label for="js">JavaScript</label>
                <input type="radio" name="colorPerCell" value="PHP" id="php" /><label for="php">PHP</label>
                <input type="radio" name="colorPerCell" value="C++" id="c" /><label for="c">C++</label>
                <br/>
                <br/>
                <span id="q2Error" class="error"></span>
                <br/>
                <br/>
                
                3. What protocol is not used in the Internet?
                <br/>
                <br/>
                <select id="q3">
                    <option value="http">HTTP</option>
                    <option value="dhcp">DHCP</option>
                    <option value="dns">DNS</option>
                    <option value="none">None</option>
                  </select>
                <br/>
                <br/>
                <span id="q3Error" class="error"></span>
                <br/>
                <br/>
                
                4. Select all of the primary colors
                <br/>
                <br/>
                <label><input type="checkbox" id="q41" value="first_checkbox"> Red</label><br>
                <label><input type="checkbox" id="q42" value="first_checkbox"> Green</label><br>
                <label><input type="checkbox" id="q43" value="first_checkbox"> Blue</label><br>
                <br/>
                <span id="q4Error" class="error"></span>
                <br/>
                <br/>
                
                5. How many continents are there?
                <br/>
                <br/>
                <img src="http://i2.wp.com/www.7continents5oceans.com/wp-content/uploads/2015/02/7-Continents.png" alt="Mountain View" style="width:380px;height:228px;">
                <br/>
                <br/>
                <input type="number" id="q5">                
                <br/>
                <span id="q5Error" class="error"></span>
                <br/>
                <br/>
            </fieldset>
        </form>
        <input type="submit" value="Submit!" onclick="checkQuiz()" />
        <br/>
        <br/>
        <span id="result"></span>
        <br/>
    </body>
</html>
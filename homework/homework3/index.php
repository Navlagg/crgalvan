<?php
    // server should keep session data for AT LEAST 1 hour
    ini_set('session.gc_maxlifetime', 600);

    // each client should remember their session id for EXACTLY 1 hour
    session_set_cookie_params(600);
    session_start();
    
    $_SESSION["firstName"] = $_GET['firstName'];
    $_SESSION["lastName"] = $_GET['lastName'];
    $_SESSION["age"] = $_GET['age'];
    $_SESSION["major"] = $_GET['major'];
    $_SESSION["color"] = $_GET['colorPerCell'];
    $_SESSION["month"] = $_GET['birthmonth'];
    $_SESSION["day"] = $_GET['birthday'];
    if (empty($color)) {
        $color = "black";
    }
    
    echo "<div id='profile' style='background-color:$color'>";
        
    if (!empty($_SESSION['firstName']) && !empty($_SESSION['lastName'])) {
        if (!empty($_GET['age'])) {
            if (!empty($_SESSION['major'])) {
                if(!empty($_SESSION["month"]) && !empty($_SESSION["day"])){
                echo "<h1>" . $_SESSION['lastName'] . ", " .  $_SESSION['firstName'] . "</h1>";
                echo "Graduating CSUMB in " . ($_SESSION['age'] - 2016) . " years.";
                echo "<br/>" . $_SESSION['major'] . " Major<br />";
                    if (isset($_GET['displaysign'])){
                        if (($_SESSION["month"] == 12 && $_SESSION["day"] >= 22 && $_SESSION["day"] <= 31) || ($_SESSION["month"] ==  1 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 19)){
                            echo "Zodiac Sign: Capricorn <br />";
                            echo "Corresponding Car: Jeep<br /><img src='/img/1.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] ==  1 && $_SESSION["day"] >= 20 && $_SESSION["day"] <= 31) || ($_SESSION["month"] ==  2 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 18)){
                            echo "Zodiac Sign: Aquarius <br />";
                            echo "Corresponding Car: Mustang GT<br /><img src='/img/2.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] ==  2 && $_SESSION["day"] >= 19 && $_SESSION["day"] <= 29) || ($_SESSION["month"] ==  3 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 20)){
                            echo "Zodiac Sign: Pisces <br />";
                            echo "Corresponding Car: VolksWagen<br /><img src='/img/3.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] ==  3 && $_SESSION["day"] >= 21 && $_SESSION["day"] <= 31) || ($_SESSION["month"] ==  4 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 19)){
                            echo "Zodiac Sign: Aries";
                            echo "Corresponding Car: Ford Focus<br /><img src='/img/4.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] ==  4 && $_SESSION["day"] >= 20 && $_SESSION["day"] <= 30) || ($_SESSION["month"] ==  5 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 20)){
                            echo "Zodiac Sign: Taurus";
                            echo "Corresponding Car: Mini Cooper<br /><img src='/img/5.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] ==  5 && $_SESSION["day"] >= 21 && $_SESSION["day"] <= 31) || ($_SESSION["month"] ==  6 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 20)){
                            echo "Zodiac Sign: Gemini";
                            echo "Corresponding Car: Ford GT<br /><img src='/img/13.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] ==  6 && $_SESSION["day"] >= 21 && $_SESSION["day"] <= 30) || ($_SESSION["month"] ==  7 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 22)){
                            echo "Zodiac Sign: Cancer";
                            echo "Corresponding Car: BMW<br /><img src='/img/7.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] ==  7 && $_SESSION["day"] >= 23 && $_SESSION["day"] <= 31) || ($_SESSION["month"] ==  8 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 22)){
                            echo "Zodiac Sign: Leo";
                            echo "Corresponding Car: Mercedes E-Class<br /><img src='/img/8.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] ==  8 && $_SESSION["day"] >= 23 && $_SESSION["day"] <= 31) || ($_SESSION["month"] ==  9 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 22)){
                            echo "Zodiac Sign: Virgo";
                            echo "Corresponding Car: Volvo<br /><img src='/img/9.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] ==  9 && $_SESSION["day"] >= 23 && $_SESSION["day"] <= 30) || ($_SESSION["month"] == 10 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 22)){
                            echo "Zodiac Sign: Libra";
                            echo "Corresponding Car: Jaguar<br /><img src='/img/10.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] == 10 && $_SESSION["day"] >= 23 && $_SESSION["day"] <= 31) || ($_SESSION["month"] == 11 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 21)){
                            echo "Zodiac Sign: Scorpio";
                            echo "Corresponding Car: Land Rover Discovery<br /><img src='/img/11.jpg' style='width:128px;height:128px;'>";
                        }
                        else if (($_SESSION["month"] == 11 && $_SESSION["day"] >= 22 && $_SESSION["day"] <= 30) || ($_SESSION["month"] == 12 && $_SESSION["day"] >= 1 && $_SESSION["day"] <= 21)){
                            echo "Zodiac Sign: Sagittarius";
                            echo "Corresponding Car: Chevrolet Camaro SS<br /><img src='/img/12.jpg' style='width:128px;height:128px;'>";
                        }
                    }
    
                }
            }
        }
    }
    else {
        print_r("Please complete the form.<br/>");
    }
    
    
    echo "</div>";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Homework 3</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    
    <body>
        <h1>Profile Generator and Car Generator via Zodiac Sign</h1>
        
        <div id="formBox">
            <form method="get">
            
            Name: <input type="text" name="firstName" size="15" maxlength="" placeholder="First" value="<?php echo @$_SESSION['firstName']; ?>"/>
            <input type="text" name="lastName" size="15" maxlength="" placeholder="Last" value="<?php echo @$_SESSION['lastName']; ?>"/>
            
            
            <br/><br/>
                        
            Expected Year of Graduation (2016 - 2024): <input type="number" name="age" min="2016" max="2024" value="<?php echo @$_SESSION['age']; ?>"/>
            
            <br/><br/>
            
            Major: <select name="major">
               <option value="Computer Science"> Computer Science </option>    
               <option value="Communication Design"> Communication Design </option>
            </select>
            
            <br/><br/>
            
            Profile Background: &nbsp;
            
            <input type="radio" name="colorPerCell" value="#33adff" id="blue" /><label for="blue">Blue</label>
            <input type="radio" name="colorPerCell" value="#ff3300" id="red" /><label for="red">Red</label>
            <input type="radio" name="colorPerCell" value="#c6ff1a" id="yellow" /><label for="yellow">Yellow</label>
            
            
            <br /> <h4>Birth Date:</h4>
            Month: <select name="birthmonth">
               <option value="1"> January </option>    
              <option value="2"> February </option> 
              <option value="3"> March </option> 
              <option value="4"> April </option> 
              <option value="5"> May </option> 
              <option value="6"> June </option> 
              <option value="7"> July </option>
              <option value="8"> August </option>
              <option value="9"> September </option>
              <option value="10"> October </option>
              <option value="11"> November </option>
              <option value="12"> December </option>
            </select>
            
            <br />Day
            <select name='birthday' id='birthday'>
            <option value='1'>1</option>
            <option value='2'>2</option>
            <option value='3'>3</option>
            <option value='4'>4</option>
            <option value='5'>5</option>
            <option value='6'>6</option>
            <option value='7'>7</option>
            <option value='8'>8</option>
            <option value='9'>9</option>
            <option value='10'>10</option>
            <option value='11'>11</option>
            <option value='12'>12</option>
            <option value='13'>13</option>
            <option value='14'>14</option>
            <option value='15'>15</option>
            <option value='16'>16</option>
            <option value='17'>17</option>
            <option value='18'>18</option>
            <option value='19'>19</option>
            <option value='20'>20</option>
            <option value='21'>21</option>
            <option value='22'>22</option>
            <option value='23'>23</option>
            <option value='24'>24</option>
            <option value='25'>25</option>
            <option value='26'>26</option>
            <option value='27'>27</option>
            <option value='28'>28</option>
            <option value='29'>29</option>
            <option value='30'>30</option>
            <option value='31'>31</option>
            </select>
            <br /><br />
            <input type="checkbox" name="displaysign" value="sign" id="check"><label for="check">Display Zodiac Sign and Car?</label>
            
            <br />
            
            
            <input type="submit" name="submitForm" value="Generate!"/>
            
        </form>
        </div>
    </body>
</html>

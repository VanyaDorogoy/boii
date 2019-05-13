<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" media="screen" href="css.css">
</head>
<body>

    <?php include 'navbar.php'
    ?>

<div class="parallaxd"></div>
<div class="apagewrapper">
    <div class="concol">
        <div class="onecon">
                <form action="send_mail.php" method="post">
                
                    <div class="one">
                        <label for="fname"></label>
                        <input type="text" id="fname" name="fname" placeholder="First" required>
                        
                        
                        <label for="lname"></label>
                        <input type="text" id="lname" name="lname" placeholder="Last" required>
                        <br>
                        
                        <label for="email"></label>
                        <input type="email" id="email" name="email" placeholder="Email" required>
                        <br>
                    </div>
                    
                    <div class="two">
                        <label for="bio"></label>
                        <textarea name="bio" id="bio" cols="30" rows="10"></textarea>
                        
                        <br>
                        <input type="reset" value="clear">
                        
                        <input type="submit" value="send">
                    </div>
                    
                    </form>
            </div>
            
                <div class="twocon">
                    <div class="Address">
                    (559) 583-2405 <br>
                    hmongharvestchurch@hotmail.com <br>
                    2050 N Winery Ave <br>
                    #101, Fresno, CA 93703
                    </div>
                    
                    <div class="Times">
                    Sunday School: 10:00 - 11:00 AM  <br>
                    Worship Service: 11:30 - 12:30 PM
                    </div>
                </div>
    </div>
</div>

    <?php include 'footer.php'
    ?>


</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" media="screen" href="css.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

   <?php include 'navbar.php'
   ?>
    
    <div id="imgGallary" class="containera"></div>
  <script src="js.js"></script>

<div class="parallaxd"></div>
<div class="apagewrapper">
    <div class="concol">
        <div class="onecon">
                <form action="contact.php" method="post">
                
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
                        <textarea name="bio" id="bio" cols="30" rows="10" placeholder="Message"></textarea>
                        
                        <br>
                        <input type="reset" value="clear">
                        
                        <input type="submit" value="send">
                    </div>
                    
                    </form>
            </div>
            
                <div class="twocon">
                   <h2>Contact Us</h2>
                    <div class="Address">
                    (559) 583-2405 <br>
                    harvestchurch@hotmail.com <br>
                    <hr>
                    2050 N Winery Ave <br>
                    #101, Fresno, CA 93703
                    </div>
                    <hr>
                    
                    <div class="Times">
                    Sunday School: 10:00 - 11:00 AM  <br>
                    Worship Service: 11:30 - 12:30 PM
                    </div>
                </div>
    </div>
</div>
  
  <?php include 'footer.php'
  ?>
   
   <?php
 function breakToNewLine($string){ 
  return preg_replace('#<br\s*/?-->#i', "\n", $string);
}
define('MAILGUN_API',"b610acf0071ce3175da2d4b9075f34ee-4a62b8e8-72199771"); //put your mailgun api key here
define('DOMAIN',"sandboxc11619dd3946443ca07686e3ce68867a.mailgun.org"); //put a domain registered at mailgun here, or the sandbox subdomain
define('FROMADDR', "support@".DOMAIN); // support@yourdomain.org or adjust for your needs

function shootEmail($Receiver, $Title, $HTMLMessage, $fromAddr) {
  $mgcurl = curl_init();
  curl_setopt($mgcurl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($mgcurl, CURLOPT_USERPWD, 'api:'.MAILGUN_API);
  curl_setopt($mgcurl, CURLOPT_RETURNTRANSFER, 0);
  // If you are not using SSL set this to 0 or false
  curl_setopt($mgcurl, CURLOPT_SSL_VERIFYPEER, 0);
  $PlainText = strip_tags(breakToNewLine($HTMLMessage));
  curl_setopt($mgcurl, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($mgcurl, CURLOPT_URL, 'https://api.mailgun.net/v3/'.DOMAIN.'/messages');
  curl_setopt($mgcurl, CURLOPT_POSTFIELDS,
        array('from' => $fromAddr,
                'to' => $Receiver,
                'subject' => $Title,
                'html' => $HTMLMessage,
                'text' => $PlainText));
  $Response = json_decode(curl_exec($mgcurl),true);
  if(isset($Response['id']))
  {
    curl_close($mgcurl);
    return 1;
  }
    
}

    if(isset($_POST['fname'])){
    if($_POST['fname'] != '') {
        shootEmail("sarahkhang@icloud.com", $_POST['fname'].' '.$_POST['lname'] , $_POST['bio'], $_POST['email']);
    }
}


?>


</body>
</html>
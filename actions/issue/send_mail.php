<?php
$to_email = $email;
$subject = 'Query Form';
$htmlContent = ' 
         <html>
  <head>
    <title>Welcome to E Medical service</title>
    <style>
      body {
        font-family: Verdana, Geneva, Tahoma, sans-serif;
      }
      span {
        color: red;
        font-size: 20px;
        font-weight: 700;
        font-family: Georgia, "Times New Roman", Times, serif;
      }
    </style>
  </head>
  <body>
    <h1>E Medical service </h1>
    <h2>Your query form response......</h2>
    Greetings of the Day
    <br />
    <p>
      Mr./Ms. <span>' . $firstname . '</span>. You made an query/feedback/request in our portal.
    </p>
    <p>We will validate your response and reach you back sooner</p>
    <p>
      Thanks for making this action
    </p>
    <br />
    <img style="width: 250px" src="https://drive.google.com/uc?export=view&id=1MoIUhEEgFUb5W5rN0qvh7JfFwwNZLdTW" />
    
    <p>
      Live your life healthier. E-Medical Service anytime anywhere 24X7 only @<a href="localhost/EPHARMACY/user.php"
        >E Medical service HOSPITALS</a
      >
    </p>
  </body>
</html>';
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'From: ' . 'E Medical service HOSPITALS' . '<' . 'vijaisuri87@gmail.com' . '>' . "\r\n";




if (mail($to_email, $subject, $htmlContent, $headers)) {
    echo "<div id='snackbar' style='background-color: green'>Response Mail is sent...<br/> Thank you!!!..</div>";
    echo '<script>var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000)</script>';
} else {
    echo "<div id='snackbar' style='background-color: dodgerblue'>We regert to inform that Due to heavy traffic, There is a delay in confirmation mail <br> Check your progress in staus page Thank you!!!</div>";
    echo '<script>var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000)</script>';
}

?>
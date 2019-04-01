<?php
  session_start();
                            
  // Store data in session variables
  $_SESSION["loggedin"] = true;
?>

<!DOCTYPE html>
<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta charset="UTF-8">
<title>Koinage.cc</title>
<link rel="stylesheet" type="text/css" href="loginn.css">
</head>
<body>
  <div class="heading">
    <div class="language"><h5>Language: English丨Mandarin</h5></div>
    <div class="second">
        <div>
            <img src="logo.png" alt="logo">
        </div>
        <div>
            <a href="http://koinage.cc/signup.html" class="signup">Sign Up</a>
            <a href="" class="login">Login</a>
        </div>
    </div>
</div>
<div id="container1">
  <div id="container2">
    <img src="symbol_1.png" alt="symbol1" class="symbol1">
    <img src="logogreen.png" alt="symbol2" class="symbol2"><br>
    <label for="email" ></label>
    <img src="symbol_2.png" alt="symbol3" class="symbol3">
    <input type="text" placeholder="Email Address" name="account" id="account" required><br>
    <label for="psw" ></label>
    <img src="lock.png" alt="symbol3" class="symbol3">
    <input type="password" placeholder="Password" name="pwd" id="password" required><br><br>
    <button name="login" type="submit" onclick="login()"><h3>Login</h3></button>
    <p><font size="1">No Koinage account?<a href="http://koinage.cc/signup.html"><b>Register Now</b></a></font></p>
    <!-- <a href="http://koinage.cc/ftgpass.html">Forgot your password?</a> -->
  </div>
</div>
<div class="end">
  <img src="symbols.png" alt="symbols" class="symbols">
</div>
<div class="end2">
  <h5>Copyright Ⓡ 2019 Koinage.com All rights reserved.</h5>

</div>
<div id=api1></div><div id=api2></div><div id=api3></div><div id=api4></div>
<div id=address1></div><div id=address2></div><div id=address3></div><div id=address4></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  function login(){
      
      event.preventDefault();
      var acc = document.getElementById("account").value;
      var pass = document.getElementById("password").value;
       $(document).ready(function(){
        $.post("http://35.198.204.26:8492/api/v1/login",
          {account: acc, pwd: pass},
          function(data,status){
            //alert("Data: " + data.msg + "\nStatus: " + status);
          if (data.msg=="success") {
            // Store
            sessionStorage.setItem("email", acc);
            var email = sessionStorage.getItem("email");
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                var resp=JSON.parse(this.responseText);
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("api1").innerHTML =resp.data[0].apiKey;
                    sessionStorage.setItem("apikeys1", resp.data[0].apiKey);
                    document.getElementById("api2").innerHTML =resp.data[1].apiKey;
                    sessionStorage.setItem("apikeys2", resp.data[1].apiKey);
                    document.getElementById("api3").innerHTML =resp.data[2].apiKey;
                    sessionStorage.setItem("apikeys3", resp.data[2].apiKey);
                    document.getElementById("api4").innerHTML =resp.data[3].apiKey;
                    sessionStorage.setItem("apikeys4", resp.data[3].apiKey);
                    document.getElementById("address1").innerHTML =resp.data[0].address;
                    sessionStorage.setItem("address1", resp.data[0].address);
                    document.getElementById("address2").innerHTML =resp.data[1].address;
                    sessionStorage.setItem("address2", resp.data[1].address);
                    document.getElementById("address3").innerHTML =resp.data[2].address;
                    sessionStorage.setItem("address3", resp.data[2].address);
                    document.getElementById("address4").innerHTML =resp.data[3].address;
                    sessionStorage.setItem("address4", resp.data[3].address);
                }
            };
            xhttp.open("GET", "http://35.198.204/api/v1/wallet/account?label="+email, true);
            xhttp.send();
            window.location="http://koinage.cc/dashboard.php" ;

            


            }
          else if (data.msg!="success") alert("Invalid Email Address or Password");}
          );
      });
      
    }



</script>
</body>
</html>
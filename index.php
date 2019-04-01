<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <title>Koinage.cc</title>
  <link rel="stylesheet" type="text/css" href="index.scss">
  <script src="tt.js"></script>
</head>
<body>
  <div class="header1">
        <div class="language">
            <div></div>
            <p>Language:</p>
            <p>English | Mandarin</p>
        </div>
        <div class="second">
            <div>
                <img src="logo.png" alt="Koinagewallet">
            </div>
            <div></div>
            <div>
                <a class="ss1" href="signup.html">SIGN UP</a>
                <a class="ss1" href="index.php">LOGIN</a>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    function login(){
      
      event.preventDefault();
      
      var url = s;
      var acc = document.getElementById("account").value;
      var pass = document.getElementById("password").value;
      $(document).ready(function(){
        $.post(url+"api/v1/login",
          {account: acc, pwd: pass},
          function(data,status){
            //alert("Data: " + data.msg + "\nStatus: " + status);
            if (data.msg=="success") {
              // Store
              sessionStorage.setItem("email", acc);
              var email = sessionStorage.getItem("email");
              window.location = "dashboard.php";
            }
            else if (data.code=="40009") alert("Invalid Email");
            else if (data.code=="400010") alert("Invalid Password");
            else if (data.code=="40003") alert("Invalid Email or Password");
          }
        );
      });
    }



  </script>
</body>
</html>
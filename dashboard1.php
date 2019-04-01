<?php
    
   // Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    $message = "Please log in again";
    echo "<script type='text/javascript'>alert('$message');</script>";
    header("location: index.php");
    exit;
}
?>



<!DOCTYPE html>

<head>
    <link rel="stylesheet" href="dashboard1.scss">
    <html lang='en-US'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Koinage.cc</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        
</head>
<body>
    <div class="">
        <div class="language">
            <h5>Language:English | Mandarin</h5>
        </div>

        <div class="second">
            <div>
                <img src="logo.png" alt="Koinagewallet">
            </div>
            <div>
                <a class="ss2" href="security.html">SECURITY</a>
                <a class="ss2" href="support.html">SUPPORT</a>
                <a class="ss2" href="fordevelopers.html">FOR DEVELOPERS</a>
            </div>
            <div>
                <a class="ss1" href="http://koinage.cc">LOGOUT</a>
                <a class="ss1" onclick="CreateWalletAddress()" class="wallet">WALLET</a>
            </div>
        </div>
    </div>


    <div class="coin">
        <div class="coi1">
                <button onclick="Balance('btc')"><img src="BII.png" alt="BTC" class="symbols">Bitcoin</button>
                <button onclick="Balance('ltc')"><img src="LII.png" alt="LTC" class="symbols">Litecoin</button>
                <button onclick="Balance('eth')"><img src="ETH.png" alt="ETH" class="symbols">Ethereum</button>
                <button onclick="Balance('bch')"><img src="BCH.png" alt="BCH" class="symbols">BitcoinCash</button>
                <button onclick="Balance('usdt')"><img src="USDT.png" alt="USDT" class="symbols">Tether</button>
                <button onclick="Balance('je')"><img src="USDT.png" alt="JE" class="symbols">JE</button>
        </div>
        <div class="coi2">
            <button class="api" onclick="showapikeys()">
                    <b>Show API Keys</b>
            </button>
            <a class="setting" href="setting.html">Setting</a>
        </div>
    </div>
    <div>
        <div class="middle" id="bitcoin1">
            <div class="balance">
                <h1 id="demo1">__________</h1>
                <p>hotwalletBalance</p><br>
                <div class="rightbtn">
                    <div class="drop">
                        <button class="addd" onclick="showCoin()">
                            <img src="send.png" alt="send">
                        </button>
                    </div>
                    <div class="drop1">
                        <button class="addd" onclick="generateBarCode()">
                            <img src="frame.png" alt="send">
                        </button>
                    </div>
                </div>
            </div>
            <div class="pending">
                <h1 id="demo2">__________</h1>
                <p>pendingWithdraw</p><br>
                <div class="rightbtn">
                    <div class="drop">
                        <button class="addd">
                            <img src="add.png" alt="send" class="">
                        </button>
                        <div class="dropdown-content">
                        </div>
                    </div>

                    <div class="drop1">
                        <button class="addd">
                            <img src="down.png" alt="send">
                        </button>
                    </div>

                    <div class="drop2">
                        <button class="addd">
                            <img src="jt.png" alt="hi">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="id01" class="modal">
        <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="container1">
            <div class="container2">
                <form class="con3">
                    <h1>Send</h1><hr><br> 
                    
                    <label for="to_address">To Address</label>
                    <input class="inpp" type="text" placeholder="To Address" name="to_address" id="a" required><br><br>

                    <label for="amounts">Enter Amounts</label>
                    <input class="inpp" type="text" placeholder="Enter Amounts" name="amounts" id="b" required><br><br>

                    <label for="fromAdd">Your Address</label>
                    <input class="inpp" type="text" placeholder="from address" name="fromAdd" id="fromAddress" readonly="readonly" quired><br><br>

                    <label for="coinNetwork">Coin</label>
                    <input class="inpp" type="text" placeholder="coin network" name="coinNetwork" id="coinAddress" readonly="readonly" required><br><br>

                    <label for="apiKey">ApiKEY</label>
                    <input class="inpp" type="text" placeholder="Api key" name="apiKey" id="apiKEY" readonly="readonly" required><br><br>

                    <div class="last">
                        <button type="submit" class="signupbtn" onclick="send()">Send</button>
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="id02" class="modal">
        <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="frame1">
            <div class="frame2">
                <div class="frame3">
                    <img id='barcode' 
                    src="https://api.qrserver.com/v1/create-qr-code/?data=HelloWorld&amp;size=100x100"
                    alt="" 
                    title="HELLO" 
                    width="50" 
                    height="50" />
                </div>
                <div class="frame4">
                    <div class="frame5">
                        <h2 id="addrese"></h2>
                    </div>
                    <div class="frame6">
                        <p>You can send Bitcoin to the above address.</p>
                        <p>Address is invalid?</p>
                        <p>Confused about something? Contact us, we're happy to help.</p>
                        <button type="button" onclick="document.getElementById('id02').style.display='none'" class="donebtn">Done</button>
                    </div>
                    
                </div>
            </div>
        </div> 
    </div>
    <div id="id03" class="modal">
        <span onclick="document.getElementById('id03').style.display='none'" class="close" title="Close Modal">&times;</span>
        <div class="apikeys1">
            <div class="apikeys2">
                <div class="apikeys3">
                    <h2>Your API Keys</h2>
                </div>
                <div class="apikeys4">
                    <div class="apikeys5">
                        <h3><b>Coin</b></h3>
                        <p>Litecoin</p><br>
                        <p>Omni</p><br>
                        <p>Ethereum</p><br>
                        <p>BitcoinCash</p><br>
                        <p>JE TOKEN</p>
                        <!-- <p>Litecoin<button onclick="get1()" id="apibtn1">add</button></p><br>
                        <p>Omni<button onclick="get2()" id="apibtn2">add</button></p><br>
                        <p>Ethereum<button onclick="get3()" id="apibtn3">add</button></p><br>
                        <p>BitcoinCash<button onclick="get4()" id="apibtn4">add</button></p><br>
                        <p>JE TOKEN<button onclick="get5()" id="apibtn5">add</button></p> -->
                    </div>
                    <div class="apikeys6">
                        <h3><b>API Key</b></h3>
                        <p id="api1">-</p><br>
                        <p id="api2">-</p><br>
                        <p id="api3">-</p><br>
                        <p id="api4">-</p><br>
                        <p id="api5">-</p>
                    </div>
                </div>
            </div>
            
            <div></div>
        </div>
    </div>
    
    <div class="en1">
        <div class="end"></div>
        <div class="endd">
            <p class="e1">Copyright Ⓡ 2019 Koinage.com All rights reserved.</p>
            <p class="e2">Koinage Wallet</p>
        </div>
    </div>
    <div  id="address1"></div><div  id="address2"></div><div  id="address3"></div><div  id="address4"></div><div  id="address5"></div>
    
    <script>
        var email = sessionStorage.getItem("email");
        var apikeys1 = sessionStorage.getItem("apikeys1");
        var apikeys2 = sessionStorage.getItem("apikeys2");
        var apikeys3 = sessionStorage.getItem("apikeys3");
        var apikeys4 = sessionStorage.getItem("apikeys4");
        var apikeys7 = sessionStorage.getItem("apikeys7");
        var address1 = sessionStorage.getItem("address1");
        var address2 = sessionStorage.getItem("address2");
        var address3 = sessionStorage.getItem("address3");
        var address4 = sessionStorage.getItem("address4");
        var address5 = sessionStorage.getItem("address5");
        var addres = sessionStorage.getItem("addres");
        var apigey = sessionStorage.getItem("apigey");
        var networ = sessionStorage.getItem("networ");
        var url = "http://1.32.63.61:8052/api/v1/";

        function CreateWalletAddress() {var txt;
        var person = prompt("This will create a random Bitcoin wallet address\nNew addresses are SegWit-enabled",
                            "Optional label,examples: myhomewallet,pocketmoney,savings,...");
        if (person == null || person == "") {txt = "User cancelled the prompt.";}
        else {txt = "Your Wallet Address is " + person;}
        document.getElementById("new").innerHTML = txt;}
        
        function showapikeys() {
            document.getElementById('id03').style.display='block';
            var xhttp = new XMLHttpRequest();
            xhttp.open("GET", url+"wallet/account?label="+email, true);
            xhttp.send();
            console.log( xhttp.responseText);
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    var resp=JSON.parse(this.responseText);
                    if (resp.data[3] == null) {
                        document.getElementById("apibtn1").style.display = "button";
                        document.getElementById("apibtn2").style.display = "button";
                        document.getElementById("apibtn3").style.display = "button";
                        document.getElementById("apibtn4").style.display = "button";
                        document.getElementById("apibtn5").style.display = "button";
                    }
                    else if (resp.data[3] != null) {
                        document.getElementById("apibtn1").style.display = "none";
                        document.getElementById("apibtn2").style.display = "none";
                        document.getElementById("apibtn3").style.display = "none";
                        document.getElementById("apibtn4").style.display = "none";
                        document.getElementById("apibtn5").style.display = "none";
                    }
                    q =document.getElementById("api1").innerHTML =resp.data[0].apiKey;
                    q.setItem(resp.data[0].apiKey);
                    sessionStorage.setItem("apikeys1", resp.data[0].apiKey);
                    document.getElementById("api2").innerHTML =resp.data[1].apiKey;
                    sessionStorage.setItem("apikeys2", resp.data[1].apiKey);
                    document.getElementById("api3").innerHTML =resp.data[2].apiKey;
                    sessionStorage.setItem("apikeys3", resp.data[2].apiKey);
                    document.getElementById("api4").innerHTML =resp.data[3].apiKey;
                    sessionStorage.setItem("apikeys4", resp.data[3].apiKey);
                    document.getElementById("api5").innerHTML =resp.data[4].apiKey;
                    sessionStorage.setItem("apikeys7", resp.data[4].apiKey);
                    document.getElementById("address1").innerHTML =resp.data[0].address;
                    sessionStorage.setItem("address1", resp.data[0].address);
                    document.getElementById("address2").innerHTML =resp.data[1].address;
                    sessionStorage.setItem("address2", resp.data[1].address);
                    document.getElementById("address3").innerHTML =resp.data[2].address;
                    sessionStorage.setItem("address3", resp.data[2].address);
                    document.getElementById("address4").innerHTML =resp.data[3].address;
                    sessionStorage.setItem("address4", resp.data[3].address);
                    document.getElementById("address5").innerHTML =resp.data[4].address;
                    sessionStorage.setItem("address5", resp.data[4].address);
                }
            };
            // xhttp.open("GET", "http://1.32.63.61:8051/api/v1/wallet/account?label=test@test.com", true);
            xhttp.open("GET", url+"wallet/account?label="+email, true);
            xhttp.send();
            
            
        }


        function get1() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                var resp=JSON.parse(this.responseText);
                if (this.readyState == 4 && this.status == 200) {
                  var resp=JSON.parse(this.responseText);
                  document.getElementById("api1").innerHTML =resp.data.apiKey;
                  document.getElementById("apibtn1").style.display = "none";
                }
            };
            // xhttp.open("GET", "http://1.32.63.61:8051/api/v1/wallet/CreateApiKey?type=ltc&label=test@test.com", true);
            xhttp.open("GET", url+"wallet/CreateApiKey?type=ltc&label="+email, true);
            xhttp.send();
        }
        function get2() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var resp=JSON.parse(this.responseText);
                  document.getElementById("api2").innerHTML =resp.data.apiKey;
                  document.getElementById("apibtn2").style.display = "none";
                }
            };
            // xhttp.open("GET", "http://1.32.63.61:8051/api/v1/wallet/CreateApiKey?type=omni&label=test@test.com", true);
            xhttp.open("GET", url+"wallet/CreateApiKey?type=omni&label="+email, true);
            xhttp.send();
        }
        function get3() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var resp=JSON.parse(this.responseText);
                  document.getElementById("api3").innerHTML =resp.data.apiKey;
                  document.getElementById("apibtn3").style.display = "none";
                }
            };
            // xhttp.open("GET", "http://1.32.63.61:8051/api/v1/wallet/CreateApiKey?type=ETH&label=test@test.com", true);
            xhttp.open("GET", url+"wallet/CreateApiKey?type=ETH&label="+email, true);
            xhttp.send();
        }
        function get4() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var resp=JSON.parse(this.responseText);
                  document.getElementById("api4").innerHTML =resp.data.apiKey;
                  document.getElementById("apibtn4").style.display = "none";
                }
            };
            // xhttp.open("GET", "http://1.32.63.61:8051/api/v1/wallet/CreateApiKey?type=bch&label=test@test.com", true);
            xhttp.open("GET", url+"wallet/CreateApiKey?type=bch&label="+email, true);
            xhttp.send();
                
        }
        function get5() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var resp=JSON.parse(this.responseText);
                  document.getElementById("api5").innerHTML =resp.data.apiKey;
                  document.getElementById("apibtn5").style.display = "none";
                }
            };
            // xhttp.open("GET", "http://1.32.63.61:8051/api/v1/wallet/CreateApiKey?type=bch&label=test@test.com", true);
            xhttp.open("GET", url+"wallet/CreateApiKey?type=je&label="+email, true);
            xhttp.send();
                
        }
        
        
        function Balance(paper) {
            var xhttp = new XMLHttpRequest();

            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  var resp=JSON.parse(this.responseText);
                  var n=resp.data.hotwalletBalance.toFixed(8);
                  document.getElementById("demo1").innerHTML =n;
                  var m=resp.data.pendingWithdraw.toFixed(8);
                  document.getElementById("demo2").innerHTML =m;
                }
            };
            xhttp.open("POST",  url+"wallet/summary", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            
                
            if(paper == 'btc') {
                xhttp.send("api_key="+apikeys2+"&network=btc");
                var apikeyss = apikeys2 ;
                var network = "btc" ;
                var addresss = address2;
                sessionStorage.setItem("apigey", apikeyss);
                sessionStorage.setItem("networ", network);
                sessionStorage.setItem("addres", addresss);
            }else if(paper == 'ltc') {
                xhttp.send("api_key="+apikeys1+"&network=ltc");
                var apikeyss = apikeys1 ;
                var addresss = address1 ;
                var network = "ltc" ;
                sessionStorage.setItem("apigey", apikeyss);
                sessionStorage.setItem("networ", network);
                sessionStorage.setItem("addres", addresss);
            }else if(paper == 'eth') {
                xhttp.send("api_key="+apikeys3+"&network=eth");
                var apikeyss = apikeys3 ;
                var network = "eth" ;
                var addresss = address3;
                sessionStorage.setItem("apigey", apikeyss);
                sessionStorage.setItem("networ", network);
                sessionStorage.setItem("addres", addresss);
            }else if(paper == 'bch') {
                xhttp.send("api_key="+apikeys4+"&network=bch");
                var apikeyss = apikeys4 ;
                var network = "bch" ;
                var addresss = address4;
                sessionStorage.setItem("apigey", apikeyss);
                sessionStorage.setItem("networ", network);
                sessionStorage.setItem("addres", addresss);
            }else if(paper == 'usdt') {
                xhttp.send("api_key="+apikeys2+"&network=usdt");
                var apikeyss = apikeys2 ;
                var network = "usdt" ;
                var addresss = address2;
                sessionStorage.setItem("apigey", apikeyss);
                sessionStorage.setItem("networ", network);
                sessionStorage.setItem("addres", addresss);
            }else if(paper == 'je') {
                xhttp.send("api_key="+apikeys7+"&network=je");
                var apikeyss = apikeys7 ;
                var network = "je" ;
                var addresss = address5;
                sessionStorage.setItem("apigey", apikeyss);
                sessionStorage.setItem("networ", network);
                sessionStorage.setItem("addres", addresss);
            }

            
        }
        function generateBarCode() {
            
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                  var resp=JSON.parse(this.responseText);
                  var url = 'https://api.qrserver.com/v1/create-qr-code/?data='+ sessionStorage.getItem("addres") ;
                  $('#barcode').attr('src', url);
                  document.getElementById("addrese").innerHTML =sessionStorage.getItem("addres");

            };
            xhttp.open("GET", url+"wallet/account?label="+email, true);
            xhttp.send();
            document.getElementById('id02').style.display='block';
        }

        function showCoin() {
            document.getElementById("id01").style.display="block";
            document.getElementById('coinAddress').value = sessionStorage.getItem("networ");
            document.getElementById('fromAddress').value = sessionStorage.getItem("addres");
            document.getElementById('apiKEY').value = sessionStorage.getItem("apigey");
            
            
        }

        function send() {
            var xhttp = new XMLHttpRequest();
            var toAdd = document.getElementById("a").value;
            var amounts = document.getElementById("b").value;
            xhttp.onreadystatechange = function() {
                
                var resp = JSON.parse(this.responseText);
                if (resp.data.txStatus == "success") {
                    alert("success");
                }else if (resp.data.txStatus == "failed") {
                    alert("failed");
                }
            }
            xhttp.open("GET", url+"wallet/Withdraw?api_key="+ apigey +"&from_addresses="+ addres +"&to_addresses="+ toAdd +"&amounts="+ amounts +"&network="+ networ , true);
            xhttp.send();
        }
    </script>
</body>
</html>
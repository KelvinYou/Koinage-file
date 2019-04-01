<?php
    
   // Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page

if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
{
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <title>Page Title</title>    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!-- <meta name=”viewport” content=”width=1024, minimal-ui”> -->
    <link rel="stylesheet" type="text/css" media="screen" href="dashboard.css" />
    <!-- <script src="main.js"></script> -->
    
</head>
<body>
<div class="header">
        <div class="hrow1">            
            <div class="welcome" ><?php echo "Welcome ".$_SESSION["username"] ?></div>
            <div class="logout" onclick="logout()">Logout</div>
        </div>
        <div class="hrow2">
            <div id="wallet" class="tabcontent wlt">
                <div class="hrow2txt">           
                    <p>Networth</p>
                    <h1>88.88 BTC</h1>
                </div>
            </div>
            <div id="exchange" class="tabcontent exc">
                
                    <div class="exc1" onclick="cdropdown()">
                        <img src="img/BTC.svg" class="icon";>
                    </div>

                    <div class="exc2">
                        <img src="img/ETH.svg" class="icon";>
                    </div>
                        
                    <div class="exc3">
                        <label>Swap</label>
                        <input type="float" name="srcinput" placeholder="Enter Amount">
                    </div>        
                    
                    <div class="exc4">
                        <p>GET 30.23 ETH</p>
                    </div>
                           
            </div>

            <div id="otc" class="tabcontent otc">
                <h1>OTC</h1>
                <p>OTC is the capital of Orion.</p>
            </div>
          
            <div id="mining" class="tabcontent min">
                <h1>JE Mining</h1>
                <p>JE Mining is best capital grow investment.</p>
            </div>

            <div id="network" class="tabcontent net">
                <h1>JE Network</h1>
                <p>Total Reward from Referral.</p>
            </div>
        </div>       
        
    </div>  



    <div class="nav" id="btndiv">
             
            <button class="tab t1" style="width:auto" onclick="opentab('wallet', this, 'aqua')" id="defaultOpen">Wallet</button>
            <button class="tab t2" style="width:auto" onclick="opentab('exchange', this, 'lawngreen')">Exchange</button>
            <button class="tab t3" style="width:auto" onclick="opentab('otc', this, 'blue')">OTC</button>
            <button class="tab t4" style="width:auto" onclick="opentab('mining', this, 'orange')">Bee Pool</button>
            <button class="tab t5" style="width:auto" onclick="opentab('network', this, 'violet')">Network</button>
        
    </div>

    <div class="section">
        <div id="wallet1" class="tabcontent">
            <div class="ticker">
                <?php
                    // Include config file
                    require_once "db_config.php";

                    $sql="SELECT symbol, logo FROM token";
                
                    $result = $conn->query($sql);
                    $i=1;
                    if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='item'><div><img class='icon' src='".$row["logo"]."'></div><div class='itemtxt'>".$i."<br>".$row["symbol"]."</div></div>";
                            $i=$i+1;
                        }
                    } else {
                                echo "0 results";
                    }
                    $conn->close();
                ?>                       
            </div>
        </div>
                  
        <div id="exchange1" class="tabcontent">
            <h1>History</h1>
            <table class="tswap">
                <tr>
                    <th>Date</th>
                    <th>Quantity</th>
                    <th>Token</th>
                    <th>Quantity</th>
                    <th>Token</th>
                </tr>

            </table>
        </div>
                  
        <div id="otc1" class="tabcontent">
            <h1>OTC Trading</h1>
            <p>OTC BUY & SELL ORDER</p>
        </div>
                  
        <div id="mining1" class="tabcontent">
            <h1>JE Deposit Mining</h1>
            <p>Interest History</p>
        </div> 
        <div id="network1" class="tabcontent">
            <h1>Your Referral</h1>
            <p>Name Total JE Holding</p>
        </div> 
    </div>
    
</div>



<script>
    function opentab(tabname,elmnt,color) {
        var i, tabcontent, tab;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
    
        tab = document.getElementsByClassName("tab");
        for (i = 0; i < tab.length; i++) {
            tab[i].style.backgroundColor = "";
        }

        elmnt.style.borderColor = color;
        document.getElementById(tabname).style.display = "grid";
        document.getElementById(tabname).style.color = color;
        document.getElementById(tabname).style.backgroundColor="blue";
        document.getElementById(tabname+"1").style.display = "grid";
        document.getElementById(tabname+"1").style.color = color;
            
    }
          
    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();         

    function coin(token){
        window.location="portfolio.html";

    }

    function cdropdown(){
        document.getElementById("myDropdown").classList.toggle("show");
    }

    function logout(){
        var r = confirm("Do you really want to log out?");
        if (r==true)
        {
            <?php
                //session_start();
                session_destroy();                    
            ?>
                
            window.location="login.php";
        } 
    }

    
}
          
    </script>
    

</html>
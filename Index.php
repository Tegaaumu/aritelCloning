<?php session_start();
   if (isset($_GET['Logout'])) {

    // if (isset($_SESSION['user'])) {
        // session_destroy();
        unset($_SESSION['id']);
        unset($_SESSION['user']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['phone_number']);
        exit();
    // }
}

  if (!isset($_SESSION['user'])) {
   header("Location: index2.php");
   exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airtel App Clone</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div id="container">
        <div class="topBar">
            <div class="logo">Airtel</div>
            <div class="notificationIcon">
                <img src="./img/icons/icons8_notification_60px_3.png" alt="Icon" srcset="" style="width:25px;">
            </div>
        </div>
        <div class="firstNav">
            <div class="details">
                <div class="name">
                    <div class="fullName"><?php echo $_SESSION['user']; ?></div>
                    <div class="phoneNumber">prepaid - <a href="tel:09041274444;"><?php echo $_SESSION['phone_number'];?></a></div>
                </div>
                <div class="manageAccount">
                <!-- <a href="index2.php?Logout=1">Log Out</a> -->
                    <a href="index2.php?Logout=1">Manage Account</a>
                </div>
            </div>
                <!-- =================== end of name and manage account forum -->
            <div class="balanceManager">
                <div class="airtimeBal">
                    <div class="airtime figure">10</div>
                    <div class="denomination">NGN</div>
                    <div class="txt">Airtime Balance</div>
                </div>
                <div class="voiceBal">
                    <div class="voice figure">12</div>
                    <div class="denomination">Mins</div>
                    <div class="txt">Voice Balance</div>
                </div>
                <div class="dataBal">
                    <div class="data figure">1.99</div>
                    <div class="denomination">GB</div>
                    <div class="txt">Data Balance</div>
                </div>
            </div>
            <div class="rechargeButtons">
                <button><img src="./img/icons/icons8_layers_100px.png" alt="icon" style="width:15px;"> Buy Bundle</button>
                <button><img src="./img/icons/icons8_lightning_bolt_100px.png" alt="icon" style="width:15px;">Self Recharge</button>
            </div>


        </div>
<!-- =========== second div  ========= -->
        <div class="secondNav">
            <div class="quickActions">
                <div class="actionTxt">Quick Actions</div>
                <div class="viewAll"><a href="#">View All</a></div>
            </div>
            <div class="buttonsGrp">
                <div class="div1 butt">
                    <div class="circle cir1"> <div class="text">Airtel Wifi</div></div>
                    <!-- <div class="pop-up">NEW</div> -->
                   
                </div>
                <div class="div2 butt">
                    <div class="circle cir2"><div class="text">Recharge</div></div>
                    <!-- <div class="pop-up">NEW</div> -->
                    
                </div>
                <div class="div3 butt">
                        <div class="circle cir3"><div class="text">Pay Bill</div></div>
                        <!-- <div class="pop-up">NEW</div> -->
                        
                </div>
                <div class="div4 butt">
                        <div class="circle cir4"> <div class="text">Buy Data</div></div>
                        <!-- <div class="pop-up">NEW</div> -->
                       
                </div>
                <div class="div5 butt">
                        <div class="circle cir5"> <div class="text">Hi Tunes</div></div>
                        <!-- <div class="pop-up">NEW</div> -->
                       
                </div>
                <div class="div6 butt">
                        <div class="circle cir6"><div class="text">Submit NiN</div></div>
                        <div class="pop-up">NEW</div>
                        
                </div>
                <div class="div7 butt">
                        <div class="circle cir7"><div class="text">News</div></div>
                        <!-- <div class="pop-up">NEW</div> -->
                        
                </div>
                <div class="div8 butt">
                        <div class="circle cir8"><div class="text">Me2U</div></div>
                        <div class="pop-up">NEW</div>
                        
                </div>
            </div>
        </div>
        <div class="slider">
            <div class="slide1 slide" id="slide1"  style="background-color:red;"></div>
            <div class="slide2 slide" id="slide1" style="background-color:green;"></div>
            <div class="slide3 slide" id="slide1" style="background-color:teal;"></div>
        </div>
        <div class="lastDiv">
            <div class="quickActions">
                <div class="actionTxt">Best Offers</div>
                <div class="viewAll"><a href="#">All Offers</a></div>
            </div>
            <div class="offer">
                <div class="offer1">
                    <div class="img"></div>
                    <div>2gb <br><span class="txt">Validity 2 days</span></div>
                </div>
                <div class="offerAmount"> <span>NGN</span>500 </div>
            </div>
            <div class="navIcons">
                <div class="icons1 icons">home</div>
                <div class="icons2 icons">about</div>
                <div class="icons3 icons">menu</div>
            </div>
        </div>



<script>
    let slideIndex = 0
    showSlides()
    function showSlides(){
        let i;
        let slides = document.getElementById('slide1');
        for(i=0;i<slides.length;i++){
            slides[i].style.display = 'none'
        }
        slideIndex++;
        if(slideIndex>slides.length){slideIndex = 1
        slides[slideIndex-1].style.display = 'block'
        setTimeout(showSlides,2000)}
    }

</script>














    </div>
</body>
</html>
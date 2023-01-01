<?php include('conenect.php');
  // if (!isset($_SESSION['user'])) {
  //  header("Location: index2.php");
  //  exit();
  // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./intl-tel-input/build/css/demo.css">
    <link rel="stylesheet" href="./intl-tel-input/build/css/intlTelInput.css">
    <title>Aritel_Login</title>
    <link rel="stylesheet" href="./css/style1.css">
    <style>
      .hide{
        visibility:hidden;
      }
      .align_me{
        display:inline-block;
      }
      .error2{
        position: absolute;
        /* bottom: -5px; */
        margin-left: 30px;
        color: crimson;
        font-weight: 900px;
        font-family:monospace;
        font-size: 15px;
      }
    </style>
</head>
<body>
 
  <div class="contain">
    <div class='Login'>
    <?php if (isset($ERROR['exist'])) {?> <?php echo "<p class='error2'>".$ERROR['exist']."</p>";?>  <?php }?>    
        <img src="img/sky.png" alt="logo">
      <div class="rotate"> 
          <form action="#" method="post" id="d3">
              <div class='box'>
                  <label for="textBox">Name*</label>
                  <input type="text" name="textBox" id="textBox">
                <?php if (isset($ERROR['me'])) {?> <?php echo "<p class='error'>".$ERROR['me']."</p>"; ?> <?php }?>              </div>
              <div class='box'>
                  <label for="emailBox">Email*</label>
                  <input type="text" name="emailBox" id="emailBox">
                <?php if (isset($ERROR['me1'])) {?> <?php echo "<p class='error'>".$ERROR['me1']."</p>"; ?> <?php }?>              </div>
              <div class='box'>
                  <label for="phoneBox">Phone_number*</label>
                  <input type="tel" name="phoneBox" id="phone">
                  <div class="align_me">
                  <span id="valid-msg" class="hide">✓ Valid</span><span id="error-msg" class="hide"></span>
                  </div>
                <?php if (isset($ERROR['me2'])) {?> <?php echo "<p class='error'>".$ERROR['me2']."</p>"; ?> <?php }?>                  
                  <!-- <input id="phone" type="tel">
<span id="valid-msg" class="hide">✓ Valid</span>
<span id="error-msg" class="hide"></span> --> 
              </div>
              <div class='box'>
                  <label for="passwordBox">Password*</label>
                  <input type="password" name="passwordBox" id="passwordBox">
                <?php if (isset($ERROR['me3'])) {?> <?php echo "<p class='error'>".$ERROR['me3']."</p>"; ?> <?php }?>              </div>
              <button type="submit" name='endtasks'>Sign Up</button>
              <div class="meassage">
                <p>Have an account <a id="login" href="#">Login</a> </p>
              </div>
          </form>


          <form action="#" method="post" id="d4">
            <div class='box' id="box">
                <label for="textBox2">Name*</label>
                <input type="text" name="textBox2" value='<?php echo $int1;?>' id="textBox">
                <?php if (isset($ERROR['me'])) {?> <?php echo "<p class='error'>".$ERROR['me']."</p>"; ?> <?php }?>
            </div>
            <div class='box'>
                <label for="passwordBox2">Password*</label>
                <input type="password" name="passwordBox2" id="passwordBox2">
                <?php if (isset($ERROR['me3'])) {?> <?php echo "<p class='error'>".$ERROR['me3']."</p>"; ?> <?php }?>
            </div>
            <button type="submit" name='endtasks2'>Sign Up</button>
            <div class="meassage">
              <p>Don't have an account <a id="signup" href="#">Sign Up</a> </p>
            </div>
        </form>
      </div>
    </div>
  </div>
   
    <script src="./intl-tel-input/build/js/intlTelInput.js"></script>
    <script>
        let input = document.querySelectorAll("#phone");
        let errorMsg = document.querySelector("#error-msg");
        let validMsg = document.querySelector("#valid-msg");
        // here, the index maps to the error code returned from getValidationError - see readme
        var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
      input.forEach(element => {
        var iti = window.intlTelInput(element, {
               // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
        initialCountry: "NG",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "./intl-tel-input/build/js/utils.js",
        });
    var reset = function() {
      element.classList.remove("error");
      errorMsg.innerHTML = "";
      errorMsg.classList.add("hide");
      validMsg.classList.add("hide");
    };
// on blur: validate
    element.addEventListener('blur', function() {
      reset();
      if (element.value.trim()) {
        if (iti.isValidNumber()) {
          validMsg.classList.remove("hide");
        } else {
          element.classList.add("error");
          var errorCode = iti.getValidationError();
          errorMsg.innerHTML = errorMap[errorCode];
          errorMsg.classList.remove("hide");
        }
      }
    });
// on keyup / change flag: reset
element.addEventListener('change', reset);
element.addEventListener('keyup', reset);

      });
        


    </script>
    <script>
        var circle = document.querySelector(".rotate");
        var FirstL = document.querySelector("#login");
        var FirstS = document.querySelector("#signup");
        var rotateValue = circle.style.transform;
        var rotateSum;

        FirstL.onclick = function() {
          rotateSum = rotateValue + "rotate(-180deg)";
          circle.style.transform = rotateSum;
          rotateValue = rotateSum;
        }
        FirstS.onclick = function() {
          rotateSum = rotateValue + "rotate(180deg)";
          circle.style.transform = rotateSum;
          rotateValue = rotateSum;
        }
        
    </script>
    <!-- <script>
      var input = document.querySelector("#phone"),


// initialise plugin
var iti = window.intlTelInput(input, {
  utilsScript: "../../intl-tel-input/build/js/utils.js?1638200991544"
});


    </script> -->
</body>
</html>

<!-- <!DOCTYPE html> -->
<!-- <html>
<head>
  <meta charset="utf-8">
  <title>International Telephone Input</title>
  <link rel="stylesheet" href="build/css/intlTelInput.css">
  <link rel="stylesheet" href="build/css/demo.css">
</head>
<body>
  <h1>International Telephone Input</h1>
  <form>
    <input id="phone" name="phone" type="tel">
    <button type="submit">Submit</button>
  </form>
  <script src="build/js/intlTelInput.js"></script>
  <script>
   var input = document.querySelector("#phone");
    window.intlTelInput(input, {
      // allowDropdown: false,
      // autoHideDialCode: false,
      // autoPlaceholder: "off",
      // dropdownContainer: document.body,
      // excludeCountries: ["us"],
      // formatOnDisplay: false,
      // geoIpLookup: function(callback) {
      //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
      //     var countryCode = (resp && resp.country) ? resp.country : "";
      //     callback(countryCode);
      //   });
      // },
      // hiddenInput: "full_number",
      // initialCountry: "auto",
      // localizedCountries: { 'de': 'Deutschland' },
      // nationalMode: false,
      // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
      // placeholderNumberType: "MOBILE",
      // preferredCountries: ['cn', 'jp'],
      // separateDialCode: true,
      utilsScript: "build/js/utils.js",
    });
  </script>
</body>
</html> -->

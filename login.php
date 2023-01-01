<?php
// session_start();
// $dbs = new mysqli('localhost', 'root', '', 'portfiolo');

    
// if (isset($_POST['endtasks2'])) {
//     $int1 = mysqli_escape_string($dbs, $_POST['textBox2']);
//     // $int3 = mysqli_escape_string($dbs, $_POST['phoneBox2']);
//     $int4 = mysqli_escape_string($dbs, $_POST['passwordBox2']);
//     // $int5 = mysqli_escape_string($dbs, $_POST['cpasswordBox']);


//     if (empty($int1)) {
//         $ERROR['me'] = "Name feild can't be empty";
//     } 
//     if (empty($int4)) {
//         $ERROR['me3'] = "Password feild can't be empty";
//     }
//     $query2 = "SELECT * FROM `aritellogin` WHERE user = ? AND password = '".md5($int4)."'";
//     $sta = $dbs->prepare($query2);
//     $sta->bind_param('s', $int1)
//     ;$sta->execute()
//     ;$result = $sta->get_result();    
// 	$numRows = $result->num_rows;

//         if ($numRows == 1) {
//     ;$user = $result->fetch_assoc();
//             // if ($sent == $user['password']) {
//                 $_SESSION['phone_number'] = $user['phone_number'];
//                 $_SESSION['user'] = $user['user'];
//                 header("Location: index.php");
//             // } else {
//             // $ERROR['exist'] = "The pasword provided is incorrect";
//             // }
//         }
// }

// $trn_date = date("Y-m-d H:i:s");
// echo $trn_date; 

$genderErr = "";
$gender = "";

  if (isset($_POST['submit'])) {

        function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }
        
        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
        } else {
            $gender = test_input($_POST["gender"]);
        }

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php if (isset($ERROR['exist'])) {?> <?php echo "<p class='error2'>".$ERROR['exist']."</p>";?>  <?php }?>
    <form action="#" method="post" id="d4">
        <!-- <div class='box' id="box">
            <label for="textBox2">Name*</label>
            <input type="text" name="textBox2" id="textBox">
            <?php if (isset($ERROR['me'])) {?> <?php echo "<p class='error'>".$ERROR['me']."</p>"; ?> <?php }?>
        </div>
        <div class='box'>
            <label for="passwordBox2">Password*</label>
            <input type="password" name="passwordBox2" id="passwordBox">
            <?php if (isset($ERROR['me3'])) {?> <?php echo "<p class='error'>".$ERROR['me3']."</p>"; ?> <?php }?>
        </div>
        <button type="submit" name='endtasks2'>Sign Up</button>
        <div class="meassage">
            <p>Don't have an account <a id="signup" href="#">Sign Up</a> </p>
        </div> -->

  <br><br>
  Gender:
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
  <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="other">Other  
  <span class="error">* <?php echo $genderErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Submit">  

    </form>
    <?php 
    echo $gender;
    ?>

    
</body>
</html>
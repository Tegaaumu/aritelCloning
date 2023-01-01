<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'portfiolo');

    $ERROR = array();
    
    // $_POST;
    // $_SESSION['user'] = null;

    if (mysqli_error($db)) {
        die('Their was an error in your code');
    }else {
        if (isset($_POST['createAnAccount'])) {

            $int1 = mysqli_escape_string($dbs, $_POST['textBox']);
            $int2 = mysqli_escape_string($dbs, $_POST['emailBox']);
            $int3 = mysqli_escape_string($dbs, $_POST['phoneBox']);
            $int4 = mysqli_escape_string($dbs, $_POST['passwordBox']);
            // $int5 = mysqli_escape_string($dbs, $_POST['cpasswordBox']);
    
            if (empty($_POST['textBox'])) {
                $ERROR['me'] = 'sdxczxczc';
            }
            if (empty($_POST['emailBox'])) {
                $ERROR['me1'] = 'sdxczxczc';
            }  if (empty($_POST['phoneBox'])) {
                $ERROR['me2'] = 'sdxczxczc';
            }  if (empty($_POST['passwordBox'])) {
                $ERROR['me3'] = 'sdxczxczc';
            }

            if ($messages > 0) {
                $messages = "There are errors in the folloeing code<br>".$messages."Please attend to the error";
            }else {
                

            $int1 = mysqli_escape_string($dbs, $_POST['textBox']);
            $int2 = mysqli_escape_string($dbs, $_POST['emailBox']);
            $int3 = mysqli_escape_string($dbs, $_POST['phoneBox']);
            $int4 = mysqli_escape_string($dbs, $_POST['passwordBox']);
            
            $newint4 = password_hash($int3, PASSWORD_DEFAULT);

            // $insert = "DELETE FROM `signinlogin` WHERE id= '$username'";
            $exist = mysqli_query($db, "SELECT id FROM `signin` WHERE `user` = '$int1' OR `phone_number` = '$int3'");


            if (mysqli_num_rows($exist) > 0) {
                $messages = 'This Username/Email already exist';
            }else {

            $insert = "INSERT INTO `aritellogin`(`user`, `email`, `phone_number`, `password`) VALUES ( '$int1', '$int2', '$int3', '$newint4')";
            $sucess = mysqli_query($db, $insert);
            $_SESSION['user'] = $username;

            header("Location: index.php");
                
            }


            }


            // echo 'me';
            // print_r($_POST);
           

        }

        if (isset($_POST['loginme'])) {
            
            $int1 = mysqli_escape_string($dbs, $_POST['textBox']);
            $int2 = mysqli_escape_string($dbs, $_POST['emailBox']);
            $int3 = mysqli_escape_string($dbs, $_POST['phoneBox']);
            $int4 = mysqli_escape_string($dbs, $_POST['passwordBox']);
            $username = mysqli_escape_string($db, $_POST['User']);
            $password1 = mysqli_escape_string( $db, $_POST['pass1']);

            if (empty($username)) {
                $messages .= "This username feild can't be empty<br>";
            }
            if (empty($password1)) {
                $messages .= "This password field can't be empty<br>";
            }
            $exist = mysqli_query($db, "SELECT * FROM `aritellogin` WHERE `username` = '$username' AND `password` = '$password1'");
            if (mysqli_num_rows($exist) == 1) {
                $_SESSION['user'] = $username;
                header("Location: index.php");
            }else {
                $messages = 'Account do not exist please Sign In to our site';
            }
        }

        // $messages = 'You have been connected to your database sucessfuly';
        }

        // 4wertrreasd

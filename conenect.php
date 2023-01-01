<?php
session_start();
    $dbs = new mysqli('localhost', 'root', '', 'portfiolo');
    $ERROR = array();
    if ($dbs->connect_errno) {
        die("error occurs(".$dbs->connect_errno.")".$dbs->connect_error);
    }
    $int1 = '';
    if (isset($_POST['endtasks'])) {
        $int1 = mysqli_escape_string($dbs, $_POST['textBox']);
        $int2 = mysqli_escape_string($dbs, $_POST['emailBox']);
        $int3 = mysqli_escape_string($dbs, $_POST['phoneBox']);
        $int4 = mysqli_escape_string($dbs, $_POST['passwordBox']);
        // $int5 = mysqli_escape_string($dbs, $_POST['cpasswordBox']);

        if (empty($_POST['textBox'])) {
            $ERROR['me'] = "Name feild can't be empty";
        }
        if (empty($_POST['emailBox'])) {
            $ERROR['me1'] = "Email feild can't be empty";
        }  
        if (empty($_POST['phoneBox'])) {
            $ERROR['me2'] = "Phone feild can't be empty";
        }  if (empty($_POST['passwordBox'])) {
            $ERROR['me3'] = "Password feild can't be empty";
        }
        $query2 = "SELECT email FROM `aritellogin` WHERE email=?";
        $sta = $dbs->prepare($query2);
        $sta->bind_param('s', $int2)
        ;$sta->execute()
        ;$result = $sta->get_result()
        ;$out = $result->num_rows;
        if($out > 0) {
            $ERROR['exist'] = "This Email is already in our database";
        }
        // $sta->close();

        if(count($ERROR) === 0) {
            $newint4 = md5($int4);

            $query = "INSERT INTO `aritellogin`(`user`, `email`, `phone_number`, `password`) VALUES (?, ?, ?, ?)";
            $stmt = $dbs->prepare($query);
            $stmt->bind_param('ssss', $int1, $int2, $int3, $newint4);
            if ($stmt->execute()) {
                // //try and concantenate 0 to the beginnig of your phone_number if it not included.
                // $query5 = "SELECT * from aritellogin where phone_number RLIKE '^[1-9]+'";
                // $stmt2 = $dbs->prepare($query5);
                // if ($stmt2->execute()) {
                // }
                $_SESSION['name'] = $int1;
                $_SESSION['phone_number'] = $int3;
                $_SESSION['user'] = $_SESSION['name']; //." Has Successfully Log In";
                header("Location: index.php");
                exit();
            }else{
                $ERROR['exist'] = "Database error";
            }
            // print_r($_POST);
            // echo $newint3;
        }
        // else{
        //     $ERROR['exist'] = "This Email is already in our database"
        //     ;
        // } 
    // echo $ERROR['me'];
     
}

if (isset($_POST['endtasks2'])) {
    $int1 = mysqli_escape_string($dbs, $_POST['textBox2']);
    // $int3 = mysqli_escape_string($dbs, $_POST['phoneBox2']);
    $int4 = mysqli_escape_string($dbs, $_POST['passwordBox2']);
    // $int5 = mysqli_escape_string($dbs, $_POST['cpasswordBox']);


    if (empty($int1)) {
        $ERROR['me'] = "Name feild can't be empty";
    } 
    if (empty($int4)) {
        $ERROR['me3'] = "Password feild can't be empty";
    }
    $query2 = "SELECT * FROM `aritellogin` WHERE user = ? AND password = '".md5($int4)."'";
    $sta = $dbs->prepare($query2);
    $sta->bind_param('s', $int1)
    ;$sta->execute()
    ;$result = $sta->get_result();    
	$numRows = $result->num_rows;

        if ($numRows == 1) {
    ;$user = $result->fetch_assoc();
            // if ($sent == $user['password']) {
                $_SESSION['phone_number'] = $user['phone_number'];
                $_SESSION['user'] = $user['user'];
                header("Location: index.php");
            // } else {
            // $ERROR['exist'] = "The pasword provided is incorrect";
            // }
        }
}


?>
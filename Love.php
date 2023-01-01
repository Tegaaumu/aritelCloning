<?php 
    include('conenect.php');
        $query5 = "SELECT * from aritellogin where phone_number RLIKE '^[1-9]+'";
                    $stmt2 = $dbs->prepare($query5);
                $stmt2->execute()
                ;$result = $stmt2->get_result();    
                ; $numRows = $result->num_rows;
                if ($numRows > 0) {
                    while ($user = $result->fetch_assoc()) {
                        $send = $user['phone_number'];
                        $query5 = "UPDATE aritellogin set phone_number= concat('0',$send) where phone_number = '$send'";
                        $stmt2 = $dbs->prepare($query5);
                        $stmt2->execute();

                        print_r($send."</br>");
                    }
                }
                // print_r($user['phone_number']);

    //     // if (isset($_SESSION['user'])) {
    //         // session_destroy();
    //         unset($_SESSION['id']);
    //         unset($_SESSION['user']);
    //         unset($_SESSION['email']);
    //         unset($_SESSION['password']);
    //         unset($_SESSION['phone_number']);
    //         exit();
    //     // }-
    // }
    //     echo 'Work hard bro';
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
    <?php// session_start(); echo $_SESSION['user']; ?>
    <h3>Welcome to our site our esteem client. <a href="index2.php?Logout=1">Log Out</a></h3>


</body>
</html>
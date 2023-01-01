<?php
    // session_start();

    // $str = "Funny boy";
    // echo password_hash($str, PASSWORD_DEFAULT);
    // echo '<br>';
    // echo '<br>';
    // echo '<br>';
    // echo password_hash($str, PASSWORD_DEFAULT);

    //try
    $message = "";
    // $TI = '';
    // // $figure = ;
    // if (isset($_POST['submit'])) {
    //     // $message = $_POST['next'];
    //     if (empty($_POST['next'])) {
    //         $message = "Value mustbe inputed";
    //     }else {
    //     $message = password_hash($message, PASSWORD_DEFAULT);
    //     // $message = $TI;
    //     }
        
    // }
    // $passwor= "my_secrt";
    // $hash = password_hash($passwor, PASSWORD_DEFAULT);
    $mys = new mysqli('localhost', "root", "", "todo");
    if ($mys->connect_errno) {
       echo "Failed to connect to MySQL: (". $mys->connect_errno.")". $mys->connect_error;
    }
    // echo $mys->host_info. '\n';
    if (!$mys->query("DROP TABLE IF EXISTS inputme") ||
    !$mys->query("CREATE TABLE inputme(id int, content varchar(30))") ||
    !$mys->query("INSERT INTO inputme(id, content) VALUES(4, 'Executing functions')")) {
        echo "Table creation failed: (".mys->errno.")".mys->error;
    }
    $res = $mys->query("SELECT content FROM inputme WHERE id= 4");
    $rres = $res->fetch_array();
    print_r( $rres);
?>
<html>
    <head>
        <title>aritel</title>
        <style>
            .sty{
                padding: 20px;
                background-color: red;
            }
        </style>
    </head>
    <body>
        <form action="#" method="post">
            <div>
                <?php if ($message > 0) {?>
                <span class='sty'>
                    <?php echo $message;?>
                </span>
               <?php }?>

                <input type="text" name="next" id="next">
                <input type="submit" value="Submit" name='submit'>
            </div>
        </form>
    </body>
</html>

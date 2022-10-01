<?php
session_start();
$connection = require_once("config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $password_con = $_POST["password_confirm"];
    if($password != $password_con){
        function_alert("密碼不相同");
    }else{
        $query = "SELECT * FROM `login` WHERE username = '".$username."'";
	    $result = mysqli_query($connection, $query);

        if(mysqli_num_rows($result) == 0){
            $insert = "INSERT INTO `login` (username, password)
                VALUES('".$username."','".$password."')";
            if(mysqli_query($connection, $insert)){
                function_alert("新增成功!");
            }
            
        }elseif(mysqli_num_rows($result) > 0 && $username == $_SESSION["username"]){
            $update = "UPDATE `login` SET password = '".$password."'
                WHERE username = '".$username."'";
            if(mysqli_query($connection, $update)){
                function_alert("修改成功");
            }
        }elseif(mysqli_num_rows($result) > 0 && $username != $_SESSION["username"]){
            function_alert("修改失敗，使用者無權限修改他人密碼");
        }else{
            function_alert("Error occur with sql");
        }
        
    }
}else{
    function_alert("something went wrong");
}

function function_alert($message){
    echo "<script>alert('$message');
    window.location.href='user.php';
    </script>";
    // alert at user.php page(in user page)
}
?>
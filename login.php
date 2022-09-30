<?php
$connection = require_once("config.php");
$username = $_POST["username"];
$password = $_POST["password"];

$password_hash = password_hash($password, PASSWORD_DEFAULT);
//prevent attack by hashing

if($_SERVER["REQUEST_METHOD"] == "POST"){
	$query = "SELECT * FROM login WHERE username = '".$username"'";
	$result = mysqli_query($connection, $query);
	if(mysqli_num_rows > 0 && $password == mysqli_fetch_row($result)[2]){
		session_start();
		//using session to store data
		$_SESSION["logged"] = true;
		$_SESSION["username"] = mysqli_fetch_row($result)[1];
        header("location:./idle.php"); // redirection to idle page
	}else{
        function_alert("Password or username wrong");
    }
}else{
    function_alert("Somethings wrong");
}

function function_alert($message){
    echo "<script>alert('$message');
    window.location.href='idle.php';
    </script>";
    // alert at idle.php page(in login page)
}
?>
<?php
$connect = mysqli_connect('localhost', 'admin', 'admin');
mysqli_select_db($connect, 'iot_test');
mysqli_query($connect, 'set names utf8');
$query = "SELECT * FROM `test` ORDER BY id DESC";
$data = mysqli_query($connect, $query);
$result = mysqli_fetch_row($data);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>DashBoard</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-logintest p-t-30 p-b-50">
				<table style="background-color: white; ">
					<tr style="height: 5%; width: 100%;">
						<th scope="col" class="text-center" style="width: 250px;">
							<a href="./idle.html" style="font-size: 24px;">首頁</a>
						</th>
						<th scope="col" class="text-center" style="width: 300px;">
							<a href='./user.php' style="font-size: 24px;">使用者</a>
						</th>
						<th scope="col" class="text-center" style="width: 250px">
							<a href="./index.html" style="font-size: 24px;">登出</a>
						</th>
					</tr>
					<tr style="height: 10px; background-color: white;"></tr>
					<tr style="height: 250px; background-color: white;">
						<td>
							<img src="./images/hot.png"  width="150" height="150" class="center">
						</td>
						<td>
							<img src="./images/humidity.png"  width="150" height="150" class="center">
						</td>
						<td>
							<img src="./images/smoke-detector.png"  width="150" height="150" class="center">
						</td>
					</tr>

					<tr style="height:  100px; background-color: white;">
						<td class="text-center">
							<?php echo $result[1]."°C";?>
						</td>
						<td class="text-center">
							<?php echo $result[2]."%";?>
						</td>
						<td class="text-center">
							<?php echo $result[3]."ppm";?>
						</td>
					</tr>
					<tr>
						<td colspan="3" class="text-center"> 
							最後讀取時間: 
							<?php echo $result[4];?>
						</td>
					</tr>
				</table>
				
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
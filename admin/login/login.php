<?php
session_start();
include("../../model/pdo.php");
include("../../model/dangnhap.php");

?>
<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
	<?php
	$sodienthoai = $pass = "";
	$err_sodienthoai = $err_pass = "";
	$err_pass_loi = "";

	if (isset($_POST["submit"])) {
		$sodienthoai = $_POST["sodienthoai"];
		$pass = $_POST["pass"];

		$check = 0;
		if (empty(trim($sodienthoai))) {
			$err_sodienthoai = "Vui lòng nhập số điện thoại";
			$check++;
		} else {
			if (!preg_match("/^0\d{9}$/", $sodienthoai)) {
				$check++;
				$err_sodienthoai = "Vui lòng nhập đúng định dạng số điện thoại";
			}
		}

		if (empty(trim($pass))) {
			$err_pass = "Vui lòng nhập mật khẩu";
			$check++;
		}

		if ($check == 0) {
			$vaitro = 1;
			$resut = check_tk_one($sodienthoai, $pass, $vaitro);
			if ($resut) {
				$_SESSION["dangnhap_admin"] = $sodienthoai;
				header("location: ../index.php");
				// exit();
			} else {
				$err_pass_loi = "Vui lòng kiểm tra lại số điện thoại và mật khẩu";
			}
		}
	}
	?>

	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="" method="post">
				<img src="img/avatar.svg">
				<h2 class="title">Chào mừng!</h2>
				<div class="input-div one">
					<div class="i">
						<i class="fas fa-user"></i>
					</div>
					<div class="div">
						<h5>Số điện thoại</h5>
						<input type="text" class="input" name="sodienthoai">
					</div>
				</div>
				<p id="validation-message" style="color:red; font-size: 12px; margin-top: -16px;"><?= $err_sodienthoai ?></p>
				<div class="input-div pass">
					<div class="i">
						<i class="fas fa-lock"></i>
					</div>
					<div class="div">
						<h5>Mật khẩu</h5>
						<input type="password" class="input" name="pass">

					</div>
				</div>
				
				<p id="validation-message" style="color:red; font-size: 12px; margin-top: 8px;"><?= $err_pass ?></p>
				<p id="validation-message" style="color:red; font-size: 12px; margin-top: 8px;"><?= $err_pass_loi ?></p>

				<button type="submit" name="submit" class="btn">
					Đăng nhập
				</button>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>
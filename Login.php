<!DOCTYPE html>
<html>
<head>
	<title>Login Instructor</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<center><h1 class="display-2">INSTRUCTOR</h1></center>
		</div>
	</div>
	<form action="" method="POST">
	<div class="form-group">
		<label>Ma Giang Vien </label>
		<input type="text" name="idGV" class="form-control">
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="pass" name="MK" class="form-control">
	</div>
	<input type="submit" name="submit1" id = "button1" class="btn btn-outline-primary form-control" value="Login">
	<script language="JavaScript">
		var button = document.getElementById("button1");
		button.onclick = function(){
			alert("Welcome Back");
		}
	</script>
	<form>
		<?php
		 include('../Quanlydaotao/Connect/connect.php'); 
		if(isset($_POST['submit1'])) {
			$idGV = $_POST['idGV'];
			$MK = md5($_POST['MK']);
			$sql = 'SELECT MaGiangVien, PassWord FROM giangvien WHERE MaGiangVien = "'.$idGV.'"';
			var_dump($sql);
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while ($row = $result->fetch_assoc()) {
					if($row['MaGiangVien'] == $idGV && $row['PassWord'] == $MK) {
						session_start();
						$SESSION['MaGiangVien'] = $idGV;
						header('location: Instructors/showinformation.php');
					}
				}
			}else {
				echo'Rất tiếc đã hack không thành công ^^';
			}
		}
		?>
	</form>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Login Admin</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<center><h1 class="display-3">Admin</h1></center>
		</div>
	</div>
	<form action="" method="POST">
		<div class="form-group">
			<label>Account </label>
			<input type="text" name="idAM" class="form-control" >
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password"  name="password" class="form-control">
		</div>
		<input type="submit" name="submit1" id = "button1" class="btn btn-outline-primary form-control" value="Login">
		<script language="JavaScript">
			var button = document.getElementById("button1");
			button.onclick = function(){
				alert("Welcome Back");
			}
		</script>
	</form> 
		<?php
		 include('../Quanlydaotao/Connect/connect.php'); 
		if(isset($_POST['submit1'])) {
			$idAM = $_POST['idAM'];
			$password = ($_POST['password']);
			$sql = "SELECT Account, Password FROM adminlogin WHERE Account = '$idAM'"; //dư dấu nháy
			echo $sql;
			$result = $conn->query($sql);
			if($result->num_rows > 0){
				while ($row = $result->fetch_assoc()) {
					if($row['Account'] == $idAM && $row['Password'] == $password) {
						session_start();
						$_SESSION['Account'] = $idAM;
						header('Location: Admin/index3.php');
					}
				}
			}else{
				echo'Rất tiếc đã hack không thành công ^^';
			}
		}
	?>
	<td>
            <center><a href="trangchu.php"><button class="btn btn-outline-success">Trở lại</button></a></center>
    </td>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>Đăng nhập hệ thống</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<center><h1 class="display-3">Đăng nhập</h1></center>
		</div>
	</div>
	<form action="" method="POST">
		<div class="form-group">
			<label>Mã sinh viên</label>
			<input type="text" name="masv" class="form-control">
		</div>
		<div class="form-group">
			<label>Mật khẩu</label>
			<input type="password" name="password" class="form-control">
		</div>
		<input type="submit" name="submit" id="nut1" class="btn btn-outline-primary form-control" value="ĐĂNG NHẬP">
        <script language="JavaScript">
            var button = document.getElementById("nut1");
            button.onclick = function() {
                alert("Welcome to SICT ");
            }
        </script>
	</form>	
		<?php 
        include('../Quanlydaotao/Connect/connect.php'); 
       if(isset($_POST['submit'])){
            $masv = $_POST['masv'];
            $password = md5($_POST['password']);
            $sql = 'SELECT Account, Password, TenSV FROM diemsinhvien WHERE Account = "'.$masv.'"';
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    if($row['Account'] == $masv && $row['Password'] = $password){
                        session_start();
                        $_SESSION['Account'] = $masv;
                        header('Location: Student/index2.php');
                    }              
                }           
            }else{
                echo 'Lỗi';
            }
       }
?>
<td>
            <center><a href="trangchu.php"><button class="btn btn-outline-success">Trở lại</button></a></center>
    </td>
</body>
</html>
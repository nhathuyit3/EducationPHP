<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <script src="jquery-3.3.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
    </head>
	<body>

		<!-- Header -->
		<header id="header" class="transparent-nav">
			</div>
		</header>
		<!-- /Header -->

		<!-- Home -->
		<div id="home" class="hero-area">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(./img/home-background.jpg)"></div>
			<!-- /Backgound Image -->

			<!-- <div class="home-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<h1 class="white-text">Edusite Free Online Training Courses</h1>
							<p class="lead white-text">Libris vivendo eloquentiam ex ius, nec id splendide abhorreant, eu pro alii error homero.</p>
							<a class="main-button icon-button" href="#">Get Started!</a>
						</div>
					</div>
				</div>
			</div> -->
			<div class="container mt-1">
			<div class="jumbotron jumbotron-fluid">
				<center><h1 class="display-3">THÔNG TIN LỚP GIẢNG VIÊN</h1></center>
			</div>
		</div>
		<div class="container">
					<p class="float-lg-left">Xin chào 
							<?php 
							session_start();
							if (isset($_SESSION['IDGV'])){
									$magv = $_SESSION['IDGV'];
									echo $_SESSION['IDGV'];
								}
							?> !</p>
				<div class="float-right">
					<table>
						<tr>
							<th>
								<form action="" method="POST">  
									<input type="submit" name="logout" value="Ðăng xuất" class="btn btn-outline-primary form-control">
							<?php 
									if (isset($_POST["logout"])) {
										session_unset();
										session_destroy();

										header("Location:../Login.php");
										exit();
									}
								?>
							</form>
							</th>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<?php
			$conn = new mysqli('localhost', 'root', '', 'phpnangcao');
			mysqli_set_charset($conn, 'UTF8');

			if ($conn->connect_error) {
				die("Failed to connect:" . $conn->connect_error);
			}

			$sql = 'SELECT lopgiangvien.ID, lopgiangvien.SoLuongDK, hocphan.TenHP, lopgiangvien.Giangvien, lopgiangvien.IDGV ,lopgiangvien.Lop FROM (lopgiangvien
				INNER JOIN hocphan ON hocphan.ID = lopgiangvien.ID)
				WHERE IDGV = "'.$magv.'"';
			$result = $conn->query($sql);
					//var_dump($sql);
					//var_dump($result);
			if ($result->num_rows > 0) {
					echo '<table class="table">
						<thread>
							<tr>
							<th scope="col">ID</th>
							<th scope="col">So lượng</th>
							<th scope="col">Tên Môn</th>
							<th scope="col">Giảng viên</th>
							<th scope="col">Mã Giảng Viên</th>	
							<th scope="col">Tên lớp</th>
							</tr>
						</thread>
						<tbody>';
				while ($dl = $result->fetch_assoc()) {
					echo '
							<tr>
								<td>'.$dl['ID'].'</td>
								<td>'.$dl['SoLuongDK'].'</td>
								<td>'.$dl['TenHP'].'</td>
								<td>'.$dl['Giangvien'].'</td>
								<td>'.$dl['IDGV'].'</td>
								<td>'.$dl['Lop'].'</td>
								<td><form action="Diemsinhvien.php"  method="POST">

						<td>
						<input type="text" class="d-none" name="id" value='.$dl['IDGV'].'>
							<button class="btn btn-outline-danger" id="signin"><i class="fas fa-undo-alt"></i>Xem diểm</button>
							<script language="JavaScript">
								var button = document.getElementById("signin");
									button.onclick = function() {
									alert("xem điểm sinh viên tại đây");
									}
							</script>
						</td>
					</form></td>
							</tr>
						';
					
				}
				echo '</tbody>
					</table>';
			}
					else {
						echo "Null";
					}
				?>

		</div>
		<div class="jumbotron">
			<center><h1>GIẢNG VIÊN </h1></center>
		</div>
		<?php
			$conn = new mysqli('localhost','root','','phpnangcao');
			mysqli_set_charset($conn, 'UTF8');

			if ($conn->connect_error) {
				die("Failed to connect:". $conn->connect_error);
			}

			$sql = "SELECT giangvien.ID, giangvien.MaGiangVien, giangvien.HoTen, giangvien.HocHam FROM giangvien";
			$result = $conn->query($sql);
					
					// var_dump($result);
			if ($result->num_rows > 0) {
					echo '<table class="table">
						<thread>
							<tr>
							<th scope="col">ID</th>
							<th scope="col">Ma Giảng viên</th>
							<th scope="col">Họ Tên</th>
							<th scope="col">Học Hàm</th>
							</tr>
						</thread>
						<tbody>';
				while ($dl = $result->fetch_assoc()) {
					echo '
							<tr>
								<td>'.$dl['ID'].'</td>
								<td>'.$dl['MaGiangVien'].'</td>
								<td>'.$dl['HoTen'].'</td>
								<td>'.$dl['HocHam'].'</td>
					</form></td>
							</tr>
						';
					
				}
				echo '</tbody>
					</table>';
			}
					else {
						echo "Null";
					}
				?>

		</div>

		<div class="jumbotron">
			<center><h1>Sinh Viên </h1></center>
		</div>
		<?php
			$conn = new mysqli('localhost','root','','phpnangcao');
			mysqli_set_charset($conn, 'UTF8');

			if ($conn->connect_error) {
				die("Failed to connect:". $conn->connect_error); 	
			}

			$sql = "SELECT diemsinhvien.ID, diemsinhvien.MAGiangVien,giangvien.HoTen, diemsinhvien.Tenhocphan, diemsinhvien.TenSV, diemsinhvien.Diem, diemsinhvien.Lop FROM diemsinhvien , giangvien WHERE diemsinhvien.MaGiangVien = giangvien.MAGiangVien";
			$result = $conn->query($sql);
					//var_dump($sql);
					//var_dump($result);
			if ($result->num_rows > 0) {
					echo '<table class="table">
						<thread>
							<tr>
							<th scope="col">ID</th>
							<th scope="col">Mã Giảng viên</th>
							<th scope="col">Tên giảng viên</th>
							<th scope="col">Tên Môn</th>
							<th scope="col">Tên Sinh Viên</th>
							<th scope="col">Điểm</th>
							<th scope="col">Tên Lớp</th>
							</tr>
						</thread>
						<tbody>';
				while ($dl = $result->fetch_assoc()) {
					echo '
							<tr>
								<td>'.$dl['ID'].'</td>
								<td>'.$dl['MAGiangVien'].'</td>
								<td>'.$dl['HoTen'].'</td>
								<td>'.$dl['Tenhocphan'].'</td>
								<td>'.$dl['TenSV'].'</td>
								<td>'.$dl['Diem'].'</td>
								<td>'.$dl['Lop'].'</td>
					</form></td>
							</tr>
						';
					
				}
				echo '</tbody
					</table>';
			}
					else {
						echo "Null";
					}
				?>

		</div>

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>	

		</div>
		

	</body>
</html>

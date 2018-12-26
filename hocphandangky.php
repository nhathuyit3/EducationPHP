<!DOCTYPE html>
<html>
<head>
	<title>dkHocphan</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<h1 class="display-3">SICT STUDENT</h1>
		</div>
	</div>
	<form action="" method="POST">
		<div class="form-group">
			<label>ID</label>
			<input type="text" name="id" class="form-control" placeholder="Please input information">
		</div>
		<div class="form-group">
			<label>Giảng viên</label>
			<select name="tenGV">	
				<option value="GV01">GV01</option>
				<option value="GV02">GV02</option>
				<option value="GV03">GV03</option>
				<option value="GV04">GV04</option>
			</select>
		</div>
		<div class="form-group">
			<label>Tên học phần</label>
			<select name="hocphanid">
				<option value="TA1">TA1</option>
				<option value="TA2">TA2</option>
				<option value="TA3">TA3</option>
				<option value="TRR">TRR</option>
				<option value="PTTKHT">PTTKHT</option>
				<option value="JAVA">JAVA</option>
				<option value="C++">C++</option>
				<option value="Mobile">Mobile</option>
			</select>
		</div>
		<div class="form-group">
			<label>Tên sinh viên</label>
			<input type="text" name="tenSV" class="form-control" placeholder="Please input information">
		</div>
		<div class="form-group">
			<label>Điểm</label>
			<input type="text" name="diem" class="form-control" placeholder="Please input information">
		</div>
		<div class="form-group">
			<label>Lớp</label>
			<input type="text" name="classes" class="form-control" placeholder="Please input information">
		</div>
		<div class="form-group">
		<label>Mã sinh viên</label>
		<input type="text" name="masv" class="form-control" place="Please inpur information">
		</div>
		<input type="submit" name="submit" class="btn btn-outline-success form-control" value="Đăng ký">
	</form>
	<?php
	if(isset($_POST['submit'])) {
		$id = $_POST['id'];
		$tenGV = $_POST['tenGV'];
		$hocphanid = $_POST['hocphanid'];
		$tenSV = $_POST['tenSV'];
		$diem = $_POST['diem'];
		$classes = $_POST['classes'];
		$masv = $_POST['masv'];

		$conn = new mysqli('localhost','root', '', 'phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:" . $conn->connect_error);
		}

		$insert = 'insert into diemsinhvien(ID, MAGiangVien, Tenhocphan, TenSV, Diem, Lop, Account) values("'.$_POST["id"].'", "'.$_POST["tenGV"].'", "'.$_POST["hocphanid"].'", "'.$_POST["tenSV"].'", "'.$_POST["diem"].'", "'.$_POST["classes"].'","'.$_POST["masv"].'" )';
		$result = $conn->query($insert);
	}
	?>
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

				<?php
			$conn = new mysqli('localhost', 'root', '', 'phpnangcao');
			mysqli_set_charset($conn, 'UTF8');

			if ($conn->connect_error) {
				die("Failed to connect:" . $conn->connect_error);
			}

			$sql = 'SELECT lopgiangvien.ID, lopgiangvien.SoLuongDK, hocphan.TenHP, lopgiangvien.Giangvien, lopgiangvien.IDGV ,lopgiangvien.Lop FROM (lopgiangvien
				INNER JOIN hocphan ON hocphan.ID = lopgiangvien.ID)';
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
	<td>
		<a href="../trangchu.php"><button class="btn btn-outline-success">Trở lại</button></a>
	</td>

	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>	
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<title>LopHocphan</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
	<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<h1 class="display-3">STUDENTS</h1>
		</div>
	</div>
	<form action="" method="POST">
		<div class="form-group">
			<label>ID</label>
			<input type="text" name="id1" class="form-control" placeholder="Please input information">
		</div>
		<div class="form-group">
			<label>Tên Lớp</label>
			<input type="text" name="nameclass" class="form-control" placeholder="Please input information">
		</div>
		<div class="form-group">
			<label>Số Lượng</label>
			<input type="number" name="numberse" class="form-control" placeholder="Please input information">
		</div>
		<div class="form-group">
			<label>Năm Học</label>
			<select name="yearsday">
				<option value="2017-2018">2017-2018</option>
				<option value="2018-2019">2018-2019</option>
			</select>
		</div>
		<div class="form-group">
			<label>Học Kỳ</label>
			<select name="semester">
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
		</div>
		<div class="form-group">
			<label>Học phần ID</label>
			<select name="hpid">
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
			</select>
		</div>
		<div class="form-group">
			<label>Tên giảng viên</label>
			<select name="ten">
				<option value="1">A</option>
				<option value="2">B</option>
				<option value="3">C</option>
				<option value="4">D</option>
		</div>
		<input type="submit" name="submit" class="btn btn-outline-success form-control" value="Insert">
	</form>
	<?php
	if(isset($_POST['submit'])) {
		$id1 = $_POST['id1'];
		$nameclass = $_POST['nameclass'];
		$numberse = $_POST['numberse'];
		$yearsday = $_POST['yearsday'];
		$semester = $_POST['semester'];
		$ten = $_POST['ten'];
		$hpid = $_POST['hpid'];

		$conn = new mysqli('localhost','root', '', 'phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:" . $conn->connect_error);
		}

		$insert = 'insert into lophp values("'.$id.'", "'.$nameclass.'", "'.$numberse.'", "'.$yearsday.'", "'.$semester.'", "'.$ten.'" ,"'.$hpid.'")';
		$result = $conn->query($insert);
	}
	?>

	<div class="container mt-1">
		<div class="jumbotron jumbotron-fluid">
			<center><h1 class="display-3">INFORMATIONS</h1></center>
		</div>
	</div>

	<?php
		$conn = new mysqli('localhost','root','','phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:". $conn->connect_error);
		}

		$sql = "SELECT lophp.ID, TenLop, SoLuong, NamHoc, HocKy, hocphan.TenHP , giangvien.HoTen FROM ((lophp 
			INNER JOIN hocphan ON lophp.Hocphan_ID = hocphan.ID)
			INNER JOIN giangvien ON lophp.Hocphan_ID = giangvien.ID)";
		$result = $conn->query($sql);
		  		// echo "<pre>";
                // var_dump($result);
                // echo "</prev>";
		if ($result->num_rows > 0) {
				echo '<table class="table">
					<thread>
						<tr>
						<th scope="col">ID</th>
						<th scope="col">TenLop</th>
						<th scope="col">So Luong</th>
						<th scope="col">Nam Hoc</th>
						<th scope="col">Hoc Ky</th>
						<th scope="col">Ten Hoc Phan</th>
						<th scope="col">Ten Giang Vien</th>
						</tr>
					</thread>
					<tbody>';
			while ($dl = $result->fetch_assoc()) {
				echo '
						<tr>
							<td>'.$dl['ID'].'</td>
							<td>'.$dl['TenLop'].'</td>
							<td>'.$dl['SoLuong'].'</td>
							<td>'.$dl['NamHoc'].'</td>
							<td>'.$dl['HocKy'].'</td>
							<td>'.$dl['TenHP'].'</td>
							<td>'.$dl['HoTen'].'</td>
							<td><form action="update.php" method="POST">
					<input type="submit" name="submit" class="btn btn-outline-primary" style="border-radius:0px;" value="Update">
					<input type="submit" name="submit" class="btn btn-outline-success" style="border-radius:0px;" value="Delete">
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

</body>
</html>
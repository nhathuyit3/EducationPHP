<!DOCTYPE html>
<html>
<head>
	<title>Đăng Ký 1</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <script src="jquery-3.3.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
</head>
<body>
<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<center><h1 class="display-3">Đăng Ký</h1></center>
		</div>
	</div>
	<form action="" method="POST">
		<div class="form-group">
			<label>ID</label>
			<input type="text" name="id2" class="form-control">
		</div>
		<div class="form-group">
			<label>ID-Học phần</label>
			<select name="idhocphan">
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
			<label>Mã sinh viên</label>
			<input type="text" name="code" class="form-control">
		</div>
		<div class="form-group">
			<label>Điểm</label>
			<input type="number" name="diem" class="form-control">
		</div>
		<div class="form-group">
			<label>Học Kỳ</label>
			<select name="hky">
				<option value="1">1</option>
				<option value="2">2</option>
			</select>
		</div>
		<div class="form-group">
			<label>Năm Học</label>
			<select name="nam">
				<option value="2017-2018">2017-2018</option>
				<option value="2018-2019">2018-2019</option>
			</select>
		</div>
		<div class="form-group">
			<label>Môn Học</label>
			<select name="monhoc">
				<option value="1">TA1</option>
				<option value="2">TA2</option>
				<option value="3">TA3</option>
				<option value="4">TRR</option>
				<option value="5">PTTKHT</option>
				<option value="6">JAVA</option>
				<option value="7">C++</option>
			</select>
		</div>
		<div class="form-group">
			<label>Thời gian đăng ký</label>
			<input type="date" name="times" class="form-control">
		</div>
		<input type="submit" name="submit" id = "btn" class="btn btn-outline-primary form-control" value="Đăng ký" >
		<script language="JavaScript">
			var button = document.getElementById("btn");
			button.onclick = function() {
				alert("Chúc mừng bạn đã đăng ký thành công");
			}
		</script>
	</form>

	<?php
	if (isset($_POST['submit'])) {
		$id2 = $_POST['id2'];
		$idhocphan = $_POST['idhocphan'];
		$code = $_POST['code'];
		$diem = $_POST['diem'];
		$hky = $_POST['hky'];
		$nam = $_POST['nam'];
		$monhoc = $_POST['monhoc'];
		$times = $_POST['times'];

		$conn = new mysqli('localhost', 'root', '', 'phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:" . $conn->connect_error);
		}

		$insert = 'insert into `dangky`( `ID_LopHP`, `MaSV`, `Diem`, `hocky`, `NamHoc`, `ThoiGian`, `MonHoc`) values("'.$idhocphan.'","'.$code.'","'.$diem.'", "'.$hky.'", "'.$nam.'","'.$times.'", "'.$monhoc.'")';
		$result = $conn->query($insert);
		echo $insert;
		if($result) echo "ngon chim";
		else echo "occho rồi -_-";
	}
	?>
	<div class="container mt-1">
		<div class="jumbotron jumbotron-fluid">
			<center><h1 class="display-3">Thông tin đăng ký</h1></center>
		</div>
	</div>

	<?php
		$conn = new mysqli('localhost', 'root', '', 'phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:" . $conn->connect_error);
		}

		$sql = "SELECT dangky.ID, lophp.Tenlop, MaSV, Diem, dangky.hocky, dangky.NamHoc, ThoiGian, hocphan.TenHP FROM ((dangky 
					INNER JOIN lophp ON lophp.ID = dangky.ID_LopHP) 
					INNER JOIN hocphan ON hocphan.ID = dangky.MonHoc) ";
		$result = $conn->query($sql);
				// echo "<pre>";
                // var_dump($result);
                // echo "</prev>";
		if ($result->num_rows > 0) {
				echo '<table class = "table">
				<thread>
					<tr>
						<th scope= "col">ID</th>
						<th scope= "col">Tên lớp</th>
						<th scope= "col">Mã sinh viên</th>
						<th scope= "col">Điểm</th>
						<th scope= "col">Học Kỳ</th>
						<th scope= "col">Năm học</th>
						<th scope= "col">Thời gian</th>
						<th scope= "col">Môn học</th>
					</tr>
				</thread>
				<tbody>';
				while ($dl = $result->fetch_assoc()) {
				echo '
						<tr>
							<td>'.$dl['ID'].'</td>
							<td>'.$dl['Tenlop'].'</td>
							<td>'.$dl['MaSV'].'</td>
							<td>'.$dl['Diem'].'</td>
							<td>'.$dl['hocky'].'</td>
							<td>'.$dl['NamHoc'].'</td>
							<td>'.$dl['ThoiGian'].'</td>
							<td>'.$dl['TenHP'].'</td>
							<td><form action="show.php"  method="POST">

					 <td>
					 <input type="text" class="d-none" name="id" value='.$dl['MaSV'].'>
				      	<a href="" class="dk btn btn-outline-success" ><i class="fas fa-check-circle"></i> Đăng ký</a>
				      	<a href="" class="btn btn-outline-danger"><i class="fas fa-undo-alt"></i> Hủy</a>
				      	<button class="btn btn-outline-primary">Xem điểm </button>

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
      <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>	
</body>
</html>
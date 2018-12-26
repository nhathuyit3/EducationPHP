<!DOCTYPE html>
<html>
<head>
	<title>Update học phần </title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<?php
		$conn = new mysqli('localhost','root','','phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:". $conn->connect_error);
		}

		$sql = "SELECT lophp.ID, TenLop, SoLuong, NamHoc, HocKy, hocphan.TenHP FROM lophp JOIN hocphan ON lophp.Hocphan_ID = hocphan.ID";
		$result = $conn->query($sql);
		  		// echo "<pre>";
                // var_dump($result);
                // echo "</prev>";
		while ($dl = $result->fetch_assoc()) {
				echo '<form action = "" method = "POST">
					<div class = "form-group">
						<label>ID</label>
						<input type = "text" name = "id2" class = "form-control" value = "'.$dl['ID'].'">
					</div>
					<div class="form-group">
						<label>Tên lớp </label>
						<input type = "text" name = "nameclass2" class="form-control" value="'.$dl['TenLop'].'">
					</div>
					<div class="form-group">
						<label>So luong</label>
						<input type="number" name="numbers2" class="form-control" value="'.$dl['SoLuong'].'">
					</div>
					<div class="form-group">
					<label>Namw Hoc</label>
					<input type = 
					</div>
				</form>';
	</div>
</body>
</html>
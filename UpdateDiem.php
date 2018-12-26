<!DOCTYPE html>
<html>
<head>
	<title>Hiển thị bản điểm</title>
	 <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container mt-1">
		<div class="jumbotron jumbotron-fluid">
			<center><h1>BẢNG ĐIỂM </h1></center>
		</div>
	</div>

	<?php  
		session_start();
		$conn = new mysqli('localhost','root', '', 'phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:" . $conn->connect_error);
		}
		$sql = 'SELECT diemsinhvien.ID, diemsinhvien.Tenhocphan, diemsinhvien.TenSV, diemsinhvien.Diem, diemsinhvien.Lop FROM diemsinhvien  WHERE MAGiangVien = "'.$_POST['id'].'"';
		var_dump($sql);
		$result = $conn->query($sql);

		If ($result->num_rows > 0) {
		
			echo '<table class = "table">
			<thread>
				<tr>
						<th scope="col">ID</th>
						<th scope="col">Chuyên cần</th>
						<th scope="col">Giữa kỳ </th>
						<th scope="col">Cuối kỳ</th>
						<th scope="col">Thang điểm 10</th>
						<th scope="col">Thang điểm 4</th>
				</tr>
					</thread>
					<tbody>';

					while($dl = $result->fetch_assoc()) {
						$diem = explode(",",$dl['Diem']);
						$stt=0;
						echo '
							<tr>
								<td>'.$dl['ID'].'</td>
								';
								for($stt=0; $stt<3; $stt++){
   									echo '<td>'.$diem[$stt].'</td>';
								}	
								$diem10 = $diem[0]*0.2+$diem[1]*0.2+$diem[2]*0.6;
								if($diem10>=8.5){
									$diemchu = 'A';
									$diem4 = 4;
								} elseif($diem10>=7){
									$diemchu = 'B';
									$diem4 = 3;
								} 
						echo '	<td>'.$diemchu.'</td>
								<td>'.$diem4.'</td>
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
             		<td>
					 <input type="text" class="d-none" name="id" value='.$dl['MAGiangVien'].'>
				      <center><a href="showinformation.php"><button class="btn btn-outline-success">Trở lại</button></a></center>
				       <center><a href="diemcanhan.php"><button class="btn btn-outline-success">Xem điểm</button></a></center>
				     <form action="UpdateDiem.php" method="POST">
					<center><button class="btn btn-outline-danger">Chỉnh sửa</button>
					</form>
				</td>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
</body>
</html>

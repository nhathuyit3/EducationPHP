<!DOCTYPE html>
<html>
<head>
	<title>Class Admin</title>
 	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <script src="jquery-3.3.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
</head>
<body>
    <div class="container mt-1">
		<div class="jumbotron jumbotron-fluid">
			<center><h1 class="display-3">THÔNG TIN SINH VIÊN ĐĂNG KÝ CỦA GIẢNG VIÊN / ADMIN</h1></center>
		</div>
	</div>

	<?php
		$conn = new mysqli('localhost', 'root', '', 'phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:" . $conn->connect_error);
		}

		$sql = 'SELECT svdkadmin.ID, svdkadmin.TenSV, svdkadmin.HocPhanDK, svdkadmin.GiangVien, svdkadmin.Diem, svdkadmin.MaSV, svdkadmin.Lop FROM (svdkadmin 
		 INNER JOIN svdkgv ON svdkgv.ID = svdkadmin.ID)
			';
		$result = $conn->query($sql);
		  		//var_dump($sql);
                 //var_dump($result);
		if ($result->num_rows > 0) {
				echo '<table class="table">
					<thread>
						<tr>
						<th scope="col">ID</th>
						<th scope="col">Tên sinh viên</th>
						<th scope="col">Mã sinh viên</th>
						<th scope="col">Học phần</th>
						<th scope="col">Giảng viên</th>
						<th scope="col">Lớp</th>
						<th scope="col">Điểm</th>	
						</tr>
					</thread>
					<tbody>';
			while ($dl = $result->fetch_assoc()) {
				echo '
						<tr>
							<td>'.$dl['ID'].'</td>
							<td>'.$dl['TenSV'].'</td>
							<td>'.$dl['MaSV'].'</td>
							<td>'.$dl['HocPhanDK'].'</td>
							<td>'.$dl['GiangVien'].'</td>
							<td>'.$dl['Lop'].'</td>
							<td>'.$dl['Diem'].'</td>
							<td><form action="Diem.php"  method="POST">

					 <td>
					 <input type="text" class="d-none" name="id" value='.$dl['MaSV'].'>
				      	<button class="btn btn-outline-danger" id="signin"><i class="fas fa-undo-alt"></i>Check</button>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" 	crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin	="anonymous"></script>
</body>
</html>
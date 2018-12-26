<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
	<div class="container">
                <p class="float-lg-left">Xin chào 
                        <?php 
                        session_start();
                        if (isset($_SESSION['Account'])){
                        		$mavcl = $_SESSION['Account'];
                                echo $_SESSION['Account'];
                            }
                        ?> !</p>
            <div class="float-right">
                <table>
                    <tr>
                        <th>
                        	<form action="" method="POST">  
                                <input type="submit" name="nut2" value="Ðăng xuất" class="btn btn-outline-danger form-control">
                           <?php 
                                if (isset($_POST["nut2"])) {
                                    session_unset();
                                    session_destroy();
                                    header('Location:../loginAdmin.php');
                                }
                            ?>
                        </form>
                        </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
	<div class="jumbotron">
			<center><h2>GIẢNG VIÊN </h2></center>
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

			<div class="container mt-1">
			<div class="jumbotron">
				<center><h2 >THÔNG TIN LỚP GIẢNG VIÊN</h2></center>
			</div>
		</div>
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

		<div class="jumbotron">
			<center><h2 >Thông tin học phần</h2></center>
		</div>
		<center><a href="inserthp.php"><button class="btn btn-outline-success">Insert</button></a></center>

	<?php
		$conn = new mysqli('localhost','root','','phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:". $conn->connect_error);
		}

		$sql = "SELECT * FROM hocphan ";
		$result = $conn->query($sql);
		  		// echo "<pre>";
                // var_dump($result);
                // echo "</prev>";
		if ($result->num_rows > 0) {
				echo '<table class="table" >
					<thread>
						<tr>
						<th scope="col">ID</th>
						<th scope="col">TenHocPhan</th>
						<th scope="col">Giảng viên</th>
						<th scope="col">So Tin Chi</th>
						</tr>
					</thread>
					<tbody>';
			while ($dl = $result->fetch_assoc()) {
				echo '
						<tr>
							<td>'.$dl['ID'].'</td>
							<td>'.$dl['TenHP'].'</td>
							<td>'.$dl['giangvien'].'</td>
							<td>'.$dl['SoTC'].'</td>
							<td><form action="Adminupdate.php" method="POST">
					<input type="text" class="d-none" name="id1" value='.$dl['ID'].'>
							<button class="btn btn-outline-primary" ><i class="fas fa-undo-alt"></i>Update</button>
					</form></td>
					<td><form action="Admindelete.php" method="POST">
					<input type="text" class="d-none" name="id1" value='.$dl['ID'].'>
							<button class="btn btn-outline-primary" ><i class="fas fa-undo-alt"></i>Delete</button>
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
			<center><h2>Thông tin sinh viên</h2></center>
		</div>
		<?php
			$conn = new mysqli('localhost','root','','phpnangcao');
			mysqli_set_charset($conn, 'UTF8');

			if ($conn->connect_error) {
				die("Failed to connect:". $conn->connect_error);
			}

			$sql = "SELECT diemsinhvien.ID, lopgiangvien.Giangvien, diemsinhvien.Tenhocphan, diemsinhvien.TenSV, diemsinhvien.Diem, diemsinhvien.Lop, diemsinhvien.Account, diemsinhvien.creates_at
					FROM diemsinhvien 
					INNER JOIN lopgiangvien ON diemsinhvien.MAGiangVien = lopgiangvien.IDGV";
			$result = $conn->query($sql);
					
					// var_dump($result);
			if ($result->num_rows > 0) {
					echo '<table class="table">
						<thread>
							<tr>
							<th scope="row">ID</th>
							<th scope="row">Giảng viên</th>
							<th scope="row">Học phần</th>
							<th scope="row">Tên sinh viên</th>
							<th scope="row">Điểm</th>
							<th scope="row">Lớp sinh hoạt</th>
							<th scope="row">Mã sinh viên</th>
							<th scope="row">Ngày đăng ký</th>
							</tr>
						</thread>
						<tbody>';
				while ($dl = $result->fetch_assoc()) {
					echo '
							<tr>
								<td>'.$dl['ID'].'</td>
								<td>'.$dl['Giangvien'].'</td>
								<td>'.$dl['Tenhocphan'].'</td>
								<td>'.$dl['TenSV'].'</td>
								<td>'.$dl['Diem'].'</td>
								<td>'.$dl['Lop'].'</td>
								<td>'.$dl['Account'].'</td>
								<td>'.$dl['creates_at'].'</td>
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
		
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>	

		</div>
</body>
</html>
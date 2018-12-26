<!DOCTYPE html>
<html>
<head>
	<title>Đăng Ký</title>
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
			<center><h1 class="display-3">Thông tin đăng ký</h1></center>
		</div>
	</div>
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
                                    header('Location:../loginstudent.php');
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

		$sql = 'SELECT diemsinhvien.ID, diemsinhvien.MAGiangVien, diemsinhvien.Tenhocphan, diemsinhvien.TenSV, diemsinhvien.Diem, diemsinhvien.Lop, diemsinhvien.Account, diemsinhvien.Password
					FROM diemsinhvien
					WHERE Account = "'.$mavcl.'"';
		$result = $conn->query($sql);
				// echo "<pre>";
                // var_dump($result);
                // echo "</prev>";
		if ($result->num_rows > 0) {
				echo '<table class = "table">
				<thread>
					<tr>
						<th scope= "col">ID</th>
						<th scope= "col">Giảng viên</th>
						<th scope= "col">học phần</th>
						<th scope= "col">Tên sinh viên</th>
						<th scope= "col">Điểm</th>
						<th scope= "col">Lớp</th>
					</tr>
				</thread>
				<tbody>';
				while ($dl = $result->fetch_assoc()) {
				echo '
						<tr>
							<td>'.$dl['ID'].'</td>
							<td>'.$dl['MAGiangVien'].'</td>
							<td>'.$dl['Tenhocphan'].'</td>
							<td>'.$dl['TenSV'].'</td>
							<td>'.$dl['Diem'].'</td>
							<td>'.$dl['Lop'].'</td>
							<td><form action="bangdiem.php"  method="POST">

					 <td>
						<input type="text" class="d-none" name="id3" value='.$dl['ID'].'>
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
      	<center><h1>HỌC PHẦN </h1></center>
      </div>
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
						<th scope="col">So Tin Chi</th>
						</tr>
					</thread>
					<tbody>';
			while ($dl = $result->fetch_assoc()) {
				echo '
						<tr>
							<td>'.$dl['ID'].'</td>
							<td>'.$dl['TenHP'].'</td>
							<td>'.$dl['SoTC'].'</td>
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
      <div class="jumbotron">
      	<center><h1>LỚP HỌC PHẦN </h1></center>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>	
</body>
</html>
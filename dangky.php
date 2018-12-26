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
                        if (isset($_SESSION['MaSV'])){
                        		$mavcl = $_SESSION['MaSV'];
                                echo $_SESSION['MaSV'];
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
                                    header('Location:../dangnhap.php');
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

		$sql = 'SELECT dangky.ID, lophp.Tenlop, MaSV, Diem, dangky.hocky, dangky.NamHoc, ThoiGian, hocphan.TenHP FROM ((dangky 
					INNER JOIN lophp ON lophp.ID = dangky.ID_LopHP) 
					INNER JOIN hocphan ON hocphan.ID = dangky.MonHoc) 
					WHERE MaSV = "'.$mavcl.'"';
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
				      	<button class="btn btn-outline-danger" id="signin"><i class="fas fa-undo-alt"></i> Đăng ký</button>
				      	  <script language="JavaScript">
            				var button = document.getElementById("signin");
           						 button.onclick = function() {
               					 alert("Chúc mừng bạn đã đăng ký thành công");
           						 }
       					 </script>
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
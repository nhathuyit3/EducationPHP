<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>ĐỒNG BỘ</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="">
	<style type="text/css">
		* {
			margin: 0px;
			padding: 0px;
		}
		body {
			margin: 10px auto;
		}
	</style>
</head>
<body>
	<div class="container">
		<?php
			$conn = new mysqli('localhost', 'root','','phpnangcao');
            mysqli_set_charset($conn, 'UTF8');
            if ($conn->connect_error) {
                die("Failed to connect: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM loginstudent";
            $result = $conn->query($sql);
            $count  = $result->num_rows;
            ?>
            <form action="" method="POST">
            <?php
            if ($result->num_rows > 0) {
	            while($row = $result -> fetch_assoc()) {
	                echo '<tbody>
	                        <tr>
	                        	<input class="d-none form-control" name="ID[]" value="'.$row['ID'].'">
	                            <input class="d-none form-control" name="TenSV[]" value="'.$row['TenSV'].'">
	                            <input class="d-none form-control" name="MaSV[]" value="'.$row['MaSV'].'">
	                            <input class="d-none form-control" name="Password[]" value="'.$row['Password'].'">
	                            <input class="d-none form-control" name="HocPhanDK[]" value="'.$row['HocPhanDK'].'">
	                            <input class="d-none form-control" name="GiangVien[]" value="'.$row['GiangVien'].'">
	                            <input class="d-none form-control" name="Diem[]" value="'.$row['Diem'].'">
	                            <input class="d-none form-control" name="Lop[]" value="'.$row['Lop'].'">
	                        </tr>
	                    </tbody>';
	            }
	        } 
		?>
			</table>
	        <div class="row" style="margin-left: 40%;">
	            <input style="" type="submit" name="dongbo" class="btn btn-info" value="Đồng bộ">
	        </div>
	    </form>
		<?php
			if (isset($_POST['dongbo'])) {
				for ($i = 0; $i < $count; $i++) {
					$ID   			= $_POST['ID'];
					$TenSV 		 	= $_POST['TenSV'];
					$MaSV 			= $_POST['MaSV'];
					$Password		= $_POST['Password'];
					$HocPhanDK		= $_POST['HocPhanDK'];
					$GiangVien 		= $_POST['GiangVien'];
					$Diem			= $_POST['Diem'];
					$Lop			= $_POST['Lop'];

					$dongbo_gv[$i] = "INSERT INTO svdkgv
									VALUES ('$ID[$i]','$TenSV[$i]', '$MaSV[$i]', '$Password[$i]', '$HocPhanDK[$i]','$GiangVien[$i]', '$Diem[$i]','$Lop[$i]')";
					if ($conn->query($dongbo_gv[$i]) === TRUE) {
	                  	echo "Ðồng bộ thành công";
		            } else {
		                echo "Lỗi: " . $dongbo_gv[$i] . '<br>' . $conn->error;
		            }
					$dongbo_admin[$i] = "INSERT INTO svdkadmin
									VALUES ('$ID[$i]','$TenSV[$i]', '$MaSV[$i]', '$Password[$i]', '$HocPhanDK[$i]','$GiangVien[$i]', '$Diem[$i]','$Lop[$i]')";
					if ($conn->query($dongbo_admin[$i]) === TRUE) {
	                  	echo "Ðồng bồ thành công";
		            } else {
		                echo "Lỗi: " . $dongbo_admin[$i] . '<br>' . $conn->error;
		            }
		            
				}
			}
		?>
		
	</div>


	<div class="container">
		<?php
			$conn = new mysqli('localhost', 'root','','phpnangcao');
            mysqli_set_charset($conn, 'UTF8');
            if ($conn->connect_error) {
                die("Failed to connect: " . $conn->connect_error);
            }
            $sql = "SELECT * FROM svdkadmin";
            $result = $conn->query($sql);
            $count  = $result->num_rows;
            ?>
            <form action="" method="POST">
            <?php
            if ($result->num_rows > 0) {
	            while($row = $result -> fetch_assoc()) {
	                echo '<tbody>
	                        <tr>
	                            <input class="d-none form-control" name="Diem[]" value="'.$row['Diem'].'">
	                        </tr>
	                    </tbody>';
	            }
	        } 
		?>
			</table>
	        <div class="row" style="margin-left: 40%;">
	        	<br>
	            <input style="" type="submit" name="Public" class="btn btn-info" value="PUBLIC">
	        </div>
	    </form>
		<?php
			if (isset($_POST['Public'])) {
				for ($i = 0; $i < $count; $i++) {
					$Diem = $_POST['Diem']
					echo $Diem;
					$dongbo_sinhvien[$i] = "UPDATE loginstudent SET Diem = '".$Diem[$i]."'";
					var_dump($dongbo_sinhvien[$i]) . '<br />';
					if ($conn->query($dongbo_sinhvien[$i]) === TRUE) {
	  					echo "Ðồng bộ thành công";
					} else {
	    				echo "Lỗi: " . $dongbo_sinhvien[$i] . "<br>" . $conn->error;
					}
		            
				}
			}
		?>
		
	</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
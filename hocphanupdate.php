<!DOCTYPE html>
<html>
<head>
	<title>Update học phần</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<?php
			$conn = new mysqli('localhost', 'root','','phpnangcao');
			mysqli_set_charset($conn,'UTF8');

			if ($conn->connect_error) {
				die("Failed to connect:" . $conn->connect_error);
			}
			$sql = "SELECT * FROM hocphan";

			$result = $conn->query($sql);
			while ($dl = $result->fetch_assoc()) {
				echo '<form action = "" method = "POST">
					<div class = "form-group">
					<label>ID</label>
					<input type = "text" name = "id1" class="form-control" value="'.$dl['ID'].'"> 
					</div>
					<div class = "form-group">
					<label>TenHP</label>
					<input type = "text" name = "namehp1" class="form-control" value="'.$dl['TenHP'].'"> 
					</div>
					<div class = "form-group">
					<label>SoTC</label>
					<input type = "text" name = "sotc1" class="form-control" value="'.$dl['SoTC'].'"> 
					</div>
					<button type="submit" name="submit" class="btn btn-outline-primary form-control" >Update</button>
					</form> ';
		}

		if (isset($_POST['submit'])) {
			$id1 = $_POST['id1'];
			$namehp1 = $_POST['namehp1'];
			$sotc1 = $_POST['sotc1'];
			//update thong tin lay tu bang mới nhập bằng cách đối chiếu với tên cột trong database 
			$update = 'UPDATE hocphan SET ID = "'.$id1.'", TenHP = "'.$namehp1.'", SoTC = "'.$sotc1.'" WHERE ID ="'.$id1.'"';
			$result = $conn->query($update);
		}
		?>
		<td>
			<center><a href="hocphan.php"><button class="btn btn-outline-success">Trở lại</button></a></center>
		</td>

	</div>
	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
</body>
</html>
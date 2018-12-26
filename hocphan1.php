<!DOCTYPE html>
<html>
<head>
	<title>Hocphan</title>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body >
	<div class="jumbotron jumbotron-fluid">
		<div class="container text-center">
			<h1 class="display-3">STUDENTS</h1>
		</div>
	</div>
	<form action="" method="POST">
		<div class="form-group">
			<label>ID</label>
			<input type="text" name="id" class="form-control" placeholder="Please input information">
		</div>
		<div class="form-group">
			<label>TenHP</label>
			<input type="text" name="namehp" class="form-control" placeholder="Please input information">
		</div>
		<div class="form-group">
			<label>SoTC</label>
			<input type="text" name="tinchi" class="form-control" placeholder="Please input information">
		</div>
		<input type="submit" name="submit" class="btn btn-outline-primary form-control" value="Insert">
	</form>
	<?php
	if(isset($_POST['submit'])) {
		$id = $_POST['id'];
		$namehp = $_POST['namehp'];
		$tinchi = $_POST['tinchi'];

		$conn = new mysqli('localhost','root', '', 'phpnangcao');
		mysqli_set_charset($conn, 'UTF8');

		if ($conn->connect_error) {
			die("Failed to connect:" . $conn->connect_error);
		}

		$insert = 'insert into hocphan values("'.$id.'", "'.$namehp.'", "'.$tinchi.'")';
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
							<td><form action="hocphanupdate.php" method="POST">
					<input type="submit" name="submit" class="btn btn-outline-primary" style="border-radius:0px;" value="Update">
					<input type="submit" name="submit" class="btn btn-outline-primary" style="border-radius:0px;" value="Delete">
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
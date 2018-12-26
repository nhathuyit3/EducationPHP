<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Ðang ký</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
    <script src="jquery-3.3.1.min.js" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body >
	<div class="container">
            <div class="jumbotron jumbotron-fluid">
                <div class="container text-center" >
                    <h1 class="display-4">ÐANG KÝ H?C PH?N</h1>
                </div>
            </div>
                <p class="float-lg-left">Xin chào 
                        <?php 
                        session_start();
                        if (isset($_SESSION['user'])){
                                echo $_SESSION['user'];
                            }
                        ?> !</p>
            <div class="float-right">
                <table>
                    <tr>
                        <th>
                            <form action="" method="POST">  
                            <input type="submit" name="xemdiem" value="Xem di?m" class="btn btn-outline-info form-control "> 
                               <?php 
                                    if (isset($_POST["xemdiem"])) {
                                        header('Location: xemdiem.php');
                                    }
                                ?>
                        </th>
                        <th>
                                <input type="submit" name="logout" value="Ðang xu?t" class="btn btn-outline-danger form-control">
                           <?php 
                                if (isset($_POST["logout"])) {
                                    session_unset();
                                    session_destroy();
                                    header('Location: login.php');
                                }
                            ?>
                            </form>
                        </th>
                    </tr>
                </table>
            </div>
            
            <?php  
                $conn = new mysqli('localhost', 'root','','db_hp');
                mysqli_set_charset($conn, 'UTF8');

                if ($conn->connect_error) {
                    die("Ðéo th? vào du?c: " . $conn->connect_error);
                }
                $sql= 'SELECT db_lophp.id,db_lophp.tenlop,db_lophp.soluong,hocphan.tenhocphan FROM hocphan JOIN db_lophp ON db_lophp.hocphanid=hocphan.id';
                $result = $conn->query($sql);
                echo '
                    <div class="form-group">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>H?c ph?n</th>
                                <th>Tên l?p</th>
                                <th>S? lu?ng</th>
                                <th></th>
                            </tr>
                    ';
                    if ($result->num_rows > 1){
                    while ($dl = $result->fetch_assoc()){

                        $sqll='SELECT * FROM dangky WHERE tenlop ="'.$dl['tenlop'].'" AND masv = "'.$_SESSION['user'].'"';
                        $salt= $conn->query($sqll);
                        $check=0;
                        // var_dump($salt->num_rows);
                        if($salt->num_rows>0){
                            $check=1;
                        }
                        // echo $check;
                        echo '
                                <tr>
                                    <form action="dktc.php" method="POST">
                                    <th id="id'.$dl['id'].'" value="'.$dl['id'].'">'.$dl['id'].'</th>
                                    <input class="d-none" type="text" name="id" value="'.$dl['id'].'" placeholder="">
                                    <th >'.$dl['tenhocphan'].'</th>
                                    <input class="d-none" type="text" name="tenhocphan" value="'.$dl['tenhocphan'].'" placeholder="">
                                    <th>'.$dl['tenlop'].'</th>
                                    <input class="d-none" type="text" name="tenlop" value="'.$dl['tenlop'].'" placeholder="">
                                    <th>'.$dl['soluong'].'</th>
                                    <input class="d-none" type="text" name="soluong" value="'.$dl['soluong'].'" placeholder="">
                                    <th>                  
                                    ';
                                    if($check==0){
                                        echo '<input type="submit" name="submit" value="Ðang ký" class="btn btn-outline-success">';

                                    }else{
                                        echo '<input type="submit" name="submith" value="H?y" class="btn btn-outline-danger">';
                                    }
                                    echo '</th>
                                    </form>
                                </tr>';
                                }
                            }
                        echo '

                        </table>';

                        ?>

    </div>
</body>
</html>

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
		<input type="submit" name="submit" id = "btn" class="btn btn-outline-primary form-control" value="Đăng ký"  >
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
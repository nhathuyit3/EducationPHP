<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập hệ thống</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css">
</head>
<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <center><h1 class="display-3">Đăng nhập</h1></center>
        </div>
    </div>
    <form action="" method="POST">
        <div class="form-group">
            <label>Mã sinh viên</label>
            <input type="text" name="masv" class="form-control">
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="password1" name="matkhau" class="form-control">
        </div>
        <input type="submit" name="submit" id="nut1" class="btn btn-outline-primary form-control" value="ĐĂNG NHẬP">
        <script language="JavaScript">
            var button = document.getElementById("nut1");
            button.onclick = function() {
                alert("Welcome to SICT ");
            }
        </script>
    </form> 
        <?php 
        require ('...Quanlydaotao/connect/connect.php'); 
       if(isset($_POST['submit'])){
            $masv = $_POST['masv'];
            $matkhau = md5($_POST['matkhau']);
            $sql = 'SELECT MaSV, Password FROM thongtincanhan WHERE MaSV = "'.$masv.'"';
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()) {
                    if($row['MaSV'] == $masv && $row['Password'] = $matkhau){
                        session_start();
                        $_SESSION['MaSV'] = $masv;
                        header('Location: Student/dangky.php');
                    }              
                }           
            }else{
                echo 'Lỗi';
            }
       }
?>
</body>
</html>
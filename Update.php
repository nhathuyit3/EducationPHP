<!DOCTYPE html>
<html>
<head>
    <title>Update điểm</title>
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
            $sql = 'SELECT diemsinhvien.ID, diemsinhvien.TenSV , diemsinhvien.Tenhocphan, diemsinhvien.Diem  FROM diemsinhvien WHERE ID = "'.$_POST['id'].'"';
             var_dump($sql);
            $result = $conn->query($sql);
            while ($dl = $result->fetch_assoc()) {
                echo '<form action = "" method = "POST">
                    <div class = "form-group">
                    <label>ID</label>
                    <input type = "text" name = "id1" class="form-control" value="'.$dl['ID'].'"> 
                    </div><div class = "form-group">
                    <label>Tên Sinh Viên</label>
                    <input type = "text" name = "tenmoi" class="form-control" value="'.$dl['TenSV'].'"> 
                    </div>
                    <div class = "form-group">
                    <label>Học phần</label>
                    <input type = "text" name = "hocphan" class="form-control" value="'.$dl['Tenhocphan'].'"> 
                    </div>
                    <div class = "form-group">
                    <label>Điểm</label>
                    <input type = "text" name = "diem" class="form-control" value="'.$dl['Diem'].'"> 
                    </div>
                    <input type="submit" name="submit" id = "updatediem" class="btn btn-outline-primary form-control" value="update">
                        <script language="JavaScript">
                            var button = document.getElementById("updatediem");
                                 button.onclick = function() {
                                 alert("Cập nhật điểm sinh viên thành công");
                                 }
                         </script>
                    </form> ';
        }

        if (isset($_POST['submit'])) {
            $id1 = $_POST['id1'];
            $tenmoi = $_POST['tenmoi'];
            $hocphan = $_POST['hocphan'];
            $diem = $_POST['diem'];
            //update thong tin lay tu bang mới nhập bằng cách đối chiếu với tên cột trong database 
            $update = 'UPDATE diemsinhvien SET ID = "'.$id1.'",  TenSV = "'.$tenmoi.'" , Tenhocphan = "'.$hocphan.'" ,Diem = "'.$diem.'"  WHERE ID = "'.$id1.'" ';
            $result = $conn->query($update);
        }
        ?>
        <td>
                     <input type="text" class="d-none" name="id" value='.$dl['MAGiangVien'].'>
                      <center><a href="index.php"><button class="btn btn-outline-success">Trở lại</button></a></center>
                </td>
    </div>
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>
</body>
</html>
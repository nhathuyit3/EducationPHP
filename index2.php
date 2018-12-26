<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>SICT Education</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Lato:700%7CMontserrat:400,600" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="../css/bootstrap.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="../css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="../css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    </head>
	<body>

		<!-- Header -->
		<header id="header" class="transparent-nav">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a class="logo" href="index.html">
							<img src="../img/logo-alt.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Mobile toggle -->
					<button class="navbar-toggle">
						<span></span>
					</button>
					<!-- /Mobile toggle -->
				</div>

				<!-- Navigation -->
				<nav id="nav">
					<ul class="main-menu nav navbar-nav navbar-right">
						<li><a href="../trangchu.php">Trang chủ</a></li>
						<li><a href="../loginstudent.php">Sinh viên</a></li>
						<li><a href="../login.php">Giảng viên</a></li>
						<li><a href="../contact.php">Liên hệ</a></li>
						<li><a href="../loginAdmin.php">Admin</a></li>
					</ul>
				</nav>
				<!-- /Navigation -->

			</div>
		</header>
		<!-- /Header -->

		<!-- Home -->
		<div id="home" class="hero-area">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url(../img/home-background.jpg)"></div>
			<!-- /Backgound Image -->

			<div class="home-wrapper">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
							<h1 class="white-text">Education for SICT</h1>
							<p class="lead white-text">Chất lượng giảng dạy chuẩn quốc tế</p>
							<a class="main-button icon-button" href="#">Bắt đầu nào!</a>
						</div>
					</div>
				</div>
			</div>

		</div>
		<!-- /Home -->

		<!-- About -->
		<div id="about" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-6">
						<div class="section-header">
							<h2>Welcome to SICT</h2>
							<p>Danh sách các học phần đăng ký của sinh viên dành cho giảng viên</p>
						</div>
					</div>
					<table>
			<div class="jumbotron ">
				<center><h2">THÔNG TIN SINH VIÊN</h2></center>
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
                                <input type="submit" name="nut2" value="Ðăng xuất" class="btn btn-outline-success form-control">
                           <?php 
                                if (isset($_POST["nut2"])) {
                                    session_unset();
                                    session_destroy();
                                    header('Location:../trangchu.php');
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
						<input type="text" class="d-none" hidden name="id3" value='.$dl['ID'].'>
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
		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js"></script>	

		</table>
		

					<div class="col-md-6">
						<div class="about-img">
							<img src="../img/about.png" alt="">
						</div>
					</div>

				</div>
				<!-- row -->

			</div>
			<!-- container -->
		</div>
		<!-- /About -->

		<!-- Courses -->
		<div id="courses" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">
					<div class="section-header text-center">
						<h2>Các khóa học</h2>
						<p class="lead">Đa dạng về chuyên ngành công nghệ thông tin và truyền thông.</p>
					</div>
				</div>
				<!-- /row -->

				<!-- courses -->
				<div id="courses-wrapper">

					<!-- row -->
					<div class="row">

						<!-- single course -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="course">
								<a href="#" class="course-img">
									<img src="../img/course01.jpg" alt="">
									<i class="course-link-icon fa fa-link"></i>
								</a>
								<a class="course-title" href="#">Quản trị kinh doanh</a>
								<div class="course-details">
									<span class="course-category">Business</span>
								</div>
							</div>
						</div>
						<!-- /single course -->

						<!-- single course -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="course">
								<a href="#" class="course-img">
									<img src="../img/course02.jpg" alt="">
									<i class="course-link-icon fa fa-link"></i>
								</a>
								<a class="course-title" href="#">CSS </a>
								<div class="course-details">
									<span class="course-category">Web Design</span>
								</div>
							</div>
						</div>
						<!-- /single course -->

						<!-- single course -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="course">
								<a href="#" class="course-img">
									<img src="../img/course03.jpg" alt="">
									<i class="course-link-icon fa fa-link"></i>
								</a>
								<a class="course-title" href="#">PHP</a>
								<div class="course-details">
									<span class="course-category">Drawing</span>
								</div>
							</div>
						</div>
						<!-- /single course -->

						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="course">
								<a href="#" class="course-img">
									<img src="../img/course04.jpg" alt="">
									<i class="course-link-icon fa fa-link"></i>
								</a>
								<a class="course-title" href="#">JAVA</a>
								<div class="course-details">
									<span class="course-category">Java Development</span>
								</div>
							</div>
						</div>
						<!-- /single course -->

					</div>
					<!-- /row -->

					<!-- row -->
					<div class="row">

						<!-- single course -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="course">
								<a href="#" class="course-img">
									<img src="../img/course05.jpg" alt="">
									<i class="course-link-icon fa fa-link"></i>
								</a>
								<a class="course-title" href="#">C++</a>
							</div>
						</div>
						<!-- /single course -->

						<!-- single course -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="course">
								<a href="#" class="course-img">
									<img src="../img/course06.jpg" alt="">
									<i class="course-link-icon fa fa-link"></i>
								</a>
								<a class="course-title" href="#">PTTKHT</a>
								<div class="course-details">
									<span class="course-category">PM</span>
								</div>
							</div>
						</div>
						<!-- /single course -->

						<!-- single course -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="course">
								<a href="#" class="course-img">
									<img src="../img/course07.jpg" alt="">
									<i class="course-link-icon fa fa-link"></i>
								</a>
								<a class="course-title" href="#">Photography</a>
								<div class="course-details">
									<span class="course-category">Photography</span>
								</div>
							</div>
						</div>
						<!-- /single course -->


						<!-- single course -->
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class="course">
								<a href="#" class="course-img">
									<img src="../img/course08.jpg" alt="">
									<i class="course-link-icon fa fa-link"></i>
								</a>
								<a class="course-title" href="#">Adobe Illustrator</a>
								<div class="course-details">
									<span class="course-category">Designer</span>
								</div>
							</div>
						</div>
						<!-- /single course -->

					</div>
					<!-- /row -->

				</div>
				<!-- /courses -->

				<div class="row">
					<div class="center-btn">
						<a class="main-button icon-button" href="#">More Courses</a>
					</div>
				</div>

			</div>
			<!-- container -->

		</div>
		<!-- /Courses -->

		<!-- Call To Action -->
		<div id="cta" class="section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url('../img/cta1-background.jpg')"></div>
			<!-- /Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-6">
						<h2 class="white-text">Đến với chúng tôi bạn sẽ được học hỏi nhiều điều thú vị và nhiều kiến thức mới mẻ</h2>
						<p class="lead white-text">+ Công nghệ thông tin .</p>
						<p class="lead white-text">+ Quản trị kinh doanh.</p>
						<a class="main-button icon-button" href="#">Get Started!</a>
					</div>
				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Call To Action -->

		<!-- Why us -->
		<div id="why-us" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">
					<div class="section-header text-center">
						<h2>SICT Education</h2>
						<p class="lead">Rộng mở cánh cửa tương lai</p>
					</div>

					<!-- feature -->
					<div class="col-md-4">
						<div class="feature">
							<i class="feature-icon fa fa-flask"></i>
							<div class="feature-content">
								<h4>Thực hành trực quan</h4>
								<p>Giúp dể hiểu và trao dồi kiến thức</p>
							</div>
						</div>
					</div>
					<!-- /feature -->

					<!-- feature -->
					<div class="col-md-4">
						<div class="feature">
							<i class="feature-icon fa fa-users"></i>
							<div class="feature-content">
								<h4>Tương tác</h4>
								<p>Giảng viên tương tác với sinh viên giúp quá trình học dễ dàng hơn</p>
							</div>
						</div>
					</div>
					<!-- /feature -->

					<!-- feature -->
					<div class="col-md-4">
						<div class="feature">
							<i class="feature-icon fa fa-comments"></i>
							<div class="feature-content">
								<h4>Thực tế</h4>
								<p>Sinh viên được làm các đồ án thực tế giúp thích nghi tốt với áp lực công việc</p>
							</div>
						</div>
					</div>
					<!-- /feature -->


				</div>
				<!-- /row -->

				<hr class="section-hr">


			<!-- /container -->

		</div>
		<!-- /Why us -->

		<!-- Contact CTA -->
		<div id="contact-cta" class="section">

			<!-- Backgound Image -->
			<div class="bg-image bg-parallax overlay" style="background-image:url('../img/cta2-background.jpg')"></div>
			<!-- Backgound Image -->

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<div class="col-md-8 col-md-offset-2 text-center">
						<h2 class="white-text">Liên hệ chúng tôi</h2>
						<p class="lead white-text">Khoa công nghệ thông tin và truyền thông - Đại học Đà Nẵng.</p>
						<a class="main-button icon-button" href="#">Contact Us Now</a>
					</div>

				</div>
				<!-- /row -->

			</div>
			<!-- /container -->

		</div>
		<!-- /Contact CTA -->

		<!-- Footer -->
		<footer id="footer" class="section">

			<!-- container -->
			<div class="container">

				<!-- row -->
				<div class="row">

					<!-- footer logo -->
					<div class="col-md-6">
						<div class="footer-logo">
							<a class="logo" href="index.html">
								<img src="../img/logo.png" alt="logo">
							</a>
						</div>
					</div>
					<!-- footer logo -->

					<!-- footer nav -->
					<div class="col-md-6">
						<ul class="footer-nav">
							<li><a href="index.html">Home</a></li>
							<li><a href="#">About</a></li>
							<li><a href="#">Courses</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contact</a></li>
						</ul>
					</div>
					<!-- /footer nav -->

				</div>
				<!-- /row -->

				<!-- row -->
				<div id="bottom-footer" class="row">

					<!-- social -->
					<div class="col-md-4 col-md-push-8">
						<ul class="footer-social">
							<li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
							<li><a href="#" class="youtube"><i class="fa fa-youtube"></i></a></li>
							<li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
						</ul>
					</div>
					<!-- /social -->

					<!-- copyright -->
					<div class="col-md-8 col-md-pull-4">
						<div class="footer-copyright">
							<span>&copy; Copyright 2018. All Rights Reserved. | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com">SICT</a></span>
						</div>
					</div>
					<!-- /copyright -->

				</div>
				<!-- row -->

			</div>
			<!-- /container -->

		</footer>
		<!-- /Footer -->

		<!-- preloader -->
		<div id='preloader'><div class='preloader'></div></div>
		<!-- /preloader -->


		<!-- jQuery Plugins -->
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/main.js"></script>

	</body>
</html>

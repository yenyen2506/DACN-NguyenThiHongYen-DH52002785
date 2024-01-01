<?php
    session_start();
    include('config/config.php'); //gọi trang connect db
    if(isset($_POST['dangnhap'])){ //nếu submit đăng nhập
        $taikhoan = $_POST['username'];
        $matkhau = md5($_POST['password']);
        //lấy username và password
        $sql = "SELECT * FROM tbl_admin WHERE username='".$taikhoan."' AND password='".$matkhau."' LIMIT 1";
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        //nếu tồn tại user
        if($count>0){
            $_SESSION['dangnhap'] = $taikhoan; //lưu session dang nhap bằng ten dang nhap
            header("Location:index.php");
        }else{
            echo'<script>alert("Tài khoản hoặc Mật khẩu của bạn không đúng. Vui lòng nhập lại !");<script>';
            //còn ko thì lỗi
            header("Location:login.php"); //quay trở về trang login
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
    <link rel="stylesheet" type="text/css" href="dt/vender/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="slide/font-awesome/css/font-awesome.css">
    <style type="text/css">
            .divider:after,
            .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
            }
            .h-custom {
            height: calc(100% - 73px);
            }
            @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
            }

    </style>
</head>
<body>
<form action="" autocomplete="off" method="POST">
                    <section class="vh-100">
                    <div class="container-fluid h-custom">
                        <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-md-4 col-lg-3 col-xl-2 offset-xl-1">
                            <form>
                            <div class="divider d-flex align-items-center my-4">
                                <p class="text-center fw-bold mx-3 mb-0"><h1>Đăng nhập</h1></p>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="text" name="username" id="form3Example3" class="form-control form-control-lg"
                                placeholder="" />
                                <label class="form-label" for="form3Example3">Tên đăng nhập</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <input type="password" name="password" id="form3Example4" class="form-control form-control-lg"
                                placeholder="" />
                                <label class="form-label" for="form3Example4">Mật khẩu</label>
                            </div>

                            
                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button name="dangnhap" type="submit" class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Đăng nhập</button>
                            </div>

                            </form>
                        </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
                        <!-- Copyright -->
                        <div class="text-white mb-3 mb-md-0">
                        Copyright © 2023.
                        </div>
                        
                    </div>
                    </section>

    </form>

<script type="text/javascript" src="dt/vender/jquery/jquery-3.5.1.min.js"></script>
	<!-- <script type="text/javascript" src="js/popper.min.js"></script> -->
	<script type="text/javascript" src="dt/vender/bootstrap/js/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="js/script.js"></script> -->
</div>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>



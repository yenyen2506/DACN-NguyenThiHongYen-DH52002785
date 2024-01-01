<?php
//khỏi tạo một session
if (!isset($_SESSION)) {
  session_start();
 
  
}
  
//lấy hàm mail
require('mail/mail.php');
if(isset($_POST['dangky'])){
    //lấy dữ liệu đăng ký
    $tenkhachhang = $_POST['hovaten'];
    $user_name = $_POST['user_name'];

    $matkhau = md5($_POST['matkhau']);
    $r_matkhau = md5($_POST['r_matkhau']);
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $level = 0;

    //kiễm tra trùng dữ liệu
    $regex = "/([a-z0-9_]+|[a-z0-9_]+\.[a-z0-9_]+)@(([a-z0-9]|[a-z0-9]+\.[a-z0-9]+)+\.([a-z]{2,4}))/i";
    if(!preg_match($regex,$email)){
      $_SESSION["thongbao3"] = "Email không đúng định dạng";
      echo "Email không đúng";
      

      die();
    }
    //kiễm tra định dạng dữ liệu
    if(!preg_match("/[\d]{10}/",$dienthoai)){
      $_SESSION["thongbao4"] = "Số điện thoại sai định dạng";
      echo "Số điện thoại phải đủ 10 số";
      die();
    }
    if($matkhau != $r_matkhau){
      $_SESSION["thongbao2"]="Mật khẩu nhập lại sai";
      echo "Nhập sai mật khẩu";
      die();
    }
    else{
      $sql_dangky_check=mysqli_query($mysqli,"SELECT * FROM tbl_dangky");
      while($row_check = mysqli_fetch_array($sql_dangky_check)){
          if($user_name==$row_check['user_name']){
            echo '<script>alert("Tên username trùng,làm ơn chọn tên khác")</script>';
            echo "<script>window.open('index.php?quanly=dangky','_self')</script>";
            die();
            
          }elseif($dienthoai==$row_check['dienthoai']){
            echo '<script>alert("Điện thoại trùng,làm ơn chọn số khác")</script>';
            echo "<script>window.open('index.php?quanly=dangky','_self')</script>";
            die();

          }elseif($email==$row_check['email']){
            echo '<script>alert("Email trùng,làm ơn chọn email khác")</script>';
            echo "<script>window.open('index.php?quanly=dangky','_self')</script>";
            die();
          }
      }

      $pass = password_hash($matkhau,PASSWORD_DEFAULT);

      $sql_dangky="SELECT * FROM tbl_dangky WHERE hovaten='$tenkhachhang' AND matkhau='$matkhau' ";
      
      //chèn đăng ký vào db

        $sql_dangky = mysqli_query($mysqli,"INSERT INTO tbl_dangky(tenkhachhang,user_name,matkhau,r_matkhau,email,diachi,dienthoai) VALUE('".$tenkhachhang."','".$user_name."','".$matkhau."','".$r_matkhau."','".$email."','".$diachi."','".$dienthoai."')");
        if($sql_dangky){ //nếu đã insert dữ liệu đăng ký
            echo '<p style="color:green">Đăng ký thành công !</p>';
        }
      
    }
    
    

}



?>






<style type="text/css">
table.dangky tr td {
    padding: 7px;
}
.img-fluid{
  width: 100%;
}
p.dacotk {
    align-items: center;
    padding: 10px 94px;
}

</style>


<form action="" method="POST">
        <section class="vh-80" style="background-color: #eee;">
          <div class="container h-10">
            <div class="row d-flex justify-content-center align-items-center h-100" style="padding: 20px 19px">
              <div class="col-lg-10 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                  <div class="card-body p-md-5">
                    <div class="row justify-content-center">
                      <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Đăng ký</p>

                        <form class="mx-1 mx-md-4">

                          <div class="d-flex flex-row align-items-center mb-4">
                          <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                            <div class="form-outline flex-fill mb-0">
                              <input type="text" id="form3Example1c" class="form-control"  name="hovaten" placeholder="Họ và tên" />
                              
                              <!-- <label class="form-label" for="form3Example1c">Họ và tên</label> -->
                            </div>
                          </div>
                          <div class="d-flex flex-row align-items-center mb-4">
                          <!-- <i class="fa fa-user" aria-hidden="true"></i> -->
                            <div class="form-outline flex-fill mb-0">
                              <input type="text" id="form3Example1c"  class="form-control" name="user_name" placeholder="Username" />
                              
                              <!-- <label class="form-label" for="form3Example1c">Họ và tên</label> -->
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                            <div class="form-outline flex-fill mb-0">
                              <input type="password" id="form3Example3c"  name="matkhau" class="form-control" placeholder="Mật khẩu"/>
                              
                              <!-- <label class="form-label" for="form3Example3c">Mật khẩu</label> -->
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <!-- <i class="fa fa-lock" aria-hidden="true"></i> -->
                            <div class="form-outline flex-fill mb-0">
                              <input type="password" id="form3Example3c"  name="r_matkhau" class="form-control" placeholder="Nhập lại mật khẩu"/>
                             
                              <!-- <label class="form-label" for="form3Example3c">Mật khẩu</label> -->
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                            <div class="form-outline flex-fill mb-0">
                              <input type="text" id="form3Example4c"  class="form-control" name="email" placeholder="Email" />
                              
                              
                              <!-- <label class="form-label" for="form3Example4c">Email</label> -->
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                            <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
                            <div class="form-outline flex-fill mb-0">
                              <input type="text" id="form3Example4c"  class="form-control" name="dienthoai" placeholder="Số điện thoại" />
                              
                              <!-- <label class="form-label" for="form3Example4c">Email</label> -->
                            </div>
                          </div>

                          <div class="d-flex flex-row align-items-center mb-4">
                          <!-- <i class="fa fa-home" aria-hidden="true"></i> -->
                            <div class="form-outline flex-fill mb-0">
                              <input type="text" id="form3Example4cd"  class="form-control" name="diachi" placeholder="Địa chỉ" />
                              
                              <!-- <label class="form-label" for="form3Example4cd">Địa chỉ</label> -->
                            </div>
                          </div>
                          


                          <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                            <button type="submit" name="dangky" id="dangkyButton" class="btn btn-primary btn-lg" >Đăng ký</button>

                            
                          </div>

                        </form>
                       

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
           <!--  -->

        </section>
</form>
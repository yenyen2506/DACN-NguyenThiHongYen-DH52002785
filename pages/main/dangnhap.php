<?php
    if (!isset($_SESSION)) { //neu ko ton tai session thì khởi tạo session
        session_start();
        /* print_r($_SESSION); */
    }
?>

<style>
    #togglePassword{
       position: absolute;
       font-size: 2.5rem;
       color: rgb(168,161,161);
       top: 50%;
       right:1rem;
       cursor: pointer;
    }  

</style>






<?php
    //code đăng nhập
    if(isset($_POST['dangnhap'])){ //nếu tồn tại đăng nhập
        $user_name = $_POST['user_name'];
        $matkhau = md5($_POST['password']); //lấy ra username và password
        $sql = "SELECT * FROM tbl_dangky WHERE user_name='".$user_name."' AND matkhau='".$matkhau."' LIMIT 1"; //chọn username và password từ db
        $row = mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row); //nếu tồn tại user đăng ký tiến hàng lưu đăng nhập
        
            if($count>0){
                $row_data = mysqli_fetch_array($row);
                //lưu session khi đăng nhập
               
                $_SESSION['dangky'] = $row_data['email']; //luu session mail
                $_SESSION['user_name'] = $_POST['user_name']; //luu session username
                $_SESSION['id_khachhang'] = $row_data['id_dangky']; //luu id dangky
                echo '<p style="color:blue">Đăng nhập thành công !</p>';
                echo "<script>window.open('index.php','_self')</script>"; // echo và quay về index.php
                // header("Location:index.php?quanly=giohang");
                
                
            }else{
                echo '<p style="color:red">Username hoặc mật khẩu sai, vui lòng nhập lại !!</p>'; //ko thì mật khẩu username sai
        }
        
    }
?>

<!-- <form action="" autocomplete="off" method="POST">
        <table border="1" width="50%" class="table-login" style="text-align: center;border-collapse: collapse;">
            <tr>
                <td colspan="2"><h3>Đăng nhập khách hàng</h3></td>
            </tr>
            <tr>
                <td>Tài khoản</td>
                <td><input type="text" size="50" name="email" placeholder="Email..."></td>
            </tr>
            <tr>
                <td>Mật khẩu</td>
                <td><input type="password" size="50" name="password" placeholder="Mật khẩu..."></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></td>
            </tr>
        </table>
    </form> -->




   
<form action="" autocomplete="off" method="POST">
        <section class="vh-50" style="background-color: #eee;">
            <div class="container py-2 h-50">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    
                    <div class="card-body p-5 text-center" class="input">

                        <h3 class="mb-5">Đăng nhập</h3>

                        <div class="form-outline mb-4">
                        <input name="user_name"  placeholder="Username..." type="text" id="typeEmailX" class="form-control form-control-lg" require/>
                        
                        </div>

                        <div class="form-outline mb-4">
                        <input name="password" placeholder="Mật khẩu..." type="password" id="typePasswordX" class="form-control form-control-lg" require/>
                       
                        
                        </div>

                        <!-- Checkbox -->
                        <!-- <div class="form-check d-flex justify-content-start mb-4">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            value=""
                            id="form1Example3"
                        />
                        <label class="form-check-label" for="form1Example3"> Remember password </label>
                        </div> -->
                        <!-- <p><a href="index.php?quanly=dangnhap">Bạn chưa có tài khoản ?</a></p> -->

                        <button name="dangnhap" class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                        <hr class="my-4">
                        <a href="index.php?quanly=dangky"><button type="button" class="btn btn-success">Tạo tài khoản</button></a>
                        <a href="index.php?quanly=quenmatkhau"><button type="button" class="btn btn-warning">Quên mật khẩu</button></a>


                        

                    </div>
                    </div>
                </div>
                </div>
            </div>
        </section>
</form>
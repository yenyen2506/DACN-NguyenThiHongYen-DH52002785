
<form action="pages/main/thaydoithongtin_xuly.php" autocomplete="off" method="POST">
        <section class="vh-50" style="background-color: #eee;">
            <div class="container py-2 h-50">
                <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10 col-md-8 col-lg-6 col-xl-5">
                    <div class="card shadow-2-strong" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <?php
                        $id_khachhang = $_SESSION['id_khachhang'];
                        $sql_thongtin = mysqli_query($mysqli,"SELECT * FROM tbl_dangky WHERE id_dangky='".$id_khachhang."' LIMIT 1");
                        $row_kh = mysqli_fetch_array($sql_thongtin);
                        ?>
                        <h3 class="mb-5">Thay đổi thông tin khách hàng</h3>

                        <div class="form-outline mb-4">
                        <input name="tenkhachhang" placeholder="..." value="<?php echo $row_kh['tenkhachhang'] ?>" type="text" id="typeEmailX" required class="form-control form-control-lg" />
                        
                        </div>

                        <div class="form-outline mb-4">
                        <input name="email" placeholder="..." type="email" value="<?php echo $row_kh['email'] ?>" id="typePasswordX" required class="form-control form-control-lg" />
                        
                        </div>

                        <div class="form-outline mb-4">
                        <input name="diachi" placeholder="..." type="text" value="<?php echo $row_kh['diachi'] ?>" id="typePasswordX" required class="form-control form-control-lg" />
                        
                        </div>
                        <div class="form-outline mb-4">
                        <input name="dienthoai" placeholder="..." type="text" value="<?php echo $row_kh['dienthoai'] ?>" id="typePasswordX" required class="form-control form-control-lg" />
                        
                        </div>
                        <div class="form-outline mb-4">
                        <input name="user_name" placeholder="..." value="<?php echo $row_kh['user_name'] ?>" type="text" id="typePasswordX" required class="form-control form-control-lg" />
                        
                        </div>
                        <button name="thaydoithongtin" onClick='return confirmSubmit()' class="btn btn-primary btn-lg btn-block" type="submit">Đổi thông tin</button>

                        <hr class="my-4">

                       

                    </div>
                    <script LANGUAGE="JavaScript">
                        <!--
                        function confirmSubmit()
                        {
                        var agree=confirm("Bạn muốn thực hiện thay đổi không?");
                        if (agree)
                         return true ;
                        else
                         return false ;
                        }
                        // -->
                        </script>
                    </div>
                </div>
                </div>
            </div>
        </section>
</form>



<!-- <form action="" autocomplete="off" method="POST">
        <table border="1" class="table-doimatkhau" style="text-align: center;border-collapse: collapse;">
            <tr>
                <td colspan="2"><h3>Đổi mật khẩu tài khoản</h3></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mật khẩu cũ</td>
                <td><input type="password" name="password_cu"></td>
            </tr>
            <tr>
                <td>Mật khẩu mới</td>
                <td><input type="password" name="password_moi"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
            </tr>
        </table>
    </form> -->
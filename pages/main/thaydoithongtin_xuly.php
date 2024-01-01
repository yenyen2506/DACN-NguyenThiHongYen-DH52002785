<?php 
session_start();
include("../../admincp/config/config.php");
//code thay đổi mật khẩu
    if(isset($_POST['thaydoithongtin'])){ 
        //lấy dữ liệu đăng ký
        $tenkhachhang = $_POST['tenkhachhang'];
        $user_name = $_POST['user_name'];

        $email = $_POST['email'];
        $dienthoai = $_POST['dienthoai'];
        $diachi = $_POST['diachi'];
        $id_khachhang = $_SESSION['id_khachhang'];
        $sql_update = "UPDATE tbl_dangky SET tenkhachhang='".$tenkhachhang."',user_name='".$user_name."',email='".$email."',dienthoai='".$dienthoai."',diachi='".$diachi."' WHERE id_dangky='".$id_khachhang."'"; //truy vấn dữ liệu

        $row = mysqli_query($mysqli,$sql_update); //update du lieu
        //nếu người dùng có chọn mật khẩu mới thì update lại mật khẩu
        if($row>0){
            
           
            unset($_SESSION['dangky']); 
            header('Location:../../index.php?quanly=dangnhap');
            echo'<p style="color:blue">Đăng nhập lại nhé</p>';
        }else{
            echo'<p style="color:blue">Thông tin khách hàng thay đổi lỗi</p>';
           
        }
    }
?>

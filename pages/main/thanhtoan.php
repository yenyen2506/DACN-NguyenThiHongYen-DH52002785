<?php
    session_start();
    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    require('../../carbon/autoload.php');
    include("../../admincp/config/config.php");
   // include('../../mail/mail.php');

    //dữ liệu thanh toán
    $id_khachhang = $_SESSION['id_khachhang']; //lấy session khachhang
    $mail_khachhang = $_SESSION['dangky']; //lấy session email khách hàng
    $hinhthucthanhtoan = $_SESSION['thanhtoan']; //session hình thức than htoan
    // $ngaydat = Carbon::now('Asia/Ho_Chi_Minh'); //lấy thời gian thanh toán
    if($hinhthucthanhtoan=='chuyenkhoan'){ //set hình thức thanh toán
        $hinhthucthanhtoan='Chuyển khoản';
    }else{
        $hinhthucthanhtoan='Nhận tiền mặt';
    }
    $ghichudonhang = $_SESSION['ghichudonhang']; //session ghi chú don hàng
    $code_order = rand(0,9999); //mã don hàng
    //chèn dữ liệu vào đơn hàng
    $inser_cart = "INSERT INTO tbl_donhang(id_khachhang,code_cart,cart_status,hinhthucthanhtoan,ghichudonhang) VALUE('".$id_khachhang."','".$code_order."', 1,'".$hinhthucthanhtoan."','".$ghichudonhang."')"; //chèn dữ liệu vào tbl_cart

    $cart_query = mysqli_query($mysqli,$inser_cart);
    //nếu thành công
    if($cart_query){
        //them gio hang chi tiet
       foreach($_SESSION['cart'] as $key =>$value){
             //gửi mail và cập nhật db chi tiết đơn hàng
            $id_sanpham = $value['id'];
            $soluong = $value['soluong'];
            $insert_order_details = "INSERT INTO tbl_chitietdonhang(id_sanpham,code_cart,soluongmua,id_khachhang) VALUE('".$id_sanpham."','".$code_order."','".$soluong."','".$_SESSION['id_khachhang']."')"; //chèn đơn hàng chi tiết

            mysqli_query($mysqli,$insert_order_details);
            
     }
    }
    

    header('Location:../../index.php?quanly=camon');


?>

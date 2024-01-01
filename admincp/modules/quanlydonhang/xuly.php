<?php

if (!isset($_SESSION)) {
  session_start();
 
  
}

    use Carbon\Carbon;
    use Carbon\CarbonInterval;
    require('../../../carbon/autoload.php'); //gọi hàm carbon
    include('../../config/config.php'); //gọi connect db
    //require('../../../mail/mail.php'); //gọi hàm mail
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

    //cập nhật đơn hàng
    if(isset($_GET['code'])){
       $code_cart = $_GET['code'];
       //$xuly = $_POST['xuly'];
       $sql_update = mysqli_query($mysqli, "UPDATE tbl_donhang SET cart_status=0 WHERE code_cart='$code_cart'"); //update đơn hàng dựa vào code cart
       //$sql_update_giaodich = mysqli_query($mysqli,"UPDATE tbl_cart SET tinhtrangdon=0 WHERE code_cart='$code_cart'"); // update tình trạng đơn hàng dựa vào code cart
       
       //$query = mysqli_query($mysqli,$sql_update_giaodich); //truy vấn
       //cap nhat thong ke doanh thu
        $sql_lietke_dh = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham WHERE tbl_chitietdonhang.id_sanpham=tbl_sanpham.id_sanpham AND tbl_chitietdonhang.code_cart='$code_cart' ORDER BY tbl_chitietdonhang.id_chitietdonhang DESC";

        $sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat='$now'"; //chọn thống ke dựa vào ngày dat
        $query_thongke = mysqli_query($mysqli,$sql_thongke); //truy vấn
         $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh); //truy vấn
         
          $total = 0;
          $giatien = 0;
         while($row = mysqli_fetch_array($query_lietke_dh)){
         
              $total+=$row['soluongmua'];
              $giatien+=$row['giasp'];

          
        }

        // echo $giatien."<br>";
        // echo $total;
         //cập nhật đơn hàng thống kê doanh thu
        if(mysqli_num_rows($query_thongke)==0){
                $soluongban = $total;
                $doanhthu = $giatien;
                $donhang = 1;
                $sql_update_thongke = mysqli_query($mysqli,"INSERT INTO tbl_thongke (ngaydat,soluongban,doanhthu,donhang) VALUE('$now','$soluongban','$doanhthu','$donhang')" ); //nếu ngày đặt tồn tại thì cập nhật thống kê theo ngày đặt đó
        }elseif(mysqli_num_rows($query_thongke)!=0){ //nếu ngày đặt ko có thì thêm vào ngày mới trong thống kê
            while($row_tk = mysqli_fetch_array($query_thongke)){
                $soluongban = $row_tk['soluongban']+$total;
                $doanhthu = $row_tk['doanhthu']+$giatien;
                $donhang = $row_tk['donhang']+1;
                 $sql_update_thongke = mysqli_query($mysqli,"UPDATE tbl_thongke SET soluongban='$soluongban',doanhthu='$doanhthu',donhang='$donhang' WHERE ngaydat='$now'" ); //update thống kê
            }
        }
    
        //gui mail xac nhan don
            // $noidung = "<h4>Mail xác nhận đơn hàng mã số ".$code_cart." thành công</h4><p>Chúng tôi sẽ giao hàng cho bạn trong thời gian sớm nhất.</p>";
            // $tieude = "Mail xác nhận đơn hàng mã số ".$code_cart." thành công";
            // $mail = new function_mail(); //hàm mail
            // $mail->sendXacnhandon($tieude,$noidung); //nội dung mail 
       header('Location:../../index.php?action=quanlydonhang&query=lietke'); //quay về liệt kê đơn hàng

    }elseif(isset($_GET['dagiao'])){
      //code sử lý đã giao hàng
      $code_cart = $_GET['dagiao'];

        $sql_update = mysqli_query($mysqli, "UPDATE tbl_donhang SET cart_status=2 WHERE code_cart='$code_cart'"); //update đơn hàng thành đã giao hàng thành công
         
        header('Location:../../index.php?action=quanlydonhang&query=lietke');
    }

?>


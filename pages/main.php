<div id="main1">

            <div class="container-fluid">
                <?php
                    if(isset($_GET['quanly'])){
                        $tam = $_GET['quanly'];
                    }else{
                        $tam = '';
                    }
                    if($tam=='danhmucsanpham'){ //Gọi trang danh muc sp
                        include("main/danhmuc.php");
                    }elseif($tam=='giohang'){
                        include("main/giohang.php");//Gọi trang giỏ hàngs
                    }elseif($tam=='danhmucbaiviet'){
                        include("main/danhmucbaiviet.php"); //Gọi trang danh muc bai viet
                    }elseif($tam=='baiviet'){
                        include("main/baiviet.php"); //Gọi trang bai viet
                    }elseif($tam=='tintuc'){
                        include("main/tintuc.php"); //Gọi trang tin tuc
                    }elseif($tam=='lienhe'){
                        include("main/lienhe.php"); //Gọi trang lien he
                    }elseif($tam=='sanpham'){
                        include("main/sanpham.php"); //Gọi trang san pham
                    }elseif($tam=='dangky'){ //Gọi trang dang ky 
                        include("main/dangky.php");
                    }elseif($tam=='thanhtoan'){ //Gọi thanh toan
                        include("main/thanhtoan.php");
                    }elseif($tam=='dangnhap'){ //Gọi trang dang nhap
                        include("main/dangnhap.php"); 
                    }elseif($tam=='timkiem'){
                        include("main/timkiem.php"); //Gọi trang tim kiem
                    }elseif($tam=='camon'){
                        include("main/camon.php");//Gọi trang cam on thanh toan
                 
                    }elseif($tam=='xemdonhang'){ 
                        include("main/xemdonhang.php"); //Gọi trang xem don hang
                    }elseif($tam=='paymet'){
                        include("main/payment.php"); //Gọi trang thanh toan
                    }elseif($tam=='xacnhandonhang'){
                        include("main/xacnhandonhang.php"); //Gọi trang xác nhan don hang
                    }elseif($tam=='lichsudonhang'){
                        include("main/lichsudonhang.php"); //Gọi trang lịch sử đơn hàng
                    }elseif($tam=='lichsuphattrien'){
                        include("main/lichsuphattrien.html"); 
                    }elseif($tam=='hinhthucthanhtoan'){
                        include("main/hinhthucthanhtoan.html");
                   
                    }elseif($tam=='thaydoithongtin'){
                        include("main/thaydoithongtin.php");
                    }
                    
                    else{
                        include("main/index.php");
                    }
                ?>
            </div>
</div>
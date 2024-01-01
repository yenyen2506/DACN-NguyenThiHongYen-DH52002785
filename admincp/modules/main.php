<div class="clear"></div>
    <div class="main">
    <?php
                    if(isset($_GET['action'])&& $_GET['query']){
                        $tam = $_GET['action']; //lấy action hành động (danh muc,sp,hóa đơn ...v.v.)
                        $query = $_GET['query'];//lấy hành động(them xoa sua)
                    }else{
                        $tam = '';
                        $query = '';
                    }
                    if($tam=='quanlydanhmucsanpham' && $query=='them'){  //trang quản lý danh muc sp và hành động
                        include("modules/quanlydanhmucsp/them.php");
                        include("modules/quanlydanhmucsp/lietke.php");

                    }elseif ($tam=='quanlydanhmucsanpham' && $query=='sua') {//trang quản lý danh muc sp và hành động
                        include("modules/quanlydanhmucsp/sua.php");

                    }elseif ($tam=='quanlysp' && $query=='them') {//trang quản lý sp và hành động
                        include("modules/quanlysp/them.php");
                        include("modules/quanlysp/lietke.php");

                    }elseif ($tam=='quanlysp' && $query=='sua') {
                        include("modules/quanlysp/sua.php");

                    }elseif ($tam=='quanlydonhang' && $query=='lietke') { //trang quản lý don hang và hành động
                        include("modules/quanlydonhang/lietke.php");

                    }elseif ($tam=='donhang' && $query=='xemdonhang') { //trang quản lý chi tiết đơn hàng và hành động
                        include("modules/quanlydonhang/xemdonhang.php");
                    

                  

                    }elseif ($tam=='quanlyweb' && $query=='capnhat') {//trang quản lý website và hành động
                        include("modules/thongtinweb/quanly.php");
                        
                    }elseif ($tam=='quanlykhachhang' && $query=='lietke') {//trang quản lý khách hàng và hành động
                        include("modules/quanlykhachhang/lietke.php");

                  

                    }elseif ($tam=='binhluan' && $query=='lietke') { //trang quản lý bình luận và hành động
                        include("modules/binhluan/lietke.php");

                    }
                    else{
                        include("modules/dashboard.php");//trang chủ admin
                    }
        ?>
    </div>

</div>
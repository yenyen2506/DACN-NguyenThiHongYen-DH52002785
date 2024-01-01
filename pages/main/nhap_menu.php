<div class="menu">
        

            <ul class="list_menu">
                
                <li><a href="index.php"><i class="fa fa-home fa.style" aria-hidden="true"></i>  Trang chủ</a></li>

              
                <li><a href="index.php?quanly=giohang"><i class="fa fa-shopping-cart" aria-hidden="true"></i>  Giỏ hàng</a></li>
                
               


                <!-- <li><a href="index.php?quanly=tintuc"><i class="fa fa-newspaper-o" aria-hidden="true"></i>  Tin tức</a></li> -->
                <li><a href="index.php?quanly=lienhe"><i class="fa fa-phone" aria-hidden="true"></i>  Liên hệ</a></li>

                <?php
                    if(!isset($_SESSION['dangky'])){ //nếu ko tồn tại session đăng ký
                ?>
                <li><a href="index.php?quanly=dangnhap"><i class="fa fa-user" aria-hidden="true"></i></i>  Đăng nhập</a></li>
                <?php
                }
                ?>
                <?php
                    if(isset($_SESSION['dangky'])){ //nếu tton tại session đăng ký
                ?>
                <li><a href="index.php?quanly=xemdonhang&code=<?php echo $_SESSION['id_khachhang']?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Đơn mua</a></li>
                <li><a href="index.php?dangxuat=1"><i class="fa fa-sign-out" aria-hidden="true"></i>  Đăng xuất</a></li>

                <?php
                }else{
                ?>
                
                <li><a href="index.php?quanly=dangky"><i class="fa fa-user-plus" aria-hidden="true"></i>  Đăng ký</a></li>
                <?php
                }
                ?>

                  
                
                
                
            </ul>
        </div>
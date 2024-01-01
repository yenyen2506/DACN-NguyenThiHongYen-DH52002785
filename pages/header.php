<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>



<div class="header">

    <nav class="navbar navbar-expand-sm navbar-dark" style=" width: 100%; height: 90px; background-color:white;">
    <!-- logo -->
    <div class="col-md-4" style="height: 90px;text-align: center">
            <a href="index.php"><img src="images/Black and White Modern Restaurant Logo.png" style="height: 100px;width: 150px;;margin-top: -10px"></a>
        </div>
     <!-- tim kiem -->
     <div class="col-md-4" style="color: white; margin-top: 20px">
        <form method="post" action="index.php?quanly=timkiem">
           <div class="search">
            <input type="text" placeholder="Nhập tên sản phẩm cần tìm kiếm ..." name="tukhoa" class="form-control" style="color: black; background-color: white; border-radius: 45px" value="<?php echo isset($_POST['tukhoa']) ? $_POST['tukhoa'] : ''; ?>">
            <button name="timkiem" type="submit" style="float: right; width: 38px; height: 38px; border: 2px solid white; border-radius: 100%; background-color: white; margin-top: -38px; margin-right: 3px" id="search" class="btn btn-default"><i class="fa fa-search" aria-hidden="true"></i></button>
           </div>
        </form>
    </div>

        <!--dang nhap -->
        <?php
            if(!isset($_SESSION['dangky'])){
        ?>
        <div class="col-md-4 heder_right " id="menu_right" style="color:black;" >
            <div class="col-lg-offset-4" >
                <div class="dangnhap"><a class="dnhap" href="index.php?quanly=dangnhap"><i class="fa fa-user"></i> Đăng nhập |</a>
                
            <?php
            }
            ?>
            
            <?php
                if(isset($_SESSION['dangky'])){
            ?>
                <div class="dropdown user" class="user">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                        if(isset($_SESSION['dangky'])){
                            echo "Xin chào";
                            echo "<br>";
                            echo '<span style="color:red">'.$_SESSION['dangky'].'</span>';
                            //echo $_SESSION['id_khachhang'];
                        }
                     ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" >
                     <a class="dropdown-item" href="index.php?quanly=thaydoithongtin"><i class="fa fa-lock" aria-hidden="true"></i> Thay đổi thông tin</a>
                     <a class="dropdown-item" href="index.php?quanly=lichsudonhang"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Lịch sử đơn hàng</a>
                        <a class="dropdown-item" href="index.php?dangxuat=1"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a>
                    </div>
                </div>
       
            <?php
                }else{
            ?>
                <a class="dky" href="index.php?quanly=dangky"><i class="fa fa-user-plus"></i> Đăng ký</a>&emsp;&emsp;&emsp;<a style='color:black' href="#"></a></div>
                </div>
            </div>
            <?php
            }
            ?>
     </nav>
</div>

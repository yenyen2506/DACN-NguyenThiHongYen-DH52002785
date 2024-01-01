

<?php
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);

?>
<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangky']);
    }
?>








<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <!-- <a class="navbar-brand" href="#">Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.php"><i class="fa fa-home fa.style" aria-hidden="true"></i> Trang chủ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-building" aria-hidden="true"></i> 
          Giới thiệu
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="index.php?quanly=lichsuphattrien">Lịch sử phát triển</a>
          <a class="dropdown-item" href="index.php?quanly=chinhsachdoitra">Chính sách đổi trả hàng</a>
        
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?quanly=giohang"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="index.php?quanly=lienhe"><i class="fa fa-phone" aria-hidden="true"></i> Liên hệ</a>
      </li>
      
     
      <?php
            if(!isset($_SESSION['dangky'])){
        ?>


      <li class="nav-item active">
        <a class="nav-link" href="index.php?quanly=dangnhap"><i class="fa fa-user" aria-hidden="true"></i></i> Đăng nhập</a>
      </li>

                    <?php
                    }
                    ?>
                    <?php
                        if(isset($_SESSION['dangky'])){
                    ?>
                            

                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?quanly=xemdonhang&code=<?php echo $_SESSION['id_khachhang']?>"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Đơn mua</a>
                            </li>
                            
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php?dangxuat=1"><i class="fa fa-sign-out" aria-hidden="true"></i> Đăng xuất</a>
                            </li>



                        



                    <?php
                        }else{
                    ?>

      <li class="nav-item active">
        <a class="nav-link" href="index.php?quanly=dangky"><i class="fa fa-user-plus" aria-hidden="true"></i> Đăng ký</a>
      </li>
    <?php
        }
    ?>

    </ul>
  </div>
</nav>









     

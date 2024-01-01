

<?php
//code chọn danh mục sản phẩm
$sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC"; //lay tat ca danh muc san pham
$query_danhmuc = mysqli_query($mysqli,$sql_danhmuc); //đổ dữ lieu danh muc san pham

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

          <a class="dropdown-item" href="index.php?quanly=hinhthucthanhtoan">Hình thức thanh toán</a>
        </div>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?quanly=giohang"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Giỏ hàng</a>
      </li>
      
      <li class="nav-item active">
        <a class="nav-link" href="index.php?quanly=lienhe"><i class="fa fa-phone" aria-hidden="true"></i> Liên hệ</a>
      </li>
      
     
     

    </ul>
  </div>
</nav>









     

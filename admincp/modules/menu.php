

<div class="menu"  class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="list_menu">
        <li><a href="index.php?action=quanlydanhmucsanpham&query=them">Quản lý danh mục sản phẩm</a></li>
        <li><a href="index.php?action=quanlysp&query=them">Quản lý sản phẩm</a></li>
        
        <li><a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a></li>

        <li><a href="index.php?action=quanlyweb&query=capnhat">Quản lý website</a></li>
       
        
        <li><a href="index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangnhap'])){
        echo $_SESSION['dangnhap'];


    }?></a>
</li>
    


    </ul>
</div>

<p><h2 class="SPMN">Chi tiết sản phẩm </h2></p>

<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');

if(isset($_POST['binhluan_submit'])){ //nếu click submit bình luận
    //lấy tất cả dữ liệu form bình luận
    $tenbinhluan = $_POST['tenbinhluan'];
    $id_sanpham = $_POST['id_sanpham'];
    $ngaygio = date('d/m/Y H:i:s');
    $binhluan = $_POST['binhluan'];
    $hienthi = 0;

    //code chèn bình luận
    $sql_them = "INSERT INTO tbl_binhluan(tenbinhluan,binhluan,ngay_gio,id_sanpham,hienthi) VALUE('".$tenbinhluan."','".$binhluan."','".$ngaygio."','".$id_sanpham."','".$hienthi."')";
    mysqli_query($mysqli,$sql_them);
    echo '<script>alert("Thêm bình luận thành công.")</script>';

       

}
//code chi tiết một sản phẩm
        $sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_danhmuc  WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
        $query_chitiet = mysqli_query($mysqli,$sql_chitiet); //truy vấn dữ liệu
        
        
        while($row_chitiet = mysqli_fetch_array($query_chitiet)){          //đổ dữ liệu theo dòng
?>



<div class="hinhanh_sanpham">
        <img class="ctsp" width="80%" src="admincp/modules/quanlysp/uploads/<?php echo $row_chitiet['hinhanh']?>">


</div>
<div class="wrapper_chitiet">
    <form method="POST" action="pages/main/themgiohang.php?idsanpham=<?php echo $row_chitiet['id_sanpham']?>">
        <div class="chitiet_sanpham">
                    <h3 style="margin:0"><?php echo $row_chitiet['tensanpham'] ?></h3>
        </br>
                    <p>Mã sản phẩm: <b><?php echo $row_chitiet['masp'] ?></b></p>
                    <p>Giá sản phẩm: <b><?php echo number_format( $row_chitiet['giasp'],0,',','.').' VNĐ' ?></b></p>
                    <!-- <p>Số lượng sản phẩm: <?php echo $row_chitiet['soluong'] ?></p> -->
                    <p>Danh mục sản phẩm: <b><?php echo $row_chitiet['tendanhmuc'] ?></b></p>
                    <p><input class="themgiohang" name="themgiohang" type="submit" value="Thêm giỏ hàng"></p>
                    <!-- share fb -->

                    <div id="fb-root"></div>
                        <script async defer crossorigin="anonymous" src="http://localhost/vietfood/index.php?quanly=sanpham&id=105<?php echo $row_chitiet['id_sanpham']?>" nonce="SaHlK99N"></script>
        </div>
    </form>
    
</div>
<div class="clear"></div>
</div> <!-- END tabs-content -->

</br>  
<h3>Bình luận sản phẩm</h3>

<form autocomplete="off" action="" method="POST">
    <div class="form-group">
        <label for="exampleInputEmail1">Tên người bình luận</label>
        <input type="text" class="form-control" name="tenbinhluan" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
        <input type="hidden" name="id_sanpham" value="<?php echo $_GET['id'] ?>">
        <small id="emailHelp" class="form-text text-muted">Bình luận sẽ bị ẩn cho đến khi được duyệt</small>
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Bình luận</label>
        <textarea rows="5" name="binhluan" style="resize: none" class="form-control" id="exampleInputPassword1" placeholder="..."></textarea>
    </div>
             
    <button type="submit" name="binhluan_submit" class="btn btn-primary">Gửi bình luận</button>
</form>

</div> <!-- END tabs -->

<?php
//liệt kê bình luận được duyệt
$sql_lietke_comment = "SELECT * FROM tbl_binhluan WHERE hienthi=1 ORDER BY tbl_binhluan.ngay_gio  DESC";
$query_lietke_comment = mysqli_query($mysqli,$sql_lietke_comment); //truy vấn liệt kê bình luận
?>

<div class="d-flex row">
    <div class="col-md-8">
        <div class="d-flex flex-column comment-section">
            <?php
            $i = 0;
            while($row_comment = mysqli_fetch_array($query_lietke_comment)){ //liet ke tat ca comment
                $i++;
            ?>
            <div class="bg-white p-2">
                <div class="d-flex flex-row user-info"><img class="rounded-circle" src="https://i.imgur.com/RpzrMR2.jpg" width="40">
                    <div class="d-flex flex-column justify-content-start ml-2"><span class="d-block font-weight-bold name"><?php echo $row_comment['tenbinhluan'] ?></span><span class="date text-black-50"><?php echo $row_comment['ngay_gio'] ?></span></div>
                </div>
                <div class="mt-2">
                    <p class="comment-text"><?php echo $row_comment['binhluan'] ?></p>
                </div>
            </div>
            <?php
            } 
            ?>
        </div>
    </div>
</div>
</br>

<!-- binh luan san pham -->
</div>
</div>
</div>
<?php
}
?>




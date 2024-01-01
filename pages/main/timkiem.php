<?php
    //nếu tồn tại từ khóa thì lấy từ khóa
    if(isset($_POST['timkiem'])){
        $tukhoa = mysqli_real_escape_string($mysqli, $_POST['tukhoa']);

    }
    //sau đó chọn ra ten sản phẩm gần giống với từ khóa đó
    $sql_pro = "SELECT * FROM tbl_sanpham, tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
    $query_pro = mysqli_query($mysqli,$sql_pro);  //truy vấn dữ liệu
        
?>

<h3>Từ khóa tìm kiếm : <?php echo $_POST['tukhoa'] //tu khoa dã tìm kiếm ?></h3> 

            <ul class="product_list">
                    <?php
                    //đổ dữ liệu đã lấy được
                    while($row = mysqli_fetch_array($query_pro)){
                    ?>
                
                <li>
                    <div class="post-item">
                        <div class="product-top">
                            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham']?>">
                                <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh']?>">
                                <p class="title_product"><?php echo $row['tensanpham']?></p>
                                <p class="price_product"><?php echo number_format($row['giasp'],0,',','.').'VNĐ' ?></p>
                                <p style="text-align: center; color:rgb(170, 170, 170)">Danh mục: <?php echo $row['tendanhmuc'] ?></p>
                            </a>
                        </div>
                    </div>
                </li>
                    
                    <?php
                    }
                    ?>
                    
            </ul>

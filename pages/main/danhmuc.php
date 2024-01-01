<?php
    //lấy sản phẩm dựa vào id sanpham
    $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc='$_GET[id]' ORDER BY id_sanpham DESC";
    $query_pro = mysqli_query($mysqli,$sql_pro);  //truy van du lieu
   

   //get tên danh muc 
   $sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc='$_GET[id]' LIMIT 1";
   $query_cate = mysqli_query($mysqli,$sql_cate);//truy vấn dữ liệu 
   $row_title = mysqli_fetch_array($query_cate); //lấy dữ liệu theo dòng
?>

<h3 class="SPMN"><b>SẢN PHẨM: <?php echo $row_title['tendanhmuc'] ?></b> </h3>

                <ul class="product_list">
                    <?php
                    //lấy dự liệu hiển thị sản phẩm thuộc danh mục
                    while($row_pro = mysqli_fetch_array($query_pro)){
                    ?>
                    
                        <li>
                        <div class="danhmuc">
                            <a href="index.php?quanly=sanpham&id=<?php echo $row_pro['id_sanpham']?>">
                                <img src="admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh']?>">
                                <p class="title_product"><?php echo $row_pro['tensanpham']?></p>
                                <p class="price_product"><?php echo number_format($row_pro['giasp'],0,',','.').'VNĐ' ?></p>
                            </a>
                            </div>
                        </li>
                    
                    <?php
                    }
                    ?>
                    
                </ul>
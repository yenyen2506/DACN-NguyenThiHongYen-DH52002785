
<div class="list-group" >
                
                
                <a href="#" class="list-group-item list-group-item-action active" class="dm">DANH MỤC SẢN PHẨM</a>

                <?php

                    $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC "; //lấy danh mục sản phẩm
                    $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc); //Query đổ dữ liệu mục sản phẩm
                    while($row = mysqli_fetch_array($query_danhmuc)){ //Query liệt kê dữ liệu mục sản phẩm
                ?>
            
                <a href="index.php?quanly=danhmucsanpham&id=<?php echo $row['id_danhmuc']?>"class="list-group-item list-group-item-action"><?php echo $row['tendanhmuc']?></a>
                
                <?php
                }
                ?>

        </div>
            </br>
        <script type="text/javascript" src="js/click.js"></script>
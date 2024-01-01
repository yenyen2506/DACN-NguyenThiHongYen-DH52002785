<?php
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 15"; //lấy ra tất cả sản phẩm mới nhất đối đa 15
    $query_pro = mysqli_query($mysqli,$sql_pro);  //truy vấn dữ liệu 
    
                    


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container" style="background:red;">
        <div class="row">
          <div class="col-md-12">
            <h3 class="SPMN">SẢN PHẨM MỚI NHẤT</h3>

            <ul class="product_list">
                <?php
                while($row = mysqli_fetch_array($query_pro)){
                ?>

              <li>
                <div class="card" style="width: 250px; margin-right:15px;">
                    <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" class="card-img-top" alt="..." >
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['tensanpham'] ?></h5>
                        <p class="card-text"><?php echo number_format($row['giasp'],0,',','.').'VNĐ' ?></p>
                        <p class="card-text">Danh mục: <?php echo $row['tendanhmuc'] ?></p>
                        
                    </div>
                </div>
              </li>
                <?php
                }
                ?>
            </ul>
          </div>
        </div>
    </div>
</body>
</html>
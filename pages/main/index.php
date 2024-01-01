<?php
    $sql_pro = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY tbl_sanpham.id_sanpham DESC LIMIT 8"; //lấy ra tất cả sp mới nhất
    $query_pro = mysqli_query($mysqli,$sql_pro);  //truy vấn dữ liệu

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../dt/vender/bootstrap/css/bootstrap.min.css">
  <title>Document</title>
</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
          <div class="carousel-inner">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="images/Orange Red Illustration Traditional Food For Sale Blog Banner.png" class="d-block w-100" alt="..." style="height:400px">
            </div>
            <div class="carousel-item ">
              <img src="images/Orange Red Illustration Traditional Food For Sale Blog Banner (2).png" class="d-block w-100" alt="..." style="height:400px">
            </div>
            <div class="carousel-item ">
              <img src="images/Orange Red Illustration Traditional Food For Sale Blog Banner.png" class="d-block w-100" alt="..." style="height:400px">
            </div>
            <div class="carousel-item ">
              <img src="images/Orange Red Illustration Traditional Food For Sale Blog Banner (2).png"class="d-block w-100" alt="..." style="height:400px">
            </div>

          </div>
          <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <script src="../../dt/vender/jquery/jquery-3.5.1.min.js"></script>
  <script src="../../dt/vender/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
<p class="cursive"><h3 class="SPMN" align="center ">SẢN PHẨM MỚI NHẤT</h3></p>

                <ul class="product_list">
                    <?php
                    //lấy ra tất cả sản phẩm mới nhất sắp xếp theo ID
                    while($row = mysqli_fetch_array($query_pro)){ // đổ dữ liệu
                    ?>
                
                    <li>
                      <div class="post-item">
                        <div class="product-top">
                          
                            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                              <img src="admincp/modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>">
                            <p class="title_product"><?php echo $row['tensanpham'] ?></p>
                            <p class="price_product"><?php echo number_format($row['giasp'],0,',','.').' VNĐ' ?></p>
                            <p style="text-align: center; color:rgb(170, 170, 170)">Danh mục: <?php echo $row['tendanhmuc'] ?></p>
                        </a>
                        </div>
                       
                      </div>
                    </li>
                    
                    <?php
                    }
                    ?>
                    
                </ul>



</br>  
                



        
                
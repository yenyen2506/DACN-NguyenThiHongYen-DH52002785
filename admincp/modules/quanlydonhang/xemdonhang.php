<h2 class="tieude">Xem đơn hàng</h2>

<?php
    //code xem đơn hàng chi tiết
    $code = $_GET['code'];
    $sql_lietke_dh = "SELECT * FROM tbl_chitietdonhang,tbl_sanpham WHERE tbl_chitietdonhang.id_sanpham=tbl_sanpham.id_sanpham AND tbl_chitietdonhang.code_cart='$code' ORDER BY tbl_chitietdonhang.id_chitietdonhang DESC";
    //liệt kê đơn hàng chi tiết dựa theo code cart
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh); //truy vấn liệt kê

?>

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Mã ĐH</th>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Đơn giá</th>
      <th scope="col">Thành tiền</th>
    
    </tr>
    <?php
    $i = 0;
    $tongtien = 0;
    //liệt kê đơn hàng chi tiết
    while($row = mysqli_fetch_array($query_lietke_dh)){ //đổ dữ liệu trong chi tiết đơn hàng
        $i++;
        $thanhtien = $row['giasp']*$row['soluongmua'];
        $tongtien += $thanhtien;
  ?>



  
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['code_cart'] ?></td>
      <td><?php echo $row['masp'] ?></td>

      <td><?php echo $row['tensanpham'] ?></td>
      <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="100px"></td>

      <td><?php echo $row['soluongmua'] ?></td>
      <td><?php echo number_format($row['giasp'],0,',','.').'VNĐ' ?></td>
      
      <td><?php echo number_format($thanhtien,0,',','.').'VNĐ' ?></td>
      
      
    </tr>

    <?php
    }
  ?>
      <tr>
          <td colspan="8">
              <p class="tongtien"><b>Tổng tiền: <?php echo number_format($tongtien,0,',','.').'VNĐ' ?></b>
            
          </td>

    </tr>
  </tbody>
  
</table>


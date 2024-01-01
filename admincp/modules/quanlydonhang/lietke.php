<h2 class="tieude">Liệt kê đơn hàng</h2>
<?php
  //liệt kê đơn hàng
    $sql_lietke_dh = "SELECT * FROM tbl_donhang,tbl_dangky WHERE tbl_donhang.id_khachhang=tbl_dangky.id_dangky ORDER BY id_donhang DESC";
    $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh); //truy vấn liet ke don hàng

?>
  

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr width="10px">
      <th scope="col" >STT</th>
      <th scope="col">Mã</th>
      <th scope="col">Tên KH</th>
     
      <th scope="col">Địa chỉ</th>
      <th scope="col">SĐT</th>
      <th scope="col">Tình trạng</th>

      <th scope="col">Hủy đơn</th>
      <th scope="col">Hình thức thanh toán</th>
      <th scope="col">Ghi chú</th>
      <th scope="col">Ngày đặt</th>
      <th scope="col">Chi tiết</th>
    </tr>
  </thead>
  <?php
    $i = 0;
    //đổ dữ liệu đơn hàng
    while($row = mysqli_fetch_array($query_lietke_dh)){
        $i++;



  ?>
  <tbody>
    <style type="text/css">
      .progress{
        width: 300px;
        height: 20px;
        background: #c4c4c4;
      }

      .meter{
          height: 20px;
          background: #000;
          width: 0%;
      }
    </style>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['code_cart'] ?></td>
      <td><?php echo $row['tenkhachhang'] ?></td>
     
      <td><?php echo $row['diachi'] ?></td>
      <td><?php echo $row['dienthoai'] ?></td>
    
      <td><?php if($row['cart_status']==1){

          if($row['huydon']==0) {
              echo '<a class="xulydonhang" data-id='.$i.' href="modules/quanlydonhang/xuly.php?&code='.$row['code_cart'].'">Chờ duyệt đơn hàng...</a>';
              echo '<div class="progress">
                <div class="meter meter_'.$i.'"></div>
              </div>';
            }else{
              echo 'Khách hàng đã hủy đơn.';
            }
          }elseif($row['cart_status']==0){
               echo '<a class="xulydonhang" href="modules/quanlydonhang/xuly.php?&dagiao='.$row['code_cart'].'">Đã giao hàng thành công</a>';
          }else{
            echo 'Đơn hàng thành công';
          }
          ?>
      </td>
    
      <td><?php if($row['huydon']==0){ 
        echo '';
      }elseif($row['huydon']==1){
          echo '';
      }else{
        echo 'Đã hủy';
      }
      ?></td>
      
       <td><?php echo $row['hinhthucthanhtoan'] ?></td>
       <td><?php echo $row['ghichudonhang'] ?></td>
        <td><?php echo $row['ngaydat'] ?></td>
      <td><a href="index.php?action=donhang&query=xemdonhang&code=<?php echo $row['code_cart'] ?>"><button type="button" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></button></a>
</td>

    </tr>
    
  </tbody>
  <?php
    }
  ?>
</table>


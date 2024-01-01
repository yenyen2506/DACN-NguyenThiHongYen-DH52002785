
<p>Giỏ hàng

<?php
  //hiển thị tên người đăng ký
  if(isset($_SESSION['dangky'])){ //nếu tồn tại session đăng ký
    echo 'của '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
    // echo $_SESSION['id_khachhang'];
  }
?>
</p>
<?php
  //khỏi tạo session cart
    if(isset($_SESSION['cart'])){ 
        
    }
?>

<table class="table">
  <thead class="thead-dark">
  <tr>
      <th scope="col">Id</th>
      <th scope="col">Mã sản phẩm</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Giá sản phẩm</th>
      <th scope="col">Thành tiền</th>
      <th scope="col">Quản lý</th>
      
    </tr>
    <?php
    //đổ dữ liệu cart lưu trong session cart
    if(isset($_SESSION['cart'])){
      $i = 0;
      $tongtien = 0;
      foreach($_SESSION['cart'] as $cart_item){
        //tính tổng tiền thanh toán
        $thanhtien = $cart_item['soluong']*$cart_item['giasp']; //tính thành tiền
        $tongtien+=$thanhtien; //tính tổng tiền
        $i++;
  ?>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i; ?></th>
      <td><?php echo $cart_item['masp']; ?></td>
      <td><?php echo $cart_item['tensanpham']; ?></td>
      <td><img src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh']; ?>"width="150px"></td>
      <td>
        <a href="pages/main/themgiohang.php?tru=<?php echo $cart_item['id']?>"><i class="fa fa-minus fa-style" aria-hidden="true"></i></a>
            <?php echo $cart_item['soluong']; ?>
        <a href="pages/main/themgiohang.php?cong=<?php echo $cart_item['id']?>"><i class="fa fa-plus fa-style" aria-hidden="true"></i></a>
      </td>
      <td><?php echo number_format($cart_item['giasp'],0,',','.').' VNĐ'; ?></td>
      <td><?php echo number_format($thanhtien,0,',','.').' VNĐ'; ?></td>
      <td>
        <a href="pages/main/themgiohang.php?xoa=<?php echo $cart_item['id']?>"><i class="fa fa-trash fa-style" aria-hidden="true"></i></a>
      </td>
    </tr>
    <?php
      }
    ?>
    <tr>
      <td  colspan="8">
        <p style="float: left;"><b >Tổng tiền: <?php echo number_format($tongtien,0,',','.').' VNĐ'; ?></b></p><pr/>
        <p style="float: right;"><a href="pages/main/themgiohang.php?xoatatca=1"><i class="xoatatca">Xóa tất cả</i></p>
        
        <div style="clear: both;"></div>
        <?php
        if(isset($_SESSION['dangky'])){ //nếu tồn tại session đăng ký
          ?>
           <p><a href="?quanly=xacnhandonhang"><button type="button" class="btn btn-warning">Tiếp tục</button></a></p>
          <?php
        }else{
          ?>
            <p><a href="index.php?quanly=dangky">Đăng ký để đặt hàng</a></p>
          <?php
            }
          ?>
        

      
        
        
      </td>
   
    
  </tr>
  <?php
  }else{
  ?>
  <tr>
    <td colspan="8" align="center"><a href="index.php"><p>Hiện tại giỏ hàng trống. Bạn có muốn mua hàng?</p></a></td>
    
  </tr>
  <?php
  }
  ?>
    
  </tbody>
</table>










<h4 style="color: blue">Xác nhận đơn hàng và kiểm tra thông tin đặt hàng</h4>
<?php
  //khởi tạo session thanh toan
  //khỏi tạo session cap nhat lai thông tin
  if(!isset($_SESSION['chinhlaithongtin'])){
    unset($_SESSION['capnhatthongtin']); 
  }
  //code đặt hàng vào database
  if(isset($_POST['dathang'])){
    //lấy dữ liệu vận chuyển hàng
    $tenkhachhang = $_POST['hovaten'];
    $email = $_POST['email'];
    $dienthoai = $_POST['dienthoai'];
    $diachi = $_POST['diachi'];
    $ghichudonhang = $_POST['ghichudonhang'];
    if(isset($_POST['ghichudonhang'])){
       $_SESSION['ghichudonhang'] = $ghichudonhang;
    }
    $thanhtoan = $_POST['thanhtoan']; //lấy $post thanh toán
    $level = 0;
        //Lưu thông tin địa chỉ đơn hàng
        $sql_dangky = mysqli_query($mysqli,"UPDATE tbl_dangky SET tenkhachhang='".$tenkhachhang."',email='".$email."',diachi='".$diachi."',dienthoai='".$dienthoai."'");  //cập nhật lại thông tin vạn chuyển
        if($sql_dangky){ //nếu đăng ký
            echo '<p style="color:green">Lưu thông tin đặt hàng thành công!Bây giờ bạn có thể tiến hành đặt hàng</p>';
            $_SESSION['capnhatthongtin'] = 1; 
            $_SESSION['thanhtoan'] = $thanhtoan; //thanh toán set bằng $thanhtoan
    }
  }
  if(isset($_SESSION['dangky'])){
    echo 'xin chào '.'<span style="color:red">'.$_SESSION['dangky'].'</span>';
    // echo $_SESSION['id_khachhang'];
  }
  $sql_khachhang = "SELECT * FROM tbl_dangky where id_dangky='".$_SESSION['id_khachhang']."' LIMIT 1";
  $sql_query =  mysqli_query($mysqli,$sql_khachhang);
  while($row_kh = mysqli_fetch_array($sql_query)){   
      ?>
      <form action="" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Tên khách hàng</label>
        <input type="text" class="form-control" name="hovaten"
        <?php
        if(isset($_SESSION['capnhatthongtin'])){ echo 'readonly'; }else{echo '';} //nếu tồn tại session cập nhật thông tin thì đóng input
        ?>
         value="<?php echo $row_kh['tenkhachhang'] ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="...">
        
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Email</label>
        <input type="email" class="form-control" name="email"
         <?php
        if(isset($_SESSION['capnhatthongtin'])){ echo 'readonly'; }else{echo '';} //nếu tồn tại session cập nhật thông tin thì đóng input
        ?>
          value="<?php echo $row_kh['email'] ?>" readonly id="exampleInputPassword1" placeholder="...">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Điện thoại</label>
        <input type="email" class="form-control" name="dienthoai"
         <?php
        if(isset($_SESSION['capnhatthongtin'])){ echo 'readonly'; }else{echo '';} //nếu tồn tại session cập nhật thông tin thì đóng input
        ?>
         value="<?php echo $row_kh['dienthoai'] ?>" readonly id="exampleInputPassword1" placeholder="...">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Địa chỉ khách hàng</label>
        <input type="text" class="form-control" name="diachi"
         <?php
        if(isset($_SESSION['capnhatthongtin'])){ echo 'readonly'; }else{echo '';} //nếu tồn tại session cập nhật thông tin thì đóng input
        ?>
         value="<?php echo $row_kh['diachi'] ?>" id="exampleInputPassword1" placeholder="...">
      </div>
      
      <div class="form-group">
        <label for="exampleInputPassword1">Ghi chú đơn hàng</label>
        <textarea class="form-control"  name="ghichudonhang"
         <?php
        if(isset($_SESSION['capnhatthongtin'])){ echo 'readonly'; }else{echo '';} //nếu tồn tại session cập nhật thông tin thì đóng input
        ?>
         placeholder="..." rows="5" style="resize: none"><?php
        if(isset($_SESSION['ghichudonhang'])){ //nếu tồn tại session cập nhật thông tin thì đóng input
          echo $_SESSION['ghichudonhang'];
        }else{
          echo '';
        }
        ?></textarea> 
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="thanhtoan" id="exampleRadios1" value="chuyenkhoan" checked>
        <label class="form-check-label" for="exampleRadios1">
          Thanh toán chuyển khoản
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="thanhtoan" id="exampleRadios2" value="nhantienmat">
        <label class="form-check-label" for="exampleRadios2">
          Nhận Tiền mặt
        </label>
      </div>
      <?php
      if(!isset($_SESSION['capnhatthongtin'])){
      ?>
      <button type="submit" name="dathang" class="btn btn-primary">Cập nhật thông tin đặt hàng</button>
      <?php
      }else{
      ?>
      <button type="submit" name="chinhlaithongtin" class="btn btn-warning">Chỉnh lại thông tin</button>
      <?php
      }
      ?>

    </form>
  <?php
  }        
?>
</p>
<?php
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
    </tr>
    <?php
    // đổ dự liệu trong session cart nếu session cart tồn tại sản phẩm
    if(isset($_SESSION['cart'])){
      $i = 0;
      $tongtien = 0;
      foreach($_SESSION['cart'] as $cart_item){
        //tính tổng tiền session cart
        $thanhtien = $cart_item['soluong']*$cart_item['giasp'];
        $tongtien+=$thanhtien;
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
    </tr>
    <?php
      }
    ?>
    <tr>
      <td  colspan="8">
        <p style="float: left;"><b >Tổng tiền: <?php echo number_format($tongtien,0,',','.').' VNĐ'; ?></b></p><pr/>
        <div style="clear: both;"></div>
        <?php
        if(isset($_SESSION['dangky'])){
          ?>
              </div>
            <p><a href="pages/main/thanhtoan.php"><button id="downloadButton" type="button" class="btn btn-success">Đặt hàng</button></a></p>
            <!-- <p><a href="pages/main/thanhtoanmomo.php?tongtien=<?php echo $tongtien ?>"><button id="downloadButton" type="button"  class="btn btn-danger">Thanh toán momo</button></a></p> -->
            <p><a href="?quanly=giohang"><button type="button" class="btn btn-default" style="color: red;">Quay về giỏ hàng</button></a></p>
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
    <td colspan="8" align="center"><p>Hiện tại giỏ hàng trống</p></td>
  </tr>
  <?php
  }
  ?>
    
  </tbody>
  <div id="loading" style="display: none">
 <!--  <img id="loading-image" src="path/to/ajax-loader.gif" alt="Loading..." /> -->
  </div>
     <div id="dialog" title="Đặt hàng">
              <div class="progress-label">Đang bắt đầu quá trình đặt hàng,xin vui lòng không tắt trình duyệt...
                <img width="50%" src="https://www.icegif.com/wp-content/uploads/loading-icegif-1.gif">
              </div>
            <!--   <div id="progressbar"></div> -->
            </div>
</table>










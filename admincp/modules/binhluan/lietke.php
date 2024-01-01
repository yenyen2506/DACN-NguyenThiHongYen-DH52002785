<?php
    //liệt kê tất cả bình luận sản phẩm
    $sql_lietke = "SELECT * FROM tbl_binhluan,tbl_sanpham WHERE tbl_binhluan.id_sanpham=tbl_sanpham.id_sanpham ORDER BY tbl_binhluan.ngay_gio DESC";
    $query_lietke = mysqli_query($mysqli,$sql_lietke); //đổ dữ liệu tất cả bluan

?>
</br>

<p><b>Liệt kê bình luận</b></p>

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên bình luận</th>
      <th scope="col">Bình luận</th>
      <th scope="col">Sản phẩm bình luận</th>
      <th scope="col">Ngày giờ</th>
      <th scope="col">Quản lý</th>
    
    </tr>
    <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke)){
        $i++;

  ?>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['tenbinhluan'] ?></td>
      <td><?php echo $row['binhluan'] ?></td>
      <td><?php echo $row['tensanpham'] ?></td>
      <td><?php echo $row['ngay_gio'] ?></td>
      
      <td>

      
        <?php
        
        if($row['hienthi']==0){ 
          
        ?>
        
        <select class="duyetbinhluan">
          <option data-id_binhluan="<?php echo $row['binhluan_id'] ?>" selected value="0">Không duyệt</option>
          <option  data-id_binhluan="<?php echo $row['binhluan_id'] ?>" value="1">Duyệt</option>
        </select>
        <?php
        } else{
        ?>
        
         <select class="duyetbinhluan">
          <option   data-id_binhluan="<?php echo $row['binhluan_id'] ?>" value="0">Không duyệt</option>
          <option  data-id_binhluan="<?php echo $row['binhluan_id'] ?>" selected value="1">Duyệt</option>
        </select>
        <?php
        } 
        ?>

      </td>
     
    </tr>
    
  </tbody>
  <?php
    }
  ?>
</table>


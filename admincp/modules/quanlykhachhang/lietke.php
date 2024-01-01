<?php
  //liệt kê tất cả khách hàng từ database
    $sql_lietke_kh = "SELECT * FROM tbl_dangky";
    $query_lietke_kh = mysqli_query($mysqli,$sql_lietke_kh);//truy vấn tất cả khách hàng

?>
</br>

<p><b>Liệt kê danh sách khách hàng </b></p>

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Họ và tên</th>
      <th scope="col">Username</th>

      <th scope="col">Số điện thoại</th>
      <th scope="col">Email</th>
      <th scope="col">Địa chỉ</th>
      <th scope="col">Quản lý</th>
    
    
    
    </tr>
    <?php
    $i = 0;
    //đổ dữ liệu khách hàng từ db
    while($row_kh = mysqli_fetch_array($query_lietke_kh)){ //đổ danh sách khách hàng có được
        $i++;



  ?>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row_kh['tenkhachhang'] ?></td>
      <td><?php echo $row_kh['user_name'] ?></td>

      <td><?php echo $row_kh['dienthoai'] ?></td>
      <td><?php echo $row_kh['email'] ?></td>
      <td><?php echo $row_kh['diachi'] ?></td>
      <td>
        <?php 
        if($row_kh['status']==0){
        ?>
        <a href="modules/quanlykhachhang/xuly.php?id_dangky=<?php echo $row_kh['id_dangky']?>&status=1"><button type="button" class="btn btn-danger">Chặn</button></a>  
        <?php
        }else{
        ?>
        <a href="modules/quanlykhachhang/xuly.php?id_dangky=<?php echo $row_kh['id_dangky']?>&status=0"><button type="button" class="btn btn-primary">Bỏ chặn</button></a>  
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




<?php
  //code liệt kê sản phẩm 
    $sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE  tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc  ORDER BY id_sanpham DESC";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp); //truy vấn liệt kê tất cả sản phẩm

?>
</br>
<p><b>Liệt kê sản phẩm</b></p>

<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên sản phẩm</th>
      <th scope="col">Hình ảnh</th>
      <th scope="col">Giá</th>
      <th scope="col">Số lượng</th>
      <th scope="col">Danh mục</th>
      <th scope="col">Mã sản phẩm</th>
      <!-- <th scope="col">Tóm tắt</th> -->
      <th scope="col" width="10%">Quản lý</th>
      
    </tr>
  </thead>
  <?php
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_sp)){ //đổ dữ liệu có được
        $i++;
  ?>
  <tbody>

    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['tensanpham'] ?></td>
      <td><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="130px"></td>
      <td><?php echo number_format($row['giasp'],0,',','.').' VNĐ' ?></td>
      <td><?php echo $row['soluong'] ?></td>
      <td><?php echo $row['tendanhmuc'] ?></td>
      <td><?php echo $row['masp'] ?></td>
      <td><a onclick="return confirm('Bạn có muốn xóa sản phẩm khi có bình luận?')" href="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i>
</button></a>  <a href="?action=quanlysp&query=sua&idsanpham=<?php echo $row['id_sanpham']?>"><button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
</td>
    </tr>
  </tbody>
  <?php
    }
  ?>
</table>
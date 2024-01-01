<?php
//liệt kê danh mục sản phẩm
    $sql_lietke_danhmucsp = "SELECT * FROM tbl_danhmuc ORDER BY thutu DESC";
    $query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);//truy vấn danh mục sp

?>
</br>

<p><b>Liệt kê danh mục sản phẩm</b></p>

<table class="table table-bordered">
  <?php
  if(isset($_GET['message'])){
    echo '<span class="text-danger text-center">'.$_GET['message'].'</span>';
  } 
  ?>
  <thead class="thead-dark">
    <tr>
      <th scope="col">STT</th>
      <th scope="col">Tên danh mục</th>
      <th scope="col">Quản lý</th>
    
    </tr>
    <?php
    //Đổ danh mục sản phẩm
    $i = 0;
    while($row = mysqli_fetch_array($query_lietke_danhmucsp)){ //liệt kê tất cả danh mục sp
        $i++;



  ?>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $i ?></th>
      <td><?php echo $row['tendanhmuc'] ?></td>
      <td>
        <a href="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $row['id_danhmuc']?>"><button type="button" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>  
        
        <a href="?action=quanlydanhmucsanpham&query=sua&iddanhmuc=<?php echo $row['id_danhmuc']?>"><button type="button" class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
</td>
      
    </tr>
    
  </tbody>
  <?php
    }
  ?>
</table>




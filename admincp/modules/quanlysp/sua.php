<?php
  //code sửa một sản phẩm
    $sql_sua_sp = "SELECT * FROM tbl_sanpham WHERE id_sanpham='$_GET[idsanpham]' LIMIT 1";
    $query_sua_sp = mysqli_query($mysqli,$sql_sua_sp); //truy vấn sửa sản phẩm

?>


<?php
while($row = mysqli_fetch_array($query_sua_sp)){ //đổ dữ liệu có được
?>

<h2 class="tieude">Sửa sản phẩm</h2>

<div class="sp">

  <form method="POST" action="modules/quanlysp/xuly.php?idsanpham=<?php echo $row['id_sanpham']?>" enctype="multipart/form-data">
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Tên sản phẩm</label>
        <input type="text" value="<?php echo $row['tensanpham'] ?>" class="form-control" id="inputEmail4" placeholder=". . ." name="tensanpham">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPassword4">Mã sản phẩm</label>
        <input type="text" value="<?php echo $row['masp'] ?>" class="form-control" id="inputPassword4" placeholder=". . ."  name="masp">
      </div>
    </div>
    
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Giá</label>
        <input type="text" value="<?php echo $row['giasp'] ?>" name="giasp" class="form-control" id="inputEmail4" placeholder=". . .">
      </div>
      <div class="form-group col-md-4">
        <label for="inputPassword4">Số lượng</label>
        <input type="text" value="<?php echo $row['soluong'] ?>" name="soluong" class="form-control" id="inputPassword4" placeholder=". . .">
      </div>
    </div>

    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">Hình ảnh</label>
        <input type="file" name="hinhanh" >
        <img src="modules/quanlysp/uploads/<?php echo $row['hinhanh'] ?>" width="130px">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="inputEmail4">Danh mục</label>
        <select name="danhmuc">
            <?php
              $sql_danhmuc = "SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc DESC";
              $query_danhmuc = mysqli_query($mysqli,$sql_danhmuc);
              while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                if($row_danhmuc['id_danhmuc']==$row['id_danhmuc']){
            ?>
            <option selected value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
            <?php
              }else{
            ?>
            <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
            <?php
              }
            }
            ?>
          </select>
      </div>
    <button type="submit" class="btn btn-primary" name="suasanpham">Sửa sản phẩm</button>
  </form>
  <?php
  }
  ?>

</div>
































 
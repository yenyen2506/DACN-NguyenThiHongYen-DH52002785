<h2 class="tieude">Thêm sản phẩm</h2>

<div class="sp">

<form method="POST" action="modules/quanlysp/xuly.php" enctype="multipart/form-data">
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Tên sản phẩm</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder=". . ." name="tensanpham">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Mã sản phẩm</label>
      <input type="text" class="form-control" id="inputPassword4" placeholder=". . ."  name="masp">
    </div>
  </div>
  
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Giá</label>
      <input type="text" class="form-control" name="giasp" id="inputEmail4" placeholder=". . .">
    </div>
    <div class="form-group col-md-4">
      <label for="inputPassword4">Số lượng</label>
      <input type="text" class="form-control" name="soluong" id="inputPassword4" placeholder=". . .">
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Hình ảnh</label>
      <input type="file" name="hinhanh" size="60">
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
          ?>
          <option value="<?php echo $row_danhmuc['id_danhmuc']?>"><?php echo $row_danhmuc['tendanhmuc']?></option>
          <?php
          }
          ?>
        </select>
    </div>
  </div>

    
  <button type="submit" class="btn btn-primary" name="themsanpham">Thêm sản phẩm</button>
</form>

</div>

















<?php
//sửa danh mục sản phẩm
    $sql_sua_danhmucsp = "SELECT * FROM tbl_danhmuc WHERE id_danhmuc='$_GET[iddanhmuc]' LIMIT 1";
    $query_sua_danhmucsp = mysqli_query($mysqli,$sql_sua_danhmucsp); //truy vấn dửa 1 danh mục sp

?>
<p>Sửa danh mục sản phẩm</p>

<div class="dmsp">
  <form method="POST" action="modules/quanlydanhmucsp/xuly.php?iddanhmuc=<?php echo $_GET['iddanhmuc']?>">
      <?php
            while($dong = mysqli_fetch_array($query_sua_danhmucsp)){ //liệt kê sửa 1 danh mục sp
      ?>
    <div class="form-group row">
      <label for="inputEmail3" class="col-sm-1 col-form-label">Danh mục</label>
      <div class="col-sm-4">
      <input type="text" value="<?php echo $dong['tendanhmuc']?>" name="tendanhmuc" class="form-control">
      </div>
    </div>
    <!-- <div class="form-group row">
      <label for="inputPassword3" class="col-sm-1 col-form-label">Số thứ tự</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputPassword3" placeholder="Số thứ tự" name="thutu">
      </div>
    </div> -->
    
  
    <div class="form-group row">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary" name="suadanhmuc">Sửa danh mục</button>
      </div>
    </div>
    <?php
        }
    ?>
  </form>
</div>











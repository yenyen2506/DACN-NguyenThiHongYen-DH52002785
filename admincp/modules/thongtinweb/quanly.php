<p>Quản lý thông tin website</p>
<?php
    $sql_lh = "SELECT * FROM tbl_lienhe WHERE id=1"; //quản lý thông tin liên hệ id=1
    $query_lh = mysqli_query($mysqli,$sql_lh);//truy vấn thông tin

?>




<div class="sp">
<?php
    while($dong = mysqli_fetch_array($query_lh)){ //đổ dữ liệu đã có
?>
<form method="POST" action="modules/thongtinweb/xuly.php?id=<?php echo $dong['id']?>" enctype="multipart/form-data">
  
    
  
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCity">Thông tin liên hệ</label>
     <textarea row="10" name="thongtinlienhe" style="resize: none"><?php echo $dong['thongtinlienhe'] ?></textarea>
    </div>
  </div>
  
    
  <button type="submit" class="btn btn-primary" name="submitlienhe">Cập nhật</button>
<?php
    }
?>
</form>

</div>
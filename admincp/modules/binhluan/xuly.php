<?php
//xử lý hiển thị bình luận
include('../../config/config.php');
if(isset($_POST['hienthi']) ){ //xử lý hiển thị bình luận
  $hienthi = $_POST['hienthi'];
  $binhluan_id = $_POST['binhluan_id'];
  $sql_update = "UPDATE tbl_binhluan SET hienthi='".$hienthi."' WHERE binhluan_id='$binhluan_id'";
  //update bình luận theo hiển thị hoặc ko hiển thị
  mysqli_query($mysqli,$sql_update); //truy vấn dữ liệu
}

?>
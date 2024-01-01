


<?php
	//lấy thông tin liên hệ
    $sql_lh = "SELECT * FROM tbl_lienhe WHERE id=1";
    $query_lh = mysqli_query($mysqli,$sql_lh); //truy vấn dữ liệu

?>




<div class="sp">
<?php
//đổ thông tin liên hệ ra
    while($dong = mysqli_fetch_array($query_lh)){ //do dữ liệu ra $dong
?>
  
    <p><?php echo $dong['thongtinlienhe'] ?></p>
  
  
  
    
<?php
    }
?>


</div>
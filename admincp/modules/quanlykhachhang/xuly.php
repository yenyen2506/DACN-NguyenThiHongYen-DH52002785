
<?php
    include('../../config/config.php');
    //thêm dữ liệu khách hàng
    //$tenkhachhang = $_POST['tenkhachhang'];
    if(isset($_GET['id_dangky'])){
    	$id_dangky = $_GET['id_dangky'];
    	$status = $_GET['status'];
     	$sql_chan = "UPDATE tbl_dangky SET status='".$status."' WHERE id_dangky='".$id_dangky."'";
        mysqli_query($mysqli,$sql_chan); //truy vấn xóa khách hàng
        header('Location:../../index.php?action=quanlykhachhang&query=lietke'); //quaay về liệt kê khách hàng
    }
    
?>
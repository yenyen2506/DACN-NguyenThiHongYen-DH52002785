<?php
    include('../../config/config.php');

    $thongtinlienhe = $_POST['thongtinlienhe']; 
    $id = $_GET['id'];
   if(isset($_POST['submitlienhe'])){ //cập nhật thông tin submit
        //sua
        $sql_update = "UPDATE tbl_lienhe SET thongtinlienhe='".$thongtinlienhe."' WHERE id='$id' "; //cập nhật thông tin id=1
        mysqli_query($mysqli,$sql_update); //truy vấn
        header('Location:../../index.php?action=quanlyweb&query=capnhat'); //quay về cập nhật thông tin
    }

?>
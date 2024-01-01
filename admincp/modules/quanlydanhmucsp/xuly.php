<?php
    include('../../config/config.php');

   
    if(isset($_POST['themdanhmuc'])){
        $tenloaisp = $_POST['tendanhmuc'];
        $thutu = $_POST['thutu'];
        //them danh mục
        $sql_them = "INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUE('".$tenloaisp."','".$thutu."')";
        mysqli_query($mysqli,$sql_them); //truy vấn thêm
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them'); //quay về trang thêm
    }elseif(isset($_POST['suadanhmuc'])){
        $tenloaisp = $_POST['tendanhmuc'];
        $thutu = $_POST['thutu'];
        //sua danh mục
        $sql_update = "UPDATE tbl_danhmuc SET tendanhmuc='".$tenloaisp."',thutu='".$thutu."' WHERE id_danhmuc='$_GET[iddanhmuc]'";
        mysqli_query($mysqli,$sql_update); //truy vấn cập nhật
        header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');//quay về trang thêm
    }else{
        //xóa danh mục
        $id = $_GET['iddanhmuc'];
        $sql_sp = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham WHERE id_danhmuc='".$id."'");
        // console.log()
         $rows = mysqli_num_rows($sql_sp);
        
        if($rows>0){
            $message = urlencode("Danh mục đã có SẢN PHẨM vui lòng không được xóa.");
            header('Location:../../index.php?action=quanlydanhmucsanpham&query=them&message='.$message);
        }else{
            $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc='".$id."'";
            mysqli_query($mysqli,$sql_xoa); //truy vấn xóa 1 danh mục
            header('Location:../../index.php?action=quanlydanhmucsanpham&query=them');
        }
        
    }


?>
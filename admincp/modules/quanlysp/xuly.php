<?php
    include('../../config/config.php');

    
    if(isset($_POST['themsanpham'])){//lấy dữ liệu qua form thêm sp
        $tensanpham = $_POST['tensanpham'];
        $masp = $_POST['masp'];
        $giasp = $_POST['giasp'];
        $soluong = $_POST['soluong'];
        //xulyhinhanh
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh = time().'_'.$hinhanh;
        $danhmuc = $_POST['danhmuc'];
    

        //them san pham
        $sql_them = "INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,id_danhmuc) VALUE('".$tensanpham."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$danhmuc."')";
        mysqli_query($mysqli,$sql_them);
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh); //upload ảnh vào thư mục uploads
        header('Location:../../index.php?action=quanlysp&query=them'); //quay về trang thêm
        }elseif(isset($_POST['suasanpham'])){
        $tensanpham = $_POST['tensanpham'];
        $masp = $_POST['masp'];
        $giasp = $_POST['giasp'];
        $soluong = $_POST['soluong'];
        //xulyhinhanh
        $hinhanh = $_FILES['hinhanh']['name'];
        $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
        $hinhanh = time().'_'.$hinhanh;
        $danhmuc = $_POST['danhmuc'];
    
        //sua san pham
        if(!empty($_FILES['hinhanh']['name'])){ //nếu có chọn ảnh
            move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);//upload ảnh vào thư mục uploads
           

            $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',hinhanh='".$hinhanh."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'"; //update dữ liệu có ảnh
            //xoa hinh anh cu
            $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' LIMIT 1";
            $query = mysqli_query($mysqli,$sql);
            while($row = mysqli_fetch_array($query)){
                unlink('uploads/'.$row['hinhanh']); //unlink ảnh củ
            }

            // mysqli_query($mysqli,$sql_update);
            // header('Location:../../index.php?action=quanlysp&query=them');
            
        }else {
            $sql_update = "UPDATE tbl_sanpham SET tensanpham='".$tensanpham."',masp='".$masp."',giasp='".$giasp."',soluong='".$soluong."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'"; //update dữ liệu ko có ảnh
        }
        mysqli_query($mysqli,$sql_update); //truy vấn
            header('Location:../../index.php?action=quanlysp&query=them'); //quay về trang thêm
        
    
    }else{
        //xóa một sản phẩm
       
        $id = $_GET['idsanpham'];
        $sql = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id' LIMIT 1"; //chọn sp dựa vào id
        $query = mysqli_query($mysqli,$sql);//truy vấn
        while($row = mysqli_fetch_array($query)){
            if(file_exists('uploads/'.$row['hinhanh'])){
                 unlink('uploads/'.$row['hinhanh']);//unlink hình ảnh sp
            }
        }
        
        $sql_xoa = "DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'"; //xóa sp dựa vào id
        $sql_xoa_binhluan = "DELETE FROM tbl_binhluan WHERE id_sanpham='".$id."'"; //truy van xóa binh luan
        mysqli_query($mysqli,$sql_xoa); //truy vấn xóa
        mysqli_query($mysqli,$sql_xoa_binhluan); //truy vấn xóa binh luan
        header('Location:../../index.php?action=quanlysp&query=them'); //quay về trang thêm
    }


?>
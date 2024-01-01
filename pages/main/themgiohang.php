<?php
session_start();
include('../../admincp/config/config.php');
//công số lượng vào giỏ hàng
if(isset($_GET['cong'])){ 
    $id=$_GET['cong']; //lấy id session giỏ hàng
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){
            //nếu sản phẩm trùng hoặc đã thêm
            $product []=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
            $_SESSION['cart'] = $product;
        }else{
                //nếu sản phẩm nhỏ hơn 9 thì +1 vào số lượng ,tối đa là 10 sản phẩm
                if($cart_item['soluong']<=9){
                    $tangsoluong = $cart_item['soluong'] + 1; //tang so luong len 1
                    $product []=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);

                }else{ 
                    $product []=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); //so luong sản phẩm mới thêm

                }
                $_SESSION['cart'] = $product; //lưu giỏ hàng vi71 session cart
        }
        
    }
    header('Location:../../index.php?quanly=giohang'); //quay về giỏ hàng
}

//trừ số lượng sản phẩm có trong giỏ hàng
if(isset($_GET['tru'])){
    $id=$_GET['tru']; //lấy id trong mảng giỏ hàng
    foreach($_SESSION['cart'] as $cart_item){ //đổ dữ liệu session giỏ hàng
        if($cart_item['id']!=$id){
            $product []=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); // nếu khác thì dữ liệu để nguyên
            $_SESSION['cart'] = $product;
        }else{
            
                if($cart_item['soluong']>1){
                    $tangsoluong = $cart_item['soluong'] - 1; //còn không thì trừ số lượng đi 1
                    $product []=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$tangsoluong,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);

                }else{
                    $product []=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); //set lại giỏ hàng

                }
                $_SESSION['cart'] = $product; //lưu giỏ hàng session
        }
        
    }
    header('Location:../../index.php?quanly=giohang'); //quay về giỏ hàng
}


//Xóa 1 sản phẩm
if(isset($_SESSION['cart'])&&isset($_GET['xoa'])){
    $id=$_GET['xoa']; //lấy id mảng giỏ hàng để xóa
    foreach($_SESSION['cart'] as $cart_item){
        if($cart_item['id']!=$id){ //nếu id khác id trong mảng
            $product []=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']); //thì xóa dữ liệu và lưu lại session
        }
        $_SESSION['cart'] =$product; //lưu lại session cart
        header('Location:../../index.php?quanly=giohang'); //quay về giỏ hàng
    }
}
//Xóa tất cả sản phẩm trong giỏ hàng
if(isset($_GET['xoatatca'])&&$_GET['xoatatca']==1){ //xóa tất cả
    unset($_SESSION['cart']); //unset toàn bộ session giỏ hàng
    header('Location:../../index.php?quanly=giohang'); //quay về giỏ hàng
}

//Lấy dữ liệu của sản phẩm
if(isset($_POST['themgiohang'])){ //nếu có submit thêm dữ liệu
    //session_destroy();
    $id=$_GET['idsanpham']; // lấy ra id sp cần thêm
    $soluong=1; //so luong mac dinh 1
    $sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1"; //lấy ra sản phẩm dựa vào id sp
    $query = mysqli_query($mysqli,$sql);//truy vấn dữ liệu
    $row = mysqli_fetch_array($query); //đổ dữ liệu
    if($row){ //nếu có dữ liệu
        $new_product=array(array('tensanpham'=>$row['tensanpham'],'id'=>$id,'soluong'=>$soluong,'giasp'=>$row['giasp'],'hinhanh'=>$row['hinhanh'],'masp'=>$row['masp'])); //lưu session giỏ hàng
        //kiem tra session gio hang ton tai
        if(isset($_SESSION['cart'])){ //kiểm tra tồn tại sp trong giỏ hàng
            $found = false;
            foreach($_SESSION['cart'] as $cart_item){
                // neu du lieu bi trùng
                if($cart_item['id']==$id){ //nếu có sp trong giỏ hàng rồi thì số luong +1
                    $product []=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$soluong+1,'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);
                    $found = true;
                }else {
                    //neu dữ liệu ko dùng thì thêm mới sp vào giỏ hàng
                    $product []=array('tensanpham'=>$cart_item['tensanpham'],'id'=>$cart_item['id'],'soluong'=>$cart_item['soluong'],'giasp'=>$cart_item['giasp'],'hinhanh'=>$cart_item['hinhanh'],'masp'=>$cart_item['masp']);

                }
            }
        if($found==false){
            // lien ket dulieu new product voi product
            $_SESSION['cart']=array_merge($product,$new_product);
        }else {
            $_SESSION['cart']=$product; //session cart giữ nguyên
        }

        }else {
            $_SESSION['cart']=$new_product; //tạo mới session cart với sp mới
        }
    }
    header('Location:../../index.php?quanly=giohang'); //quay về giỏ hàng
    //print_r($_SESSION['cart']);
}

?>
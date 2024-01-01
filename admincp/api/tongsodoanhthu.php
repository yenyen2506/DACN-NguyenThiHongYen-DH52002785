<?php

// chuan bi cau lenh
$sql="SELECT SUM(doanhthu) as tongdoanhthu FROM tbl_thongke;";

//thuc thu cau lenh
$result = mysqli_query($mysqli, $sql);

//phan tich du lieu
$data = mysqli_fetch_array($result, MYSQLI_ASSOC);

//var_dump($data);

//chuyen thanh chuan json tra ve
//arrar --> json
$json = json_encode($data);
echo number_format($data['tongdoanhthu'],0,',','.').'đ'
?>
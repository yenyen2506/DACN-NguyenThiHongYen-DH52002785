<?php
session_start();
include("config/config.php");
if(!isset($_SESSION['dangnhap'])){
    header('Location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà hàng Việt Food</title>
    <link rel="stylesheet" type="text/css" href="css/styleadmincp.css">
    <link rel="stylesheet" type="text/css" href="css/click.css">
    <link rel="stylesheet" type="text/css" href="admincp/dt/vender/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="admincp/slide/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">


    

    <script src="js/mdb.js"></script>
<!--     <script type="text/javascript" src="dt/vender/jquery/jquery-3.5.1.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="dt/vender/bootstrap/css/bootstrap.min.css">
    <script src="js/click.js"></script>
   
    <style>
        .list-group-item list-group-item-actiona{
            display: inline-block;
        }
        .click{
            background-color: red;
}
        .tieude{
                font-family: "Courier", "Courier New", sans-serif;
            }
              #progressbar {
    margin-top: 20px;
  }
 
  .progress-label {
    font-weight: bold;
    text-shadow: 1px 1px 0 #fff;
  }
 
  .ui-dialog-titlebar-close {
    display: none;
  }
      #loading {
  position: fixed;
  display: block;
  width: 100%;
  height: 100%;
  top: 0;
  left: 0;
  text-align: center;
  opacity: 0.7;
  background-color: #fff;
  z-index: 99;
}

#loading-image {
  position: absolute;
  top: 100px;
  left: 240px;
  z-index: 100;
}

    </style>
</head>

<body>


    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php include("modules/header.php");  //gọi trang header?>
            </div> 
        </div>

        <!-- <div class="row">
            <div class="col-md-12">
                <?php include("modules/menu.php");?>
            </div>
        </div> -->

        <div class="row">
            <div class="col-md-2" >
                <div class="sb">
                <?php include("modules/sidebar/sidebar.php"); //gọi trang sidebar?>
                </div>
            </div>
            <div class="col-md-10">
                <div class="main">
                <?php include("modules/main.php"); //gọi trang main?>
                </div>
            </div>
         </div>
<br>
<br>
<br>
<br>
<br>
         <div class="row">
            <div class="col-md-12" >
            <div class="col-md-12">
                <?php include("modules/footer.php");?>
            </div>
         </div>
    
    </div>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
          //ckeditor cho các thành phần mang Id có tên trong ngoặc
         CKEDITOR.replace( 'thongtinlienhe' );
    </script>
    

    <script type="text/javascript" src="admincp/dt/vender/jquery/jquery-3.5.1.min.js"></script>
	<!-- <script type="text/javascript" src="js/popper.min.js"></script> -->
	<script type="text/javascript" src="admincp/dt/vender/bootstrap/js/bootstrap.min.js"></script>
	<!-- <script type="text/javascript" src="js/script.js"></script> -->
    <script src="js/mdb.js"></script>

    <script src="js/click.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
   

  









<script type="text/javascript">
  $('.duyetbinhluan').on('change', function() {
    var hienthi = $(this).val(); //lấy thông tin hiển thị hoặc ko
    var binhluan_id = $(this).find(':selected').data('id_binhluan') //id bình luận đã chọn
   
     $.ajax({
                    url:"modules/binhluan/xuly.php", //cập nhật hiển thị bình luận bằng Ajax
                    method:"POST", //phương thức POST
                   
                    data:{hienthi:hienthi,binhluan_id:binhluan_id},
                    success:function(data)
                        {
                            
                            alert('Cập nhật tình trạng bình luận thành công.'); //thành công
                        }   
                });
  });
</script>
     <script type="text/javascript">
             $('.xulydonhang').click(function(){ //code xử lý đơn hàng đã đặt
                var id = $(this).data('id');
                $('.meter_'+id).animate({width:'100%'}, 3500, 'swing'); //animation xử lý
              

            });
     </script>


<!-- thong ke-->
        <script>
            $(function(){
                //ajax goi lay dl tong so san pham
                $.ajax('/luanvan/admincp/api/tongsosanpham.php/',{ //tổng sp
                    success: function(data){

                        var obj = JSON.parse(data);

                        //cap nhat giao dien
                        $('#baocaosanpham_sl').html(obj.soluong);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        $('#baocaosanpham_sl').html('Không xử lý được !');
                    }
                });

                //ajax goi lay dl tong so khach hang
                $.ajax('/luanvan/admincp/api/tongsokhachhang.php/',{//tổng số khách hàng
                    success: function(data){
                        var obj = JSON.parse(data);

                        //cap nhat giao dien
                        $('#baocaokhachhang_sl').html(obj.soluong);
                    },
                    error: function(jqXHR, textStatus, errorThrown){

                    }
                });


                //ajax goi lay dl tong so đơn hàng
                $.ajax('/luanvan/admincp/api/tongsodonhang.php/',{ //tổng đơn hàng
                    success: function(data){
                        var obj = JSON.parse(data);

                        //cap nhat giao dien
                        $('#baocaodonhang_sl').html(obj.soluong);
                    },
                    error: function(jqXHR, textStatus, errorThrown){

                    }
                });

                //ajax goi lay dl tong so doanhthu
                debugger; 
                $.ajax('/luanvan/admincp/api/tongsodoanhthu.php/',{ //tổng doanh thu
                    success: function(data){
                        var obj = JSON.parse(data);

                        

                        //cap nhat giao dien
                        $('#baocaodoanhthu_sl').html(obj.soluong.toLocaleString('vi-VN', {
                                            style: 'currency',
                                            currency: 'VND'
                                        })
                                 );
                    },
                    error: function(jqXHR, textStatus, errorThrown){

                    }
                });







            });


        </script>
</body>
</html>
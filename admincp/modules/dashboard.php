<h3>Bảng tin</h3>
<div class="row">


      <!--Tổng số sp-->
        <div class="col-md-3 text-center" >
          <div class="card text-white bg-primary mb-3" >
            <div class="card-header">Tổng số sản phẩm</div>
            <div class="cart-body">
              <h2 id="baocaosanpham_s2"><?php include("api/tongsosanpham.php");?></h2>
            </div>
          </div>
        </div>

      <!--Tổng số đơn hàng-->
      <div class="col-md-3 text-center" >
          <div class="card text-white bg-success mb-3">
            <div class="card-header">Tổng số đơn hàng</div>
            <div class="cart-body">
              <h2 id="baocaodonhang_sl"><?php include("api/tongsodonhang.php");?></h2>
            </div>
          </div>
        </div>



        <!--Tổng số khách hàng-->
      <div class="col-md-3 text-center">
          <div class="card text-white bg-warning mb-3">
            <div class="card-header">Tổng số khách hàng</div>
            <div class="cart-body">
              <h2 id="baocaokhachhang_sl"><?php include("api/tongsokhachhang.php");?></h2>
            </div>
          </div>
        </div>

         <!--Tổng số doanh thu-->
      <div class="col-md-3 text-center" >
          <div class="card text-white bg-danger mb-3" >
            <div class="card-header" >Tổng số doanh thu</div>
            <div class="cart-body" >
              <h2 class="baocao" id="baocaodoanhthu_sl"><?php include("api/tongsodoanhthu.php");?></h2>
            </div>
          </div>
        </div>




</div>


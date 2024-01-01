<?php
    if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
        unset($_SESSION['dangnhap']);
        header('Location:login.php');
    }


?>
<div class="header">
    <nav class="navbar navbar-expand-sm navbar-dark" style=" width: 100%; height: 90px; background-color:#212121;">
        <div class="col-md-4" style="height: 80px;text-align: left;">
            <a href="index.php"><img src="img/Black and White Modern Restaurant Logo.png" style="height: 100px;width: 150px;;margin-top: -10px"></a>
</div>

    </nav>
        
</div>






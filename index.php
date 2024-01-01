<?php 
session_start();
include("admincp/config/config.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <link rel="icon" href="images/logoo2.jpg" type="image/x-icon>"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/giohang.css">
    <link rel="stylesheet" type="text/css" href="css/tintuc.css">
    <link rel="stylesheet" type="text/css" href="css/chitietsanpham.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/camon.css">
    <link rel="stylesheet" type="text/css" href="css/lated.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/fontawesome.min.css">
   
    <title>Nhà Hàng Việt Food</title>
   
	<link rel="stylesheet" type="text/css" href="slide/font-awesome/css/font-awesome.css">
    
    
   
    <!-- <link rel="stylesheet" type="text/css" href="bt/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="dt/vender/bootstrap/css/bootstrap.min.css">
    <style>

        body {
            font-family: Arial, "Helvetica Neue", Helvetica, sans-serif;
        }
        .col-md-2{
            margin-top: 10px;

        }
        .col-md-10{
            margin-top: 10px;

        }
        .km{
            width: 100%;
            height: 95%
        }
        .SPMN{
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
    <?php
        require('carbon/autoload.php');
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php include("pages/header.php");  //Gọi trang header?> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php include("pages/menu.php"); //Gọi trang menu?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2" >
                <?php include("pages/sidebar/sidebar.php"); //Gọi trang sidebar?>
            </div>
            <div class="col-md-10">
                <?php include("pages/main.php"); //Gọi trang main?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <?php include("pages/footer.php"); //Gọi trang footer?>
            </div>
        </div>
        
    </div>

        
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            // Show the first tab and hide the rest
            $('#tabs-nav li:first-child').addClass('active');
            $('.tab-content').hide();
            $('.tab-content:first').show();

            // Click function
            $('#tabs-nav li').click(function(){
            $('#tabs-nav li').removeClass('active');
            $(this).addClass('active');
            $('.tab-content').hide();
            
            var activeTab = $(this).find('a').attr('href');
            $(activeTab).fadeIn();
            return false;
            });
        </script>

        <script type="text/javascript" src="dt/vender/jquery/jquery-3.5.1.min.js"></script>
        <!-- <script type="text/javascript" src="js/popper.min.js"></script> -->
        <script type="text/javascript" src="dt/vender/bootstrap/js/bootstrap.min.js"></script>
        <!-- <script type="text/javascript" src="js/script.js"></script> -->
        
        <script type="text/javascript" src="js/click.js"></script>



                        <!-- Messenger Plugin chat Code -->
                    <div id="fb-root"></div>

                <!-- Your Plugin chat code -->
                <div id="fb-customer-chat" class="fb-customerchat">
                </div>

                <script>
                  //chat box pluglin của facebook
                        var chatbox = document.getElementById('fb-customer-chat');
                        chatbox.setAttribute("page_id", "105897935220862");
                        chatbox.setAttribute("attribution", "biz_inbox");

                        window.fbAsyncInit = function() {
                            FB.init({
                            xfbml            : true,
                            version          : 'v12.0'
                            });
                        };

                        (function(d, s, id) {
                            var js, fjs = d.getElementsByTagName(s)[0];
                            if (d.getElementById(id)) return;
                            js = d.createElement(s); js.id = id;
                            js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                            fjs.parentNode.insertBefore(js, fjs);
                        }(document, 'script', 'facebook-jssdk'));
                </script>
            <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>


            
        <script>
            $("#downloadButton").click(function(){
                $("#loading").css("display", "block");
            })
  $( function() {
    //thanh quá trình xử lý việc đặt hàng
    var progressTimer,
      progressbar = $( "#progressbar" ),
      progressLabel = $( ".progress-label" ),
      //nút hủy quá trình đặt hàng
      dialogButtons = [{
        text: "Cancel Progress",
        click: closeDownload
      }],
      //hiển thị thông tin quá trình đang đặt hàng
      dialog = $( "#dialog" ).dialog({
        autoOpen: false,
        closeOnEscape: false,
        resizable: false,
        // buttons: dialogButtons,
        open: function() {
          //thời gian hiển thị 2s
          progressTimer = setTimeout( progress, 2000 );
        },
        //trước khi đóng bảng thông báo
        beforeClose: function() {
          downloadButton.button( "option", {
            disabled: false,
            label: "Xử lý đơn hàng"
          });
        }
      }),
      downloadButton = $( "#downloadButton" )
        .button()
        .on( "click", function() {
          $( this ).button( "option", {
            disabled: true,
            label: "Loading..."
          });
          dialog.dialog( "open" );
        });
  //Thông báo đang trong quá trình xử lý đơn hàng
    progressbar.progressbar({
      value: false,
      change: function() {
        progressLabel.text( "Đang trong quá trình đặt đơn hàng: " + progressbar.progressbar( "value" ) + "%" );
      },
      //Hoàn thành đơn hàng
      complete: function() {
        progressLabel.text( "Complete!" );
        dialog.dialog( "option", "buttons", [{
          text: "Close",
          click: closeDownload
        }]);
        $(".ui-dialog button").last().trigger( "focus" );
      }
    });
 
    function progress() {
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + Math.floor( Math.random() * 3 ) );
      
      if ( val <= 99 ) {
        progressTimer = setTimeout( progress, 50 );
      }
    }
  //bảng thông báo  đóng xử lý đơn hàng
    function closeDownload() {
      clearTimeout( progressTimer );
      dialog
        .dialog( "option", "buttons", dialogButtons )
        .dialog( "close" );
      progressbar.progressbar( "value", false );
      progressLabel
        .text( "Loading..." );
      downloadButton.trigger( "focus" );
    }
  } );
  </script>
     <script>
      //click vào button đăng ký
            $("#dangkyButton").click(function(){
                $("#loading").css("display", "block");
            })
  $( function() {
    var progressTimer,
    //hiền thị quá trình thông báo đang đăng ký
      progressbar = $( "#dangky" ),
      progressLabel = $( ".dangky-label" ),
      dialogButtons = [{
        text: "Cancel Download",
        click: closeDownload
      }],
      //hiển thị bảng thông báo đăng ký dựa vào id
      dialog = $( "#dangky" ).dialog({
        autoOpen: false,
        closeOnEscape: false,
        resizable: false,
        // buttons: dialogButtons,
        open: function() {
          progressTimer = setTimeout( progress, 2000 );
        },
        beforeClose: function() {
          downloadButton.button( "option", {
            disabled: false,
            label: "Đăng ký khách hàng"
          });
        }
      }),
      downloadButton = $( "#downloadButton" )
        .button()
        .on( "click", function() {
          $( this ).button( "option", {
            disabled: true,
            label: "Loading..."
          });
          dialog.dialog( "open" );
        });
    //đang trong quá trình đăng ký hiển thị text
    progressbar.progressbar({
      value: false,
      change: function() {
        progressLabel.text( "Đang trong quá trình đăng ký,không tắt trình duyệt: " + progressbar.progressbar( "value" ) + "%" );
      },
      complete: function() {
        progressLabel.text( "Complete!" );
        dialog.dialog( "option", "buttons", [{
          text: "Close",
          click: closeDownload
        }]);
        $(".ui-dialog button").last().trigger( "focus" );
      }
    });
  //thời gian hiển thị đăng ký
    function progress() {
      var val = progressbar.progressbar( "value" ) || 0;
 
      progressbar.progressbar( "value", val + Math.floor( Math.random() * 3 ) );
 
      if ( val <= 99 ) {
        progressTimer = setTimeout( progress, 50 );
      }
    }
  //dóng bảng đăng ký
    function closeDownload() {
      clearTimeout( progressTimer );
      dialog
        .dialog( "option", "buttons", dialogButtons )
        .dialog( "close" );
      progressbar.progressbar( "value", false );
      progressLabel
        .text( "Loading..." );
      downloadButton.trigger( "focus" );
    }
  } );
  </script>
  
  
</body>
</html>
<?php
error_reporting(0);
include('PHPMailer-master/src/PHPMailer.php');
include('PHPMailer-master/src/Exception.php');
include('PHPMailer-master/src/OAuth.php');
include('PHPMailer-master/src/POP3.php');
include('PHPMailer-master/src/SMTP.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class function_mail{
	
	public function sendMailDathang($tieude,$noidung,$maildathang){
		//ydimfgzogannwavw
		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'demologin979@gmail.com';                 // SMTP username
		    $mail->Password = 'ydimfgzogannwavw';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to
		 
		    //Recipients
		    $mail->setFrom('demologin979@gmail.com', 'Đặt hàng thành công');
		    $mail->addAddress($maildathang, 'Đặt hàng thành công');     // Add a recipient
		    // $mail->addCC('thewordjordan@gmail.com');
		    // $mail->addAddress('ellen@example.com');               // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('hoaiviet682000@gmail.com');
		    // $mail->addCC('truongngoctanhieu2018@gmail.com');
		    // $mail->addBCC('bcc@example.com');

		 
		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		 
		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $tieude;
		    $mail->Body    = $noidung;
		    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		 
		    $mail->send();
		    // echo 'Message đã gửi';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
	public function sendMailDangky($tieude,$noidung,$maildangky){
		//ydimfgzogannwavw
		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'demologin979@gmail.com';                 // SMTP username
		    $mail->Password = 'ydimfgzogannwavw';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to
		 
		    //Recipients
		    $mail->setFrom('demologin979@gmail.com', 'Đăng ký thành công');
		    $mail->addAddress($maildangky, 'Đăng ký thành công');     // Add a recipient
		    // $mail->addCC('thewordjordan@gmail.com');
		    // $mail->addAddress('ellen@example.com');               // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('hoaiviet682000@gmail.com');
		    // $mail->addCC('truongngoctanhieu2018@gmail.com');
		    // $mail->addBCC('bcc@example.com');

		 
		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		 
		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $title;
		    $mail->Body    = $noidung;
		    $mail->AltBody = $noidung;
		 
		    $mail->send();
		    // echo 'Message đã gửi';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
	public function sendMailQuenmatkhau($tieude,$noidung,$mailquenmatkhau){
		//ydimfgzogannwavw
		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'demologin979@gmail.com';                 // SMTP username
		    $mail->Password = 'ydimfgzogannwavw';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to
		 
		    //Recipients
		    $mail->setFrom('demologin979@gmail.com', 'Quên mật khẩu');
		    $mail->addAddress($mailquenmatkhau, 'Quên mật khẩu');     // Add a recipient
		    // $mail->addCC('thewordjordan@gmail.com');
		    // $mail->addAddress('ellen@example.com');               // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('hoaiviet682000@gmail.com');
		    // $mail->addCC('truongngoctanhieu2018@gmail.com');
		    // $mail->addBCC('bcc@example.com');

		 
		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		 
		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $title;
		    $mail->Body    = $noidung;
		    $mail->AltBody = $noidung;
		 
		    $mail->send();
		    // echo 'Message đã gửi';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
	public function sendXacnhandon($tieude,$noidung){
		$mail = new PHPMailer(true);
		$mail->CharSet = 'UTF-8';
		try {
		    //Server settings
		    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
		    $mail->isSMTP();                                      // Set mailer to use SMTP
		    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		    $mail->SMTPAuth = true;                               // Enable SMTP authentication
		    $mail->Username = 'hoaiviet682000@gmail.com';                 // SMTP username
		    $mail->Password = 'iqhdikmimtnqhidn';                           // SMTP password
		    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		    $mail->Port = 587;                                    // TCP port to connect to
		 
		    //Recipients
		    $mail->setFrom('thewordjordan@gmail.com', 'Shop xác nhận đơn hàng thành công');
		    $mail->addAddress('thewordjordan@gmail.com', 'Shop xác nhận đơn hàng thành công');     // Add a recipient
		    $mail->addCC('hoaiviet682000@gmail.com');
		    // $mail->addAddress('ellen@example.com');               // Name is optional
		    // $mail->addReplyTo('info@example.com', 'Information');
		    // $mail->addCC('hieuchance2018@gmail.com');
		    // $mail->addCC('truongngoctanhieu2018@gmail.com');
		    // $mail->addBCC('bcc@example.com');

		 
		    //Attachments
		    // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
		    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		 
		    //Content
		    $mail->isHTML(true);                                  // Set email format to HTML
		    $mail->Subject = $tieude;
		    $mail->Body    = $noidung;
		    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		 
		    $mail->send();
		    // echo 'Message đã gửi';
		} catch (Exception $e) {
		    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
		}
	}
 }
?>
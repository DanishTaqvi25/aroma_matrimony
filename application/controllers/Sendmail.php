<?php
	header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');

class Sendmail extends CI_Controller {


	public function sendotm(){
		$qry = "select * from client WHERE mailSent = 0 LIMIT 0, 20";
		$clients = $this->Common_model->gettenclients();

			$status = 0 ;
			foreach($clients as $qr){
			    $to = $qr->email;
$subject = "New Features | Welcome Back to Aroma Matrimony";

$message = "
<html>
<head>
<title>New Features | Welcome Back to Aroma Matrimony</title>
</head>
<body>
<img src='".base_url()."images/logo.png'>
<p><br />Thank You for registering with Aroma Matrimony! <br /><br />It's being a while since we met on Aroma Matrimony Website!  While you were away, we have redressed ourselves with new exciting features and plans.  We would like to welcome you to login to the website and fill in your details as well as upload a new looking fresh image. There might some missings in the data which you had already fed in, we apologize for the same.  At the same time, the new entry of data will help you to find your better half much easier than any other sites with a personal touch.  <br />Your  Password for Login to Aroma Matrimony is</p>
<br /><br />
<h1>".$qr->profile_password."</h1>
<br />
<a href='https://www.aromamatrimony.com'>Click Here to Go to the Site</a>
<br />
Wish You a happy successful Partner Search!<br />
Thank You,<br />
Team Aroma
</body>
</html>
";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= 'From: Aroma Matrimony <webmaster@aromamatrimony.com>' . "\r\n";
    // $headers .= 'BCc: reachigen@gmail.com' . "\r\n";

    if(mail($to,$subject,$message,$headers)){
      $upq = "UPDATE `client` SET `mailSent`= 1 WHERE profile_id =".$qr->profile_id;

			    $upquery = $this->db->query($upq);
			    
			    echo "send some mails";
} else {
    echo "some unkown error";
}
		 
			  
			    
			    
			}
	}
	
}




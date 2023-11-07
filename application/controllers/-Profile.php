<?php
	header('Access-Control-Allow-Origin: *');

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {


	public function getmember($uuid){
		$result = $this->Common_model->getmember('client', 'profile_uuid', $uuid);
		echo json_encode($result);
	}
	
	public function resetpassword(){
		$new_password = $this->input->post('new_password');
		$reset_profile = $this->input->post('reset_profile');
		$data = array(
			'profile_password'=>$new_password
		);
		$this->db->where('profile_uuid',$reset_profile);
		$this->db->update('client',$data);
			$Profile = $this->Common_model->getbyid('client', 'profile_uuid', $reset_profile);
			if($Profile){
				$test = 0 ;
				$username = "aromaservice9@gmail.com";
				$hash = "c8e7513992c9d52712094f90c68337ed199f415523818eab5b5e1a9b987e7614";
				$sender = "AROMSR"; // This is who the message appears to be from.
				$numbers = $Profile->mobile; // A single number or a comma-seperated list of numbers
				$message = "Your New Password to Login to Aroma Matrimony is ".$new_password." - Aroma Services";
				$message = urlencode($message);
				$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
				$ch = curl_init('http://api.textlocal.in/send/?');
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($ch); // This is the result from the API
				curl_close($ch);
				
				
				$to = $Profile->email;
				$subject = "Aroma Matrimony - New Password For Your Account";

				$message = "
<html>
<head>
<title>Aroma Matrimony - Password For Your Account</title>
</head>
<body>
<img src='".base_url()."images/logo.png'>
<p><br />Thank You for registering with Aroma Matrimony! The place where believers find their life partners!  Your  Password for Login to Aroma Matrimony is</p>
<br />
<h1>".$new_password."</h1>
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
    $headers .= 'BCc: aromaservice9@gmail.com' . "\r\n";

    mail($to,$subject,$message,$headers);
    
			}
		$data = array("status" => 1,"message"=>"");
		echo json_encode($data);
	}
	
	public function verify_reset_otp(){
		$reset_otp = $this->input->post('reset_otp');
		$reset_profile = $this->input->post('reset_profile');
		$qry = "select * from client_otp where  client_profile_uuid = '".$reset_profile."' and client_otp = '".$reset_otp."' ";
		$query = $this->db->query($qry);
		if($query->num_rows() > 0 ){
			$data = array("status" => 1,"message"=>"");
		}else{
			$data = array("status" => 0,"message"=>"You are not a member yet check your email/mobile and try again");
		}
		echo json_encode($data);
	}
	
	public function send_reset_otp(){
		$reset_media = $this->input->post('reset_media');
		$profile = $this->Common_model->getmemberBydetail($reset_media);
		if($profile->num_rows() > 0 ){
			$profile = $profile->row_array();
			if($profile['p_status'] != 'approved'){
				$data = array("status" => 0,"message"=>"your account is not verified yet contact Our admin 8759592020");
			}else{
				$otp = rand(12345, 99999);
				$to = $profile['email'];
		$subject = "Aroma Matrimony - OTP For Registration";

		$message = "
			<html>
			<head>
				<title>Aroma Matrimony - OTP For Reset Password</title>
			</head>
				<body>
				<img src='".base_url()."images/logo.png'>
				<p><br />Thank You for registering with Aroma Matrimony! The place where believers find their life partners!  The OTP for registration is</p>
			<br />
			<h1>".$otp."</h1>
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
		$headers .= 'BCc: aromaservice9@gmail.com' . "\r\n";

		mail($to,$subject,$message,$headers);
		
		
		
				$test = 0 ;
				$username = "aromaservice9@gmail.com";
				$hash = "c8e7513992c9d52712094f90c68337ed199f415523818eab5b5e1a9b987e7614";
				$sender = "AROMSR"; // This is who the message appears to be from.
				$numbers = $profile['mobile']; // A single number or a comma-seperated list of numbers
				$message = "OTP for Aroma Matrimony is ".$otp." - Please make sure that you are keeping this confidential - Aroma Services";
				$message = urlencode($message);
				$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
				$ch = curl_init('http://api.textlocal.in/send/?');
				curl_setopt($ch, CURLOPT_POST, true);
				curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($ch); // This is the result from the API
				//print_r($result);
				curl_close($ch);
				 $data = array(
					'client_otp_mobile'=>$profile['mobile'],
					'client_otp'=>$otp,
					'client_profile_uuid'=>$profile['profile_uuid']
				);
				$qry = "select * from client_otp where client_profile_uuid = '".$profile['profile_uuid']."' ";
				$client_otp = $this->db->query($qry);
				if($client_otp->num_rows() > 0 ){
					$this->db->where('client_profile_uuid',$profile['profile_uuid']);
					$this->db->update('client_otp',$data);
				}else{
					$this->db->insert('client_otp',$data);
				}
				$data = array("status" => 1,"message"=>"","profile_uuid"=>$profile['profile_uuid']);
			}
		}else{
			$data = array("status" => 0,"message"=>"You are not a member yet check your email/mobile and try again");
		}
		echo json_encode($data);
	}
	
	public function get_profile_image($id){
		$result = $this->Common_model->getallactivebyid('client_image','pro_image_isactive', 'profile_uuid', $id,'pro_image_id ', 'desc');
		echo json_encode($result);
	}
	
	public function update_password(){
		$password = $this->input->post('password');
		$logged_profile_uuid = $this->session->userdata('uuid');
		if(isset($logged_profile_uuid) ){
			$data = array(
				"profile_password"=>$password
			);
			$this->Common_model->updatedata($logged_profile_uuid,'client',$data,'profile_uuid');
		}
		$data = array("status" => 1);
		echo json_encode($data);
	}
	
	public function sharedprofile(){
		$logged_profile_uuid = $this->session->userdata('uuid');
		if(isset($logged_profile_uuid) ){
			$data['shared_profile'] = $this->Common_model->getshared_profile($logged_profile_uuid);
			$this->load->view('templates/header');
			$this->load->view('home/shared-profile',$data);
			$this->load->view('templates/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}
	public function myprofile(){
		$logged_profile_uuid = $this->session->userdata('uuid');
		if(isset($logged_profile_uuid) ){
			$uuid = $logged_profile_uuid;
			$data['shared_by'] = $this->Common_model->getshared_by($logged_profile_uuid);
			$Profile = $this->Common_model->getbyid('client', 'profile_uuid', $uuid);
			$image = $this->Common_model->getallactivebyid('client_image','pro_image_isactive', 'profile_uuid', $uuid,'pro_image_ismain', 'desc');
			$data['uuid'] = $uuid;
			$data['images'] = $image ;
			$this->load->view('templates/header');
			$this->load->view('home/my-profile',$data);
			$this->load->view('templates/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
		
	}
	public function sendsms(){
	    
	$mob = $this->input->post('mobile');
	$email = $this->input->post('email');
    $otp = rand(12345, 99999);
    $data['tempentry'] = array(
        'otpMobile' => $mob,
        'otpEmail' => $email,
        'otp' => $otp
        );
    $this->Common_model->insert('arma_otps', $data['tempentry']);
    
    //Send Email
    $to = $email;
$subject = "Aroma Matrimony - OTP For Registration";

$message = "
<html>
<head>
<title>Aroma Matrimony - OTP For Registration</title>
</head>
<body>
<img src='".base_url()."images/logo.png'>
<p><br />Thank You for registering with Aroma Matrimony! The place where believers find their life partners!  The OTP for registration is</p>
<br />
<h1>".$otp."</h1>
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
    $headers .= 'BCc: aromaservice9@gmail.com' . "\r\n";

    mail($to,$subject,$message,$headers);
    
	$username = "team@igensoftware.com";
	$hash = "f315efba5f85f5a0933afb63ce464cb8ac796a1243db51bccc047bd6c43aad15";

	// Config variables. Consult http://api.textlocal.in/docs for more info.
	$test = "0";

	// Data for text message. This is the text message data.
	$sender = "IGENSS"; // This is who the message appears to be from.
	$numbers = $mob; // A single number or a comma-seperated list of numbers
	$message = "OTP for Aroma Matrimony is ".$otp." - Please make sure that you are keeping this confidential - Igen Software";
	// 612 chars or less
	// A single number or a comma-seperated list of numbers
	$message = urlencode($message);
	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	$ch = curl_init('http://api.textlocal.in/send/?');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch); // This is the result from the API
	curl_close($ch);
	}
	public function viewprofile($uuid = '')
	{
		$Profile = $this->Common_model->getbyid('client', 'profile_uuid', $uuid);
		if($Profile){
			$logged_profile_uuid = $this->session->userdata('uuid');	
			if(isset($logged_profile_uuid) ){
				$image = $this->Common_model->getallactivebyid('client_image','pro_image_isactive', 'profile_uuid', $uuid,'pro_image_ismain', 'desc');
				$data['uuid'] = $uuid;
				$data['images'] = $image ;
				$data['images'] = $image ;
				$profile_uuid = $this->session->userdata('uuid');	
				$data['to_intrest'] = array();
				$data['from_intrest'] = array();
				$data['profile_uuid'] = '';
				if(isset($profile_uuid) ){
					$data['profile_uuid'] = $profile_uuid;
					$data['to_intrest'] = $this->Common_model->getintrest('client_request',$uuid,$profile_uuid);
					$data['from_intrest'] = $this->Common_model->getintrest('client_request',$profile_uuid,$uuid);
			
				}
				$sharedId = '';
				$status = $this->Common_model->update_client_views($uuid,'view',$sharedId);
				if((float) $status > 0 ){
					$data['is_free'] = 0;
					$this->load->view('templates/header');
					$this->load->view('home/profile',$data);
					$this->load->view('templates/footer');
				}else{
					$data['is_free'] = 1;
					$this->load->view('templates/header');
					$this->load->view('home/profile',$data);
					$this->load->view('templates/footer');
				}
			}else{
				redirect(base_url(), 'refresh');
			}
		}else{
				$data['uuid'] = '';
				$data['image'] = '';
				$this->load->view('templates/header');
				$this->load->view('home/unlink', $data);
				$this->load->view('templates/footer');
		}
	}
	
	
	public function update_package(){
		$profile_uuid = $this->input->post('profile_uuid');
		$package_uuid = $this->input->post('package_uuid');
		$amount = $this->input->post('amount');
		$update_data = array(
			'client_package_status'=>0
		);
		$this->Common_model->updatedata($profile_uuid,'client_package',$update_data,'client_package_client');
		$qry = "select curdate() + interval package_no_of_days day as expiry_date,a.* from sm_package as a where package_uuid = '".$package_uuid."' ";
		$query = $this->db->query($qry)->row_array();
		$cp_data = array(
			'client_package_uuid'=>$this->Common_model->gen_uuid(),
			'client_package'=>$query['package_uuid'],
			'client_package_amount'=>$amount,
			'client_package_days'=>$query['package_no_of_days'],
			'client_package_viewable_profile'=>$query['package_no_of_profile'],
			'client_package_client'=>$profile_uuid,
			'client_package_expire_date'=>$query['expiry_date'],
			'client_package_viewed_profile'=>0,
			'client_package_status'=>1,
			'client_package_is_default'=>$query['package_is_default']
		);
		$this->Common_model->savebasicsData('client_package', $cp_data);	
		$package = $this->Common_model->getActivePackage($profile_uuid);
		$data = array("status" => 1,"package"=>$package);
		echo json_encode($data);
	}
	
	public function update_status(){
		$client_request_uuid = $this->input->post('client_request_uuid');
		$client_request_status =  $this->input->post('client_request_status');
		$client_request_from = $this->input->post('client_request_from');
		$client_request_to = $this->input->post('client_request_to');
		$client_request = $this->Common_model->get_client_request($client_request_from,$client_request_to,$client_request_uuid,$client_request_status);
		if($client_request){
			$data = array("status" => 1,"messsage"=>'Updated Successfully',"results"=>$client_request);
		}else{
			$data = array("status" => 0,"messsage"=>'Data Does no Exist');
		}
		echo json_encode($data);
	}
	public function SearchProfile(){
		$logged_profile_uuid = $this->session->userdata('uuid');	
		if(isset($logged_profile_uuid) ){
			$this->load->view('templates/header');
			$this->load->view('home/searchprofile');
			$this->load->view('templates/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}
	
	public function intrestreceived(){
		$logged_profile_uuid = $this->session->userdata('uuid');	
		if(isset($logged_profile_uuid) ){
			$this->load->view('templates/header');
			$this->load->view('home/intrest-rec');
			$this->load->view('templates/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}
	
	public function intrestsend(){
		$logged_profile_uuid = $this->session->userdata('uuid');	
		if(isset($logged_profile_uuid) ){
			$this->load->view('templates/header');
			$this->load->view('home/intrest-send');
			$this->load->view('templates/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}
	
	public function get_package_byId($uuid){
		$package = $this->Common_model->getallactivebyid('sm_package', 'package_isactive', 'package_uuid', $uuid,'package_id','asc');
		echo json_encode($package);
	}
	
	public function check_upgrade_package(){
		$profile_uuid = $this->session->userdata('uuid');	
		if(isset($profile_uuid) ){
			$package = $this->Common_model->getActivePackage($profile_uuid);
			$data = array("status" => 1,"package"=>$package);
		}else{
			$data = array("status" => 0,"error"=>"Your Session Is Timed Out Login and Try again");
		}
		echo json_encode($data);
	}
	
	
	public function upgradepackage(){
		$data['package'] = $this->Common_model->getallactive_package('sm_package', 'package_isactive', 'package_order', 'asc');
		$profile_uuid = $this->session->userdata('uuid');	
		if(isset($profile_uuid) ){
			$data['current_package'] = $this->Common_model->getActivePackage($profile_uuid);
			$this->load->view('templates/header');
			$this->load->view('home/upgradepackage',$data);
			$this->load->view('templates/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
		
	}
	
	public function automatch(){
		$logged_profile_uuid = $this->session->userdata('uuid');	
		if(isset($logged_profile_uuid) ){
			$data['profile'] = $this->Common_model->getbyid('client', 'profile_uuid', $logged_profile_uuid);
			$this->load->view('templates/header');
			$this->load->view('home/automatch',$data);
			$this->load->view('templates/footer');
		}else{
			redirect(base_url(), 'refresh');
		}
	}
	
	public function SearchProduct(){
		$result = $this->Common_model->SearchProduct();
		echo json_encode($result);
	}
	
	public function ProfileIntrest($type){
		$result = $this->Common_model->ProfileIntrest($type);
		echo json_encode($result);
	}
	
	
	public function Unlink($uuid = ''){
		$image = $this->Common_model->getallactivebyid('client_image','pro_image_isactive', 'profile_uuid', $uuid,'pro_image_ismain', 'desc');
		$data['uuid'] = $uuid;
		$data['images'] = $image ;
		$this->load->view('templates/header');
		$this->load->view('home/unlink', $data);
		$this->load->view('templates/footer');
	}
	
	public function viewsharedprofile($uuid = '')
	{
		$share_uuid = $uuid;
		$Shared = $this->Common_model->getbyid('shared_profile', 'shared_profile_uuid', $uuid);
		if($Shared){
			if((float) $Shared->shared_profile_status > 0 ){
				$logged_profile_uuid = $this->session->userdata('uuid');	
				if(isset($logged_profile_uuid) ){
					$uuid = $Shared->shared_profile_profile;
					$status = $this->Common_model->update_client_views($uuid,'shared',$share_uuid);
					if((float) $status > 0 ){
						$data['Shared_by_details'] = $this->Common_model->Shared_by_details($share_uuid);
						$image = $this->Common_model->getallactivebyid('client_image','pro_image_isactive', 'profile_uuid', $uuid,'pro_image_ismain', 'desc');
						$data['uuid'] = $uuid;
						$data['images'] = $image ;
						$data['is_free'] = 0;
						$this->load->view('templates/header');
						$this->load->view('home/sharedprofile',$data);
						$this->load->view('templates/footer');
					}else{
						$data['Shared_by_details'] = $this->Common_model->Shared_by_details($share_uuid);
						$image = $this->Common_model->getallactivebyid('client_image','pro_image_isactive', 'profile_uuid', $uuid,'pro_image_ismain', 'desc');
						$data['uuid'] = $uuid;
						$data['images'] = $image ;
						$data['is_free'] = 1;
						$this->load->view('templates/header');
						$this->load->view('home/sharedprofile',$data);
						$this->load->view('templates/footer');
					}
				}else{
						$uuid = $Shared->shared_profile_profile;
						$status = $this->Common_model->update_client_views($uuid,'shared',$share_uuid);
						$data['Shared_by_details'] = $this->Common_model->Shared_by_details($share_uuid);
						$image = $this->Common_model->getallactivebyid('client_image','pro_image_isactive', 'profile_uuid', $uuid,'pro_image_ismain', 'desc');
						$data['uuid'] = $uuid;
						$data['images'] = $image ;
						$data['is_free'] = 1;
						$this->load->view('templates/header');
						$this->load->view('home/sharedprofile',$data);
						$this->load->view('templates/footer');
				}
			}else{
				$data['uuid'] = '';
				$data['image'] = '';
				$this->load->view('templates/header');
				$this->load->view('home/unlink', $data);
				$this->load->view('templates/footer');
			}
		}else{
			$data['uuid'] = '';
			$data['image'] = '';
			$this->load->view('templates/header');
			$this->load->view('home/unlink', $data);
			$this->load->view('templates/footer');
		}
		
	}
	
	public function share_profile(){
		$uuid = $this->input->post('share_uuid');
		$result = $this->Common_model->share_profile($uuid);
		print_r($result);
	}
	
	public function unlinkSharedProfile(){
		$uuid = $this->input->post('uuid');
		$this->db->where('shared_profile_uuid',$uuid);
		$data = array(
			'shared_profile_status'=>'0'
		);
		$this->db->update('shared_profile',$data);
	}


	public function profile_details($uuid = ''){
		$result = $this->Common_model->profile_details($uuid);
		echo json_encode($result);
	}

	public function profile_partner_details($uuid = ''){
		$result = $this->Common_model->profile_partner_details($uuid);
		echo json_encode($result);
	}


}
